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


                <!--------------------------------------Start  Experience Section --------------------------------  --->
            

                    @if($data->application_for=='Teaching')
                    
           
                      <!-------------------------------Ph.D Research Guidance---------------------------------------------------------->
   
            <div class="row">
                <div class="col-md-12">
                    <h5>Ph.D. Research Guidance</h5>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <!-- Button container for better alignment -->
                            <div class="d-flex justify-content-end mb-3">
                                <a type="button" class="btn btn-primary p-2" data-toggle="modal" data-target="#phdModal">
                                <i class="fa fa-plus"></i> Add </a>
                            </div>

                            <div class="container-fluid">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Student Name</th>
                                            <th>Ph.D. Year</th>
                                            <th>University</th>
                                            <th>Supervisors</th>
                                            <th>Thesis Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($phd_details as $index => $phd_detail)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $phd_detail->student_name }}</td>
                                                <td>{{ $phd_detail->phd_year }}</td>
                                                <td>{{ $phd_detail->university }}</td>
                                                <td>{{ $phd_detail->supervisors }}</td>
                                                <td>{{ $phd_detail->thesis_title }}</td>
                                                <td>
                                                    <form action="{{ route('phd-details.destroy', $phd_detail->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No Ph.D. records found.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-------------------------------Ph.D Research Guidance---------------------------------------------------------->


                     
                        <div class="table-wrapper mx-auto">
                            <h5 class="section-title">Teaching experience:</h5>

                            <div class="form-group">
                                <label for="courses_taught"><h6>List the courses you have taught, if any, at post-graduate MA /
                                    M.Sc / /M.Tech. levels. Mention durations against each:</h6></label>
                               
                                
                                <div class="d-flex justify-content-end mb-3">
                                  <a  class="btn btn-primary p-2" data-toggle="modal" data-target="#taughtCoursesModal"><i class="fa fa-plus"></i> Add</a> 
                                </div>

                          
                                        <table class="table table-bordered table-striped">
                                            <tbody>
                                                @forelse($courses_taughts as $index => $courses_taught)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $courses_taught->value }}</td>
                                                        <td>
                                                            <form action="{{ route('taught-courses.destroy', $courses_taught->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-sm btn-danger">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="3" class="text-center">No courses found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                          

                                



                            </div>






                            <div class="form-group">
                                <label for="compulsory_courses"><h6>Which of the listed compulsory courses can you teach
                                    independently to MA / M.Sc / M.Tech students?</h6></p></label>

                                     <div class="d-flex justify-content-end mb-3">
                                   <a class="btn btn-primary p-2" data-toggle="modal" data-target="#CompulsoryCoursesModal"><i class="fa fa-plus"></i> Add</a>
                                </div>
                                    
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    @forelse($compulsory_courses as $index => $compulsory_course)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $compulsory_course->value }}</td>
                                                            <td>
                                                                <form action="{{ route('taught-courses.destroy', $compulsory_course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="3" class="text-center">No compulsory courses added yet.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>

                            </div>

                            <div class="form-group">
                                <label for="optional_courses"><h6>Which of the listed optional courses can you teach
                                    independently at MA / M.Sc. / M.Tech level?</h6></p>
                                </label>
                            
                                  
                                      
                                      <div class="d-flex justify-content-end mb-3">
                                   <a class="btn btn-primary p-2" data-toggle="modal" data-target="#optional_coursesModal"><i class="fa fa-plus"></i> Add</a>
                                </div>

                                    
                                            <table class="table table-bordered table-striped">
                                                <tbody>
                                                    @forelse($optional_courses as $index => $optional_course)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $optional_course->value }}</td>
                                                            <td>
                                                                <form action="{{ route('taught-courses.destroy', $optional_course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="3" class="text-center">No optional courses added yet.</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                            </div>



                             <div class="form-group">
                                <label for="other_courses"><h6>Any other course, not listed in SAU’s list of courses, which you may like to develop and teach to further strengthen your field of studies:</h6></label>
                                  <div class="d-flex justify-content-end mb-3">
                                        <a class="btn btn-primary p-2" data-toggle="modal" data-target="#other_coursesModal"><i class="fa fa-plus"></i> Add</a>
                                  </div>
                                      <table class="table table-bordered table-striped">
                                          <tbody>
                                              @forelse($other_courses as $index => $other_course)
                                                  <tr>
                                                      <td>{{ $index + 1 }}</td>
                                                      <td>{{ $other_course->value }}</td>
                                                      <td>
                                                          <form action="{{ route('taught-courses.destroy', $other_course->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                                              @csrf
                                                              @method('DELETE')
                                                              <button class="btn btn-sm btn-danger">Delete</button>
                                                          </form>
                                                      </td>
                                                  </tr>
                                              @empty
                                                  <tr>
                                                      <td colspan="3" class="text-center">No other courses added yet.</td>
                                                  </tr>
                                              @endforelse
                                          </tbody>
                                      </table>
                            </div>

                            


                        </div>
                    @endif

             </div>
            </div>
        </div>

                    


