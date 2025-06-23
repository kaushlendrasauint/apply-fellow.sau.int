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
                            

                        <div class="ps-4 pt-4">
                            <h5 class="primary-heading">Position / Personal / Education Details</h5>
                        </div>

                        <div class="p-4 pt-0 d-flex gap-2 personal-details">
                            <table style="width: 90%;">
                                <tbody>
                                <tr>
                                        <td><strong>Application No</strong></td>
                                        <td>SAU-R&C-2025-26-{{ $data->id }}</td>
                                        <td><strong>Name of the Candidate</strong></td>
                                        <td>{{ $data->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gender</strong></td>
                                        <td>{{ $data->gender }}</td>
                                        <td><strong>Spouse Name</strong></td>
                                        <td>{{ $data->spouse_name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nationality</strong></td>
                                        <td>{{ $data->nationality }}</td>
                                        <td><strong>Date of Birth</strong></td>
                                        <td>{{ $data->dob }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Email</strong></td>
                                        <td>{{ $data->email }}</td>
                                        <td><strong>Mobile</strong></td>
                                        <td>{{ $data->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Current Position</strong></td>
                                        <td>{{ $data->position_currenty }}</td>
                                        <td><strong>Work Address</strong></td>
                                        <td>{{ $data->work_address }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Permanent Address</strong></td>
                                        <td colspan="3">{{ $data->permanent_address }}</td>
                                    </tr>                                
                                </tbody>
                            </table>
                            <img class="profile" src="/storage/{{$passport_photograph->document_path}}" style="height: 140px;width: 140px; margin-left: auto;" alt="">
                        </div>
                        

                        <div class="ps-4">
                            <h5 class="primary-heading"> Education</h5>
                        </div>
                        <div class="p-4 pt-0">
                            <table border="1" cellpadding="8" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Degree</th>
                                    <th>University</th>
                                    <th>Date of Joining</th>
                                    <th>Award Date</th>
                                    <th>Marks(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Doctoral</td>
                                    <td>{{ $data->doctoral_degree ?? 'N/A' }}</td>
                                    <td>{{ $data->doctoral_university ?? 'N/A' }}</td>
                                    <td>{{ $data->doctoral_joining ?? 'N/A' }}</td>
                                    <td>{{ $data->doctoral_award ?? 'N/A' }}</td>
                                    <td>{{ $data->doctoral_grades ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Master's</td>
                                    <td>{{ $data->master_degree ?? 'N/A' }}</td>
                                    <td>{{ $data->master_university ?? 'N/A' }}</td>
                                    <td>{{ $data->master_joining ?? 'N/A' }}</td>
                                    <td>{{ $data->master_award ?? 'N/A' }}</td>
                                    <td>{{ $data->master_grades ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>Bachelor's</td>
                                    <td>{{ $data->bachelor_degree ?? 'N/A' }}</td>
                                    <td>{{ $data->bachelor_university ?? 'N/A' }}</td>
                                    <td>{{ $data->bachelor_joining ?? 'N/A' }}</td>
                                    <td>{{ $data->bachelor_award ?? 'N/A' }}</td>
                                    <td>{{ $data->bachelor_grades ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td>School</td>
                                    <td>{{ $data->school_degree ?? 'N/A' }}</td>
                                    <td>{{ $data->school_university ?? 'N/A' }}</td>
                                    <td>{{ $data->school_joining ?? 'N/A' }}</td>
                                    <td>{{ $data->school_award ?? 'N/A' }}</td>
                                    <td>{{ $data->school_grades ?? 'N/A' }}</td>
                                </tr>
                                @if($data->others_degree)
                                    <tr>
                                        <td>Others</td>
                                        <td>{{ $data->others_degree ?? 'N/A' }}</td>
                                        <td>{{ $data->others_university ?? 'N/A' }}</td>
                                        <td>{{ $data->others_joining ?? 'N/A' }}</td>
                                        <td>{{ $data->others_award ?? 'N/A' }}</td>
                                        <td>{{ $data->others_grades ?? 'N/A' }}</td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"><strong>Supervisor</strong></td>
                                    <td colspan="4">{{ $data->supervisor ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>PhD Thesis Title</strong></td>
                                    <td colspan="4">{{ $data->name_phd_thesis ?? 'N/A' }}</td>
                                </tr>
                            </tfoot>
                        </table>                             
                    </div>

                    @if($careers)
                    <div class="ps-4">
                            <h5 class="primary-heading"> Career History</h5>
                        </div>
                        <div class="p-4 pt-0">
                            <table border="1" cellpadding="8" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Position Held</th>
                                    <th>Employer's Name / Address</th>
                                    <th>Government / Private</th>
                                    <th>Date From</th>
                                    <th>Date To</th>
                                    <th>Salary($ US)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($careers as $career)
                                <tr>
                                   
                                    <td>{{ $career->career_position ?? 'N/A' }}</td>
                                    <td>{{ $career->career_employer ?? 'N/A' }}</td>
                                    <td>{{ $career->career_address ?? 'N/A' }}</td>
                                    <td>{{ $career->career_datefrom ?? 'N/A' }}</td>
                                    <td>{{ $career->career_dateTo ?? 'N/A' }}</td>
                                    <td>{{ $career->career_salary ?? 'N/A' }}</td>
                                </tr>
                             @endforeach   
                               
                            </tbody>
                        </table>                             
                    </div>
                @endif    




                        <div class="ps-4">
                            <h5 class="primary-heading">Ph.D. Research Guidance</h5>
                        </div>
                        <div class="p-4 pt-0">
                           
                        <table border="1" cellpadding="8" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Student Name</th>
                                            <th>PhD Year</th>
                                            <th>University</th>
                                            <th>Supervisors</th>
                                            <th>Thesis Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                    </tbody>
                                </table>

                                <div class="ps-4">
                            <h5 class="primary-heading">Teaching Experience:</h5>
                        </div>


                                <table border="1" cellpadding="8" cellspacing="0" width="100%">
                                    <tbody>


                                        <tr>
                                            <td colspan="2" style="text-align: center; font-weight: bold;">List the courses you have taught, if any, at post-graduate MA /
                                    M.Sc / /M.Tech. levels. Mention durations against each:</td>
                                        </tr>
                                         @forelse($courses_taughts as $index => $courses_taught)
                                            <tr>
                                            <td>{{ $index+1 }}</td>
                                                <td>{{ $courses_taught->value }}</td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <td colspan="2" style="text-align: center; font-weight: bold;">List the courses you have taught, if any, at post-graduate MA / M.Sc / /M.Tech. levels. Mention durations against each:</td>
                                        </tr>
                                        @foreach ($compulsory_courses as $key => $course)
                                            <tr>
                                            <td>{{ $key+1 }}</td>
                                                <td>{{ $course->value }}</td>
                                            </tr>
                                        @endforeach


                                        <tr>
                                            <td colspan="2" style="text-align: center; font-weight: bold;">Which of the listed compulsory courses can you teach
                                    independently to MA / M.Sc / M.Tech students?</td>
                                        </tr>
                                        @foreach ($optional_courses as $key => $course)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $course->value }}</td>
                                            </tr>
                                        @endforeach


                                            <tr>
                                                <td colspan="2" style="text-align: center; font-weight: bold;">Any other course, not listed in SAU’s list of courses, which you may like to develop and teach to further strengthen your field of studies:</td>
                                            </tr>
                                            @forelse($other_courses as $index => $other_course)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $other_course->value }}</td>
                                            </tr>
                                        @endforeach

                                            <tr>
                                                <td colspan="2" style="text-align: center; font-weight: bold;">Please mention below up to five of your best Publications (Research Papers and books ):</td>
                                            </tr>
                                            @forelse($best_Publications as $index => $best_Publication)
                                            <tr>
                                                <td>{{ $index+1 }}</td>
                                                <td>{{ $best_Publication->value }}</td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                        </div>



                        <div class="ps-4">
                            <h5 class="primary-heading">Uploaded Documents</h5>
                        </div>
                        <div class="p-4 pt-0">
                            <table class="upload-document">
                                <tbody><tr>
                                    <th><strong>Document Name</strong></th>
                                    <th><strong>Preview</strong></th>
                                </tr>
                            @foreach($document_uploads as $key => $upload)
                                <tr>                                
                                    <td data-label="Document Name"><strong>{{$upload->document_type}}</strong></td>
                                    <td data-label="Preview"><strong><a href="/storage/{{$upload->document_path}}" target="_blank">(File Link or image)</a></strong></td>
                                </tr>
                            @endforeach                                  
                            </tbody></table>
                        </div>



                        
                        <div class="ps-4">
                            <h5 class="primary-heading">Other Information</h5>
                        </div>
                        <div class="p-4 pt-0">
                        
                            
                            <table border="1" cellpadding="8" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Academic and Research Details -->
                                    <tr>
                                        <td><strong>Number of Books Edited</strong></td>
                                        <td>{{ $data->number_books_edited ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Books Authored</strong></td>
                                        <td>{{ $data->number_books_authored ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Research Publications</strong></td>
                                        <td>{{ $data->number_research_publications ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Book Chapters</strong></td>
                                        <td>{{ $data->number_book_chapters ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Patents</strong></td>
                                        <td>{{ $data->number_patents ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Research Grants</strong></td>
                                        <td>{{ $data->number_research_grants ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Number of Presentations</strong></td>
                                        <td>{{ $data->number_presentations ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Publications</strong></td>
                                         <td>{!! nl2br(e($data->publications)) !!} </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Gap in Employment History</strong></td>
                                         <td>{!! nl2br(e($data->employment_history)) !!} </td>
                                    </tr>

                                    <!-- Personal and Additional Information -->
                                    <tr>
                                        <td><strong>Joining Date</strong></td>
                                        <td>{{ $data->joining_date ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Consider Lower Position</strong></td>
                                        <td>{{ $data->consider_lower_position ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Other Information</strong></td>
                                         <td>{!! nl2br(e($data->other_information)) !!} </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Reasons for Joining SAU</strong></td>
                                          <td>{!! nl2br(e($data->sau_reasons)) !!} </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Legal Offences</strong></td>
                                          <td>{!! nl2br(e($data->legal_offences)) !!} </td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>Health Problems</strong></td>
                                          <td>{!! nl2br(e($data->health_problems)) !!} </td>
                                    </tr>

                                    <tr>
                                        <td><strong>English Proficiency</strong></td>
                                        <td>{{ $data->englishProficiency ?? 'N/A' }}</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><strong>Administrative Experience</strong></td>
                                        <td>   {!! nl2br(e($data->adminExperience)) !!} </td>
                                    </tr>

                                    @if($data->reason_joining)
                                        <tr>
                                            <td><strong>Reason for Joining</strong></td>
                                            <td>   {!! nl2br(e($data->reason_joining)) !!} </td>
                                        </tr>
                                    @endif

                                </tbody>
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
