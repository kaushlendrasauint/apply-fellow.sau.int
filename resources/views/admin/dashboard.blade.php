@extends('admin.layouts.main')
@section('mid-content')
    <!-- main-content -->
    <div class="main-content horizontal-content">
        <!-- container -->
        <div class="main-container container-fluid">
            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                    <span class="main-content-title mg-b-0 mg-b-lg-1">DASHBOARD</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Rrecruitment</li>
                    </ol>
                </div>
            </div>
            <!-- /breadcrumb -->
            <!-- row -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-9 col-lg-7 col-md-6 col-sm-12">
                                            <div class="text-justified align-items-center">
                                                <h3 class="text-dark font-weight-semibold mb-2 mt-0">Hi, Welcome Back <span
                                                        class="text-primary"> SAU Recuritment </span></h3>
                                                <button class="btn btn-primary shadow">Upgrade Now</button>
                                            </div>
                                        </div>
                                        <div
                                            class="col-xl-3 col-lg-5 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
                                            <div class="chart-circle float-md-end mt-4 mt-md-0" data-value="0.85"
                                                data-thickness="8" data-color=""><canvas width="100"
                                                    height="100"></canvas>
                                                <div class="chart-circle-value circle-style">
                                                    <div class="tx-18 font-weight-semibold">85%</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
            </div>
            <!-- row closed -->

            <!-- row -->


            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <h5>Total Registration</h5>
                <table class="table">
                <thead>
                    <tr>
                      
                        <th scope="col">Total</th>    
                    </tr>
                </thead>
                <tbody>
                  
                    
                   
                      <tr>
                       
                        <td><?=DB::table('application_forms')->count() ;?></td>
                    </tr>
                  

       
                
                </tbody>
                </table>                            
                </div>
            </div>


                
                                <!-- row -->
                                 
                    



                                

                <!-- row closed -->


                <hr style="border: 0; height: 2px; background: #007bff; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); margin: 30px 0;">





                                

                </div>
                <!-- row closed -->



        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->



    <!-- Audio Modal -->

    <!-- modal -->
@endsection
