@extends('admin.layouts.main')

@section('mid-content')


    <!-- main-content -->
    <div class="main-content horizontal-content">

        <!-- container -->
        <div class="main-container container">

            <!-- breadcrumb -->
            <div class="breadcrumb-header justify-content-between">
                <div class="left-content">
                <span class="main-content-title mg-b-0 mg-b-lg-1">Admissions</span>
                </div>
                <div class="justify-content-center mt-2">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item tx-15"><a href="javascript:void(0);">Admissions</a></li>
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
                               @foreach($educational_docs as $key => $educational_doc)
                                 {{$key+1}} : <a href="http://admissions.sau.ac.in/public/uploads/{{$educational_doc->name}}">{{$educational_doc->name}}</a> <br>
                               @endforeach
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">First</th>
                                        <th scope="col">Last</th>
                                     
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>id</td>
                                        <td>{{$data->id}}</td>
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>step</td>
                                        <td>{{$data->step}}</td>
                                      </tr>

                                      <tr>
                                        <th scope="row">3</th>
                                        <td>is_complate</td>
                                        <td>{{$data->is_complate}}</td>
                                      </tr>

                                      <tr>
                                        <th scope="row">4</th>
                                        <td>saarc</td>
                                        <td>{{$data->saarc}}</td>
                                      </tr>
	 	 			   	   	
                                      <tr>
                                        <th scope="row">7</th>
                                        <td>programme</td>
                                        <td>{{$data->programme}}</td>
                                      </tr>
                                     	
                                    <tr><th scope="row">  88		 	       </th>
                                        <td>candidate_signatures</td>
                                        <td><a style="color:blue" target="_blank" href="http://admissions.sau.ac.in/public/uploads/{{$data->candidate_signatures}}">candidate_signatures</a></td>
                                    </tr>   	   	   	

                                    <tr><th scope="row">  89		 	       </th>
                                        <td>short_cv</td>
                                        <td><a style="color:blue" target="_blank" href="http://admissions.sau.ac.in/public/uploads/{{$data->short_cv}}">short_cv</a></td>
                                    </tr>   

                                    <tr><th scope="row">  77		 	       </th>
                                        <td>educational_degrees</td>
                                        <td><a style="color:blue" target="_blank" href="http://admissions.sau.ac.in/public/uploads/{{$data->educational_degrees}}">educational_degrees</a></td>
                                    </tr>   	   	
                                    <tr><th scope="row">  78		 	       </th>
                                        <td>national_fellowship_offer_letter</td>
                                        <td><a style="color:blue" target="_blank" href="http://admissions.sau.ac.in/public/uploads/{{$data->national_fellowship_offer_letter}}">national_fellowship_offer_letter</a></td>
                                    </tr>   		   	   	
                                    <tr><th scope="row">  79		 	       </th>
                                        <td>government_funding_offer_letter</td>
                                        <td><a style="color:blue" target="_blank" href="http://admissions.sau.ac.in/public/uploads/{{$data->government_funding_offer_letter}}">government_funding_offer_letter</a></td>
                                    </tr>   	
                                    <tr><th scope="row">  81</th>
                                        <td>photo_identity_card</td>
                                        <td><a style="color:blue" target="_blank" href="http://admissions.sau.ac.in/public/uploads/{{$data->photo_identity_card}}">photo_identity_card</a></td>
                                    </tr>   		   	   	
                                    <tr><th scope="row">  82</th>
                                        <td>passport</td>
                                        <td><a style="color:blue" target="_blank" href="http://admissions.sau.ac.in/public/uploads/{{$data->passport}}">passport</a></td>
                                    </tr>  


 	 		 	 			   	   		 		 	 			   	   	
                                      <tr>
                                        <th scope="row">8	</th> 
                                        <td>btech_programmes</td>
                                        <td>{{$data->btech_programmes}}</td>
                                      </tr>  
                                            
                                            

                                      <tr>
                                        <th scope="row">9		</th> 
                                      <td>btech_programmes2</td>
                                      <td>{{$data->btech_programmes2}}</td>
                                    </tr>   	 		 	 			   	   	
                                    
                                    <tr>
                                     <th scope="row">10	</th> 
                                      <td>mtech_programmes</td>
                                      <td>{{$data->mtech_programmes}}</td>
                                    </tr>  	 	 		 	 			   	   	
                                    
                                    <tr>
                                        <th scope="row"> 11	</th> 
                                      <td>mtech_programmes2</td>
                                      <td>{{$data->mtech_programmes2}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 12		</th> 
                                      <td>master_programmes</td>
                                      <td>{{$data->master_programmes}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  13		</th> 
                                      <td>Phd_programmes</td>
                                      <td>{{$data->Phd_programmes}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 14		</th> 
                                      <td>Phd_programmes_saarc</td>
                                      <td>{{$data->Phd_programmes_saarc}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  15		 </th> 
                                      <td>nationality</td>
                                      <td>{{$data->nationality}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">16</th> 
                                      <td>name</td>
                                      <td>{{$data->name}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 17		</th> 
                                      <td>email</td>
                                      <td>{{$data->email}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 18		</th> 
                                      <td>mobile</td>
                                      <td>{{$data->mobile}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  19		 	 </th> 
                                      <td>dob</td>
                                      <td>{{$data->dob}}</td>
                                    </tr>  		 	 			   	   	
                                    <tr>
                                        <th scope="row">  20		 </th> 
                                      <td>father_name</td>
                                      <td>{{$data->father_name}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 21		 	</th> 
                                      <td>gender</td>
                                      <td>{{$data->gender}}</td>
                                    </tr>   		 	 			   	   	
                                    <tr>
                                        <th scope="row">  22		 </th> 
                                      <td>address</td>
                                      <td>{{$data->address}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  23		</th> 
                                      <td>city</td>
                                      <td>{{$data->city}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  24	</th> 
                                      <td>pin_code</td>
                                      <td>{{$data->pin_code}}</td>
                                    </tr>  	 	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 25		</th> 
                                      <td>state</td>
                                      <td>{{$data->state}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 26		 	</th> 
                                      <td>country</td>
                                      <td>{{$data->country}}</td>
                                    </tr>   		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 27		 </th> 
                                      <td>permanent</td>
                                      <td>{{$data->permanent}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  28		</th> 
                                      <td>p_address</td>
                                      <td>{{$data->p_address}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 29		 	</th> 
                                      <td>p_city</td>
                                      <td>{{$data->p_city}}</td>
                                    </tr>   		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 30		 </th> 
                                      <td>p_state</td>
                                      <td>{{$data->p_state}}</td>
                                    </tr>  	 		 
                                    
                                    
                                   
                                    <tr>
                                        <th scope="row"> 31		</th> 
                                      <td>s_passing</td>
                                      <td>{{$data->s_passing}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 32		</th> 
                                      <td>p_country</td>
                                      <td>{{$data->p_country}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 33		</th> 
                                      <td>p_pin_code</td>
                                       <td>{{$data->p_pin_code}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  34		 </th> 
                                      <td>s_cgpa</td>
                                      <td>{{$data->s_cgpa}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 35		</th> 
                                      <td>s_college_name</td>
                                      <td>{{$data->s_college_name}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 36		</th> 
                                      <td>s_board_name</td>
                                      <td>{{$data->s_board_name}}</td>
                                    </tr>   	 

                                    <tr>
                                        <th scope="row"> 37		</th> 
                                      <td>s_subject</td>
                                      <td>{{$data->p_stas_subjectte}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 38		 </th> 
                                      <td>b_title</td>
                                      <td>{{$data->b_title}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 39		 </th> 
                                      <td>b_degree_duration</td>
                                      <td>{{$data->b_degree_duration}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 40		</th> 
                                      <td>b_examination</td>
                                      <td>{{$data->b_examination}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 41		</th> 
                                      <td>b_gpa</td>
                                      <td>{{$data->b_gpa}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 42		 	 </th> 
                                      <td>b_passing</td>
                                      <td>{{$data->b_passing}}</td>
                                    </tr>  		 	 			   	   	
                                    <tr>
                                        <th scope="row">  43		 	 	</th> 
                                      <td>b_cgpa</td>
                                      <td>{{$data->b_cgpa}}</td>
                                    </tr>  	 	 			   	   	
                                    <tr>
                                        <th scope="row">  44		 </th> 
                                      <td>b_college</td>
                                      <td>{{$data->b_college}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 45		 </th> 
                                      <td>b_board</td>
                                      <td>{{$data->b_board}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 46	</th> 
                                      <td>b_studied</td>
                                      <td>{{$data->b_studied}}</td>
                                    </tr>  	 	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  47	</th> 
                                      <td>b_evaluation</td>
                                      <td>{{$data->b_evaluation}}</td>
                                    </tr>  	 	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 48		</th> 
                                      <td>jee_score</td>
                                      <td>{{$data->jee_score}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 49		</th> 
                                      <td>gate_score</td>
                                      <td>{{$data->gate_score}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 50		 	</th> 
                                      <td>m_title</td>
                                      <td>{{$data->m_title}}</td>
                                    </tr>   		 	 			   	   	
                                    <tr>
                                        <th scope="row">  51		 </th> 
                                      <td>m_passing</td>
                                      <td>{{$data->m_passing}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 52		 </th> 
                                      <td>m_cgpa</td>
                                      <td>{{$data->m_cgpa}}</td>
                                    </tr>  	 		 	 			   	   	
                                    <tr>
                                        <th scope="row">  53		</th> 
                                      <td>m_college</td>
                                      <td>{{$data->m_college}}</td>
                                    </tr>   	 		 	 			   	   	
                                    <tr>
                                        <th scope="row"> 54		 	</th> 
                                      <td>m_board</td>
                                      <td>{{$data->m_board}}</td>
                                    </tr>   
                                    <tr><th scope="row">55	</th>
                                        <td>m_studied</td>
                                        <td>{{$data->m_studied}}</td>
                                    </tr>		 	 	

                                    <tr><th scope="row">  56		 	        </th>
                                        <td>m_degree_duration</td>
                                        < <td>{{$data->m_degree_duration}}</td>
                                    </tr>   	

                                    <tr><th scope="row">  57		 	        </th>
                                        <td>m_evaluation</td>
                                        <td>{{$data->m_evaluation}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  58		 	     </th>
                                        <td>master_degree</td>
                                        <td>{{$data->master_degree}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  59		 	       </th>
                                        <td>m_examination</td>
                                        <td>{{$data->m_examination}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  60		 	       </th>
                                        <td>m_gpa</td>
                                        <td>{{$data->m_gpa}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  61		 	       </th>
                                        <td>fellowship</td>
                                        <td>{{$data->fellowship}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  62		 	       </th>
                                        <td>bachelor_degree</td>
                                        <td>{{$data->bachelor_degree}}</td>
                                    </tr>   	

                                    <tr><th scope="row">  63		 	       </th>
                                        <td>A_fellowship_name</td>
                                        <td>{{$data->A_fellowship_name}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  64		 	       </th>
                                        <td>A_fellowship_country</td>
                                        <td>{{$data->A_fellowship_country}}</td>
                                    </tr>   	
                                    <tr>
                                        <th scope="row">65</th>
                                        <td>A_fellowship_entrance</td>
                                        <td>{{$data->A_fellowship_entrance}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  66		 	       </th>
                                        <td>B_funding_agency</td>
                                        <td>{{$data->B_funding_agency}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  67		 	       </th>
                                        <td>B_funding_agency_name</td>
                                        <td>{{$data->B_funding_agency_name}}</td>
                                    </tr>   	


                                    <tr><th scope="row">  68		 	       </th>
                                        <td>B_funding_years_duration</td>
                                        <td>{{$data->B_funding_years_duration}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  69		 	       </th>
                                        <td>C_employment_country</td>
                                        <td>{{$data->C_employment_country}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  70		 	       </th>
                                        <td>C_organization_name</td>
                                        <td>{{$data->C_organization_name}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  71		 	       </th>
                                        <td>C_organization_nature</td>
                                        <td>{{$data->C_organization_nature}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  72		 	       </th>
                                        <td>C_current_organization_years</td>
                                        <td>{{$data->C_current_organization_years}}</td>
                                    </tr>   	   	
                                    <tr><th scope="row">  73		 	       </th>
                                        <td>C_current_organization_month</td>
                                        <td>{{$data->C_current_organization_month}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  74		 	       </th>
                                        <td>organization_leave</td>
                                        <td>{{$data->organization_leave}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  75		 	       </th>
                                        <td>hostel_facility</td>
                                        <td>{{$data->hostel_facility}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  76	</th>
                                        <td>know_about</td>
                                        <td>{{$data->know_about}}</td>
                                    </tr>   	

 	
                                    <tr><th scope="row">  83</th>
                                        <td>issuing_authority</td>
                                        <td>{{$data->issuing_authority}}</td>
                                    </tr>   	   	
                                    <tr><th scope="row">  84</th>
                                        <td>poi</td>
                                        <td>{{$data->poi}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  85</th>
                                        <td>doe</td>
                                        <td>{{$data->doe}}</td>
                                    </tr>   		
                                   
                                    <tr>
                                        <th scope="row">  86	</th>
                                        <td>doi	</td>
                                        <td>{{$data->doi}}</td>
                                    </tr>

                                  	
                                    <tr><th scope="row">  90		 	       </th>
                                        <td>created_at</td>
                                        <td>{{$data->created_at}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  91		 	       </th>
                                        <td>updated_at</td>
                                        <td>{{$data->updated_at}}</td>
                                    </tr>   		
                                    <tr><th scope="row">  92		 	       </th>
                                        <td>b_country</td>
                                        <td>{{$data->b_country}}</td>
                                    </tr>   	
                                    <tr><th scope="row">  93		 	       </th>
                                        <td>s_country</td>
                                        <td>{{$data->s_country}}</td>
                                    </tr>   	
                                    
                                     
                                    </tbody>
                                  </table>









                           
                               
                                    
                            </div>

                     </div>

                        
                    </div>


                </div>
            </div>
            <!-- /row -->

        </div>
        <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
