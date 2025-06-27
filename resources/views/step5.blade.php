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

                <!-- ------------------------ Start Other Information  ------------------------------------- -->

                <form id="step5Form" action="{{ route('updateStep5') }}" method="POST">
                    @csrf

                    <input type="hidden" id="form_id" name="form_id" value="{{ $encryptedId }}">
                    <h5>Other Information</h5>



                    <div class="row">
                        <div class="col-6">
                                <div class="form-group">
                                <label>If selected, when can you join?</label>
                                <select class="form-control" name="joining_date">
                                    <option value="" disabled selected>Select joining time</option>
                                    <option value="below_15_days" {{ (old('joining_date') == 'below_15_days' || ($data->joining_date ?? '') == 'below_15_days') ? 'selected' : '' }}>Below 15 days</option>
                                    <option value="1_month" {{ (old('joining_date') == '1_month' || ($data->joining_date ?? '') == '1_month') ? 'selected' : '' }}>1 Month</option>
                                    <option value="1.5_months" {{ (old('joining_date') == '1.5_months' || ($data->joining_date ?? '') == '1.5_months') ? 'selected' : '' }}>1.5 Months</option>
                                    <option value="2_months" {{ (old('joining_date') == '2_months' || ($data->joining_date ?? '') == '2_months') ? 'selected' : '' }}>2 Months</option>
                                    <option value="3_months" {{ (old('joining_date') == '3_months' || ($data->joining_date ?? '') == '3_months') ? 'selected' : '' }}>3 Months</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                                <div class="form-group">
                                <label>Selection Committees reserve the right to offer a position lower than the one applied for.
                                    Are you willing to be considered for a position at a lower level?</label>
                                <select class="form-control" name="consider_lower_position">
                                    <option value="Not Applicable"
                                        {{ old('consider_lower_position') == '' && empty($data->consider_lower_position) ? 'selected' : '' }}>
                                        Not Applicable </option>
                                        <!-- <option value="" disabled
                                        {{ old('consider_lower_position') == '' && empty($data->consider_lower_position) ? 'selected' : '' }}>
                                        Select an option</option>
                                    <option value="yes"
                                        {{ old('consider_lower_position') == 'yes' || (isset($data) && $data->consider_lower_position == 'yes') ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="no"
                                        {{ old('consider_lower_position') == 'no' || (isset($data) && $data->consider_lower_position == 'no') ? 'selected' : '' }}>
                                        No</option> -->
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Any other information: (Please Provide here any other relevant information.)</label>
                                <textarea class="form-control" name="other_information" rows="3">{{ old('other_information') ?? ($data->other_information ?? '') }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                                <div class="form-group">
                                <label>Give three specific reasons for you to think of joining the SAU, in particular, what is your
                                    vision for improving the academic standing of the SAU, regionally or globally?</label>
                                <textarea class="form-control" name="sau_reasons" rows="4">{{ old('sau_reasons') ?? ($data->sau_reasons ?? '') }}</textarea>
                            </div>
                        </div>
                    </div>    



                  

                  

                    <div class="form-group">
                        <label>If you have ever been convicted for any legal offence(s), please give details:</label>
                        <textarea class="form-control" name="legal_offences" rows="2">{{ old('legal_offences') ?? ($data->legal_offences ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>If you have any health problems, have a history of health problems, or have ever been
                            declared medically unfit, please give details:</label>
                        <small class="form-text text-muted">(Please note that selected candidates are required to go through
                            a complete medical checkup and declared medically fit before joining)</small>
                        <textarea class="form-control" name="health_problems" rows="3">{{ old('health_problems') ?? ($data->health_problems ?? '') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>How proficient are you in English:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="englishProficiency" id="Excellent"
                                value="Excellent"
                                {{ old('englishProficiency') == 'Excellent' || (isset($data) && $data->englishProficiency == 'Excellent') ? 'checked' : '' }}>
                            <label class="form-check-label" for="excellent">Excellent</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="englishProficiency" id="veryGood"
                                value="Very Good"
                                {{ old('englishProficiency') == 'Very Good' || (isset($data) && $data->englishProficiency == 'Very Good') ? 'checked' : '' }}>
                            <label class="form-check-label" for="veryGood">Very Good</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="englishProficiency" id="Good"
                                value="Good"
                                {{ old('englishProficiency') == 'Good' || (isset($data) && $data->englishProficiency == 'Good') ? 'checked' : '' }}>
                            <label class="form-check-label" for="good">Good</label>
                        </div>
                    </div>

                     <div class="form-group">
                        <label>Please giver names, addresses, email and phone numbers of up to three referees not relates to you, and ask them to send their recommendation letters to recruitment@sau.int lateste by:</label>
                        <textarea class="form-control" rows="4" name="adminExperience">{{ old('adminExperience') ?? ($data->adminExperience ?? '') }}</textarea>
                    </div>


                    <div class="form-group">
                        <label>Please mention here if you have any administrative experience:</label>
                        <textarea class="form-control" rows="4" name="adminExperience">{{ old('adminExperience') ?? ($data->adminExperience ?? '') }}</textarea>
                    </div>


                    <div class="col-md-12 d-flex justify-content-between" style="margin-top:2%">
                        <a href="/step4/{{ request()->segment(2) }}" class="btn btn-secondary">Back</a>
                        
                        <button type="submit" class="btn btn-primary">Next</button>
                    </div>


                </form>

                <!-- ------------------------ End Other Information  ------------------------------------- -->

            </div>
        </div>
    </div>

    <style>
        .form-control {
            height: 47px;
        }
    </style>

@endsection
