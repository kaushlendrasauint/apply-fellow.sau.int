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
            width: 60%;
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

        h5 {
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
@foreach ($records as $key => $record)
        @php
            $application_form = $record['application_form'];
            $fee = $record['fee'];
        @endphp

    <div class="wrapper">
        <div style="display: flex; align-items: center; justify-content: space-between; width: 100%; margin: 0 auto; padding: 10px 0; border-bottom: 2px solid black;">
            <img src="https://sau.int/wp-content/themes/sau/images/sau_logo.gif" alt="sau Logo" style="height: 80px;">
            
            <div style="text-align: center;">
                <h3 style="margin: 0; font-size: 24px; font-weight: bold;">SOUTH ASIAN UNIVERSITY</h3>
                <p style="margin: 5px 0; font-size: 14px; font-weight: bold;">
                    (A University established by SAARC Nations)
                </p>
                <p style="margin: 0; font-size: 14px; font-weight: bold;">
                    Rajpur Road, Maidan Garhi, New Delhi 110068
                </p>
            </div>
        
            <img src="https://sau.int/wp-content/uploads/2024/01/1200px-SAARC_Logo.svg_.png" alt="saarc Logo" style="height: 80px;">
        </div>
    
        <table style="width: 100%; border-collapse: collapse;" border="1">
            <tr class="bg-color">
                <td colspan="6"><h5>{{$key+1}} - Personal Details</h5></td>
            </tr>
            <tr>
                <!-- First Column: Image and Signature -->
                <td rowspan="6"  style="text-align: center; width: 20%; vertical-align: top;">
                    <!-- Candidate Photo -->
                    
                    <img src="https://apply.sau.int/storage/{{ $application_form->recent_passport }}" 
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

            @if($application_form->spouse_name)
            <tr>
                <td><strong>Spouse Name</strong></td>
                <td colspan="6">{{$application_form->spouse_name}}</td>
            </tr>
            @endif

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

            <tr class="bg-color">
                <td colspan="6"><h5>Contact Details</h5></td>
            </tr>

            <!-- Row for Email and Mobile -->
            <tr>
                <td><strong>Email</strong></td>
                <td>{{$application_form->email}}</td>
                <td><strong>Mobile No.</strong></td>
                <td colspan="3">{{$application_form->mobile}}</td>
            </tr>

            <tr class="bg-color">
                <td colspan="6"><h5>Applying For</h5></td>
            </tr>
            <tr>
                <td><strong>Position</strong></td>
                <td>{{$application_form->position}}</td>
                <td><strong>Department</strong></td>
                <td colspan="3">{{$application_form->faculty_department}}</td>
            </tr>


            @php
                // Fetch careers for the current application ID
                $careers = \App\Models\Career::where('application_id', $application_form->id)->get();
            @endphp
           

            
          


            <!-------------------------------------- Teaching experience:------------------>



            <tr class="bg-color">
                <td colspan="6"><h5>Teaching experience</h5></td>
            </tr>

            @if($application_form->courses_taught)
            <tr>
                <td colspan="6">
                    <strong>List the courses you have taught, if any, at post-graduate MA / M.Sc / /M.Tech. levels. Mention durations against each:</strong><br/>
                    {{$application_form->courses_taught }}
                </td>
            </tr>
            @endif

            @if($application_form->compulsory_courses)
            <tr>
                <td colspan="6">
                    <strong>Which of the listed compulsory courses can you teach independently to MA / M.Sc / M.Tech students?</strong><br/>
                    {{$application_form->compulsory_courses }}
                </td>
            </tr>
            @endif         
          
            @if($application_form->optional_courses)
            <tr>
                <td colspan="6">
                    <strong>Which of the listed optional courses can you teach independently at MA / M.Sc. / M.Tech level?</strong><br/>
                    {{$application_form->optional_courses }}
                </td>
            </tr>
            @endif
            @if($application_form->other_courses)
            <tr>
                <td colspan="6">
                    <strong>Any other course, not listed in SAU’s list of courses, which you may like to develop and teach to further strengthen your field of studies:</strong><br/>
                    {{$application_form->other_courses }}
                </td>
            </tr>
            @endif    

            
            <!-----------------------END Teaching experience:------------------>
                <!-----------  ----------------- Career History ---------------------------------->

            @if(isset($careers))    
            <tr class="bg-color">
                <td colspan="6"><h5>Careers</h5></td>
            </tr>
                     <tr>
                        <td><b>Position</b></td>
                        <td><b>Employer</b></td>
                        <td><b>From</b></td>                        
                        <td><b>To</b></td>                        
                        <td><b>Address</b></td>
                        <td><b>Salary</b></td>
                    </tr>
                @foreach($careers as $career)
                    <tr>
                        <td><b>{{ $career->career_position }}</b></td>
                        <td>{{ $career->career_employer }}</td>
                        
                      
                        
                        <td> 
                            @if($career->career_datefrom)  
                                 {{ \Carbon\Carbon::parse($career->career_datefrom)->format('d-m-Y') }}  
                            @endif
                        </td>
                        <td> 
                           @if($career->career_dateTo)  
                                {{ \Carbon\Carbon::parse($career->career_dateTo)->format('d-m-Y') }}   
                            @endif
                        </td>
                        
                        <td>{{ $career->career_address }}</td>
                        <td> @if($career->career_salary)
                                ${{ $career->career_salary }}
                            @endif                    
                        </td>
                    </tr>
                @endforeach
            @endif        



                @if($application_form->adminExperience)
                <tr class="bg-color">
                    <td colspan="6"><h5>Admin Experience</h5></td>
                </tr>
                <tr>
                    <td colspan="6">     {!!  $application_form->adminExperience !!}</td>
                </tr>
                @endif

                <!-----------  ----------------- END Career History ---------------------------------->


                <!---------------------------- Education ----------------------------------------------->
                <tr class="bg-color">
                <td colspan="6"><h5>Education</h5></td>
            </tr>
            @if($application_form->doctoral_award)
            <tr>
                <td><b>Doctoral Degree</b></td>
                <td>{{ \Carbon\Carbon::hasFormat($application_form->doctoral_degree, 'Y-m-d') ? \Carbon\Carbon::parse($application_form->doctoral_degree)->format('d-m-Y') : $application_form->doctoral_degree }}

                </td>
                <td>{{$application_form->doctoral_university}}</td>
                <td><strong>Date of Joining</strong></td>
                <td>{{$application_form->doctoral_joining}}</td>
                <td>{{$application_form->doctoral_grades}}%</td>
            </tr>
            @endif

            @if($application_form->id == 1427 || $application_form->id == 4752 )
            <tr>
                <td><b>Master’s Degree</b></td>
                <td>PGDM (Management)</td>
                <td>IIPM</td>
                <td><strong>Date of Joining</strong></td>
                <td>2007 - 2009</td>
                <td>79.76%</td>
            </tr>
            @endif

            @if($application_form->master_degree)
            <tr>
                <td><b>Master’s Degree</b></td>
                <td>{{$application_form->master_degree}}</td>
                <td>{{$application_form->master_university}}</td>
                <td><strong>Date of Joining</strong></td>
                <td>
                    {{ $application_form->master_joining ? \Carbon\Carbon::parse($application_form->master_joining)->format('d-m-Y') : 'N/A' }}
                </td>
                <td>{{$application_form->master_grades}}%</td>
            </tr>
            @endif

            @if($application_form->bachelor_degree)
            <tr>
                <td><b>Bachelor’s Degree</b></td>
                <td>{{$application_form->bachelor_degree}}</td>
                <td>{{$application_form->bachelor_university}}</td>
                <td><strong>Date of Joining</strong></td>
                
                <td>
                    {{ $application_form->bachelor_joining ? \Carbon\Carbon::parse($application_form->bachelor_joining)->format('d-m-Y') : 'N/A' }}

                </td>

                <td>{{$application_form->bachelor_grades}}%</td>
            </tr>
            @endif

            @if($application_form->school_degree)
            <tr>
                <td><b>school’s Degree</b></td>
                <td>{{$application_form->school_degree}}</td>
                <td>{{$application_form->school_university}}</td>
                <td><strong>Date of Joining</strong></td>
                <td>
                    @if($application_form->school_joining)
                         {{ \Carbon\Carbon::parse($application_form->school_joining)->format('d-m-Y') }}
                    @else
                        N/A
                    @endif
                </td>
                <td>{{$application_form->school_grades}}%</td>
            </tr>
            @endif

                <!---------------------------- End Education ----------------------------------------------->

               
                <tr class="bg-color">
                    <td colspan="6"><h5>Publications</h5></td>
                </tr>
                <tr>
                   
                    <td colspan="2"><b>Number of Books Authore :</b> {{  $application_form->number_books_authored ?? 'NA' }} </td>
                    <td colspan="2"><b>Number of Research Publications :</b> {{  $application_form->number_research_publications ?? 'NA' }}</td>
                    <td colspan="2"><b>Number of Patents :</b> {{  $application_form->number_patents ?? 'NA' }}</td>
                 
                </tr>
                <tr>
                    
                    <td  colspan="3"><b>Number of Research Grants :</b> {{  $application_form->number_research_grants ?? 'NA' }}</td>
                    <td  colspan="3"><b>Number of Presentations in Conferences and Symposia :</b> {{  $application_form->number_presentations ?? 'NA' }}</td>
                </tr>
                <tr>
                   
                    <td colspan="3"><b>Number of Books Edited :</b> {{  $application_form->number_books_edited ?? 'NA' }} </td>
                    <td colspan="3"><b>Number of Book Chapter :</b> {{  $application_form->number_books_chapte ?? 'NA' }} </td>
                </tr>


                <tr>   
                <td  colspan="6"> <strong>Please mention below up to five of your best books (Include publisher’s name and ISBN no) / Publications:</strong>
                        {{  $application_form->publications }}</td>
                </tr>

                @if($application_form->employment_history)
                <tr>
                    <td  colspan="6"> <strong>Gaps in employment history::</strong>
                        {{  $application_form->employment_history }}
                </td>
                </tr>
               @endif



<!----------------------Other Information-------------------------->

                <tr class="bg-color">
                    <td colspan="6"><h5>Other Information</h5></td>
                </tr>


                @if($application_form->joining_date)
            {{-- <tr>
                <td colspan="6">
                    <strong>Joining Date</strong><br/>
                    {{$application_form->joining_date }}
                </td>
            </tr> --}}
            @endif

            @if($application_form->consider_lower_position)
            <tr>
                <td colspan="6">
                    <strong>Consider Lower Position</strong><br/>
                    {{$application_form->consider_lower_position }}
                </td>
            </tr>
            @endif


            @if($application_form->other_information)
                    <tr>
                        <td colspan="6">
                            <strong>Any other information: (Please Provide here any other relevant information.)</strong><br/>
                            {{ $application_form->other_information }}
                        </td>
                    </tr>
                @endif


                @if($application_form->legal_offences)
                    <tr>
                        <td colspan="6">
                            <strong>Legal Offences</strong><br/>
                            {{ $application_form->legal_offences }}
                        </td>
                    </tr>
                @endif


                
                @if($application_form->health_problems)
                    <tr>
                        <td colspan="6">
                            <strong>Health Problems</strong><br/>
                            {{ $application_form->health_problems }}
                        </td>
                    </tr>
                @endif


                
                @if($application_form->reason_joining)
                    <tr>
                        <td colspan="6">
                            <strong>Reason for Joining</strong><br/>
                            {{ $application_form->reason_joining }}
                        </td>
                    </tr>
                @endif


            

<!----------------------End Other Information-------------------------->

@if($application_form->latest_cv)
<tr>
    <td colspan="6">
        <strong><a href="{{'https://apply.sau.int/storage/'.$application_form->latest_cv }}" target="_blank">Resume Click Here</a></strong><br/>
      
    </td>
</tr>
@endif



        </table> 
    </div>
    

        <!-- Insert page break after each record except the last -->
        @if (!$loop->last)
            <div style="page-break-after: always;"></div>
        @endif
    @endforeach

    
</body>
</html>
