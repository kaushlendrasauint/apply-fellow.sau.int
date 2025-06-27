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

            @include('include.forms-header')
            @include('include.error')


              
                <div class="page-wrap">
                    <div class="col-xs-12">

                       <div class="panel panel-default panel-hovered panel-stacked mb30">
                          
                            <div class="panel-body">
                                

                         
                                        <div class="card">
                        <div class="card-header">
                                <strong>Preview &amp; Final Submit</strong>
                        </div>
                            

                       
                     
                        

                     
                        

                  




                    
                           
                      


                        <!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application - Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            width: 64%;
            margin: auto;
            border: 2px solid #b9b9b9;
            padding: 1rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #b9b9b9;
        }
        th, td {
            text-align: left;
            font-size: 14px;
            padding: 8px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            width: 100px;
            height: auto;
            border: 1px solid #b9b9b9;
        }
        .bg-color {
            background-color: #b9b9b9;
            color: #000000;
        }

        h6 {
            padding: 0;
            margin: 0;
            font-size: 1rem;
        }

        .instruction{
            margin: 2rem 0;
        }

        .instruction ol{
            list-style: decimal;
            margin-left: 2rem;
        }

        .instruction li{
            margin: 0.5rem 0;
            list-style: decimal;
        }

        @media print {
            * {
                -webkit-print-color-adjust: exact; /* For Safari/Chrome */
                print-color-adjust: exact; /* Standard */
            }
        }

        @media print {
            body {
                color: black; /* Ensure text prints clearly */
                background-color: white; /* Ensure backgrounds don't disappear */
                padding-top: 50px; /* Adjust based on header height */
                padding-bottom: 50px;
            }

            .wrapper{
                width: 90%;
            }
            
            table {
                border-collapse: collapse;
                width: 100%;
            }

            table, td, th {
                border: 1px solid #a4a4a4; /* Ensure table borders are visible */
            }

            .bg-color {
                background-color: #0e4c92 !important; /* Ensure background colors stay */
                color: white !important;
            }

            /* Hide unnecessary elements in print */
            .no-print {
                display: none !important;
            }

            @page {
                size: A4; /* Set page size */
                margin: 5mm 2mm; /* Adjust margins to avoid overlap */
            }

            /* Footer */
            .print-footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                font-size: 12px;
                display: flex;
                justify-content: space-between;;
            }
        }

    </style>

