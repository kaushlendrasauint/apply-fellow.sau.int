@extends('layouts.main')
@section('content')
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
                        <span class="progress-bar-text">2. Non Teaching Experience</span>
                    </div>
                    <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="16" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="progress-bar-text">3. Publication</span>
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


                <h5>Application Form for</h5>
                <!-- ------------------ -------------------Personal Details Section ---------------------- -->
                <img src="https://apply.sau.int/uploads/coming_soon.jpg">
                <!-- -  --------------------------------- End Personal Details Section  ---------------------------- -->



            </div>
        </div>
    </div>
@endsection
