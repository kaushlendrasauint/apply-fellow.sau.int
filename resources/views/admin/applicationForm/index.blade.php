@extends('admin.layouts.main')

@section('mid-content')
<!-- main-content -->
<div class="main-content horizontal-content">

    <!-- container -->
    <div class="main-container container">

        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Rrecruitments</span>
            </div>
            <div class="justify-content-center mt-2">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Rrecruitments</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </div>
        </div>
        <!-- /breadcrumb -->


        <!-- row  -->
        <div class="row">
            <div class="col-12 col-sm-12">
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <div>


            <div class="row">
                <div class="col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body pt-0">
                        <form method="post" action="{{ route('admin.list') }}" style="margin:20px">
    @csrf
    <div class="row">

        <div class="col-3 col-sm-3">
            <select class="form-control" id="position" name="position">
                <option value="">Select Position</option>
               <option value="Teaching Fellow" {{ (old('position', $position) == 'Teaching Fellow') ? 'selected' : '' }}>Teaching Fellow</option>                             
            </select>
        </div>

        <div class="col-3 col-sm-3">
            @php
                $selectedOption = old('department', $selectedOption ?? ''); // use old input or a default variable
            @endphp

            <select class="form-control" id="faculty_department" name="faculty_department">
                <option value="">Select Department</option>
                <option value="Faculty of Arts and Design" {{ $selectedOption == 'Faculty of Arts and Design' ? 'selected' : '' }}>Faculty of Arts and Design</option>
                <option value="Faculty of Chemical Sciences" {{ $selectedOption == 'Faculty of Chemical Sciences' ? 'selected' : '' }}>Faculty of Chemical Sciences</option>
                <option value="Faculty of Economics" {{ $selectedOption == 'Faculty of Economics' ? 'selected' : '' }}>Faculty of Economics</option>
                <option value="Faculty of Legal Studies" {{ $selectedOption == 'Faculty of Legal Studies' ? 'selected' : '' }}>Faculty of Legal Studies</option>
                <option value="Faculty of Physical Sciences" {{ $selectedOption == 'Faculty of Physical Sciences' ? 'selected' : '' }}>Faculty of Physical Sciences</option>
                <option value="Faculty of Management" {{ $selectedOption == 'Faculty of Management' ? 'selected' : '' }}>Faculty of Management</option>
                <option value="Department of Sociology" {{ $selectedOption == 'Department of Sociology' ? 'selected' : '' }}>Department of Sociology</option>
                <option value="Department of Mathematics" {{ $selectedOption == 'Department of Mathematics' ? 'selected' : '' }}>Department of Mathematics</option>
                <option value="Department of International Relations" {{ $selectedOption == 'Department of International Relations' ? 'selected' : '' }}>Department of International Relations</option>
                <option value="Department of Public Policy and Governance" {{ $selectedOption == 'Department of Public Policy and Governance' ? 'selected' : '' }}>Department of Public Policy and Governance</option>
                <option value="Department of Computer Science and Engineering" {{ $selectedOption == 'Department of Computer Science and Engineering' ? 'selected' : '' }}>Department of Computer Science and Engineering</option>
                <option value="Faculty of Life Sciences &amp; Biotechnology" {{ $selectedOption == 'Faculty of Life Sciences & Biotechnology' ? 'selected' : '' }}>Faculty of Life Sciences &amp; Biotechnology</option>
                
            </select>
        </div>

        {{-- <div class="col-2 col-sm-2">
            <select class="form-control" id="payment" name="payment">
                <option value="">Select Payment</option>
                <option value="1" {{ (old('1', $payment) == '1') ? 'selected' : '' }}>Paid</option>
                <option value="0" {{ (old('0', $payment) == '0') ? 'selected' : '' }}>Unpaid</option>
            </select>
        </div> --}}


        <div class="col-2 col-sm-2">
            <input class="form-control" id="search" name="search" placeholder="Name, Email, Mobile" value="{{ old('search', $search) }}">
        </div>

        <div class="col-2 col-sm-2">
            <input type="submit" name="submit" class="btn btn-info mt-2">
        </div>
    </div>
</form>

                        </div>
                    </div>
                </div>
            </div>





                                <table class="table  table-bordered text-nowrap mb-0" id="example">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Position</th>
                                            <th>Department</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Nationality</th>
                                            <th>View</th>
                                            {{-- <th>Delete</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($data as $key=>$value)
                                        <tr>
                                            <td>{{ $data->firstItem() + $key }}</td>
                                            <td>{{ $value->position }} </td>
                                            <td>{{ $value->faculty_department }} </td>
                                            <td> {{ $value->name }}</td>
                                            <td> {{ $value->email }}</td>
                                            <td> {{ $value->mobile }}</td>
                                            <td> {{ $value->nationality }}</td>
                                            <td><a href="https://apply-fellow.sau.int/admin/download/{{ $value->id }}">Click Here</a></td>

                                            {{-- 
                                                    <td>
                                                        <a
                                                            href="http://Rrecruitments.sau.ac.in/index.php/generate-pdf/{{ $value->id }}">Certificaes</a>
                                            <br>
                                            <a
                                                href="http://Rrecruitments.sau.ac.in/index.php/admin/documents/{{ $value->id }}">Documents</a>
                                            <br>
                                            <a
                                                href="http://Rrecruitments.sau.ac.in/index.php/admin/documents/{{ $value->id }}">
                                            </a>
                                            </td> --}}


                                            {{-- <td> <a class="btn btn-danger"
                                                            onclick="return confirm('Are you sure, you want to delete the data');"
                                                            href='{{ url("admin/Rrecruitments/del/$value->id") }}'
                                            role="button">Delete</a> </td> --}}

                                        </tr>
                                        @empty
                                        <tr>
                                            <td class="text-center" colspan="6">No Records Found.</td>
                                        </tr>
                                        @endforelse
                                    </tbody>






                                </table>
                            </div>

                        </div>


                    </div>

                    <div class="col-12">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
            <!-- /row -->

        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
    @endsection