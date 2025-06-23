@extends('layouts.main')
@section('content')
<div class="panel panel-primary pt-2" style="background-color:#fdb756; padding: 0px 2rem;">
        <div class=" panel-heading d-flex flex-direction-md-column justify-content-end gap-2">
            <p><strong>Name:</strong> {{$data->name}}</p>
            <p style="margin-left: 10px;"><strong>Application Form No	:</strong> SAU-R&C-2025-26-{{ $data->id }}</p>
            <a href="{{ route('logout') }}" style="margin-left:12px;color: red; font-size: 16px; text-decoration: none;">Logout</a>

        </div>
    </div>
    <!-- FilePond CSS -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />

    <!-- FilePond JS -->
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                   @include('include.forms-header')
                   @include('include.error')

                  <!-------------------------------------End Document Upload---------------------------------------------------->


                <div>

                    <div>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover doc-upload">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" style="width: 30%">Required Document</th>
                                            <th scope="col" style="width: 30%">Choose File</th>
                                            <th scope="col" style="width: 10%" class="text-center">Upload</th>
                                            <th scope="col" style="width: 10%" class="text-center">Preview</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       

                                        <!-- Recent Passport Size Photograph -->
                                          <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf

                                        <tr>
                                            <td data-label="Required Document">
                                                Recent Passport Size Photograph <span class="text-danger">*</span>
                                                <small class="text-muted">(JPEG, JPG, max 500 KB)</small>
                                            </td>
                                            <td data-label="Choose File">
                                              
                                                    <input type="hidden" name="document_type" value="passport_photograph">
                                                    <input type="file" name="document" required class="form-control" accept="image/jpeg">
                                              
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                            </td>
                                            <td data-label="Preview" class="text-center">
                                                <div class="mt-2">
                                                    @if($passport_photograph)
                                                        <img src="{{ asset('storage/' . $passport_photograph) }}" width="100" class="img-thumbnail">
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                          </form>

                                           <!-- Covering Letter -->
                                        <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                        <tr>
                                            <td data-label="Required Document">
                                                Covering Letter <span class="text-danger">*</span>
                                                <small class="text-muted">(PDF max 500 KB)</small>
                                            </td>

                                            <td data-label="Choose File">
                                             
                                                    @csrf
                                                    <input type="hidden" name="document_type" value="covering_letter">
                                                    <input type="file" name="document" required class="form-control"  accept=".pdf">
                                            
                                            </td>

                                            <td data-label="Upload" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                            </td>
                                            <td data-label="Preview" class="text-center">
                                                <div class="mt-2">
                                                    @if($covering_letter)
                                                    <a href="{{ asset('storage/' . $covering_letter) }}"  target="_blank">Click Here</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    </form>

                                        <!-- Date of Birth Certification -->
                                         <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <tr>
                                            <td data-label="Required Document">
                                                Date of Birth Certification <span class="text-danger">*</span>
                                                <small class="text-muted">(PDF max 500 KB)</small>
                                            </td>
                                            <td data-label="Choose File">
                                               
                                                    <input type="hidden" name="document_type" value="birth_certification">
                                                    <input type="file" name="document" required class="form-control"  accept=".pdf">
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                            </td>
                                            <td data-label="Preview" class="text-center">
                                                <div class="mt-2">
                                                      @if($birth_certification)
                                                      <a href="{{ asset('storage/' . $birth_certification) }}"  target="_blank">Click Here</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                      </form>

                                        <!-- Copy of Latest CV -->
                                          <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                        <tr>
                                            <td data-label="Required Document">
                                                Copy of Latest CV <span class="text-danger">*</span>
                                                 <small class="text-muted">(PDF max 500 KB)</small>
                                            </td>
                                            <td data-label="Choose File">
                                              
                                                    <input type="hidden" name="document_type" value="resume">
                                                    <input type="file" name="document" required class="form-control"  accept=".pdf">
                                              
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                            </td>
                                            <td data-label="Preview" class="text-center">
                                                <div class="mt-2">
                                                      @if($resume)
                                                      <a href="{{ asset('storage/' . $resume) }}" target="_blank">Click Here</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                          </form>

                                        <!-- Copies of Bachelors Degrees -->
                                         <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                        <tr>
                                            <td data-label="Required Document">
                                                Copies of Bachelors Degree <span class="text-danger">*</span>
                                               <small class="text-muted">(PDF max 500 KB)</small>
                                            </td>
                                            <td data-label="Choose File">
                                               
                                                    <input type="hidden" name="document_type" value="bachelors_degrees">
                                                    <input type="file" name="document" required class="form-control" accept=".pdf">
                                               
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                            </td>
                                            <td data-label="Preview" class="text-center">
                                                <div class="mt-2">
                                                       @if($bachelors_degrees)
                                                        <a href="{{ asset('storage/' . $bachelors_degrees) }}"  target="_blank">Click Here</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                         </form>


                                        <!-- Copies of Masters Degrees -->
                                         <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                        <tr>
                                            <td data-label="Required Document">
                                                Copies of Masters Degree <span class="text-danger">*</span>
                                                <small class="text-muted">(PDF max 500 KB)</small>
                                            </td>
                                            <td data-label="Choose File">
                                               
                                                    <input type="hidden" name="document_type" value="masters_degrees">
                                                    <input type="file" name="document" required class="form-control" accept=".pdf">
                                             
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                            </td>
                                            <td data-label="Preview" class="text-center">
                                                <div class="mt-2">
                                                    @if($masters_degrees)
                                                        <a href="{{ asset('storage/' . $masters_degrees) }}"  target="_blank">Click Here</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                           </form>




                                        <!-- Copies of Ph.D. Degrees -->
                                          <form action="{{ route('document.upload') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                        <tr>
                                            <td data-label="Required Document">
                                                Copies of Ph.D. Degree <span class="text-danger">*</span>
                                                <small class="text-muted">(PDF max 500 KB)</small>
                                            </td>
                                            <td data-label="Choose File">
                                              
                                                    <input type="hidden" name="document_type" value="PhD_degrees">
                                                    <input type="file" name="document" required class="form-control" accept=".pdf">
                                               
                                            </td>
                                            <td data-label="Upload" class="text-center">
                                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                            </td>
                                            <td data-label="Preview" class="text-center">
                                                <div class="mt-2">
                                                   @if($PhD_degrees)
                                                        <a href="{{ asset('storage/' . $PhD_degrees) }}"   target="_blank">Click Here</a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                         </form>
                                         



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                    <!-- Navigation Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="/step3/{{ request()->segment(2) }}" class="btn btn-secondary">Back</a>
                       

          
                   <form action="{{ route('step5', ['id' => $encryptedId]) }}" method="GET">
                    @csrf
                    <input type="hidden" id="form_id" name="form_id" value="{{ $encryptedId }}">
                    <button type="submit" class="btn btn-primary">Next</button>
                </form> 

                 


                    </div>
                </div>


                <!-------------------------------------End Document Upload---------------------------------------------------->


                
            </div>
        </div>
    </div>

    <style>
        .form-control {
            height: 47px;
        }
    </style>




@endsection
