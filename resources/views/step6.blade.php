@extends('layouts.main')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <div class="panel panel-primary pt-2" style="background-color:#fdb756; padding: 0px 2rem;">
        <div class=" panel-heading d-flex flex-direction-md-column justify-content-end gap-2">
            <p><strong>Name:</strong> {{$data->name}}</p>
            <p style="margin-left: 10px;"><strong>Application Form No	:</strong> SAU-R&C-2025-26-{{ $data->id }}</p>
            <a href="{{ route('logout') }}" style="margin-left:12px;color: red; font-size: 16px; text-decoration: none;">Logout</a>

        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div style="text-align: center; margin: 10px;">
                    <a href="/step5/{{ request()->segment(2) }}" class="btn btn-secondary" style="margin: 10px;">Back</a>
                </div>

                @include('include.error')
              
                <div class="page-wrap">

                    <div class="col-xs-12">



                        <div class="panel panel-default panel-hovered panel-stacked mb30">


                           
                            <div class="panel-body">
                                <ol>
                                    <li>Your Application Form No is : <span id="formno">
                                            <b>SAU-R&C-2025-26-{{ $data->id }}</b></span></li>

                                </ol>


                                <div class="md-checkbox md-primary terms_condition">
                                    <label>
                                        <input type="checkbox" id="chkConfirm" name="chkConfirm" value="1" checked>
                                        <span>I hereby certify that the information given in the Application Form is
                                            complete and accurate.</span>
                                    </label>
                                </div>
                                <br>
                                <br>

                                <div class="alert alert-info" role="alert" style="margin-top: 2rem;font-size: 15px;">
                                    <div>
                                        <p>
                                        <h4>Payment Instructions</h4>
                                        </p>


                                        <!-- <p> <strong>Application Fee:</strong> A fee of US$ 20 or Indian Rs.1700/- for
                                            Teaching post can be paid via online payment process available on SAU website by
                                            using credit/debit card or net banking, OR via a bank draft drawn in favour of
                                            “South Asian University”, New Delhi. The applicant must write his/her name and
                                            post applied for, on the reverse side of the bank draft
                                        </p> -->


                                            <p>
                                            (a) Please read the instructions and general conditions before preparing and submitting the application form.<br />
                                            (b) Application Fee: A fee of US$ 20 or Indian INR 1700/- for Teaching and non-teaching posts and Grade I to III non-teaching post, and a fee of US$ 10 or Indian INR 850/- for other nonteaching post can be paid online.<br />
                                            (c) In career history, please fill only those positions that were held for at least 6 months.<br />
                                            (d) On the Publications page, please include those, and only those, research publications that were peer-reviewed. Please do not include abstracts, and articles submitted or under preparation. Magazine and newspaper articles should not be included.
                                            (e) Under &ldquo;honours, awards and distinctions&rdquo;, please include only significant national and international recognitions. These would include Elected Fellowships of Prestigious Professional Academies, competitive scholarships, medals, orations, invited memberships to prestigious bodies, and consultancies. Please do not include paid memberships of professional bodies and memberships of internal bodies of the institution where you are working or are employed.<br>
                                            (f) Candidates, who wish to apply for more than one position, should<br />fill up and send a separate application form for each position. Application fee will have to be paid separately for each application.</p>



                                        <p>For <strong>Outside India</strong>, you have two options:</p>
                                        <ul>
                                            <li>Debit Card: International Debit Card</li>
                                            <li>Credit Card: International Credit Card</li>
                                        </ul>
                                    </div>

                                </div>


                                <div class="center-button-container">
                                    <button class="btn btn-primary mr5 waves-effect" id="payButton">Pay & Register</button>
                                </div>





                                <script>
                                    document.getElementById("payButton").onclick = function() {
                                        // Make an AJAX request to get the encrypted payment URL
                                        fetch("{{ route('saugenerate.payment.url') }}")
                                            .then(response => response.json())
                                            .then(data => {
                                                window.location.href = data.url;
                                                //window.open(data.url, "_blank");
                                            })
                                            .catch(error => console.error("Error generating payment URL:", error));
                                    };
                                </script>





                            </div>



                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <style>
        .center-button-container {
            display: flex;
            justify-content: center;
            /* Horizontally center */
            align-items: center;
            /* Vertically center */
            height: 10vh;
            /* Make sure the container takes full viewport height */
            padding: 0 20px;
            /* Optional: for some space on the sides */
        }

        #payButton {
            padding: 12px 30px;
            /* Add space inside the button */
            font-size: 16px;
            /* Adjust the font size */
        }
    </style>
@endsection
