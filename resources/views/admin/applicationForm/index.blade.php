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
                <option value="Assistant" {{ (old('position', $position) == 'Assistant') ? 'selected' : '' }}>Assistant</option>
                <option value="Senior Assistant" {{ (old('position', $position) == 'Senior Assistant') ? 'selected' : '' }}>Senior Assistant</option>
                <option value="Assistant Director" {{ (old('position', $position) == 'Assistant Director') ? 'selected' : '' }}>Assistant Director</option>
                <option value="Deputy Director" {{ (old('position', $position) == 'Deputy Director') ? 'selected' : '' }}>Deputy Director</option>
                <option value="Director" {{ (old('position', $position) == 'Director') ? 'selected' : '' }}>Director</option>
                <option value="Assistant Professor" {{ (old('position', $position) == 'Assistant Professor') ? 'selected' : '' }}>Assistant Professor</option>
                <option value="Associate Professor" {{ (old('position', $position) == 'Associate Professor') ? 'selected' : '' }}>Associate Professor</option>
                <option value="Professor" {{ (old('position', $position) == 'Professor') ? 'selected' : '' }}>Professor</option>                             
            </select>
        </div>

        <div class="col-3 col-sm-3">
            <select class="form-control" id="faculty_department" name="faculty_department">
                <option value="">Select Department</option>
                <option value="Academics" {{ (old('faculty_department', $faculty_department) == 'Academics') ? 'selected' : '' }}>Academics</option>
                <option value="Admissions" {{ (old('faculty_department', $faculty_department) == 'Admissions') ? 'selected' : '' }}>Admissions</option>
                <option value="Administration" {{ (old('faculty_department', $faculty_department) == 'Administration') ? 'selected' : '' }}>Administration</option>
                <option value="Accounts" {{ (old('faculty_department', $faculty_department) == 'Accounts') ? 'selected' : '' }}>Accounts</option>
                <option value="Corporate" {{ (old('faculty_department', $faculty_department) == 'Corporate') ? 'selected' : '' }}>Corporate</option>
                <option value="Examinations" {{ (old('faculty_department', $faculty_department) == 'Examinations') ? 'selected' : '' }}>Examinations</option>
                <option value="ICT" {{ (old('faculty_department', $faculty_department) == 'ICT') ? 'selected' : '' }}>ICT</option>
                <option value="Management" {{ (old('faculty_department', $faculty_department) == 'Management') ? 'selected' : '' }}>Management</option>
                <option value="Media &amp; PR" {{ (old('faculty_department', $faculty_department) == 'Media &amp; PR') ? 'selected' : '' }}>Media & PR</option>
                <option value="Training &amp; Placement" {{ (old('faculty_department', $faculty_department) == 'Training &amp; Placement') ? 'selected' : '' }}>Training & Placement</option>
                <option value="Virtual Campus" {{ (old('faculty_department', $faculty_department) == 'Virtual Campus') ? 'selected' : '' }}>Virtual Campus</option>
                <option value="Chemistry" {{ (old('faculty_department', $faculty_department) == 'Chemistry') ? 'selected' : '' }}>Chemistry</option>
                <option value="Climate Change">Climate Change</option>               
                <option value="Electronics Engineering">Electronics Engineering</option>
                <option value="Department of Computer Science">Department of Computer Science</option>
                <option value="Department of Mathematics">Department of Mathematics</option>
                <option value="Department of International Relations">Department of International Relations</option>
                <option value="Department of Sociology">Department of Sociology</option>
                <option value="English" {{ (old('faculty_department', $faculty_department) == 'English') ? 'selected' : '' }}>English</option>
                <option value="Faculty of Arts and Design">Faculty of Arts and Design</option>
                <option value="Faculty of Economics">Faculty of Economics</option>
                <option value="Faculty of Mathematics &amp; Computer Science">Faculty of Mathematics &amp; Computer Science</option>
                <option value="Faculty of Legal Studies">Faculty of Legal Studies</option>
                <option value="Faculty of Life Sciences &amp; Biotechnology">Faculty of Life Sciences &amp; Biotechnology</option>
                <option value="Faculty of Management">Faculty of Management</option>                              
                <option value="Physics" {{ (old('faculty_department', $faculty_department) == 'Physics') ? 'selected' : '' }}>Physics</option>
            </select>
        </div>

        <div class="col-2 col-sm-2">
            <select class="form-control" id="payment" name="payment">
                <option value="">Select Payment</option>
                <option value="1" {{ (old('1', $payment) == '1') ? 'selected' : '' }}>Paid</option>
                <option value="0" {{ (old('0', $payment) == '0') ? 'selected' : '' }}>Unpaid</option>
            </select>
        </div>


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
                                            <th>Resume</th>
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
                                            <td>
                                                @if($value->latest_cv)
                                                <a href="https://apply.sau.int/storage/{{ $value->latest_cv }}">
                                                    click Here</a>
                                                @endif
                                            </td>

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