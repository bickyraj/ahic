@extends('layouts.master')

@section('style')
  <link rel="stylesheet" href="{{url('/')}}/public/jquery-ui/jquery-ui.min.css">
  <style media="screen">
  #if_acco{
    display:none;
  }
  #if_disability{
    display:none;
  }
  .error{
    padding:2px;
  color:red;
  }
  </style>
@endsection
@section('content')

  <div class="container-fluid bg-secondary py-5 mb-5">
    <div class="row">
      <div class="container">
          <h1 class="text-center"> Apply Form - Students </h1>
      </div>
    </div>
  </div>

  <section class="paddingBottom-100">

    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <form id="admissionForm">
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Course And Date Commencement</h5>
              </div>
              <div class="form-group col-md-12">
                <label > Choose A Year</label>
                <select name="intake_year" id="intake_year" class="form-control">
                  <option value="" selected >Select A Year </option>
                  @foreach ($intake_dates as $intake_date)
                    <option value="{{$intake_date->year}}">{{$intake_date->year}}</option>
                  @endforeach
                  {{-- <option  v-ntake in intakes" :key="intake.id" :value="intake.year">{{intake.year}} </option> --}}
                </select>
                <span class="error"></span>
                <br>
                <label > Choose A Date</label>
                <select name="intake_date" id="intake_date"  class="form-control">
                  <option  selected value="">Select A Date </option>
                  {{-- <option  v-ntake_date in intake_dates" :key="intake_date.id" :value="intake_date.date">{{intake_date.date}} </option> --}}
                </select>
                <span class="error"></span>
                <input type="hidden" name="intake_id" id="intake_id">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Course Description</h5>
              </div>

              <div class="form-group col-md-12">
                <label > Choose A Course</label>
                <select name="course_id" id="" class="form-control">
                  <option selected value=""> Choose A Course</option>
                    @foreach ($courses as $course)
                      <option value="{{$course->id}}"> {{$course->name}}</option>
                    @endforeach
                </select>
                <span class="error"></span>
              </div>

              <div class="form-group col-md-12">
                <label > Choose Company </label>
                <select name="company_id" id="" class="form-control">
                  <option value="" selected> Choose Company</option>
                  @foreach ($companies as $company)
                    <option value="{{$company->id}}">{{$company->company_name}}</option>
                  @endforeach
                  {{-- <option  v-ompany in agents" :key="company.id" :value="company.id"> {{company.company_name}} </option> --}}
                </select>
                <span class="error"></span>
              </div>

            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Personal Details</h5>
              </div>
              <div class="row">

                <div class="form-group col-md-3">
                  <label >Title And Family Name</label>
                  <input type="text" class="form-control" name="familyname" value="Title">
                  <span class="error"></span>

                </div>

                <div class="form-group col-md-3">
                  <label >First Name</label>
                  <input type="text" name="firstname" class="form-control" value="First">
                  <span class="error"></span>

                </div>

                <div class="form-group col-md-3">
                  <label >Middle Name</label>
                  <input type="text" name="middlename" class="form-control" value="Middle">
                  <span class="error"></span>

                </div>


                <div class="form-group col-md-3">
                  <label >DOB</label>
                  <input type="text" name="dob" value="2012-02-02" class="form-control datepicker">
                  <span class="error"></span>

                </div>

                <div class="form-group col-md-3">
                  <label >Gender</label>
                  <input type="text" name="gender" class="form-control" value="Male">
                  <span class="error"></span>

                </div>

                <div class="form-group col-md-3">
                  <label >Place Of Birth City </label>
                  <input type="text" name="birth_city" class="form-control" value="Siddhipur">
                  <span class="error"></span>

                </div>
                <div class="form-group col-md-3">
                  <label >Country </label>
                  <input type="text" name="birth_country" class="form-control" value="Nepal">
                  <span class="error"></span>

                </div>

                <div class="form-group col-md-3">
                  <label >Nationality </label>
                  <input type="text" name="nationality" class="form-control" value="Nepali">
                  <span class="error"></span>

                </div>
                <div class="form-group col-md-3">
                  <label >Passport Number </label>
                  <input type="text" name="passport_number" class="form-control" value="1234">
                  <span class="error"></span>

                </div>
                <div class="form-group col-md-3">
                  <label >Issued Date </label>
                  <input type="text" name="p_issued_date" value="2012-12-12" class="form-control datepicker">
                  <span class="error"></span>
                </div>
                <div class="form-group col-md-3">
                  <label >Expired Date </label>
                  <input type="text"  name="p_expired_date" value="2012-12-12" class="form-control datepicker">
                  <span class="error"></span>
                </div>
                <div class="form-group col-md-3">
                  <label >Place Of Issue </label>
                  <input type="text" name="place_of_issue" class="form-control" value="Pulchwok">
                  <span class="error"></span>

                </div>
                <div class="form-group col-md-3">
                  <label >Unique Stident Identifier (USI Number) </label>
                  <input type="text" name="usi_number" class="form-control" value="00101010">
                  <span class="error"></span>

                </div>
                <div class="form-group col-md-3">
                  <label >UVisa - Are You In Australia now?  </label> <br>
                  <input type="radio" value="1" name="in_aus"> YES
                  <input type="radio" value="0" name="in_aus" selected> NO
                  <br>
                  <span class="error"></span>

                </div>
                <div class="form-group col-md-3">
                  <label >Visa Category</label>
                  <input type="text"  class="form-control" name="v_category" value="API">
                  <span class="error"></span>

                </div>
                <div class="form-group col-md-3">
                  <label >Visa Expired Date</label>
                  <input type="text" name="v_exp_date" class="form-control datepicker" value="2012-06-12" >
                  <span class="error"></span>
                </div>
                <div class="form-group col-md-3">
                  <label >At which office are you going to apply ur visa</label>
                  <input type="text" name="v_office" class="form-control" value="Innology Solution">
                  <span class="error"></span>

                </div>
                <div class="form-group col-md-9">
                  <label >Are You Aboriginal or Torress Strait Islander origin?</label><br>
                  <input type="radio" name="origin" value="0" > No
                  <input type="radio" name="origin" value="1"> Yes, Aboriginal
                  <input type="radio" name="origin" value="2" > Yes, Torress Strait Islander
                  <input type="radio" name="origin" value="3" selected> Yes, both Aboriginal Torress Strait Islander
                  <br>
                  <span class="error"></span>

                </div>

              </div>

            </div>

            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Address In Australia</h5>
              </div>

              <div class="form-group col-md-3">
                <label > Number And Street </label>
                <input type="text" class="form-control" name="aus_street" value="0Street">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > City/Town </label>
                <input type="text" class="form-control" name="aus_city" value="1City">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Province/State</label>
                <input type="text" class="form-control" name="aus_province" value="2State">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Post Code </label>
                <input type="text" class="form-control" name="aus_postcode" value="1234">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Email </label>
                <input type="text" class="form-control" name="aus_email" value="a@a.com">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Country </label>
                <input type="text" class="form-control" value="Australia" name="aus_country" >
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Telephone</label>
                <input type="text" class="form-control" name="aus_telephone"  value="Telephone">
                <span class="error"></span>

              </div>

            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Address In Home Country</h5>
              </div>

              <div class="form-group col-md-3">
                <label > Number And Street </label>
                <input type="text" class="form-control" name="home_street" value="00Street">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > City/Town </label>
                <input type="text" class="form-control" name="home_city" value="11City">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Province/State</label>
                <input type="text" class="form-control" name="home_province" value="22Province">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Email</label>
                <input type="text" class="form-control" name="home_email" value="b@b.com">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Post Code </label>
                <input type="text" class="form-control" name="home_postcode" value="4321">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Country </label>
                <input type="text" class="form-control" name="home_country" value="America">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Telephone</label>
                <input type="text" class="form-control" name="home_telephone" value="987456321">
                <span class="error"></span>

              </div>

            </div>

            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Emergency Contact</h5>
              </div>

              <div class="form-group col-md-3">
                <label > Name</label>
                <input type="text" class="form-control" name="e_name" value="Econ">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Relationship</label>
                <input type="text" class="form-control" name="e_relationship" value="X">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Address</label>
                <input type="text" class="form-control" name="e_address" value="Dk">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Telephone</label>
                <input type="text" class="form-control" name="e_telephone" value="789456123">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Mobile</label>
                <input type="text" class="form-control" name="e_mobile" value="1324561">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Email</label>
                <input type="text" class="form-control" name="e_email" value="x@f.com">
                <span class="error"></span>

              </div>

            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Educational Qualifications <small> <button class="btn btn-success float-right add_edu_qua" type="button">Add</button> </small> </h5>
              </div>
              <div class="row" id="eduQua">
                <div class="col-md-12 qua" id="">
                  <div class="row">
                    <div class="col-md-12">
                      <h4> Qualification
                        <small class="float-right"> <button class="btn btn-danger remove_edu_qua"  type="button">
                          <i class="fa fa-minus-circle" aria-hidden="true"></i>
                        </button> </small>
                      </h4>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label > Qualification/Award</label>
                      <input type="text" class="form-control" name="edu[1][qualification]" value="SLC">
                    </div>
                    <div class="form-group col-md-6">
                      <label > Educational Institution</label>
                      <input type="text" class="form-control" name="edu[1][institution]" value="LA">
                    </div>
                    <div class="form-group col-md-3">
                      <label > Started Month</label>
                      <input type="text" class="form-control" name="edu[1][started_month]" value="02">
                    </div>
                    <div class="form-group col-md-3">
                      <label > Started Year</label>
                      <input type="text" class="form-control" name="edu[1][started_year]" value="2012">
                    </div>
                    <div class="form-group col-md-3">
                      <label > Completed Month</label>
                      <input type="text" class="form-control" name="edu[1][completed_month]" value="03">
                    </div>
                    <div class="form-group col-md-3">
                      <label > Completed Year</label>
                      <input type="text" class="form-control" name="edu[1][completed_year]" value="2013">
                    </div>
                  </div>
                  <hr>
                </div>

              </div>


            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Current English Level</h5>
              </div>

              <div class="form-group col">
                <label > Is English your First Language?</label> <br>
                <input type="radio" name="eng_lang"  value="1" checked> Yes
                <input type="radio" name="eng_lang" value="0"> No
                <span class="error"></span>

              </div>
              <div class="form-group col-md-6">
                <label > Please Provide evidence of your English language proficiency.</label> <br>
                <input type="radio" name="evidence" value="1"> IELTS
                <input type="radio" name="evidence" value="2" > TOEFL
                <input type="radio" name="evidence" value="3" checked> PTE
                <input type="radio" name="evidence" value="4"> CAE
                <input type="radio" name="evidence" value="5"> Other
                <br>
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Score Achieved</label>
                <input type="text" class="form-control" name="score_achieved" value="5">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Year Taken</label>
                <input type="text" name="year_taken" placeholder="eg:2012" class="form-control" value="02">
                <span class="error"></span>
                {{-- <datepicker format="yyyy" name="year_taken"  bootstrap-styling :minimumView="'year'" :maximumView="'year'" :initialView="'year'"   ></datepicker> --}}
              </div>
              <div class="form-group col-md-3">
                <label > Listening</label>
                <input type="text" class="form-control" name="listening" value="05">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Reading</label>
                <input type="text" class="form-control" name="reading" value="5">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Writing</label>
                <input type="text" class="form-control" name="writing" value="5">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Speaking</label>
                <input type="text" class="form-control" name="speaking" value="5">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Total Score</label>
                <input type="text" class="form-control" name="total_score" value="5">
                <span class="error"></span>

              </div>

            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Recognition Of Prior Learning</h5>
              </div>

              <div class="form-group col">
                <label > Based onpast education qualifications, are you going to apply cognition of Prior Learning or Based om past Australian VET qualifications, are you going to apply edit (CT) (Advanced standing) </label> <br>
                <input type="radio" name="rpl" value="1" checked> Yes
                <input type="radio" name="rpl" value="0"> No <br>
                <i> If yes, pleaserefer to CT and RPL in the International Student Handbook on oir website.</i>
                <span class="error"></span>

              </div>

            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Course and Other Fees</h5>
              </div>

              <div class="form-group col-md-3">
                <label > Application Fee </label> <br>
                <input type="text"  value="20" class="form-control" name="application_fee">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Tution Fee </label> <br>
                <input type="text"  value="20" class="form-control" name="tution_fee">
                <span class="error"></span>

              </div>

              <div class="form-group col-md-3">
                <label > Overseas Student Health Cover  </label> <br>
                <input type="text"  value="20" class="form-control" name="health_fee">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-3">
                <label > Airport Pickup Fee (Optional)  </label> <br>
                <input type="text"  value="20" class="form-control" name="airport_fee">
                <span class="error"></span>

              </div>

            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Additional Services</h5>
              </div>

              <div class="form-group col-md-3">
                <label > Do you require airport pickup? </label> <br>
                <input type="radio" name="pickup" value="0" > No
                <input type="radio"  name="pickup"  value="1"> Yes
                <br>
                <span class="error"></span>
              </div>

              <div class="form-group col-md-3">
                <label > Do you require assistance with accomodation? </label> <br>
                <input type="radio" name="acco_assistance" value="0"> No
                <input type="radio" name="acco_assistance" value="1" > Yes
                <br>
                <span class="error"></span>
                <div id="if_acco">
                  <label > Length Of Stay(week)</label>
                  <input type="text" class="form-control" name="if_acco">
                </div>
              </div>

              <div class="form-group col-md-3">
                <label > Accommodation Start Date </label>
                <input type="text" name="acco_start_date" value="" class="form-control datepicker">
                <span class="error"></span>
                {{-- <datepicker format="yyyy-MM-dd" name="acco_start_date"  bootstrap-styling  :initialView="'year'" ></datepicker> --}}

              </div>
              <div class="form-group col-md-3">
                <label > Do you consider yourself to have a disablity, impairment or a long-term health condition?</label> <br>
                <input type="radio" name="disability" value="0" > No
                <input type="radio" name="disability" value="1"> Yes
                <br>
                <span class="error"></span>
                <div class="" id="if_disability">
                  <label >If Yes </label>
                  <input type="text" class="form-control" name="if_disability" >
                </div>

              </div>

            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">Check List</h5>
              </div>

              <div class="form-group col-md-12">
                <label > Completed all sections of this application form?</label> <br>
                <input type="radio" name="form_complete" value="1"  checked> Yes
                <br>
                <span class="error"></span>

              </div>
              <div class="form-group col-md-12">
                <label > Attached/enclosed certificed copied of your passport visa?</label> <br>
                <input type="radio" name="pv_compete" value="1"  checked> Yes
                <br>
                <span class="error"></span>

              </div>
              <div class="form-group col-md-12">
                <label > Attached/enclosed certificed copies of your qualifications?</label> <br>
                <input type="radio" name="qualifications_complete" value="1"  checked> Yes
                <br>
                <span class="error"></span>

              </div>
              <div class="form-group col-md-12">
                <label > Attached/enclosed certificed copies of English language proficiency?</label> <br>
                <input type="radio" name="language_complete"  value="1" checked> Yes
                <br>
                <span class="error"></span>

              </div>
              <div class="form-group col-md-12">
                <label > Attached/enclosed any other certified documents requested in this application form?</label> <br>
                <input type="radio" name="documents_complete"  value="1" checked> Yes
                <br>
                <span class="error"></span>

              </div>
              <div class="form-group col-md-12">
                <label > Read and ticked/signed the declaration ?</label> <br>
                <input type="radio" name="all_complete" value="1"  checked> Yes
                <br>
                <span class="error"></span>

              </div>

            </div>
            <div class="row">
              <div class="col-md-12 bg-primary p-3 mb-1">
                <h5 class="">If Student Under Age</h5>
              </div>

              <div class="form-group col-md-6">
                <label > Parent Name</label> <br>
                <input type="text" name="parent_name" value="" class="form-control">
                <span class="error"></span>
              </div>
              <div class="form-group col-md-6">
                <label > Contact Detail</label> <br>
                <input type="text" name="contact_detail" value="422142" class="form-control">
                <span class="error"></span>

              </div>
              <div class="form-group col-md-6">
                <label > Date</label> <br>
                <input type="text" name="date"  value="2012-12-12" class="form-control datepicker">
                <span class="error"></span>
              </div>

            </div>
            <hr>
            <div class="row">
              <div class="col-md-12"><button class="btn btn-success add-apply-form" >
                Add</button></div>
              </div>
            </form>
          </div>
        </div>
    </div>
  </section>

@endsection


@section('script')
  <script src="{{url('/')}}/public/jquery-ui/jquery-ui.min.js"> </script>

  <script>
    $('.datepicker').datepicker({
       dateFormat: 'yy-mm-dd',
       changeMonth: true,
       changeYear: true
      });
  </script>
  <script>
  $(document).find('.form-group').each(function(index, el) {
    var span = document.createElement("span");
    span.style.color ='red';
    el.append(span);
  });
  $(document).ready(function() {

    $('#intake_year').change(function(event) {
      var year = $(this).val();
      $.post('{{url('/')}}/intake/year',{year:year},function(data){
        $('#intake_date').html(data);
      })
    });

    $('input[name=disability]').change(function(event) {
      var val = $(this).val();
      if(val == 1){
        $('#if_disability').slideDown();
      }
      else{
        $('#if_disability').slideUp();
      }
    });
    $('input[name=acco_assistance]').change(function(event) {
      var val = $(this).val();
      if(val == 1){
        $('#if_acco').slideDown();
      }
      else{
        $('#if_acco').slideUp();
      }
    });

    $('#intake_date').change(function(event) {
      var dates = JSON.parse('<?= $ids ?>');
      var year = $('#intake_year').val();
      var month = $(this).val();
      var intake = dates.filter(function(d){
        if(d.year == year){
          return d;
        }
      });
      var id;
      intake.filter(function(i){
        if(i.date == month){
          id= i.id;
        }
      })
      $('#intake_id').val(id);
      // console.log(id);
    });

    var count = 1;
$('.add_edu_qua').click(function(event) {
  event.preventDefault();
  count++;
  $.get('{{url('/')}}/addEdu/'+count,function(data){
    $('#eduQua').append(data);
  })
});

$('.remove_edu_qua').click(function(event) {
  event.preventDefault();
  var a = $(this).closest('.qua');
  a.remove();
});
$('.add-apply-form').click(function(event) {
  event.preventDefault();
  var form = $('#admissionForm')[0];
  var formData = new FormData(form);

  $.ajax({
    url : "{{url('/')}}/submit-admission",
    type: "POST",
    data : formData,
    processData: false,
    contentType: false,
    success:function(data, textStatus, jqXHR){
      console.log(data);
    },
    error: function(data, textStatus, errorThrown){
      $('.error').text(' ');
        //if fails
        var errors = data.responseJSON.errors;
        console.log(errors);
        $.each(errors, function(key,valueObj){
            $('input[name='+key+']').parent().find('.error').text(valueObj);
          });

        // errors.each(function(index, error) {
        // });

    }
});
});

  });
  </script>



@endsection
