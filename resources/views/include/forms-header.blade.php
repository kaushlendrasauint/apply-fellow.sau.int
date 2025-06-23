<div class="loader"
                    style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
                    <img src="/path-to-loader.gif" alt="Loading..." />
                </div>

                @if($data->application_for=='Non-Teaching')
                  <h2 class="text-center mb-4"> Application form for Non-Teaching Positions</h2>
		@else
                  <h2 class="text-center mb-4"> Application form for Teaching Positions</h2>
		@endif

                <div style="display: flex; justify-content: center; padding: 10px;">
                    <img src="{{ asset('/uploads/saarc.png') }}" alt="Saarc Image">
                </div>


                <div class="progress mb-4">
                @php
                        // Determine the current step based on the route name
                        $currentStep = request()->route()->getName(); // e.g., 'step1', 'step2', etc.
                        $steps = ['step1', 'step2', 'step3', 'step4', 'step5','preview'];
                        $stepIndex = array_search($currentStep, $steps) !== false ? array_search($currentStep, $steps) : 0;
                    @endphp

                    <style>
                            .progress {
                                width: 100%; /* Ensure the progress container takes full width */
                                display: flex; /* Use flexbox to distribute segments evenly */
                            }

                            .progress-bar {
                                flex: 1; /* Each progress bar segment takes equal space */
                                min-width: 0; /* Prevent overflow issues */
                            }

                            .progress-bar a {
                                color: inherit;
                                text-decoration: none;
                            }

                            .progress-bar a:hover {
                                text-decoration: none;
                                color: inherit;
                            }

                            .progress-bar-text {
                                white-space: nowrap; /* Prevent text wrapping */
                                font-size: 14px; /* Adjust font size for better fit */
                                padding: 0 5px; /* Add padding for better spacing */
                            }

                            .progress-bar-active {
                                background-color: #FFC107 !important; /* Yellow for active step */
                            }
                        </style>

                        <div class="progress">
                            <!-- Step 1 -->
                            <div class="progress-bar {{ $currentStep === 'step1' ? 'progress-bar-active progress-bar-striped progress-bar-animated' : ($stepIndex > 0 ? 'bg-success' : 'bg-primary') }}"
                                role="progressbar" style="width: 16.67%" aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100">
                                <a href="{{ route('step1') }}">
                                    <span class="progress-bar-text">1. Personal / Education </span>
                                </a>
                            </div>

                            
                            <!-- Step 2 -->
                                    <div class="progress-bar {{ $currentStep === 'step2' ? 'progress-bar-active progress-bar-striped progress-bar-animated' : ($stepIndex > 1 ? 'bg-success' : 'bg-primary') }}"
                                        role="progressbar" style="width: 16.67%" aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100">
                                        @if($data->step >= 1)
                                            <a href="{{ route('step2', ['id' => base64_encode(Crypt::encryptString($data->id))]) }}">
                                                <span class="progress-bar-text">2. Teaching Experience</span>
                                            </a>
                                        @else
                                            <span class="progress-bar-text">2. Teaching Experience</span>
                                        @endif
                                    </div>

                                    <!-- Step 3 -->
                                    <div class="progress-bar {{ $currentStep === 'step3' ? 'progress-bar-active progress-bar-striped progress-bar-animated' : ($stepIndex > 2 ? 'bg-success' : 'bg-primary') }}"
                                        role="progressbar" style="width: 16.67%" aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100">
                                        @if($data->step >= 2)
                                            <a href="{{ route('step3', ['id' => base64_encode(Crypt::encryptString($data->id))]) }}">
                                                <span class="progress-bar-text">3. Publication</span>
                                            </a>
                                        @else
                                            <span class="progress-bar-text">3. Publication</span>
                                        @endif
                                    </div>

                                    <!-- Step 4 -->
                                    <div class="progress-bar {{ $currentStep === 'step4' ? 'progress-bar-active progress-bar-striped progress-bar-animated' : ($stepIndex > 3 ? 'bg-success' : 'bg-primary') }}"
                                        role="progressbar" style="width: 16.67%" aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100">
                                        @if($data->step >= 3)
                                            <a href="{{ route('step4', ['id' => base64_encode(Crypt::encryptString($data->id))]) }}">
                                                <span class="progress-bar-text">4. Upload Documents</span>
                                            </a>
                                        @else
                                            <span class="progress-bar-text">4. Upload Documents</span>
                                        @endif
                                    </div>

                                    <!-- Step 5 -->
                                    <div class="progress-bar {{ $currentStep === 'step5' ? 'progress-bar-active progress-bar-striped progress-bar-animated' : ($stepIndex > 4 ? 'bg-success' : 'bg-primary') }}"
                                        role="progressbar" style="width: 16.67%" aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100">
                                        @if($data->step >= 4)
                                            <a href="{{ route('step5', ['id' => base64_encode(Crypt::encryptString($data->id))]) }}">
                                                <span class="progress-bar-text">5. Other Information</span>
                                            </a>
                                        @else
                                            <span class="progress-bar-text">5. Other Information</span>
                                        @endif
                                    </div>

                                    <!-- Preview & Final Submit -->
                                    <div class="progress-bar {{ $currentStep === 'preview' ? 'progress-bar-active progress-bar-striped progress-bar-animated' : ($stepIndex > 5 ? 'bg-success' : 'bg-primary') }}"
                                        role="progressbar" style="width: 16.67%" aria-valuenow="16.67" aria-valuemin="0" aria-valuemax="100">
                                        @if($data->step >= 5)
                                            <a href="{{ route('preview', ['id' => base64_encode(Crypt::encryptString($data->id))]) }}">
                                                <span class="progress-bar-text">6. Preview & Final Submit</span>
                                            </a>
                                        @else
                                            <span class="progress-bar-text">6. Preview & Final Submit</span>
                                        @endif
                                    </div>




                        </div>

                        
                    
                </div>


               <!-- Add Application Status -->
            <div style="display: flex; justify-content: center; align-items: center; margin-top: 10px;">
                <p>Your Application Status: 
                    <span id="application-status" class="{{ $data->is_complete === '1' ? 'text-success' : 'text-danger' }}">
                        <b>{{ $data->is_complete === '1' ? 'Completed' : 'Not Completed' }}</b>
                    </span>
                </p>
            </div>

         