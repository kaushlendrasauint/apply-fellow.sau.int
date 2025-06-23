<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registion;
use App\Models\File;
use App\Models\ApplicationFee;
use App\Models\ApplicationForm;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use App\Mail\PaymentSuccessfulMail;
use Illuminate\Support\Facades\Mail;

class SauPaymentController extends Controller
{

    // This method generates the payment URL
    public function generatePaymentUrl()
    {
        // Set payment parameters
        $userId = Session::get('user')->id;
        $data = Registion::where('id', $userId)->first();
        $form = ApplicationForm::where('id', $userId)->first();
        $name = $data->name;
        $email = $data->email;
        $mobile =  $data->mobile;
        $referenceNo = random_int(100000, 999999);
        $submerchantId = 45;
        
        if($form->application_for == 'Non-Teaching'){
            if($form->position =='Assistant' || $form->position =='Senior Assistant'){
                $transactionAmount = 850;
            }else{
                $transactionAmount = 1700;
            } 
        }else{
            $transactionAmount = 1700;
        }

        $arr = [1, 630, 1476, 580, 982, 1258, 168, 1615, 1468, 1615, 435, 1358, 232, 938, 1576];

        if (in_array($form->id, $arr)) {
            $transactionAmount = 850;
        }
        

        $returnUrl = 'https://apply.sau.int/sau-payment/success';
        $mandatoryFields = $referenceNo . '|' . $submerchantId . '|' . $transactionAmount . '|' . $name . '|' . $email . '|' . $mobile; // Custom fields, like customer details
        $optionalFields = $userId . '|recruitment-fee|x|x|x|x|x';
        $paymode = 9;

        // Generate the payment form URL
        $url = $this->paymentForm(
            $returnUrl,
            $mandatoryFields,
            $optionalFields,
            $transactionAmount,
            $referenceNo,
            $submerchantId,
            $paymode
        );

        return response()->json(['url' => $url]);
    }

    // This method generates the EazyPay payment form URL with encrypted parameters
    public function paymentForm(
        $returnUrl,
        $mandatoryFields,
        $optionalFields,
        $transactionAmount,
        $referenceNo,
        $submerchantId,
        $paymode
    ) {
        $encryptionKey = '3801710260701024'; // Your encryption key (this should be stored securely)

        // Encrypt each field using AES128 (ECB mode)
        $returnUrl = $this->aes128Encrypt($returnUrl, $encryptionKey);
        $mandatoryFields = $this->aes128Encrypt($mandatoryFields, $encryptionKey);
        $optionalFields = $this->aes128Encrypt($optionalFields, $encryptionKey);
        $transactionAmount = $this->aes128Encrypt($transactionAmount, $encryptionKey);
        $referenceNo = $this->aes128Encrypt($referenceNo, $encryptionKey);
        $submerchantId = $this->aes128Encrypt($submerchantId, $encryptionKey);
        $paymode = $this->aes128Encrypt($paymode, $encryptionKey);

        // Construct the EazyPay URL with encrypted parameters
        return $encrypt  = 'https://eazypay.icicibank.com/EazyPG?merchantid=386070&mandatory fields=' . $mandatoryFields .
            '&optional fields=' . $optionalFields .
            '&returnurl=' . $returnUrl .
            '&Reference No=' . $referenceNo .
            '&submerchantid=' . $submerchantId .
            '&transaction amount=' . $transactionAmount .
            '&paymode=' . $paymode;

        // return [ $plain , $encrypt];
    }

    function aes128Encrypt($plaintext, $key)
    {
        $cipher = "AES-128-ECB";
        in_array($cipher, openssl_get_cipher_methods(true));
        $ivlen = openssl_cipher_iv_length($cipher);
        $iv = openssl_random_pseudo_bytes(1);
        $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options = 0, "");
        //return $ciphertext."n";
        return $ciphertext;
    }


    // Handle payment response (success/failure)
    public function paymentResponse(Request $request)
    {

        //dd($request->all());

        // Payment response handling (success/failure)
        $status = $request->get('status');
        $referenceNo = $request->get('reference_no');
        $Response_Code = $request->get('Response_Code');
        // Perform actions based on payment status (e.g., update database, send email, etc.)

        if ($Response_Code == 'E000' ||  $Response_Code == 'E006') {

            $id = Str::before($request['optional_fields'], '|');
            $data = Registion::where('id', $id)->first();

            if ($data) {
                session(['user' => $data]);
            }

            $info = new ApplicationFee;
            $info->application_id         = $id;

            //$data     =   ApplicationForm::find($id);

            $info->payment                =  'Success';
            $info->amount                = 0;
           // $info->amount                =  $fields[2];
            $info->programme                =  'apply';
            $info->reference_no           =  $request['ReferenceNo'];
            $info->payment_response       =  json_encode($request->all());
            $info->save();


            $paymentDetails = [
                'name' => 'test',
                'amount' => '1740',
                'transaction_id' => 'SAU-R&C-2025-26-1	',
            ];
            $email=$data->email;    
            Mail::to($email)->send(new PaymentSuccessfulMail($paymentDetails));
    
    

            return redirect('thanks')->with('success', 'Your application has been registered successfully.');
        } else {

            //dd($request->all());
            $id = Str::before($request['optional_fields'], '|');
            $data = Registion::where('id', $id)->first();
            $info = new ApplicationFee;
            $info->application_id         = $id;
            $info->payment                =  'pending';
            $info->programme              =  'apply';
            $info->payment_response       =  json_encode($request->all());
            $info->save();

            if ($data) {
                session(['user' => $data]);
            }

            $encryptedId = base64_encode(Crypt::encryptString($id));

            if ($Response_Code == 'E007') {
                return redirect('step6/' . $encryptedId)->with('warning', 'We are facing some technical issue please try after some time');
            } else {
                return redirect('step6/' . $encryptedId)->with('warning', 'Please complete payment process for application registration');
            }
        }
    }
}
