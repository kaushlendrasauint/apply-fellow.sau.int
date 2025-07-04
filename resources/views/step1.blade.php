@extends('layouts.main')
@section('content')
<div class="panel panel-primary pt-2" style="background-color:#fdb756; padding: 0px 2rem;">
        <div class=" panel-heading d-flex flex-direction-md-column justify-content-end gap-2">
            <p><strong>Name:</strong> {{$data->name}}</p>
            <p style="margin-left: 10px;"><strong>Application Form No	:</strong> SAU-R&C-2025-26-{{ $data->id }}</p>
            <a href="{{ route('logout') }}" style="margin-left:12px;color: red; font-size: 16px; text-decoration: none;">Logout</a>

        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">


                  @include('include.forms-header')
                  @include('include.error')
                 
                  <h5>Position / Personal Details</h5>
                <!-- ------------------ -------------------Personal Details Section ---------------------- -->

                <form id="applicationForm" method="post" action="{{ route('insertStep1') }}">
                    @csrf

                    <input type="hidden" name="step" value="1">

                    @if($data->application_for=='Non-Teaching')    
                        <!-- Start Faculty Position Section -->
                        <div class="form-group row">
                            <div class="form-group col-md-6">
                                <label>Faculty Position for which the application is beingsubmitted:</label>
                                
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="position" value="Assistant"
                                        id="assistantProfessor"
                                        {{ old('position') == 'Assistant' || (isset($data) && $data->position == 'Assistant') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="assistantProfessor">Assistant </label>
                                </div>

                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="position" value="Senior Assistant"
                                        id="associateProfessor"
                                        {{ old('position') == 'Senior Assistant' || (isset($data) && $data->position == 'Senior Assistant') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="associateProfessor">Senior Assistant</label>
                                </div>

                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="position" value="Assistant Director"
                                        id="associateProfessor"
                                        {{ old('position') == 'Assistant Director' || (isset($data) && $data->position == 'Assistant Director') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="associateProfessor">Assistant Director</label>
                                </div>
                                
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="position" value="Deputy Director"
                                        id="associateProfessor"
                                        {{ old('position') == 'Deputy Director' || (isset($data) && $data->position == 'Deputy Director') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="associateProfessor">Deputy Director</label>
                                </div>



                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="position" value="Director"
                                        id="professor"
                                        {{ old('position') == 'Director' || (isset($data) && $data->position == 'Director') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="professor">Director</label>
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="faculty_department">Faculty/ Department</label>
                                <select type="text" class="form-control" id="faculty_department" name="faculty_department">
                                    <option value="Academics" {{ old('faculty_department') == 'Academics' || (isset($data) && $data->faculty_department == 'Academics') ? 'selected' : '' }}>Academics</option>
                                    <option value="Admissions" {{ old('faculty_department') == 'Admissions' || (isset($data) && $data->faculty_department == 'Admissions') ? 'selected' : '' }}>Admissions</option>
                                    <option value="Academics" {{ old('faculty_department') == 'Administration' || (isset($data) && $data->faculty_department == 'Administration') ? 'selected' : '' }}>Administration</option>
                                    <option value="Accounts" {{ old('faculty_department') == 'Accounts' || (isset($data) && $data->faculty_department == 'Accounts') ? 'selected' : '' }}>Accounts</option>
                                    <option value="Corporate" {{ old('faculty_department') == 'Corporate' || (isset($data) && $data->faculty_department == 'Corporate') ? 'selected' : '' }}>Corporate</option>
                                    <option value="Examinations" {{ old('faculty_department') == 'Examinations' || (isset($data) && $data->faculty_department == 'Examinations') ? 'selected' : '' }}>Examinations</option>
                                    <option value="ICT" {{ old('faculty_department') == 'ICT' || (isset($data) && $data->faculty_department == 'ICT') ? 'selected' : '' }}>ICT</option>
                                    <option value="Management" {{ old('faculty_department') == 'Management' || (isset($data) && $data->faculty_department == 'Management') ? 'selected' : '' }}>Management</option>
                                    <option value="Media & PR" {{ old('faculty_department') == 'Media & PR' || (isset($data) && $data->faculty_department == 'Media & PR') ? 'selected' : '' }}>Media & PR</option>
                                    <option value="Training & Placement" {{ old('faculty_department') == 'Training & Placement' || (isset($data) && $data->faculty_department == 'Training & Placement') ? 'selected' : '' }}>Training & Placement</option>
                                    <option value="Virtual Campus" {{ old('faculty_department') == 'Virtual Campus' || (isset($data) && $data->faculty_department == 'Virtual Campus') ? 'selected' : '' }}>Virtual Campus</option>                                 
                                </select>
                            </div>
                        </div>
                        <!-- End  Faculty Position Section -->
                @else

                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label>Faculty Position for which the application is beingsubmitted:</label>
                       
                        {{-- <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="position" value="Assistant Professor"
                                id="assistantProfessor"
                                {{ old('position') == 'Assistant Professor' || (isset($data) && $data->position == 'Assistant Professor') ? 'checked' : '' }}>
                            <label class="form-check-label" for="assistantProfessor">Assistant Professor</label>
                        </div>
                        <div class="form-check me-3">
                            <input class="form-check-input" type="radio" name="position" value="Associate Professor"
                                id="associateProfessor"
                                {{ old('position') == 'Associate Professor' || (isset($data) && $data->position == 'Associate Professor') ? 'checked' : '' }}>
                            <label class="form-check-label" for="associateProfessor">Associate Professor</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="position" value="Professor"
                                id="professor"
                                {{ old('position') == 'Professor' || (isset($data) && $data->position == 'Professor') ? 'checked' : '' }}>
                            <label class="form-check-label" for="professor">Professor</label>
                        </div> --}}

                         <div class="form-check">
                            <input class="form-check-input" type="radio" name="position" value="Teaching Fellow"
                                id="Teaching cum Research Fellow"
                                {{ old('position') == 'Teaching Fellow' || (isset($data) && $data->position == 'Teaching Fellow') ? 'checked' : '' }}>
                            <label class="form-check-label" for="TeachingFellow">Teaching Fellow</label>
                        </div> 
                    </div>

                    <div class="form-group col-md-6">
                        <label for="faculty_department">Faculty/ Department</label>
                        <select type="text" class="form-control" id="faculty_department" name="faculty_department">
                                <option value="">Select Faculty/ Department</option>
                               <option value="Faculty of Arts and Design" {{ old('faculty_department') == 'Faculty of Arts and Design' || (isset($data) && $data->faculty_department == 'Faculty of Arts and Design') ? 'selected' : '' }}>Faculty of Arts and Design</option>
                                <option value="Faculty of Chemical Sciences" {{ old('faculty_department') == 'Faculty of Chemical Sciences' || (isset($data) && $data->faculty_department == 'Faculty of Chemical Sciences') ? 'selected' : '' }}>Faculty of Chemical Sciences</option>
                                <option value="Faculty of Economics" {{ old('faculty_department') == 'Faculty of Economics' || (isset($data) && $data->faculty_department == 'Faculty of Economics') ? 'selected' : '' }}>Faculty of Economics</option>
                                <option value="Faculty of Legal Studies" {{ old('faculty_department') == 'Faculty of Legal Studies' || (isset($data) && $data->faculty_department == 'Faculty of Legal Studies') ? 'selected' : '' }}>Faculty of Legal Studies</option>
                                <option value="Faculty of Physical Sciences" {{ old('faculty_department') == 'Faculty of Physical Sciences' || (isset($data) && $data->faculty_department == 'Faculty of Physical Sciences') ? 'selected' : '' }}>Faculty of Physical Sciences</option>
                                <option value="Faculty of Management" {{ old('faculty_department') == 'Faculty of Management' || (isset($data) && $data->faculty_department == 'Faculty of Management') ? 'selected' : '' }}>Faculty of Management</option>
                                <option value="Department of Sociology" {{ old('faculty_department') == 'Department of Sociology' || (isset($data) && $data->faculty_department == 'Department of Sociology') ? 'selected' : '' }}>Department of Sociology</option>
                                <option value="Department of Mathematics" {{ old('faculty_department') == 'Department of Mathematics' || (isset($data) && $data->faculty_department == 'Department of Mathematics') ? 'selected' : '' }}>Department of Mathematics</option>
                                <option value="Department of Centre of Climate Change" {{ old('faculty_department') == 'Department of Centre of Climate Change' || (isset($data) && $data->faculty_department == 'Department of Centre of Climate Change') ? 'selected' : '' }}>Department of Centre of Climate Change</option>
                                <option value="Department of International Relations" {{ old('faculty_department') == 'Department of International Relations' || (isset($data) && $data->faculty_department == 'Department of International Relations') ? 'selected' : '' }}>Department of International Relations</option>
                                <option value="Department of Public Policy and Governance" {{ old('faculty_department') == 'Department of Public Policy and Governance' || (isset($data) && $data->faculty_department == 'Department of Public Policy and Governance') ? 'selected' : '' }}>Department of Public Policy and Governance</option>
                                <option value="Department of Computer Science and Engineering" {{ old('faculty_department') == 'Department of Computer Science and Engineering' || (isset($data) && $data->faculty_department == 'Department of Computer Science and Engineering') ? 'selected' : '' }}>Department of Computer Science and Engineering</option>
                                <option value="Faculty of Life Sciences & Biotechnology" {{ old('faculty_department') == 'Faculty of Life Sciences & Biotechnology' || (isset($data) && $data->faculty_department == 'Faculty of Life Sciences & Biotechnology') ? 'selected' : '' }}>Faculty of Life Sciences & Biotechnology</option>                       
                        </select>
                            </div>

                   <div class="form-group col-md-12">
                     <div class="alert alert-warning">
                        For Teaching Fellow there is no Application Fee.
                    </div>
                </div>

                </div>

                @endif    


                    <h5>Personal Details</h5>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="full_name">Full Name (no initials)</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') ?? $data->name }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male"
                                    {{ old('gender') == 'Male' || (isset($data) && $data->gender == 'Male') ? 'selected' : '' }}>
                                    Male</option>
                                <option value="Female"
                                    {{ old('gender') == 'Female' || (isset($data) && $data->gender == 'Female') ? 'selected' : '' }}>
                                    Female</option>
                                <option value="Other"
                                    {{ old('gender') == 'Other' || (isset($data) && $data->gender == 'Other') ? 'selected' : '' }}>
                                    Other</option>
                            </select>

                        </div>

                        <div class="form-group col-md-6">
                            <label for="spouse_name">Spouse Name</label>
                            <input type="text" class="form-control" id="spouse_name" name="spouse_name"
                                value="{{ old('spouse_name') ?? $data->spouse_name }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nationality">Nationality</label>
                            <input type="text" class="form-control" id="nationality" name="nationality"
                                value="{{ old('nationality') ?? $data->nationality }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob"
                                value="{{ old('dob') ?? $data->dob }}">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') ?? $data->email }}" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mobile">Mobile</label>
                            <input type="text" class="form-control" id="mobile" name="mobile"
                                value="{{ old('mobile') ?? $data->mobile }}">
                        </div>

                    </div>
                    
                 
                    

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="position_current_held">Position currently held </label>
                            <input type="text" class="form-control" id="position_current_held" name="position_current_held"
                                value="{{ old('position_current_held') ?? $data->position_current_held }}">                               
                        </div>


                        <div class="form-group col-md-6" style="margin-top:32px">
                            <label>Current Position</label>
                           
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="position_currenty" id="permanent" value="Permanent"
                                    {{ old('position_currenty', $data->position_currenty ?? '') == 'Permanent' ? 'checked' : '' }}>
                                <label class="form-check-label" for="permanent">Permanent</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="position_currenty" id="temporary" value="Temporary"
                                    {{ old('position_currenty', $data->position_currenty ?? '') == 'Temporary' ? 'checked' : '' }}>
                                <label class="form-check-label" for="temporary">Temporary</label>
                            </div>
                                                       
                        </div>
                    </div>
     

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="work_address">Work Address </label>
                            <textarea class="form-control" id="work_address" name="work_address">{{ old('work_address') ?? $data->work_address }}</textarea>                              
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="permanent_address">Permanent Address </label>   
                                <textarea class="form-control" id="permanent_address" name="permanent_address">{{ old('permanent_address') ?? $data->permanent_address }}</textarea>    
                        </div>
                    </div>

                    <div class="form-group col-md-12" style="margin-top:32px">
                            <label> Prefer this address for correspondence</label>
                           
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="correspondence_address" id="Work" value="Work"
                                    {{ old('correspondence_address', $data->correspondence_address ?? '') == 'Work' ? 'checked' : '' }}>
                                <label class="form-check-label" for="Work">Work Address</label>
                            </div>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="correspondence_address" id="Permanent" value="Permanent"
                                    {{ old('correspondence_address', $data->correspondence_address ?? '') == 'Permanent' ? 'checked' : '' }}>
                                <label class="form-check-label" for="temporary">Permanent Address</label>
                            </div>
                                                       
                        </div>


                    <h5>Education </h5>
                    <figure class="table" style="width:100%;">
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Level</th>
                                    <th scope="col">Name of Degree</th>
                                    <th scope="col">University / College / School / Institution</th>
                                    <th scope="col">Date of Joining</th>
                                    <th scope="col">Date of Award of Degree</th>
                                    <th scope="col"> Marks(%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Doctoral Degree</td>
                                    <td>
                                        <input type="text" class="form-control" placeholder="Degree Name"
                                            name="doctoral_degree"
                                            value="{{ old('doctoral_degree') ?? ($data->doctoral_degree ?? '') }}">
                                    </td>
                                    <td><input type="text" class="form-control" placeholder="Institution"
                                            name="doctoral_university"
                                            value="{{ old('doctoral_university') ?? ($data->doctoral_university ?? '') }}">
                                    </td>
                                    <td><input type="date" class="form-control" name="doctoral_joining"
                                            value="{{ old('doctoral_joining') ?? ($data->doctoral_joining ?? '') }}"></td>
                                    <td><input type="date" class="form-control" name="doctoral_award"
                                            value="{{ old('doctoral_award') ?? ($data->doctoral_award ?? '') }}"></td>
                                    <td><input type="text" class="form-control" placeholder="Percentage / Grade"
                                            name="doctoral_grades"
                                            value="{{ old('doctoral_grades') ?? ($data->doctoral_grades ?? '') }}"></td>
                                </tr>
                                
                                <tr>
                                    <td>Master’s Degree</td>
                                    <td><input type="text" class="form-control" placeholder="Degree Name"
                                            name="master_degree"
                                            value="{{ old('master_degree') ?? ($data->master_degree ?? '') }}"></td>
                                    <td><input type="text" class="form-control" placeholder="Institution"
                                            name="master_university"
                                            value="{{ old('master_university') ?? ($data->master_university ?? '') }}">
                                    </td>
                                    <td><input type="date" class="form-control" name="master_joining"
                                            value="{{ old('master_joining') ?? ($data->master_joining ?? '') }}"></td>
                                    <td><input type="date" class="form-control" name="master_award"
                                            value="{{ old('master_award') ?? ($data->master_award ?? '') }}"></td>
                                    <td><input type="text" class="form-control" placeholder="Percentage / Grade"
                                            name="master_grades"
                                            value="{{ old('master_grades') ?? ($data->master_grades ?? '') }}"></td>
                                </tr>
                                <tr>
                                    <td>Bachelor’s Degree</td>
                                    <td><input type="text" class="form-control" placeholder="Degree Name"
                                            name="bachelor_degree"
                                            value="{{ old('bachelor_degree') ?? ($data->bachelor_degree ?? '') }}"></td>
                                    <td><input type="text" class="form-control" placeholder="Institution"
                                            name="bachelor_university"
                                            value="{{ old('bachelor_university') ?? ($data->bachelor_university ?? '') }}">
                                    </td>
                                    <td><input type="date" class="form-control" name="bachelor_joining"
                                            value="{{ old('bachelor_joining') ?? ($data->bachelor_joining ?? '') }}"></td>
                                    <td><input type="date" class="form-control" name="bachelor_award"
                                            value="{{ old('bachelor_award') ?? ($data->bachelor_award ?? '') }}"></td>
                                    <td><input type="text" class="form-control" placeholder="Percentage / Grade"
                                            name="bachelor_grades"
                                            value="{{ old('bachelor_grades') ?? ($data->bachelor_grades ?? '') }}"></td>
                                </tr>
                                <tr>
                                    <td>10+2 (12<sup>th</sup> Class) / School Leaving</td>
                                    <td><input type="text" class="form-control" placeholder="Degree Name"
                                            name="school_degree"
                                            value="{{ old('school_degree') ?? ($data->school_degree ?? '') }}"></td>
                                    <td><input type="text" class="form-control" placeholder="Institution"
                                            name="school_university"
                                            value="{{ old('school_university') ?? ($data->school_university ?? '') }}">
                                    </td>
                                    <td><input type="date" class="form-control" name="school_joining"
                                            value="{{ old('school_joining') ?? ($data->school_joining ?? '') }}"></td>
                                    <td><input type="date" class="form-control" name="school_award"
                                            value="{{ old('school_award') ?? ($data->school_award ?? '') }}"></td>
                                    <td><input type="text" class="form-control" placeholder="Percentage / Grade"
                                            name="school_grades"
                                            value="{{ old('school_grades') ?? ($data->school_grades ?? '') }}"></td>
                                </tr>
                                

                                <tr>
                                    <td>Others</td>
                                    <td><input type="text" class="form-control" placeholder="Degree Name"
                                            name="others_degree"
                                            value="{{ old('others_degree') ?? ($data->others_degree ?? '') }}"></td>

                                    <td><input type="text" class="form-control" placeholder="Institution"
                                            name="others_university"
                                            value="{{ old('others_university') ?? ($data->others_university ?? '') }}">
                                    </td>

                                    <td><input type="date" class="form-control" name="others_joining"
                                            value="{{ old('others_joining') ?? ($data->others_joining ?? '') }}"></td>

                                    <td><input type="date" class="form-control" name="others_award"
                                            value="{{ old('others_award') ?? ($data->others_award ?? '') }}"></td>

                                    <td><input type="text" class="form-control" placeholder="Percentage / Grade"
                                            name="others_grades"
                                            value="{{ old('others_grades') ?? ($data->others_grades ?? '') }}"></td>
                                </tr>


                            </tbody>
                        </table>
                    </figure>

                     
                    
                    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name_phd_thesis">Title of Ph.D. Thesis</label>
                            <input type="text" class="form-control" id="name_phd_thesis" name="name_phd_thesis"  value="{{ old('name_phd_thesis') ?? ($data->name_phd_thesis ?? '') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="supervisor">Name of the Supervisor</label>
                            <input type="text" class="form-control" id="supervisor" name="supervisor" value="{{ old('supervisor') ?? ($data->supervisor ?? '') }}">
                        </div>
                    </div>

                   
                    
                   


                    <div class="col-md-12 d-flex justify-content-end">
                        <button id="submitButton" type="submit" class="btn btn-primary">Next</button>
                    </div>


                </form>
                <!-- -  --------------------------------- End Personal Details Section  ---------------------------- -->



            </div>
        </div>
    </div>


@endsection
