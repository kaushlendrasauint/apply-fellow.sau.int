<?php

// $img_path = url('assets/img/cs-logo-white.png');
// $img_type = pathinfo($img_path, PATHINFO_EXTENSION);
// $img_data = file_get_contents($img_path);
// $base64 = 'data:image/' . $img_type . ';base64,' . base64_encode($img_data);

// $img_path1 = url('assets/img/sign.png');
// $img_type1 = pathinfo($img_path1, PATHINFO_EXTENSION);
// $img_data1 = file_get_contents($img_path1);
// $base641 = 'data:image/' . $img_type1 . ';base64,' . base64_encode($img_data1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">


    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
          rel="stylesheet"> -->

    <!-- Vendor CSS Files -->

<!--    <link href="--><?php //echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?><!--" rel="stylesheet">-->

    <!--    <script id="bolt" src="https://checkout-static.citruspay.com/bolt/run/bolt.min.js" bolt-color="e34524" bolt-logo="https://boltiswatching.com/wp-content/uploads/2015/09/Bolt-Logo-e14421724859591.png"></script>-->
    <style>
        @page { margin: 0px }
        /*@page { margin: 0px 10px 0px 10px; }*/
        /*body { margin: 0px; }*/
        p {
            padding: 0;
            margin: 0 0 5px 0;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.50rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-sm th,
        .table-sm td {
            padding: 0.2rem;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }


        .table-responsive > .table-bordered {
            border: 0;
        }
        /*table, td, td {*/
        /*    border: 1px solid black;*/
        /*}*/

        .col-md-auto {
            flex: 0 0 auto;
            width: auto;
        }

        .col-md-1 {
            flex: 0 0 auto;
            width: 8.33333333%;
        }

        .col-md-2 {
            flex: 0 0 auto;
            width: 16.66666667%;
        }

        .col-md-3 {
            flex: 0 0 auto;
            width: 25%;
        }

        .col-md-4 {
            flex: 0 0 auto;
            width: 33.33333333%;
        }

        .col-md-5 {
            flex: 0 0 auto;
            width: 41.66666667%;
        }

        .col-md-6 {
            flex: 0 0 auto;
            width: 50%;
        }

        .col-md-7 {
            flex: 0 0 auto;
            width: 58.33333333%;
        }

        .col-md-8 {
            flex: 0 0 auto;
            width: 66.66666667%;
        }

        .col-md-9 {
            flex: 0 0 auto;
            width: 75%;
        }

        .col-md-10 {
            flex: 0 0 auto;
            width: 83.33333333%;
        }

        .col-md-11 {
            flex: 0 0 auto;
            width: 91.66666667%;
        }

        .col-md-12 {
            flex: 0 0 auto;
            width: 100%;
        }
        .text-start {
            text-align: left !important;
        }

        .text-end {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }
        h2, .h2 {
            font-size: calc(1.325rem + 0.9vw);
        }
        h6, .h6, h5, .h5, h4, .h4, h3, .h3, h2, .h2, h1, .h1 {
            margin-top: 0;
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }
        .mt-5 {
            margin-top: 3rem !important;
        }
    </style>

<div class="receipt-content">
    <div class="row" style="color: #000; margin-top: 0;">
    </div>


    <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
	<tbody>
        <!-- <tr>
			<td colspan="3"><strong>Admission Form</strong></td>
		</tr> -->

		<tr>
			<td><img src="http://admissions.sau.ac.in/public/img/sau-university-new.png"  /></td>
			<td colspan="2" >
			<p style="text-align:center;"><span style="font-size:19pt;font-weight: bolder">South Asian University</span></p>
			<p style="text-align:center;font-size:14pt;">A University established by SAARC Nations</p>              
            <p style="text-align:center">Rajpur Road, Maidan Garhi, New Delhi 110068</p>
            <p style="text-align:center">Tel: +91 (11) 20862376</p>
            <p style="text-align:center"> website: https://sau.int/</p>

		</td>
		</tr>
		
        <!-- <tr style="background-color:#0e4c92;color:#fff">
			<td colspan="3"><p style="text-align:center;font-size:15pt;font-weight: bolder"><strong>Admission Form</strong></p></td>
		</tr> -->

        @if($info->programme=='b-tech')
			 <tr style="background-color:#0e4c92;color:#fff">
			    <td colspan="3"><p style="text-align:center;background-color:#efefef;color:#000;padding:10px"><strong>Admission Form -  {{ucfirst(str_replace("-", ".", $info->programme))}}. ({{ str_replace("-", " ", $info->btech_programmes)}}) - Direct Mode</strong></p></td>
		    </tr>

        @elseif($info->programme=='m-tech')
			 <tr style="background-color:#0e4c92;color:#fff">
			    <td colspan="3"><p style="text-align:center;background-color:#efefef;color:#000;padding:10px"><strong>Admission Form -  {{ucfirst(str_replace("-", ".", $info->programme))}}. ({{ str_replace("-", " ", $info->mtech_programmes)}}) - Direct Mode</strong></p></td>
		    </tr>    

        @elseif($info->programme=='Masters')
			 <tr style="background-color:#0e4c92;color:#fff">
			    <td colspan="3"><p style="text-align:center;background-color:#efefef;color:#000;padding:10px"><strong>Admission Form -  {{ucfirst(str_replace("-", " ", $info->programme))}} ({{ str_replace("-", " ", $info->master_programmes)}}) - Direct Mode</strong></p></td>
		    </tr>    
            @elseif($info->saarc=='saarc')
			 <tr style="background-color:#0e4c92;color:#fff">
			    <td colspan="3"><p style="text-align:center;background-color:#efefef;color:#000;padding:10px"><strong>Admission Form - {{ucfirst(str_replace("-", " ", $info->programme))}} ({{$info->Phd_programmes}}) - For Nationals of SAARC Countries Direct PhD Mode</strong></p></td>
		    </tr>
			@else
                <tr style="background-color:#0e4c92;color:#fff">
			        <td colspan="3"><p style="text-align:center;background-color:#efefef;color:#000;padding:10px"><strong>Admission Form - {{ucfirst(str_replace("-", " ", $info->programme))}} ({{$info->Phd_programmes}}) -  For Nationals of Non-SAARC Countries</strong></p></td>
		        </tr>
			@endif

            <tr>
			<td><strong>Name</strong></td>
			<td colspan="2">{{$info->name}}</td>
		</tr>
        <tr>
			<td><strong>Email</strong></td>
			<td colspan="2">{{$info->email}}</td>
		</tr>
        <tr>
			<td><strong>Mobile</strong></td>
			<td colspan="2">{{$info->mobile}}</td>
		</tr>
        <tr>
			<td><strong>Dob</strong></td>
			<td colspan="2">{{$info->dob}}</td>
		</tr>
        <tr>
			<td><strong>Gender</strong></td>
			<td colspan="2">{{$info->gender}}</td>
		</tr>
        <tr>
			<td><strong> Address for Correspondence:</strong></td>
			<td colspan="2">{{$info->address}} , {{$info->city}} ,{{$info->state}} ,{{$info->pin_code}} ,{{$info->country}}</td>
		</tr>

        @if($info->p_city ||  $info->p_state ||  $info->p_address ||  $info->p_pin_code ||  $info->p_country)
            <tr>
                <td><strong> Permanent Address :</strong></td>
                <td colspan="2">{{$info->p_address}} , {{$info->p_city}} ,{{$info->p_state}} ,{{$info->p_pin_code}} ,{{$info->p_country}}</td>
            </tr>
        @endif
       
		<tr>
			<td colspan="3"><p style="text-align:center;background-color:#efefef;color:#000;padding:10px"><strong>Details of Secondary Level Education</strong></p></td>
		</tr>

            <tr>
            <td colspan="3">
            <table>
				<tbody>
					<tr>
						<td>Examination Passed</td>
						<td>Year of Passing</td>
						<td>Marks %age / CGPA</td>
						<td>Name of School/College and City</td>
						<td>Name of Board</td>
						<td>Main Subjects Studied</td>
					</tr>
					<tr>
						<td>Senior Secondary (10+2) / Intermediate / 12<sup>th</sup> Grade/A-Level or Equivalent</td>
						<td>{{$info->s_passing}}</td>
						<td>{{$info->s_cgpa}}</td>
						<td>{{$info->s_college_name}}</td>
						<td>{{$info->s_board_name}}</td> 
						<td>{{$info->s_subject}}</td>
					</tr>
				</tbody>
			</table>
            </td>
        </tr>

 @if($info->programme!='b-tech')
		<tr>
			<td colspan="3"><p style="text-align:center;background-color:#efefef;color:#000;padding:10px"><strong>Details of Bachelor's Level Education</strong></p></td>
		</tr>
		<tr>
			<td colspan="3">
			<table style="width:100%">
				<tbody>
					<tr>
						<td>Title of the Bachelor&rsquo;s Degree</td>
						<td>Year of Passing</td>
						<td>Marks %age / CGPA</td>
						<td>Name of College and University</td>
						<td>Main Subjects Studied</td>
					</tr>
					<tr>
						<td>{{$info->b_title}}</td>
						<td>{{$info->b_passing}}</td>
						<td>{{$info->b_cgpa}}</td>
						<td>{{$info->b_college}}</td>
						<td>{{$info->b_studied}}</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
   	@endif    

		@if($info->programme!='Masters' && $info->programme!='b-tech' && $info->programme!='m-tech' )
		<tr>
			<td colspan="3"><p style="text-align:center;background-color:#efefef;color:#000;padding:10px"><strong>Details of Master's Level Education</strong></p></td>
		</tr>
		<tr>
			<td colspan="3" >
			<table style="width:100%">
				<tbody>
					<tr>
						<td>Title of the Master&rsquo;s&nbsp; Degree</td>
						<td>Year of Passing</td>
						<td>Marks %age / CGPA / &nbsp;Grade(s)</td>
						<td>Name of College and University</td>
						<td colspan="2">Main Subjects Studied</td>
					</tr>
					<tr>
				
						<td>{{$info->m_title}}</td>
						<td>{{$info->m_passing}}</td>
						<td>{{$info->m_cgpa}}</td>
						<td>{{$info->m_college}}</td>
						<td colspan="2">{{$info->m_studied}}</td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
		@endif

        @if($info->saarc=='saarc')
		<tr>
			<td colspan="3" >
			<p>@if($info->fellowship=='A') 
                    A: You have been already awarded National fellowship in any SAARC country on the basis of the National Entrance Tests.<br />
                    a. Name of the National Fellowship: {{$info->A_fellowship_name}}<br />
                    b. Country of Fellowship: {{$info->A_fellowship_country}}<br />
                    c. Year in which National Entrance Test was cleared: {{$info->A_fellowship_entrance}}
                @elseif($info->fellowship=='B')
                    B. You are funded by any Government agency to pursue PhD.<br />
                    a. Country of Funding Agency : {{$info->B_funding_agency}}<br />
                    b. Name of the Funding Agency : {{$info->B_funding_agency_name}}<br /> 
                    c. Duration of Funding : {{$info->B_funding_years_duration}}<br /> 
			@elseif($info->fellowship=='C') 
                    C. You are salaried and can get a leave from your organization for the two year residency period.<br />
                    a. Country of Employment :  {{$info->C_employment_country}}<br />
                    b. Name of the organization :  {{$info->C_organization_name}}<br />
                    c. Nature of organization :  {{$info->C_organization_nature}}<br />
			@endif
			</td>
		</tr>
		@endif
		<tr>
			<td colspan="3" >Would you like to avail of the Hostel facility provided by SAU? : {{$info->hostel_facility}} </td>
		</tr>
		<tr>
			<td colspan="3" >How did you come to know about South Asian University (SAU)? <p>{{$info->know_about}}</p>
			</td>
		</tr>
		<tr>
			<td colspan="3" >
			<p><span style="font-size:11pt"><span ><strong><em><span ><span style="color:black">Declaration: *</span></span></em></strong></span></span></p>
			<p style="text-align:justify"><span style="font-size:11pt"><span ><em><span ><span style="color:black">I declare that the information provided in this application is true and correct. I understand that I am being permitted to write the Entrance Test provisionally subject to meeting the minimum prescribed eligibility conditions and verification of documents before admission. If I qualify I will be required to provide additional information and documents. I understand that I am writing the Entrance Test at my own risk and cost with the understanding that if I do not fulfil the minimum eligibility requirements, the admission, if granted, shall be cancelled ipso facto. </span></span></em></span></span></p>
			</td>
		</tr>
		<tr>  
			<td colspan="2" style="width:382px">
			<p style="text-align:justify"><span style="font-size:11pt"><span ><strong><span style="font-size:12.0pt"><span >Date:{{date('d-m-Y', strtotime($info->created_at))}}</span></span></strong></span></span></p>
			</td>
			<td style="width:393px">
			<p style="text-align:justify"><span style="font-size:11pt"><span ><strong><span style="font-size:12.0pt"><span >Signature of the Applicant:
                <img src="http://admissions.sau.ac.in/public/uploads/{{$info->candidate_signatures}}" style="width:90px" /></span></span></strong></span></span></p>
			</td>
		</tr>
	</tbody>
</table>
               </table>
            </div>
    </div>
 </div>



