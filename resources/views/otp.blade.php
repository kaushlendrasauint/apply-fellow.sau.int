@extends('layouts.main')
@section('content')
    <div class="container mt-5">

        <!-- Login Form -->
        <div class="card mx-auto mt-5" id="loginCard" style="max-width: 400px;">
            <div class="card-body">
                <h3 class="card-title text-center">OTP</h3>

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


                <div class="alert alert-success">Please check your email for the OTP. If you don't see it in your inbox, kindly check your spam or junk folder as well</div>

                <form class="form-horizontal" action="{{ url('verifyOtp') }}" method="post" id="SignUpform">
                    @csrf
                    <input type="hidden" name="userId" value="{{ Request::segment(2) }}">
                    <div class="form-group">
                        <input type="text" name="otp" class="form-control" id="loginPassword" placeholder="OTP"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>

        <div class="text-center mt-4" id="signupLink">
            <a href="{{ route('signup') }}">Don't have an account? Signup</a> <br>
            <a href="http://apply.sau.int/SignIn">Already have an account? Login</a><br>
            <a href="http://apply.sau.int/forgot-password">Forgot Password</a>

            
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
