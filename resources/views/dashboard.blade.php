<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form - Teaching Positions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <h2 class="text-center mb-4">Application Form for Teaching Positions</h2>

        <!-- Faculty Position -->
        <div class="mb-4">
            <label class="form-label">Faculty Position for which the application is being submitted:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="position" id="assistantProfessor"
                    value="Assistant Professor">
                <label class="form-check-label" for="assistantProfessor">Assistant Professor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="position" id="associateProfessor"
                    value="Associate Professor">
                <label class="form-check-label" for="associateProfessor">Associate Professor</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="position" id="professor" value="Professor">
                <label class="form-check-label" for="professor">Professor</label>
            </div>
        </div>

        <!-- Bank Details -->
        <div class="mb-4">
            <h5>Bank Details of Application Fee</h5>
            <div class="row mb-3">
                <div class="col-md-4">
                    <label class="form-label">Bank Draft No.</label>
                    <input type="text" class="form-control" name="bank_draft_no">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="bank_draft_date">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Payable at</label>
                    <input type="text" class="form-control" name="payable_at">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label class="form-label">Online Ref No.</label>
                    <input type="text" class="form-control" name="online_ref_no">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date</label>
                    <input type="date" class="form-control" name="online_date">
                </div>
            </div>
        </div>

        <!-- Personal Information -->
        <div class="mb-4">
            <h5>Personal Information</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Full Name (no initials)</label>
                    <input type="text" class="form-control" name="full_name">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" name="dob">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="form-label">Gender</label>
                    <select class="form-select" name="gender">
                        <option value="">Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Education -->
        <div class="mb-4">
            <h5>Education</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Level</th>
                        <th>Name of Degree</th>
                        <th>Institution</th>
                        <th>Date of Joining</th>
                        <th>Date of Award</th>
                        <th>Percentage/Grades</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Doctoral Degree</td>
                        <td><input type="text" class="form-control" name="doctoral_degree"></td>
                        <td><input type="text" class="form-control" name="doctoral_institution"></td>
                        <td><input type="date" class="form-control" name="doctoral_joining"></td>
                        <td><input type="date" class="form-control" name="doctoral_award"></td>
                        <td><input type="text" class="form-control" name="doctoral_grades"></td>
                    </tr>
                    <!-- Repeat for other education levels -->
                </tbody>
            </table>
        </div>

        <!-- Career History -->
        <div class="mb-4">
            <h5>Career History</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Position Held</th>
                        <th>Employer's Name</th>
                        <th>Address</th>
                        <th>Date From</th>
                        <th>Date To</th>
                        <th>Salary Drawn (US $ PA)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" name="position_held[]"></td>
                        <td><input type="text" class="form-control" name="employer_name[]"></td>
                        <td><input type="text" class="form-control" name="employer_address[]"></td>
                        <td><input type="date" class="form-control" name="date_from[]"></td>
                        <td><input type="date" class="form-control" name="date_to[]"></td>
                        <td><input type="text" class="form-control" name="salary_drawn[]"></td>
                    </tr>
                    <!-- Repeat rows as needed -->
                </tbody>
            </table>
        </div>

        <!-- Publications -->
        <div class="mb-4">
            <h5>Publications</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Number of Books Edited</label>
                    <input type="number" class="form-control" name="books_edited">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Number of Books Authored</label>
                    <input type="number" class="form-control" name="books_authored">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Research Publications</label>
                    <input type="number" class="form-control" name="research_publications">
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Back</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