<div class="container">

    <form action="{{ route('updateCareer') }}" id="step2Form" method="POST">
                    @csrf


                    <h5>Career History</h5>
                    <div class="d-flex justify-content-end mb-3">
                                   <a class="btn btn-primary p-2 add-more"><i class="fa fa-plus"></i> Add</a>
                    </div>


                            <div id="careerEntries">
                              @php
                                  $careers = $careers ?? collect(); // Ensure $careers is iterable
                              @endphp
                          @if($careers->isNotEmpty())
                            @foreach($careers as $career)
                                <div class="career-entry border p-3 mb-3">
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="position">Position Held</label>
                                            <input type="text" class="form-control" name="career_position[]" value="{{ $career->career_position }}"
                                                placeholder="Position">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="employer">Employer's Name /  Address</label>
                                            <textarea class="form-control" name="career_employer[]">{{ $career->career_employer }}</textarea>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="career_address">Government / Private</label>
                                            <select class="form-control" name="career_address[]">
                                                <option value="">-- Select --</option>
                                               <option value="Government" {{ $career->career_address == 'Government' ? 'selected' : '' }}>Government</option>
                                              <option value="Private" {{ $career->career_address == 'Private' ? 'selected' : '' }}>Private</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="dateFrom">Date From</label>
                                            <input type="date" class="form-control" name="career_datefrom[]" value="{{ $career->career_datefrom }}">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="dateTo">Date To</label>
                                            <input type="date" class="form-control" name="career_dateTo[]" value="{{ $career->career_dateTo }}">
                                        </div>
                                        <div class="form-group col-md-1">
                                            <label for="salary">Salary (US $ PA)</label>
                                            <input type="number" class="form-control" name="career_salary[]" value="{{ $career->career_salary }}"
                                                placeholder="Salary">
                                        </div>
                                        <div class="form-group col-md-1 py-4">
                                            <button type="button" class="btn btn-danger remove-entry"><i class="fa fa-trash-o"></i></button>
                                        </div>
                                    </div>
                                </div>
                   @endforeach
             @else
                <p>No career entries available.</p>
            @endif

    </div>                     

    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>



                       

  <form action="{{ route('updateStep2') }}" id="step2Form" method="POST">
  @csrf
                            <div class="col-md-12 d-flex justify-content-between" style="margin-top:2%">
                                <a href="/step1" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary">Next</button>
                            </div>

                </form>
                <!--------------------------------------END  Experience Section --------------------------------  --->


            </div>
        </div>
    </div>



<!-- Taught Courses Modal -->
<div class="modal fade" id="taughtCoursesModal" tabindex="-1" role="dialog" aria-labelledby="taughtCoursesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('courses.save', ['type' => 'courses_taught']) }}">
      @csrf
      <input type="hidden" name="type" value="courses_taught">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Add Taught Course</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="value" placeholder="Enter taught course">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Compulsory Courses Modal -->
<div class="modal fade" id="CompulsoryCoursesModal" tabindex="-1" role="dialog" aria-labelledby="compulsoryCoursesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('courses.save', ['type' => 'compulsory_courses']) }}">
      @csrf
            <input type="hidden" name="type" value="compulsory_courses">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Add Compulsory Course</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="value" placeholder="Enter compulsory course">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Optional Courses Modal -->
<div class="modal fade" id="optional_coursesModal" tabindex="-1" role="dialog" aria-labelledby="optionalCoursesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('courses.save', ['type' => 'optional_courses']) }}">
      @csrf
        <input type="hidden" name="type" value="optional_courses">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Add Optional Course</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="value" placeholder="Enter optional course">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="phdModal" tabindex="-1" role="dialog" aria-labelledby="phdModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <form action="{{ route('phd-details.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="phdModalLabel">Ph.D Details</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="student_name">Name of Student</label>
            <input type="text" class="form-control" id="student_name" name="student_name" required>
          </div>

          <div class="form-group">
            <label for="phd_year">Year of Ph.D Degree</label>
            <input type="number" class="form-control" id="phd_year" name="phd_year" required>
          </div>

          <div class="form-group">
            <label for="university">University</label>
            <input type="text" class="form-control" id="university" name="university" required>
          </div>

          <div class="form-group">
            <label for="supervisors">Supervisors</label>
            <input type="text" class="form-control" id="supervisors" name="supervisors" required>
          </div>

          <div class="form-group">
            <label for="thesis_title">Thesis Title</label>
            <textarea class="form-control" id="thesis_title" name="thesis_title" rows="3" required></textarea>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Other Courses Modal -->
<div class="modal fade" id="other_coursesModal" tabindex="-1" role="dialog" aria-labelledby="otherCoursesLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('courses.save', ['type' => 'other_courses']) }}">
      @csrf
       <input type="hidden" name="type" value="other_courses">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Add Other Course</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="value" placeholder="Enter other course">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Add new entry
            $('.add-more').click(function() {
                var entry = `
                    <div class="career-entry border p-3 mb-3">
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="position">Position Held</label>
                                <input type="text" class="form-control" name="career_position[]" placeholder="Position">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="employer">Employer's Name /  Address</label>
                                <textarea type="text" class="form-control" name="career_employer[]" ></textarea>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="address">Government / Private</label>
                                <select class="form-control" name="career_address[]" >
                                  <option value="">-- Select --</option>
                                  <option value="Government"  >Government</option>
                                  <option value="Private"  >Private</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dateFrom">Date From</label>
                                <input type="date" class="form-control" name="career_datefrom[]">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="dateTo">Date To</label>
                                <input type="date" class="form-control" name="career_dateTo[]">
                            </div>
                            <div class="form-group col-md-1">
                                <label for="salary">Salary (US $ PA)</label>
                                <input type="number" class="form-control" name="career_salary[]" placeholder="Salary">
                            </div>
                       
                         <div class="form-group col-md-1 py-4">
                            <button type="button" class="btn btn-danger remove-entry"><i class="fa fa-trash-o"></i></button>
                        </div>    
                         </div>
                    </div>
                `;
                $('#careerEntries').append(entry);
            });

            // Remove entry
            $(document).on('click', '.remove-entry', function() {
                $(this).closest('.career-entry').remove();
            });
        });
    </script>

<style>
  #careerEntries label {
    font-size: 13px;
}</style>  
@endsection
