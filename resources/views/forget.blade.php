@extends('layouts.main')
@section('content')
    <div class="container mt-5">

        <!-- Login Form -->
        <div class="card mx-auto mt-5" id="loginCard" style="max-width: 400px;">
            <div class="card-body">
                <h3 class="card-title text-center">Forgot Password</h3>

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


                <form class="form-horizontal" action="{{ route('password.email') }}" method="post" id="SignUpform">
                    @csrf
                    <br>
                    <div class="form-group">

                        <input name="email" type="email" class="form-control" id="loginEmail" placeholder="Enter email"
                            required>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Forgot Password</button>

                    <br>
                </form>
            </div>
        </div>

        <div class="text-center mt-4" id="signupLink">
            <a href="{{ route('signup') }}">Don't have an account? Signup</a><br>
            <a href="{{ url('SignIn') }}">Already have an account? Login</a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="signupForm"></script>


@endsection