</head>
<body>
    <div>
       
        <table style="width: 100%; border-collapse: collapse;" border="1">
            <tr class="bg-color">
                <td colspan="6"><h6>Personal Details</h6></td>
            </tr>
            <tr>
                <!-- First Column: Image and Signature -->
                <td rowspan="6"  style="text-align: center; width: 20%; vertical-align: top;">
                    <!-- Candidate Photo -->
                    
                    <img src="/storage/{{$passport_photograph->document_path}}" 
                         style="height: 140px; width: auto;" alt="Candidate Photo">

                </td>



                <!-- Second Column: Personal Details -->
                <td ><strong>Application No</strong></td>
                <td colspan="6">SAU-R&C-2025-26-{{$application_form->id}}</td>
            </tr>
            <tr>
                <td><strong>Name of the Candidate</strong></td>
                <td colspan="6">{{$application_form->name}}</td>
            </tr>
            <tr>
                <td><strong>Spouse Name</strong></td>
                <td colspan="6">{{$application_form->spouse_name}}</td>
            </tr>
            <tr>
                <td><strong>Gender</strong></td>
                <td colspan="6">{{$application_form->gender}}</td>
            </tr>
            <tr>
                <td><strong>Date of Birth</strong></td>
                <td colspan="6">{{ \Carbon\Carbon::parse($application_form->dob)->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <td><strong>Nationality</strong></td>
                <td colspan="6">{{$application_form->nationality}}</td>
            </tr>

            <tr>
                <td><strong>Position currenty held</strong></td>
                <td colspan="6">{{$application_form->position_current_held}}</td>
            </tr>
            <tr>
                <td><strong>Is the postion Permanent or Temporary</strong></td>
                <td colspan="6">{{$application_form->position_currenty}}</td>
            </tr>
            <tr>
                <td><strong>Work Address</strong></td>
                <td colspan="6">{{$application_form->work_address}}</td>
            </tr>
            <tr>
                <td><strong>Permanent Address</strong></td>
                <td colspan="6">{{$application_form->permanent_address}}</td>
            </tr>
            <tr>
                <td><strong>Prefer this address for correspondence</strong></td>
                <td colspan="6">{{$application_form->correspondence_address}}</td>
            </tr>


            <tr class="bg-color">
                <td colspan="6"><h6>Contact Details</h6></td>
            </tr>

            <!-- Row for Email and Mobile -->
            <tr>
                <td><strong>Email</strong></td>
                <td>{{$application_form->email}}</td>
                <td><strong>Mobile No.</strong></td>
                <td colspan="3">{{$application_form->mobile}}</td>
            </tr>

            <tr class="bg-color">
                <td colspan="6"><h6>Applying For</h6></td>
            </tr>
            <tr>
                <td><strong>Position</strong></td>
                <td>{{$application_form->position}}</td>
                <td><strong>Department/ Faculty</strong></td>
                <td colspan="3">{{$application_form->faculty_department}}</td>
            </tr>



            <tr class="bg-color">
                <td colspan="6"><h6>Education</h6></td>
            </tr>
            <tr>
                <td>Level</td>
                <td>Name of Degree	</td>
                <td>University / College </td>
               <td>Date of Joining</td>
               <td>Date of Award of Degree	</td>
                <td>Marks(%)
</td>
            </tr>

            @if($application_form->doctoral_award)
            <tr>
                <td>Doctoral Degree</td>
                <td>{{$application_form->doctoral_degree}}</td>
                <td>{{$application_form->doctoral_university}}</td>
               <td>{{ \Carbon\Carbon::parse($application_form->doctoral_joining)->format('d-m-Y') }}</td>
               <td>{{ \Carbon\Carbon::parse($application_form->doctoral_award)->format('d-m-Y') }}</td>
                <td>{{$application_form->doctoral_grades}}%</td>
            </tr>
            @endif
  

            @if($application_form->master_degree)
            <tr>
                <td>Master’s Degree</td>
                <td>{{$application_form->master_degree}}</td>
                <td>{{$application_form->master_university}}</td>
                <td>{{ $application_form->master_joining ? \Carbon\Carbon::parse($application_form->master_joining)->format('d-m-Y') : '' }}</td>
                 <td>{{ \Carbon\Carbon::parse($application_form->master_award)->format('d-m-Y') }}</td>
                <td>{{$application_form->master_grades}}%</td>
            </tr>
            @endif

            @if($application_form->bachelor_degree)
            <tr>
                <td>Bachelor’s Degree</td>
                <td>{{$application_form->bachelor_degree}}</td>
                <td>{{$application_form->bachelor_university}}</td>
               <td>{{ $application_form->bachelor_joining ? \Carbon\Carbon::parse($application_form->bachelor_joining)->format('d-m-Y') : '' }}</td>
                 <td>{{ \Carbon\Carbon::parse($application_form->bachelor_award)->format('d-m-Y') }}</td>
               <td>{{$application_form->bachelor_grades}}%</td>
            </tr>
            @endif

            @if($application_form->school_degree)
            <tr>
                <td>school’s Degree</td>
                <td>{{$application_form->school_degree}}</td>
                <td>{{$application_form->school_university}}</td>
               <td>{{ $application_form->school_joining ? \Carbon\Carbon::parse($application_form->school_joining)->format('d-m-Y') : '' }}</td>
                <td>{{ \Carbon\Carbon::parse($application_form->school_award)->format('d-m-Y') }}</td>
               <td>{{$application_form->school_grades}}%</td>
            </tr>
            @endif

             @if($application_form->others_degree)
            <tr>
                <td>Others</td>
                <td>{{$application_form->others_degree}}</td>
                <td>{{$application_form->others_university}}</td>
                <td>{{$application_form->others_award}}</td>
                <td>{{$application_form->others_grades}}%</td>
            </tr>
            @endif
            <tr>
                <td>Title of Ph.D. Thesis</td>
                <td colspan="2">{{$application_form->name_phd_thesis}}</td>
                <td><strong>Name of the Supervisor</strong></td>
                <td  colspan="2">{{$application_form->supervisor}}</td>
            </tr>

             <tr class="bg-color">
                <td colspan="6"><h6>Ph.D. Research Guidance</h6></td>
            </tr>

            <tr>
                <td><b>S.No</b></td>
                <td><b>Student Name</b>	</td>
                <td><b>Ph.D. Year</b></td>
                <td><b>University</b></td>
                <td><b>Supervisors</b></td>
                <td><b>Thesis Title</b></td>
            </tr>
            @foreach ($phd_details as $key=>$detail)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $detail->student_name ?? 'N/A' }}</td>
                    <td>{{ $detail->phd_year ?? 'N/A' }}</td>
                    <td>{{ $detail->university ?? 'N/A' }}</td>
                    <td>{{ $detail->supervisors ?? 'N/A' }}</td>
                    <td>{{ $detail->thesis_title ?? 'N/A' }}</td>
                </tr>
            @endforeach
            
           
             <tr class="bg-color">
                <td colspan="6"><h6>Courses Taught</h6></td>
            </tr>

            <tr>
                <td colspan="6" style="text-align: center; font-weight: bold;">List the courses you have taught, if any, at post-graduate MA /
                                    M.Sc /M.Tech./ B.A/ B.Sc/ B.Tech levels. Mention durations against each:</td>
            </tr>
              @forelse($courses_taughts as $index => $courses_taught)
                <tr>
                <td>{{ $index+1 }}</td>
                <td  colspan="5">{{ $courses_taught->value }}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="6" style="text-align: center; font-weight: bold;">Which of the compulsory courses can you teach independently to MA / M.Sc / M.Tech/ B.A/ B.Sc/ B.Tech students?</td>
            </tr>
               @foreach ($compulsory_courses as $key => $compulsory_course)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td  colspan="5">{{ $compulsory_course->value }}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="6" style="text-align: center; font-weight: bold;">Which of the optional courses can you teach independently at MA / M.Sc. / M.Tech/ B.A/ B.Sc/ B.Tech level?</td>
            </tr>
               @foreach ($optional_courses as $key => $course)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td  colspan="5">{{ $course->value }}</td>
                </tr>
            @endforeach


             <tr>
                <td colspan="6" style="text-align: center; font-weight: bold;">Any other course, not listed in SAU’s list of courses, which you may like to develop and teach to further strengthen your field of studies:</td>
            </tr>

              @forelse($other_courses as $index => $other_course)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td  colspan="5">{{ $other_course->value }}</td>
                </tr>
            @endforeach

             

             @if($careers)
                <tr class="bg-color">
                    <td colspan="6"><h6>Career History</h6></td>
                </tr>
                <tr>
                    <th>Position Held</th>
                    <th>Employer's Name and Address</th>
                    <th>Government / Private</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Salary US $PA</th>
                </tr>
                @foreach($careers as $career)
                <tr>
                    
                    <td>{{ $career->career_position ?? 'N/A' }}</td>
                    <td>{{ $career->career_employer ?? 'N/A' }}</td>
                    <td>{{ $career->career_address ?? 'N/A' }}</td>
                   <td>
                        {{ $career->career_datefrom ? \Carbon\Carbon::parse($career->career_datefrom)->format('d-m-Y') : 'N/A' }}
                    </td>
                    <td>
                        {{ $career->career_dateTo ? \Carbon\Carbon::parse($career->career_dateTo)->format('d-m-Y') : 'N/A' }}
                    </td>
                    <td>{{ $career->career_salary ?? 'N/A' }}</td>
                </tr>
                @endforeach   
            @endif
           
             
            <tr class="bg-color">
                <td colspan="6"><h6>Publications/ Grants</h6></td>
            </tr>
            <tr>
              <td><strong>Number of Books Edited</strong></td>
              <td><strong>Number of Books Authored</strong></td>
              <td><strong>Number of Research Publications</strong></td>
              <td><strong>Number of Book Chapters</strong></td>
              <td><strong>Number of Patents</strong></td>
              <td><strong>Number of Research Grants</strong></td>
            </tr>
            <tr>
               <td>{{ $application_form->number_books_edited ?? 'N/A' }}</td>
               <td>{{ $application_form->number_books_authored ?? 'N/A' }}</td>                
               <td>{{ $application_form->number_research_publications ?? 'N/A' }}</td>                
               <td>{{ $application_form->number_book_chapters ?? 'N/A' }}</td>
               <td>{{ $application_form->number_patents ?? 'N/A' }}</td>
               <td>{{ $application_form->number_research_grants ?? 'N/A' }}</td>
               
            </tr>
            <tr>
                <td colspan="6" style="text-align: center; font-weight: bold;">Please mention below up to five of your best Publications (Research Papers and books ):</td>
            </tr>

              @forelse($best_Publications as $index => $best_Publication)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td  colspan="5">{{ $best_Publication->value }}</td>
                </tr>
            @endforeach
            <tr>
             <td colspan="3"><strong>Number of Presentations in Conferences and Symposia</strong></td>
             <td colspan="3">{{ $application_form->number_presentations ?? 'N/A' }}</td>
            </tr>

          


            

            <tr class="bg-color">
                <td colspan="6"><h6>Other Information</h6></td>
            </tr>
            <tr>
                <td colspan="6">     {{  $application_form->other_information }}</td>
            </tr>

            <!-- Academic and Research Details -->
            
            <!-- <tr>
                <td><strong>Publications</strong></td>
                <td colspan="5">{!! nl2br(e($application_form->publications)) !!} </td>
            </tr> -->
            <!-- <tr>
                <td><strong>Gap in Employment History</strong></td>
                <td colspan="5">{!! nl2br(e($application_form->employment_history)) !!}</td>
            </tr> -->

            <!-- Personal and Additional Information -->
            <tr>
                <td><strong>Time required for joining</strong></td>
                <td colspan="5">{{ $application_form->joining_date ?? 'N/A' }}</td>
            </tr>
