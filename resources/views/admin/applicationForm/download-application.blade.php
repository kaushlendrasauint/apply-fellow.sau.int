<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
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
                <td colspan="6"><h5>Personal Details</h5></td>
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
                <td colspan="6">{{$application_form->dob}}</td>
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



            <tr class="bg-color">
                <td colspan="6"><h5>Education</h5></td>
            </tr>
            @if($application_form->doctoral_award)
            <tr>
                <td>Doctoral Degree</td>
                <td>{{$application_form->doctoral_degree}}</td>
                <td>{{$application_form->doctoral_university}}</td>
                <td><strong>Date of Joining</strong></td>
                <td>{{$application_form->doctoral_joining}}</td>
                <td>{{$application_form->doctoral_grades}}%</td>
            </tr>
            @endif

            @if($application_form->master_degree)
            <tr>
                <td>Master’s Degree</td>
                <td>{{$application_form->master_degree}}</td>
                <td>{{$application_form->master_university}}</td>
                <td><strong>Date of Joining</strong></td>
                <td>{{$application_form->master_joining}}</td>
                <td>{{$application_form->master_grades}}%</td>
            </tr>
            @endif

            @if($application_form->bachelor_degree)
            <tr>
                <td>Bachelor’s Degree</td>
                <td>{{$application_form->bachelor_degree}}</td>
                <td>{{$application_form->bachelor_university}}</td>
                <td><strong>Date of Joining</strong></td>
                <td>{{$application_form->bachelor_joining}}</td>
                <td>{{$application_form->bachelor_grades}}%</td>
            </tr>
            @endif

            @if($application_form->school_degree)
            <tr>
                <td>school’s Degree</td>
                <td>{{$application_form->school_degree}}</td>
                <td>{{$application_form->school_university}}</td>
                <td><strong>Date of Joining</strong></td>
                <td>{{$application_form->school_joining}}</td>
                <td>{{$application_form->school_grades}}%</td>
            </tr>
            @endif


           
          

            <tr class="bg-color">
                <td colspan="6"><h5>Other Information</h5></td>
            </tr>
            <tr>
                <td colspan="6">     {{  $application_form->other_information }}</td>
            </tr>

            <tr class="bg-color">
                <td colspan="6"><h5>SAU Reasons</h5></td>
            </tr>
            <tr>
                <td colspan="6">     {{    $application_form->sau_reasons }}</td>
            </tr>




            <tr class="bg-color">
                <td colspan="6"><h5>Teaching experience</h5></td>
            </tr>

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

            <tr class="bg-color">
                <td colspan="6"><h5>Teaching experience</h5></td>
            </tr>

            @if($application_form->number_books_edited)
            <tr>
                <td colspan="6">
                    <strong>Number of Books Edited</strong><br/>
                    {{$application_form->number_books_edited }}
                </td>
            </tr>
            @endif 
            @if($application_form->number_books_authored)
            <tr>
                <td colspan="6">
                    <strong>Number of Books Authored</strong><br/>
                    {{$application_form->number_books_authored }}
                </td>
            </tr>
            @endif 
            @if($application_form->number_research_publications)
            <tr>
                <td colspan="6">
                    <strong>Number of Research Publications</strong><br/>
                    {{$application_form->number_research_publications }}
                </td>
            </tr>
            @endif 
            @if($application_form->number_book_chapters)
            <tr>
                <td colspan="6">
                    <strong>Number of Book Chapters</strong><br/>
                    {{$application_form->number_book_chapters }}
                </td>
            </tr>
            @endif 
            @if($application_form->number_research_grants)
            <tr>
                <td colspan="6">
                    <strong>Number of Research Grants</strong><br/>
                    {{$application_form->number_research_grants }}
                </td>
            </tr>
            @endif 
            @if($application_form->number_patents)
            <tr>
                <td colspan="6">
                    <strong>Number of Patents</strong><br/>
                    {{$application_form->number_patents }}
                </td>
            </tr>
            @endif 
            @if($application_form->number_patents)
            <tr>
                <td colspan="6">
                    <strong>Number of Patents</strong><br/>
                    {{$application_form->number_patents }}
                </td>
            </tr>
            @endif 
            @if($application_form->number_presentations)
            <tr>
                <td colspan="6">
                    <strong>Number of Presentations in Conferences and Symposia</strong><br/>
                    {{$application_form->number_presentations }}
                </td>
            </tr>
            @endif 



        </table> 
    </div>
    
    
    
</body>
</html>
