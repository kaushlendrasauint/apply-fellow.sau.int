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

             <div class="form-group">
                                <label for="other_courses"><h6>Please mention below up to five of your best Publications (Research Papers and books ):</h6></label>
                                  <div class="d-flex justify-content-end mb-3">
                                        <a class="btn btn-primary p-2" data-toggle="modal" data-target="#best_PublicationsModal"><i class="fa fa-plus"></i> Add</a>
                                  </div>
                                      <table class="table table-bordered table-striped">
                                          <tbody>
                                              @forelse($best_Publications as $index => $best_Publication)
                                                  <tr>
                                                      <td>{{ $index + 1 }}</td>
                                                      <td>{{ $best_Publication->value }}</td>
                                                      <td>
                                                          <form action="{{ route('taught-courses.destroy', $best_Publication->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                                                              @csrf
                                                              @method('DELETE')
                                                              <button class="btn btn-sm btn-danger">Delete</button>
                                                          </form>
                                                      </td>
                                                  </tr>
                                              @empty
                                                  <tr>
                                                      <td colspan="3" class="text-center">No Research Papers and books added yet.</td>
                                                  </tr>
                                              @endforelse
                                          </tbody>
                                      </table>
                            </div>


            <!-- - ----------------------------   Start Publication Details -------------------------------->
            <form action="{{ route('updateStep3') }}" method="POST" >
                @csrf
                <input type="hidden" id="form_id" name="form_id" value="{{ $encryptedId }}">

                @if($data->application_for == 'Teaching')
                    <h5>Publications:</h5>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>Number of Books Edited</td>
                                <td>Number of Books Authored</td>
                                <td>Number of Research Publications</td>
                                <td>Number of Book Chapters</td>
                                <td>Number of Patents</td>
                                <td>Number of Research Grants</td>
                                <td>Number of Presentations in Conferences and Symposia</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="text" class="form-control" name="number_books_edited"
                                        value="{{ old('number_books_edited') ?? ($data->number_books_edited ?? '') }}"></td>
                                <td><input type="text" class="form-control" name="number_books_authored"
                                        value="{{ old('number_books_authored') ?? ($data->number_books_authored ?? '') }}">
                                </td>
                                <td><input type="text" class="form-control" name="number_research_publications"
                                        value="{{ old('number_research_publications') ?? ($data->number_research_publications ?? '') }}">
                                </td>
                                <td><input type="text" class="form-control" name="number_book_chapters"
                                        value="{{ old('number_book_chapters') ?? ($data->number_book_chapters ?? '') }}">
                                </td>
                                <td><input type="text" class="form-control" name="number_patents"
                                        value="{{ old('number_patents') ?? ($data->number_patents ?? '') }}"></td>
                                <td><input type="text" class="form-control" name="number_research_grants"
                                        value="{{ old('number_research_grants') ?? ($data->number_research_grants ?? '') }}">
                                </td>
                                <td><input type="text" class="form-control" name="number_presentations"
                                        value="{{ old('number_presentations') ?? ($data->number_presentations ?? '') }}">
                                </td>

                            </tr>
                        </tbody>
                    </table>

                  


                @endif

                

                <!-- <div class="form-group">
                    <label for="optional1">Gaps in employment history:</label>
                    <textarea class="form-control" id="employment_history"
                        name="employment_history">{{ old('employment_history') ?? ($data->employment_history ?? '') }}</textarea>
                </div> -->


                <div class="col-md-12 d-flex justify-content-between" style="margin-top:2%">
                    <a href="/step2/{{ request()->segment(2) }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Next</button>
                </div>



            </form>
            <!-- - ----------------------------   End  Publication Details -------------------------------->
        </div>
    </div>
</div>


<!-- Other Courses Modal -->
<div class="modal fade" id="best_PublicationsModal" tabindex="-1" role="dialog" aria-labelledby="best_PublicationsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form method="POST" action="{{ route('courses.save', ['type' => 'best_Publications']) }}">
      @csrf
       <input type="hidden" name="type" value="best_Publications">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">Add Best Publications</h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="text" class="form-control" name="value" placeholder="Enter Best Publications">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

@endsection