@if(1!=1)
            <tr>
                <td><strong>Consider Lower Position</strong></td>
                <td colspan="5">{{ $application_form->consider_lower_position ?? 'N/A' }}</td>
            </tr>
            @endif
            <tr>
                <td><strong>Other Information</strong></td>
                <td  colspan="5">{!! nl2br(e($application_form->other_information)) !!} </td>
            </tr>
         
            
            <tr>
                <td><strong>Legal Offences</strong></td>
                <td colspan="5">{!! nl2br(e($application_form->legal_offences)) !!}</td>
            </tr>
            <tr>
                <td><strong>Health Problems</strong></td>
                <td colspan="5"> {!! nl2br(e($application_form->health_problems)) !!}  </td>
            </tr>
                                        
             <tr>
                <td><strong>English Proficiency</strong></td>
                <td colspan="5">{{ $application_form->englishProficiency ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td><strong>Administrative Experience</strong></td>
                <td colspan="5"> {!! nl2br(e($application_form->adminExperience)) !!} </td>
            </tr>    
                                

         
            <tr class="bg-color">
                <td colspan="6"><h6>Reasons for Joining SAU</h6></td>
            </tr>
            <tr>
                <td colspan="6">      {!! nl2br(e($application_form->sau_reasons)) !!} </td>
            </tr>

             <tr class="bg-color">
                <td colspan="6"><h6>Uploaded Documents</h6></td>
            </tr>           
             @foreach($document_uploads as $key => $upload)
                <tr>                                
                    <td data-label="Document Name"><strong>{{$upload->document_type}}</strong></td>
                    <td data-label="Preview" colspan="5"><strong><a href="/storage/{{$upload->document_path}}" target="_blank">(File Link or image)</a></strong></td>
                </tr>
            @endforeach    
            


        </table> 
    </div>
    



                        
                     



                       
                      



                        
                      
                    
       
                                                

                    </div>

















                    <form action="{{ route('finalSubmit') }}" method="POST">
                    @csrf
                                <div class="md-checkbox md-primary terms_condition">
                                    <label>
                                        <input type="checkbox" id="chkConfirm" name="chkConfirm" value="1" checked>
                                        <span>I hereby certify that the information given in the Application Form is
                                            complete and accurate.</span>
                                    </label>
                                </div>
                          
                                 
                                  
                                    <div class="center-button-container">
                                        <button type="submit" class="btn btn-primary mr5 waves-effect" id="payButton">Save & Final Submit</button>
                                    </div>
                               



                            </div>

                            </form>

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
