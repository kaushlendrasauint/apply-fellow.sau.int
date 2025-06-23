<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form for Teaching Positions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center">Application Form for Teaching Positions</h2>


<!-- ------------------ -------------------Personal Details Section ---------------------- -->

        <form action="your-action-url" method="POST">
            <!-- Start Faculty Position Section -->
            <div class="form-group row">

                <div class="form-group col-md-6">
                    <label>Faculty Position for which the application is beingsubmitted:</label>

                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="position" value="Assistant Professor"
                            id="assistantProfessor">
                        <label class="form-check-label" for="assistantProfessor">Assistant Professor</label>
                    </div>
                    <div class="form-check me-3">
                        <input class="form-check-input" type="radio" name="position" value="Associate Professor"
                            id="associateProfessor">
                        <label class="form-check-label" for="associateProfessor">Associate Professor</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="position" value="Professor" id="professor">
                        <label class="form-check-label" for="professor">Professor</label>
                    </div>

                </div>


                <div class="form-group col-md-6">
                    <label for="faculty_department">Faculty/Department</label>
                    <input type="text" class="form-control" id="faculty_department" name="faculty_department">
                </div>

            </div>
            <!-- End  Faculty Position Section -->
            <!-- Bank Details Section -->
            <h5>Bank Details of Application Fee</h5>

            <div class="form-row">
                <div class="form-group col-md-1">
                    <label>i)</label>
                </div>
                <div class="form-group col-md-4">
                    <label for="bank_draft_no">Bank Draft No.</label>
                    <input type="text" class="form-control" id="bank_draft_no" name="bank_draft_no">
                </div>
                <div class="form-group col-md-4">
                    <label for="draft_date">Date</label>
                    <input type="date" class="form-control" id="draft_date" name="draft_date">
                </div>
                <div class="form-group col-md-3">
                    <label for="payable_at">Payable at</label>
                    <input type="text" class="form-control" id="payable_at" name="payable_at">
                </div>
            </div>

            <div class="form-row mt-3">
                <div class="form-group col-md-1">
                    <label>ii)</label>
                </div>
                <div class="form-group col-md-4">
                    <label for="ref_no">Ref No</label>
                    <input type="text" class="form-control" id="ref_no" name="ref_no" placeholder="Enter Ref No">
                </div>
                <div class="form-group col-md-4">
                    <label for="ref_date">Date</label>
                    <input type="date" class="form-control" id="ref_date" name="ref_date">
                </div>
            </div>



            <h5>Personal Details</h5>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="full_name">Full Name (no initials)</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="spouse_name">Spouse Name</label>
                    <input type="text" class="form-control" id="spouse_name" name="spouse_name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nationality">Nationality</label>
                    <input type="text" class="form-control" id="nationality" name="nationality">
                </div>
                <div class="form-group col-md-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                </div>
            </div>



            <figure class="table" style="width:100%;">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th colspan="6" class="text-start">Education :</th>
                        </tr>
                        <tr>
                            <th scope="col">Level</th>
                            <th scope="col">Name of Degree</th>
                            <th scope="col">University / College / School / Institution</th>
                            <th scope="col">Date of Joining</th>
                            <th scope="col">Date of Award of Degree</th>
                            <th scope="col">Aggregate % / Grades</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Doctoral Degree</td>
                            <td><input type="text" class="form-control" placeholder="Degree Name"></td>
                            <td><input type="text" class="form-control" placeholder="Institution"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class="form-control" placeholder="Percentage / Grade"></td>
                        </tr>
                        <tr>
                            <td>Master’s Degree</td>
                            <td><input type="text" class="form-control" placeholder="Degree Name"></td>
                            <td><input type="text" class="form-control" placeholder="Institution"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class="form-control" placeholder="Percentage / Grade"></td>
                        </tr>
                        <tr>
                            <td>Bachelor’s Degree</td>
                            <td><input type="text" class="form-control" placeholder="Degree Name"></td>
                            <td><input type="text" class="form-control" placeholder="Institution"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class="form-control" placeholder="Percentage / Grade"></td>
                        </tr>
                        <tr>
                            <td>10+2 (12<sup>th</sup> Class) / School Leaving</td>
                            <td><input type="text" class="form-control" placeholder="Degree Name"></td>
                            <td><input type="text" class="form-control" placeholder="Institution"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="date" class="form-control"></td>
                            <td><input type="text" class="form-control" placeholder="Percentage / Grade"></td>
                        </tr>
                    </tbody>
                </table>
            </figure>
            <!-- -  --------------------------------- End Personal Details Section  ---------------------------- -->

            <!--------------------------------------Start  Experience Section --------------------------------  --->
            <figure class="table" style="width:100%;">

                <div class="table-wrapper mx-auto">
                    <h5 class="section-title">Teaching experience:</h5>

                    <div class="form-group">
                        <label for="course1">List the courses you have taught, if any, at post-graduate MA / M.Sc
                            /
                            /M.Tech. levels. Mention
                            durations against each:</label>
                        <textarea class="form-control" id="course1" placeholder="Course name and duration"></textarea>
                    </div>




                    <div class="form-group">
                        <label for="compulsory1">Which of the listed compulsory courses can you teach independently
                            to
                            MA / M.Sc / M.Tech students?</p>
                            <i>[Please look at the course outline of your subject area on the SAU website]</i>
                        </label>
                        <textarea class="form-control" id="course1"
                            placeholder="Please look at the course outline of your subject area on the SAU website"></textarea>
                    </div>




                    <div class="form-group">
                        <label for="optional1">Which of the listed optional courses can you teach independently at
                            MA / M.Sc. / M.Tech level?</p>
                            <i>[Please look at the course outline of your subject area on the SAU website]</i>
                        </label>
                        <textarea class="form-control" id="course1"
                            placeholder="Please look at the course outline of your subject area on the SAU website"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="other1">Any other course, not listed in SAU’s list of courses, which you may
                            like to develop and teach to further strengthen your field of studies:</label>
                        <textarea class="form-control" id="course1"></textarea>
                    </div>


                </div>
            </figure>




            <h5>Career History</h5>
            <div id="careerEntries">
                <div class="career-entry border p-3 mb-3">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="position">Position Held</label>
                            <input type="text" class="form-control" name="position[]" placeholder="Position">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="employer">Employer's Name</label>
                            <input type="text" class="form-control" name="employer[]"
                                placeholder="Employer Name">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="address">Employer's Address</label>
                            <input type="text" class="form-control" name="address[]" placeholder="Address">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="dateFrom">Date From</label>
                            <input type="date" class="form-control" name="dateFrom[]">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="dateTo">Date To</label>
                            <input type="date" class="form-control" name="dateTo[]">
                        </div>
                        <div class="form-group col-md-1">
                            <label for="salary">Salary (US $ PA)</label>
                            <input type="number" class="form-control" name="salary[]" placeholder="Salary">
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger remove-entry">Remove</button>
                </div>
            </div>
            <button type="button" class="btn btn-primary add-more">Add More</button>



            <!--------------------------------------END  Experience Section --------------------------------  --->


            <!-- - ----------------------------   Start Publication Details -------------------------------->
            <h3><strong>Publications</strong>:</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Number of Books Edited</th>
                        <th scope="col">Number of Books Authored</th>
                        <th scope="col">Number of Research Publications</th>
                        <th scope="col">Number of Book Chapters</th>
                        <th scope="col">Number of Patents</th>
                        <th scope="col">Number of Research Grants</th>
                        <th scope="col">Number of Presentations in Conferences and Symposia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" placeholder="Enter count"></td>
                        <td><input type="text" class="form-control" placeholder="Enter count"></td>
                        <td><input type="text" class="form-control" placeholder="Enter count"></td>
                        <td><input type="text" class="form-control" placeholder="Enter count"></td>
                        <td><input type="text" class="form-control" placeholder="Enter count"></td>
                        <td><input type="text" class="form-control" placeholder="Enter count"></td>
                        <td><input type="text" class="form-control" placeholder="Enter count"></td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group">
                <label for="optional1"> Please mention below up to five of your best books (Include publisher’s
                    name
                    and ISBN no) / Publications:</label>
                <textarea class="form-control" id="course1" placeholder="Please mention below up to five of your best books"></textarea>
            </div>

            <!-- - ----------------------------   End  Publication Details -------------------------------->


            <!-------------------------------------End Document Upload---------------------------------------------------->
            <h3><strong> Document Upload</strong>:</h3>

            <div class="form-group">
                <label> Details of online remittance of application fee in the bank account of the
                    University</label>
                <input type="file" class="form-control">
            </div>

            <div class="form-group">
                <label> Date of Birth certification (copy of the secondary school certificate
                    showing date of
                    birth, can be used)</label>
                <input type="file" class="form-control">
            </div>

            <div class="form-group">
                <label> Copies of degrees (Bachelors, Masters, Ph.D.)</label>
                <input type="file" class="form-control">
            </div>

            <div class="form-group">
                <label> Copy of latest CV with complete list of books research publications,
                    research grants,
                    patents and award,
                    honors and distinctions</label>
                <input type="file" class="form-control">
            </div>

            <div class="form-group">
                <label> No-objection certificate from current employer (Must be submitted along with
                    the
                    application. Format of the
                    letter to be submitted is shown at the end of the application)</label>
                <input type="file" class="form-control">
            </div>
            <div class="form-group">
                <label> Recent passport size photograph (Pasted on front page)</label>
                <input type="file" class="form-control">
            </div>
            <!-------------------------------------End Document Upload---------------------------------------------------->




            <!-- ------------------------ Start Other Information  ------------------------------------- -->
            <h5>Other Information</h5>

            <div class="form-group">
                <label>If selected, when can you join?</label>
                <input type="date" class="form-control" name="joining_date">
            </div>

            <div class="form-group">
                <label>Selection Committees reserve the right to offer a position lower than the one
                    applied
                    for. Are you willing to be considered for a position at a lower
                    level?</label>
                <select class="form-control" name="consider_lower_position">
                    <option value="" disabled selected>Select an option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <div class="form-group">
                <label>Any other information: (Please Provide here any other relevant
                    information.)</label>
                <textarea class="form-control" name="other_information" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>Give three specific reasons for you to think of joining the SAU, in
                    particular, what is
                    your vision for improving the academic standing of the SAU, regionally or
                    globally?</label>
                <textarea class="form-control" name="sau_reasons" rows="4"></textarea>
            </div>

            <div class="form-group">
                <label>If you have ever been convicted for any legal offence(s), please give
                    details:</label>
                <textarea class="form-control" name="legal_offences" rows="2"></textarea>
            </div>

            <div class="form-group">
                <label>If you have any health problems, have a history of health problems, or have
                    ever been
                    declared medically unfit, please give details:</label>
                <small class="form-text text-muted">(Please note that selected candidates are required to
                    go through a
                    complete medical checkup and declared medically fit before joining)</small>
                <textarea class="form-control" name="health_problems" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>How proficient are you in English:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="englishProficiency" id="excellent"
                        value="excellent">
                    <label class="form-check-label" for="excellent">Excellent</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="englishProficiency" id="veryGood"
                        value="veryGood">
                    <label class="form-check-label" for="veryGood">Very Good</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="englishProficiency" id="good"
                        value="good">
                    <label class="form-check-label" for="good">Good</label>
                </div>
            </div>

            <div class="form-group">
                <label>Please mention here if you have any administrative
                    experience:</label>
                <textarea class="form-control" rows="4" name="adminExperience"></textarea>
            </div>

            <div class="form-group">
                <label for="reason_joining">Why do you want to join SAU?</label>
                <textarea class="form-control" id="reason_joining" name="reason_joining"></textarea>
            </div>

            <!-- ------------------------ End Other Information  ------------------------------------- -->

            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add new entry
            $('.add-more').click(function() {
                var entry = `
                    <div class="career-entry border p-3 mb-3">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="position">Position Held</label>
                                <input type="text" class="form-control" name="position[]" placeholder="Position">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="employer">Employer's Name</label>
                                <input type="text" class="form-control" name="employer[]" placeholder="Employer Name">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="address">Employer's Address</label>
                                <input type="text" class="form-control" name="address[]" placeholder="Address">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dateFrom">Date From</label>
                                <input type="date" class="form-control" name="dateFrom[]">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dateTo">Date To</label>
                                <input type="date" class="form-control" name="dateTo[]">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="salary">Salary (US $ PA)</label>
                                <input type="number" class="form-control" name="salary[]" placeholder="Salary">
                            </div>
                        </div>
                        <button type="button" class="btn btn-danger remove-entry">Remove</button>
                    </div>
                `;
                $('#careerEntries').append(entry);
            });

            // Remove entry
            $(document).on('click', '.remove-entry', function() {
                $(this).closest('.career-entry').remove();
            });
        });
    </script>
</body>

</html>
