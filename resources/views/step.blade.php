@extends('layouts.main')
@section('content')

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

                <div class="loader"
                    style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
                    <img src="/path-to-loader.gif" alt="Loading..." />
                </div>
                               

                <h2 class="text-center mb-4"> Application form for Teaching Positions</h2>

                <div style="display: flex; justify-content: center; padding: 10px;">
                    <img src="{{ asset('/uploads/saarc.png') }}" alt="Saarc Image">
                </div>


                <div class="progress mb-4">

                    <div class="progress-bar progress-bar-active progress-bar-striped progress-bar-animated"
                        role="progressbar" style="width: 30%" aria-valuenow="16" aria-valuemin="0" aria-valuemax="100">
                        <span class="progress-bar-text">1. Position / Personal / Education Details</span>
                    </div>

                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="16" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="progress-bar-text">2. Experience</span>
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="16" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="progress-bar-text">3. Employment History</span>
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="16" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="progress-bar-text">4. Document Upload</span>
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="16" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="progress-bar-text">5. Other Information</span>
                    </div>
                </div>

                <div style="display: flex; justify-content: center; align-items: center;"><p>Your Application Form No is : <span id="formno">
                                <b>SAU-R&C-2025-26-{{ $data->id }}</b></span></p></div>


                <h5>Application Form for</h5>
                <!-- ------------------ -------------------Personal Details Section ---------------------- -->
                <form id="applicationForm" method="POST">
                    <!-- Start Faculty Position Section -->
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label>the application is being submitted for:</label>
                            
                            @php
                                 $currentDate = now();
                                 $cutoffDate = \Carbon\Carbon::createFromFormat('d-m-Y', '16-05-2025');
                                 $cutoffDateTs = \Carbon\Carbon::createFromFormat('d-m-Y', '16-05-2025');
                            @endphp

                           
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="application_for" value="Non-Teaching"
                                        id="assistantProfessor"
                                        {{ old('application_for') == 'Non-Teaching' || (isset($data) && $data->application_for == 'Non-Teaching') ? 'checked' : '' }} disabled >
                                    <label class="form-check-label" for="assistantProfessor">Non-Teaching</label>
                                </div>
                          
                            

                         
                            
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="application_for" value="Teaching"
                                    id="associateProfessor"
                                    {{ old('application_for') == 'Teaching' || (isset($data) && $data->application_for == 'Teaching') ? 'checked' : '' }}>
                                <label class="form-check-label" for="associateProfessor">Teaching</label>
                            </div>
                           
                          

                        </div>

                   
                    </div>
                    <!-- End  Faculty Position Section -->
          
                   

                    <div class="col-md-12 d-flex justify-content-end">
                        <button id="submitButton" type="submit" class="btn btn-primary">Next</button>
                    </div>
                 

                </form>
                <!-- -  --------------------------------- End Personal Details Section  ---------------------------- -->



            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Set up CSRF token for all AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            // Use a specific ID for the form
            $('#applicationForm').on('submit', function(e) {
                e.preventDefault();

                // Disable the submit button and show the loader
                $('#submitButton').prop('disabled', true);
                $('.loader').css('display', 'inline-block');

                // Remove previous error messages
                $('.error-message').remove();

                $.ajax({
                    url: "{{ route('insertStep') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response) {
                        // Hide the loader and enable the submit button
                        $('.loader').hide();
                        $('#submitButton').prop('disabled', false);

                        // Ensure Toastify is called correctly
                        Toastify({
                            text: "Application submitted successfully! Please update the next step.",
                            duration: 4000,
                            close: true, // Show close button
                            gravity: "top", // Position (top or bottom)
                            position: "right", // Position (left, center, or right)
                            backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)", // Custom styling
                        }).showToast();

                        // Redirect to the response URL
                        window.location.href = response.url;
                    },
                    error: function(response) {
                        // Hide the loader and enable the submit button
                        $('.loader').hide();
                        $('#submitButton').prop('disabled', false);

                        // Clear previous error messages
                        $('.error-message').remove();

                        let errors = response.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            let fieldElement = $(`[name="${field}"]`);
                            let label = fieldElement.closest('.form-group').find(
                                'label').text();
                            fieldElement.after(
                                `<span class="error-message" style="color: red; font-size: 0.9rem;">${label} is required</span>`
                            );
                        });
                    }
                });

                return false; // Fallback to ensure the form doesn’t submit
            });
        });
    </script>



@endsection
