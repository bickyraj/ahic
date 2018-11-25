<template>
  <div class="animated">
    <b-row>
      <b-col>
        <b-card class="mb-2 trump-card">
          <div class="card-title">
            <div class="caption">
              <h5><i class="fas fa-key"></i> Admission Form </h5>
            </div>
            </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <form action="">
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Course Description</h5>
                        </div>

                        <div class="form-group col-md-12">
                            <label for=""> Choose A Course</label>
                            <select name="" id="" class="form-control">
                                <option  v-for="course in courses" :key="course.id" :value="course.id"> {{course.name}} </option>
                            </select>
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Personal Details</h5>
                                 </div>
                            <div class="row">

                        <div class="form-group col-md-3">
                            <label for="">Title And Family Name</label>
                                    <input type="text" name="" class="form-control">
                            </div>
                      
                        <div class="form-group col-md-3">
                            <label for="">First Name</label>
                                    <input type="text" name="" class="form-control">
                         </div>
                      
                        <div class="form-group col-md-3">
                            <label for="">Middle Name</label>
                                    <input type="text" name="" class="form-control">
                         </div>
                         
                      
                        <div class="form-group col-md-3">
                            <label for="">DOB</label>
                                    <input type="text" name="" class="form-control">
                         </div>
                      
                        <div class="form-group col-md-3">
                            <label for="">Gender</label>
                                    <input type="text" name="" class="form-control">
                         </div>
                      
                        <div class="form-group col-md-3">
                            <label for="">Place Of Birth </label>
                                    <input type="text" name="" class="form-control">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Country </label>
                                    <input type="text" name="" class="form-control">
                         </div>

                        <div class="form-group col-md-3">
                            <label for="">Nationality </label>
                                    <input type="text" name="" class="form-control">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Passport Number </label>
                                    <input type="text" name="" class="form-control">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Issued Date </label>
                                    <input type="text" name="" class="form-control">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Expired Date </label>
                                    <input type="text" name="" class="form-control">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Place Of Issue </label>
                                    <input type="text" name="" class="form-control">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">Unique Stident Identifier (USI Number) </label>
                                    <input type="text" name="" class="form-control">
                         </div>
                        <div class="form-group col-md-3">
                            <label for="">UVisa - Are You In Australia now?  </label> <br>
                                    <input type="checkbox" value="1" > YES
                                    <input type="checkbox" value="0" > NO
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">Visa Category</label>
                                    <input type="text" name="" class="form-control">
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">Visa Expired Date</label>
                                    <input type="text" name="" class="form-control">
                         </div>
                            <div class="form-group col-md-3">
                            <label for="">At which office are you going to aplly for your visa</label>
                                    <input type="text" name="" class="form-control">
                         </div>
                            <div class="form-group col-md-9">
                            <label for="">Are You Aboriginal or Torress Strait Islander origin?</label><br>
                                <input type="checkbox" > No
                                <input type="checkbox" > Yes, Aboriginal
                                <input type="checkbox" > Yes, Torress Strait Islander
                                <input type="checkbox" > Yes, both Aboriginal Torress Strait Islander
                         </div>

                            </div>

                         </div>
                      
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Address In Australia</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Number And Street </label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> City/Town </label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Post Code </label>
                                <input type="text" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Country </label>
                                <input type="text" class="form-control" value="Australia" >
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control">
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Address In Home Country</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Number And Street </label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> City/Town </label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Province/State</label>
                                <input type="text" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Post Code </label>
                                <input type="text" class="form-control">
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Country </label>
                                <input type="text" class="form-control" value="Australia" >
                        </div>
                        
                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control">
                        </div>
                        
                       </div>
                
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Emergency Contact</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Name</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Relationship</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Address</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Telephone</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Mobile</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Email</label>
                                <input type="text" class="form-control">
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Educational Qualifications</h5>
                        </div>

                        <div class="form-group col-md-12">
                            <label for=""> Qualification/Award</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-12">
                            <label for=""> Educational Institution</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Started Month</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Started Year</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Completed Month</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Completed Year</label>
                                <input type="text" class="form-control">
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Current English Level</h5>
                        </div>

                        <div class="form-group col">
                            <label for=""> Is English your First Language?</label> <br>
                                <input type="checkbox" > Yes
                                <input type="checkbox" > No
                        </div>
                        <div class="form-group col-md-6">
                            <label for=""> Please Provide evidence of your English languafe proficiency.</label> <br>
                                         <input type="checkbox" > IELTS
                                <input type="checkbox" > TOEFL
                                <input type="checkbox" > PTE
                                <input type="checkbox" > CAE
                                <input type="checkbox" > Other
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Scores Achieved</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Year Taken</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Listening</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Reading</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Writing</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Speaking</label>
                                <input type="text" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Total Score</label>
                                <input type="text" class="form-control">
                        </div>
                        
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Recognition Of Prior Learning</h5>
                        </div>

                        <div class="form-group col">
                            <label for=""> Based onpast education qualifications, are you going to apply for Recognition of Prior Learning or Based om past Australian VET qualifications, are you going to apply for Credit (CT) (Advanced standing) </label> <br>
                                <input type="checkbox" > Yes
                                <input type="checkbox" > No <br>
                                <i> If yes, pleaserefer to CT and RPL in the International Student Handbook on oir website.</i>
                        </div>
                      
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Course and Other Fees</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Application Fee </label> <br>
                               <input type="text" disabled value="$200" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Tution Fee </label> <br>
                               <input type="text"  value="$200" class="form-control">
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Overseas Student Health Cover  </label> <br>
                               <input type="text"  value="$200" class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Airport Pickup Fee (Optional)  </label> <br>
                               <input type="text"  value="$200" class="form-control">
                        </div>
                      
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Additional Services</h5>
                        </div>

                        <div class="form-group col-md-3">
                            <label for=""> Do you require airport pickup? </label> <br>
                               <input type="checkbox" > No
                               <input type="checkbox" > Yes
                                    <i> If yes, please fill a seperate form</i>
                        </div> 

                        <div class="form-group col-md-3">
                            <label for=""> Do you require assistance with accomodation? </label> <br>
                               <input type="checkbox" > No
                               <input type="checkbox" > Yes
                               <label for=""> Length Of Stay(week)</label>
                               <input type="text" class="form-control">
                                    <i> If yes, please fill a seperate form</i>
                        </div> 

                        <div class="form-group col-md-3">
                            <label for=""> Accommodation Start Date </label> <br>
                               <input type="text"  class="form-control">
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Do you consider yourself to have a disablity, impairment or a long-term health condition?</label> <br>
                               <input type="checkbox"> Yes
                               <input type="checkbox"> No
                               <labeL> IF YES</labeL> 
                               <input type="text" class="form-control">   
                        </div>
                      
                       </div>
                       <div class="row">
                            <div class="col-md-12 bg-primary p-3 mb-1">
                            <h5 class="">Check List</h5>
                        </div>

                        <div class="form-group col-md-6">
                            <label for=""> Completed all sections of this application form?</label> <br>
                               <input type="checkbox" > Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copied of your passport visa ?</label> <br>
                               <input type="checkbox" > Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copies of your qualifications ?</label> <br>
                               <input type="checkbox" > Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed certificed copies of English languafe proficiency ?</label> <br>
                               <input type="checkbox" > Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Attached/enclosed any other certified documents requested in this application forn ?</label> <br>
                               <input type="checkbox" > Yes
                        </div> 
                        <div class="form-group col-md-6">
                            <label for=""> Read and ticked/signed the declaration ?</label> <br>
                               <input type="checkbox" > Yes
                        </div> 

                        <div class="form-group col-md-3">
                            <label for=""> Do you require assistance with accomodation? </label> <br>
                               <input type="checkbox" > No
                               <input type="checkbox" > Yes <br>
                               <label for=""> Length Of Stay(week)</label>
                               <input type="text" class="form-control">
                                    <i> If yes, please fill a seperate form</i>
                        </div> 

                        
                        <div class="form-group col-md-3">
                            <label for=""> Do you consider yourself to have a disablity, impairment or a long-term health condition?</label> <br>
                               <input type="checkbox"> Yes
                               <input type="checkbox"> No <br>
                               <labeL> IF YES</labeL> 
                               <input type="text" class="form-control">   
                        </div>
                        <div class="form-group col-md-3">
                            <label for=""> Accommodation Start Date </label> <br>
                               <input type="text"  class="form-control">
                        </div>
                      
                       </div>
                    </form>
                </div>
            </div>
        </div>                
          

                

         
        </b-card>
      </b-col>
    </b-row>



  </div>
</template>

<script>
  export default {
      data() {
          return{
               courses:'', 
         }
      },
      created(){
          this.fetchCourses();
      },
      methods:{
           fetchCourses() {
        let vm = this;
        let self = this;
        let url = self.$root.baseUrl + '/api/admin/courses';
        axios.get(url)
          .then(function(response) {
            vm.courses = response.data.data;
            vm.loading = false;
          })
          .catch(function(error) {
            console.log(error);
            vm.loading = false;
          });

      },
      }

  }
</script>