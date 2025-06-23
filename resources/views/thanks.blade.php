@extends('layouts.main')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 100px;
            text-align: center;
        }

        .thank-you-message {
            font-size: 1.5em;
            color: #28a745;
            margin-bottom: 20px;
        }

        .lead {
            font-size: 1.2em;
            color: #6c757d;
        }
    </style>
    </head>


    <div class="d-flex justify-content-center" style="margin-top:20px">
  <a href="{{route('success')}}" class="btn btn-primary">Home</a>
</div>


    <div class="container">
        <h1 class="thank-you-message">Thank you for Your Application!</h1>
        <div style="display: flex; justify-content: center; padding: 10px;">
            <img src="{{ asset('/uploads/saarc.png') }}" alt="Saarc Image">
        </div>
        <p class="lead">We appreciate your interest in joining our team for teaching positions.</p>
        <p>Your application has been successfully submitted. Our hiring committee will review your application and get
            back to you shortly.</p>
        <p>If you have any questions, please feel free to contact us at <a
                href="mailto:recruitment@sau.int">recruitment@sau.int</a>.</p>
        {{-- <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Home</a> --}}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@endsection
