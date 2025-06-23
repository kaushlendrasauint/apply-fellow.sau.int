@extends('layouts.main')
@section('content')

    <div class="container mt-5">

        <!-- Login Form -->
        <div class="card mx-auto mt-5" id="loginCard" style="max-width: 400px;">


        <h4 class="alert alert-success"> SAU Recruitment Portal</h4>



            <div class="card-body">
                <h3 class="card-title text-center">Login</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @elseif(Session::has('warning'))
                    <div class="alert alert-danger">{{ Session::get('warning') }} </div>
                @endif

              

                <form class="form-horizontal" action="{{ url('checkLogin') }}" method="post" id="SignUpform">
                    @csrf

                    <div class="form-group">
                        <label for="loginEmail">Email</label>
                        <input name="email" type="email" class="form-control" id="loginEmail" placeholder="Enter email"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="loginPassword"
                            placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-4" id="signupLink">
            <a href="{{ route('signup') }}">Don't have an account? Signup</a><br>
            <a href="{{ route('password.request') }}"> Forgot Password</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="signupForm"></script>

    <script>
        function toggleForms() {
            document.getElementById('signupCard').classList.toggle('d-none');
            document.getElementById('loginCard').classList.toggle('d-none');
            document.getElementById('loginLink').classList.toggle('d-none');
            document.getElementById('signupLink').classList.toggle('d-none');
        }

        // Basic form submit behavior
        $('#signupForm').submit(function(e) {
            e.preventDefault();
            alert("Signup Successful!");
        });

        $('#loginForm').submit(function(e) {
            e.preventDefault();
            alert("Login Successful!");
        });
    </script>
@endsection