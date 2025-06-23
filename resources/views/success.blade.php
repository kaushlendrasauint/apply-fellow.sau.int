@extends('layouts.main')
@section('content')
<div class="panel panel-primary pt-2" style="background-color:#fdb756; padding: 0px 2rem;">
        <div class=" panel-heading d-flex flex-direction-md-column justify-content-end gap-2">
            <p><strong>Name:</strong> {{$data->name}}</p>
            <p style="margin-left: 10px;"><strong>Application Form No	:</strong> SAU-R&C-2025-26-{{ $data->id }}</p>
            <a href="{{ route('logout') }}" style="margin-left:12px;color: red; font-size: 16px; text-decoration: none;">Logout</a>

        </div>
    </div>

    <div class="container mt-5">
        <!-- Login Form -->
        <h5 class="fw-bold alert alert-success">Transaction Details</h5>
        <div class="user-details row mt-3">
            <div class="col-md-8">
                
                <div class="row">
                    <div class="col-md-12">
                  
                        <strong>Application Form No:</strong><p>  SAU-R&C-2025-26-{{ $data->id }}</p>
                    </div>
                    
                </div>
               

                <div class="row">
                    <div class="col-md-6">
                        <strong>Name:</strong><p>{{$data->name}}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Email:</strong><p>{{$data->email}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Designation:</strong><p>{{$data->position}}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Department</strong><p>{{$data->faculty_department}}</p>
                    </div>
                </div>
            </div>
        </div>
       
        

        <div style="text-align: center; margin-top: 5px;">
            <a href="{{ route('download-application', ['id' => $ecrypted]) }}" class="btn btn-primary" target="_blank">
                Download Application Form
            </a>
        </div>

         
    </div>
 
    
   

    <style>
        body {
            background-color: #f8f9fa;
            /* Light background color */
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
            background-color: #ffffff;
            /* White background for the form */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            /* Subtle shadow */
        }

        /* Responsive Table */
table {
    border: 1px solid #ccc;
    border-collapse: collapse;
    margin: 0;
    padding: 0;
    width: 100%;
    table-layout: fixed;
}

table thead{
    background-color: #ACDDDE;
}

table caption {
    font-size: 1.5em;
    margin: .5em 0 .75em;
}

table tr {
    border: 1px solid #ddd;
    padding: .35em;
}

table th,
table td {
    padding: .625em;
}

table th {
    font-size: .85em;
    letter-spacing: .1em;
    text-transform: uppercase;
}

@media screen and (max-width: 1200px) {
    table {
        border: 0;
    }

    table caption {
        font-size: 1.3em;
    }

    table thead {
        border: none;
        clip: rect(0 0 0 0);
        height: 1px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }

    table tr {
        border-bottom: 3px solid #ddd;
        display: block;
        margin-bottom: .625em;
    }

    table td {
        border-bottom: 1px solid #ddd;
        display: block;
        font-size: .8em;
        text-align: right;
    }

    table td::before {
        /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
        content: attr(data-label);
        float: left;
        font-weight: bold;
        text-transform: uppercase;
    }

    table td:last-child {
        border-bottom: 0;
    }
}

/* End of Responsive Table */
    </style>


@endsection
