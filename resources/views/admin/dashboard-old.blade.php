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
                        <th scope="col">Paid</th>
                        <th scope="col">Unpaid</th>
                        <th scope="col">Total</th>    
                    </tr>
                </thead>
                <tbody>
                  
                    
                   
                      <tr>
                        <td><?=DB::table('application_forms')->where('paid', 1)->count();?> </td>
                        <td><?=DB::table('application_forms')->where('paid','!=' ,1)->count();?> </td>
                        <td><?=DB::table('application_forms')->count() ;?></td>
                    </tr>
                  

       
                
                </tbody>
                </table>                            
                </div>
            </div>

                        <!-- row -->
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Teaching</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Paid</th>
                                            <th scope="col">Unpaid</th>
                                            <th scope="col">Total</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        
                                        <th scope="row">1</th>
                                            <td>Assistant Professor</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('paid', 1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('paid','!=' ,1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('paid', 1)->count() + DB::table('application_forms')->where('position', 'Assistant Professor')->where('paid','!=' ,1)->count();?></td>
                                        </tr>
                                        <th scope="row">2</th>
                                            <td>Associate Professor</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('paid', 1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('paid','!=' ,1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('paid', 1)->count() + DB::table('application_forms')->where('position', 'Associate Professor')->where('paid','!=' ,1)->count();?></td>
                                        </tr>
                                        <th scope="row">3</th>
                                            <td>Professor</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Professor')->where('paid', 1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Professor')->where('paid','!=' ,1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Professor')->where('paid', 1)->count() + DB::table('application_forms')->where('position', 'Professor')->where('paid','!=' ,1)->count();?></td>
                                        </tr>

                           
                                    
                                        <th scope="row">Total</th>
                                            <td></td> 
                                            
                                            <td><b><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('paid', 1)->count()
                                                     + DB::table('application_forms')->where('position', 'Associate Professor')->where('paid', 1)->count()
                                                     + DB::table('application_forms')->where('position', 'Professor')->where('paid', 1)->count();;?></b>
                                            </td>

                                            <td><b><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('paid', '!=' ,1)->count()
                                                     + DB::table('application_forms')->where('position', 'Associate Professor')->where('paid','!=' , 1)->count()
                                                     + DB::table('application_forms')->where('position', 'Professor')->where('paid', '!=' ,1)->count();;?></b>
                                            </td>


                                            <td><b><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('paid', 1)->count()
                                                     + DB::table('application_forms')->where('position', 'Associate Professor')->where('paid', 1)->count()
                                                     + DB::table('application_forms')->where('position', 'Professor')->where('paid', 1)->count() 
                                                     + DB::table('application_forms')->where('position', 'Assistant Professor')->where('paid', '!=' ,1)->count()
                                                     + DB::table('application_forms')->where('position', 'Associate Professor')->where('paid','!=' , 1)->count()
                                                     + DB::table('application_forms')->where('position', 'Professor')->where('paid', '!=' ,1)->count();?></b>
                                            </td>
                                        </tr>
                                    </tbody>
                                    </table>                            
                                    </div>
                                </div>
                <!-- row closed -->



                
                                <!-- row -->
                                 
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <h5>Total Position in Department wise (Paid)</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Chemistry</th>
                                            <th scope="col">Climate Change</th>               
                                            <th scope="col">Electronics Engineering</th>
                                            <th scope="col">Department of Computer Science</th>
                                            <th scope="col">Department of Mathematics</th>
                                            <th scope="col">Department of International Relations</th>
                                            <th scope="col">Department of Sociology</th>
                                            <th scope="col">English</th>
                                            <th scope="col">Faculty of Arts and Design</th>
                                            <th scope="col">Faculty of Economics</th>
                                            <th scope="col">Faculty of Mathematics &amp; Computer Science</th>
                                            <th scope="col">Faculty of Legal Studies</th>
                                            <th scope="col">Faculty of Life Sciences & Biotechnology</th>
                                            <th scope="col">Faculty of Management</th>                              
                                            <th scope="col">Physics</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Assistant Professor	</td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Chemistry')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Climate Change')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Electronics Engineering')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Department of Computer Science')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Department of Mathematics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Department of International Relations')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Department of Sociology')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'English')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Arts and Design')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Economics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Mathematics &amp; Computer Science')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Legal Studies')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Life Sciences & Biotechnology')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Management')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Physics')->where('paid', 1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Associate Professor		</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Chemistry')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Climate Change')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Electronics Engineering')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Department of Computer Science')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Department of Mathematics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Department of International Relations')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Department of Sociology')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'English')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Arts and Design')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Economics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Mathematics &amp; Computer Science')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Legal Studies')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Life Sciences & Biotechnology')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Management')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Physics')->where('paid', 1)->count();?> </td>

                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Professor</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Chemistry')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Climate Change')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Electronics Engineering')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Department of Computer Science')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Department of Mathematics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Department of International Relations')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Department of Sociology')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'English')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Arts and Design')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Economics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Mathematics &amp; Computer Science')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Legal Studies')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Life Sciences & Biotechnology')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Management')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Physics')->where('paid', 1)->count();?> </td>

                                        </tr>
                                       
                                    </tbody>
                                   </table>
                                  </div>
                                </div>




                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <h5>Total Position in Department wise (UnPaid)</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Chemistry</th>
                                            <th scope="col">Climate Change</th>               
                                            <th scope="col">Electronics Engineering</th>
                                            <th scope="col">Department of Computer Science</th>
                                            <th scope="col">Department of Mathematics</th>
                                            <th scope="col">Department of International Relations</th>
                                            <th scope="col">Department of Sociology</th>
                                            <th scope="col">English</th>
                                            <th scope="col">Faculty of Arts and Design</th>
                                            <th scope="col">Faculty of Economics</th>
                                            <th scope="col">Faculty of Mathematics &amp; Computer Science</th>
                                            <th scope="col">Faculty of Legal Studies</th>
                                            <th scope="col">Faculty of Life Sciences & Biotechnology</th>
                                            <th scope="col">Faculty of Management</th>                              
                                            <th scope="col">Physics</th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Assistant Professor	</td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Chemistry')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Climate Change')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Electronics Engineering')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Department of Computer Science')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Department of Mathematics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Department of International Relations')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Department of Sociology')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'English')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Arts and Design')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Economics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Mathematics &amp; Computer Science')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Legal Studies')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Life Sciences & Biotechnology')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Faculty of Management')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Professor')->where('faculty_department', 'Physics')->where('paid', '!=',1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Associate Professor		</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Chemistry')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Climate Change')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Electronics Engineering')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Department of Computer Science')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Department of Mathematics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Department of International Relations')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Department of Sociology')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'English')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Arts and Design')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Economics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Mathematics &amp; Computer Science')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Legal Studies')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Life Sciences & Biotechnology')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Faculty of Management')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Associate Professor')->where('faculty_department', 'Physics')->where('paid', '!=',1)->count();?> </td>

                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Professor</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Chemistry')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Climate Change')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Electronics Engineering')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Department of Computer Science')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Department of Mathematics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Department of International Relations')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Department of Sociology')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'English')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Arts and Design')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Economics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Mathematics &amp; Computer Science')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Legal Studies')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Life Sciences & Biotechnology')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Faculty of Management')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Professor')->where('faculty_department', 'Physics')->where('paid', '!=',1)->count();?> </td>

                                        </tr>
                                       
                                    </tbody>
                                   </table>
                                  </div>
                                </div>


                <!-- row closed -->


                <hr style="border: 0; height: 2px; background: #007bff; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); margin: 30px 0;">





                <!-- row -->
                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Non-Teaching</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Paid</th>
                                            <th scope="col">Unpaid</th>
                                            <th scope="col">Total</th>    
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                                        
                                        <th scope="row">1</th>
                                            <td>Assistant</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant')->where('paid', 1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant')->where('paid','!=' ,1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant')->where('paid', 1)->count() + DB::table('application_forms')->where('position', 'Assistant')->where('paid','!=' ,1)->count();?></td>
                                        </tr>
                                        <th scope="row">2</th>
                                            <td>Senior Assistant</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('paid', 1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('paid','!=' ,1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('paid', 1)->count() + DB::table('application_forms')->where('position', 'Senior Assistant')->where('paid','!=' ,1)->count();?></td>
                                        </tr>
                                        <th scope="row">3</th>
                                            <td> Assistant Director</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('paid', 1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('paid','!=' ,1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('paid', 1)->count() + DB::table('application_forms')->where('position', 'Assistant Director')->where('paid','!=' ,1)->count();?></td>
                                        </tr>
                                        <th scope="row">4</th>
                                            <td> Deputy Director</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('paid', 1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('paid','!=' ,1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('paid', 1)->count() + DB::table('application_forms')->where('position', 'Deputy Director')->where('paid','!=' ,1)->count();?></td>
                                        </tr>
                                        <th scope="row">5</th>
                                            <td> Director</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Director')->where('paid', 1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Director')->where('paid','!=' ,1)->count();?> </td>
                                            <td><?=DB::table('application_forms')->where('position', 'Director')->where('paid', 1)->count() + DB::table('application_forms')->where('position', 'Director')->where('paid','!=' ,1)->count();?></td>
                                        </tr>
                                                                            
                                        <th scope="row">Total</th>
                                            <td></td> 
                                            <td><b><?=DB::table('application_forms')->where('position', 'Assistant')->where('paid', 1)->count()
                                            + DB::table('application_forms')->where('position', 'Senior Assistant')->where('paid', 1)->count()
                                            + DB::table('application_forms')->where('position', 'Assistant Director')->where('paid', 1)->count()
                                            + DB::table('application_forms')->where('position', 'Deputy Director')->where('paid', 1)->count()
                                            + DB::table('application_forms')->where('position', 'Director')->where('paid', 1)->count()
                                            ;?></b></td>

                                             <td><b><?=DB::table('application_forms')->where('position', 'Assistant')->where('paid','!=' , 1)->count()
                                            + DB::table('application_forms')->where('position', 'Senior Assistant')->where('paid', '!=' ,1)->count()
                                            + DB::table('application_forms')->where('position', 'Assistant Director')->where('paid', '!=' ,1)->count()
                                            + DB::table('application_forms')->where('position', 'Deputy Director')->where('paid', '!=' ,1)->count()
                                            + DB::table('application_forms')->where('position', 'Director')->where('paid', '!=' ,1)->count()
                                            ;?></b></td>

                                        <td><b><?=
                                              DB::table('application_forms')->where('position', 'Assistant')->where('paid', 1)->count()
                                            + DB::table('application_forms')->where('position', 'Senior Assistant')->where('paid', 1)->count()
                                            + DB::table('application_forms')->where('position', 'Assistant Director')->where('paid', 1)->count()
                                            + DB::table('application_forms')->where('position', 'Deputy Director')->where('paid', 1)->count()
                                            + DB::table('application_forms')->where('position', 'Director')->where('paid', 1)->count()
                                            +  DB::table('application_forms')->where('position', 'Assistant')->where('paid','!=' , 1)->count()
                                            + DB::table('application_forms')->where('position', 'Senior Assistant')->where('paid', '!=' ,1)->count()
                                            + DB::table('application_forms')->where('position', 'Assistant Director')->where('paid', '!=' ,1)->count()
                                            + DB::table('application_forms')->where('position', 'Deputy Director')->where('paid', '!=' ,1)->count()
                                            + DB::table('application_forms')->where('position', 'Director')->where('paid', '!=' ,1)->count()
                                            ;?></b></td>


                                        </tr>
                                    </tbody>
                                    </table>                            
                                    </div>
                                </div>
                <!-- row closed -->




                                <!-- row -->

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Total Position in Department wise (Paid)</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Academics</th>
                                            <th scope="col">Admissions</th>
                                            <th scope="col">Administration</th>
                                            <th scope="col">Accounts</th>
                                            <th scope="col">Corporate</th>
                                            <th scope="col">Examinations</th>
                                            <th scope="col">ICT</th>
                                            <th scope="col">Management</th>
                                            <th scope="col">Media & PR</th>
                                            <th scope="col">Training & Placement</th>
                                            <th scope="col">Virtual Campus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Assistant</td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Academics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Admissions')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Administration')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Accounts')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Corporate')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Examinations')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'ICT')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Management')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Media & PR')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Training & Placement')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Virtual Campus')->where('paid', 1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Senior Assistant	</td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Academics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Admissions')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Administration')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Accounts')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Corporate')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Examinations')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'ICT')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Management')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Media & PR')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Training & Placement')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Virtual Campus')->where('paid', 1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Assistant Director	</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Academics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Admissions')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Administration')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Accounts')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Corporate')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Examinations')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'ICT')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Management')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Media & PR')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Training & Placement')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Virtual Campus')->where('paid', 1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Deputy Director	</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Academics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Admissions')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Administration')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Accounts')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Corporate')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Examinations')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'ICT')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Management')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Media & PR')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Training & Placement')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Virtual Campus')->where('paid', 1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Director</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Academics')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Admissions')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Administration')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Accounts')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Corporate')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Examinations')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'ICT')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Management')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Media & PR')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Training & Placement')->where('paid', 1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Virtual Campus')->where('paid', 1)->count();?> </td>
                                        </tr>
                                       
                                    </tbody>
                                   </table>
                                  </div>
                                </div>





                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <h5>Total Position in Department wise (Unpaid)</h5>
                                    <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Academics</th>
                                            <th scope="col">Admissions</th>
                                            <th scope="col">Administration</th>
                                            <th scope="col">Accounts</th>
                                            <th scope="col">Corporate</th>
                                            <th scope="col">Examinations</th>
                                            <th scope="col">ICT</th>
                                            <th scope="col">Management</th>
                                            <th scope="col">Media & PR</th>
                                            <th scope="col">Training & Placement</th>
                                            <th scope="col">Virtual Campus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Assistant</td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Academics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Admissions')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Administration')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Accounts')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Corporate')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Examinations')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'ICT')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Management')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Media & PR')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Training & Placement')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant')->where('faculty_department', 'Virtual Campus')->where('paid', '!=',1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Senior Assistant	</td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Academics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Admissions')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Administration')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Accounts')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Corporate')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Examinations')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'ICT')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Management')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Media & PR')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Training & Placement')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Senior Assistant')->where('faculty_department', 'Virtual Campus')->where('paid', '!=',1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Assistant Director	</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Academics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Admissions')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Administration')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Accounts')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Corporate')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Examinations')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'ICT')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Management')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Media & PR')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Training & Placement')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Assistant Director')->where('faculty_department', 'Virtual Campus')->where('paid', '!=',1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4</th>
                                            <td>Deputy Director	</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Academics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Admissions')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Administration')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Accounts')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Corporate')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Examinations')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'ICT')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Management')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Media & PR')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Training & Placement')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Deputy Director')->where('faculty_department', 'Virtual Campus')->where('paid', '!=',1)->count();?> </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">5</th>
                                            <td>Director</td>
                                            <td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Academics')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Admissions')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Administration')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Accounts')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Corporate')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Examinations')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'ICT')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Management')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Media & PR')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Training & Placement')->where('paid', '!=',1)->count();?> </td>
<td><?=DB::table('application_forms')->where('position', 'Director')->where('faculty_department', 'Virtual Campus')->where('paid', '!=',1)->count();?> </td>
                                        </tr>
                                       
                                    </tbody>
                                   </table>
                                  </div>
                                </div>


                <!-- row closed -->

                </div>
                <!-- row closed -->



        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->



    <!-- Audio Modal -->

    <!-- modal -->
@endsection
