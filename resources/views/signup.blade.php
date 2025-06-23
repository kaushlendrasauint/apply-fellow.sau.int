@extends('layouts.main')
@section('content')
    <div class="container mt-5">
        <!-- Signup Form -->

        <div id="loader"
            style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
            <img src="http://apply.sau.int/path-to-loader.gif" alt="Loading..." />
        </div>


        <div class="card mx-auto" id="signupCard" style="max-width: 600px;">
        <h4 class="alert alert-success"> SAU Recruitment Portal</h4>
            <div class="card-body">
                <h3 class="card-title text-center">Signup</h3>
                
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form id="signupForm" method="post" action="{{route('submit-application-form')}}">
                    @csrf
                    <div class="form-group">
                        <label for="signupName">Name</label>
                        <input type="text" class="form-control" id="signupName" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="signupEmail">Email</label>
                        <input type="email" class="form-control" id="signupEmail" name="email"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="signupMobile">Mobile</label>
                        <input type="number" class="form-control" id="signupMobile" name="mobile" placeholder="Mobile">
                    </div>

                    <div class="form-group form-check mt-3">
                        <input type="checkbox" class="form-check-input" id="declaration" name="declaration" required>
                        <label class="form-check-label" for="declaration">
                            I have read the minimum eligibility conditions for applying for the position and certify I meet all the prescribed conditions.  
                            I understand that the concealment / incompletion / misrepresentation of facts, in any form or content, will result in cancellation of my candidature, before or even after appointment.
                        </label>
                    </div>


                    <button type="submit" class="btn btn-primary btn-block">Signup</button>
                </form>


            </div>
        </div>

        <div class="text-center mt-4" id="loginLink">
            <a href="{{ route('login') }}">Already have an account? Login</a>
        </div>


    </div>

@endsection
