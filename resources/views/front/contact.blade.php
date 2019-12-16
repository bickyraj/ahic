@extends('layouts.master')

@section('style')
<style media="screen">
  .py-5.bg-cover{
    background:url('{{asset('/')}}public/images/pages/{{$banner}}') no-repeat;
    background-position:center;
    background-size:cover;
  }
</style>
@endsection
@section('content')



    <div class="site-search">
     <div class="site-search__close bg-black-0_8"></div>
     <form class="form-site-search" action="#" method="POST">
      <div class="input-group">
        <input type="text" placeholder="Search" class="form-control py-3 border-white" required="">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit"><i class="ti-search"></i></button>
        </div>
      </div>
     </form>
    </div> <!-- END site-search-->




  <div class="py-5 bg-cover" data-dark-overlay="6" >
    <div class="container">
      <h2 class="text-white">
        Contact
      </h2>
    </div>
  </div>



     <div class="padding-y-30 shadow-v2 position-relative">
       <div class="container">
         <div class="row">

           <div class="col-lg-4 col-md-6 mt-4">
             <div class="media">
               <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-mobile"></i></span>
               <div class="media-body ml-3">
                <h5 class="mb-0">
@if (isset($contact->phone))
  {{$contact->phone}}
@endif
                </h5>
                @if (isset($contact->call_time))
                  <p> Call Us ({{$contact->call_time}}) </p>
                @endif
               </div>
             </div>
           </div>

           <div class="col-lg-4 col-md-6 mt-4">
             <div class="media">
               <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-email"></i></span>
               <div class="media-body ml-3">
                 @if (isset($contact->email))
                   <a href="mailto:{{$contact->email}}" class="h5">{{$contact->email}}</a>
                 @endif

               </div>
             </div>
           </div>

           <div class="col-lg-4 col-md-6 mt-4">
             <div class="media">
               <span class="iconbox iconbox-md bg-primary text-white"><i class="ti-location-pin"></i></span>
               <div class="media-body ml-3">
                <h5 class="mb-0">
                  @if (isset($contact->address))
                    {{$contact->address}}
                  @endif
                  </h5>
                <p>
                  @if (isset($contact->street_name))
                    {{$contact->street_name}}
                  @endif
                </p>
               </div>
             </div>
           </div>

         </div>
       </div>
     </div>


     <div id="ex1" class="modal">
       <h2> Thank You for messaging.</h2>
       <p> That felt good.</p>
     </div>


    <section class="padding-y-30 bg-light-v2">
    <div class="container">
      <div class="row">
       <div class="col-12 text-center mb-5">
          <h2>
            Send Message
          </h2>
          <div class="width-4rem height-4 bg-primary my-2 mx-auto rounded"></div>
        </div>
        <div class="col-12 text-center">
          <form class="card p-4 p-md-5 shadow-v1 message_form">
            <p class="lead mt-2">
              @if (isset($contact->message))
                {{$contact->message}}
              @endif
            </p>
            <div class="row mt-5 mx-0">
              <div class="col-md-4 mb-4">
                <input type="text" class="form-control name" name="name" placeholder="Name"  >
                <p class="error text-danger text-left"></p>

              </div>
              <div class="col-md-4 mb-4">
                <input type="email" class="form-control email" name="email" placeholder="Email">
                <p class="error text-danger text-left"></p>

              </div>
              <div class="col-md-4 mb-4">
                <input type="text" class="form-control contact" name="contact"  placeholder="Phone number">
                <p class="error text-danger text-left"></p>

              </div>
              <div class="col-12">
                <textarea class="form-control message" name="message" placeholder="Message" rows="7"></textarea>
                <p class="error text-danger text-left"></p>

                <button type="button" class="btn btn-primary mt-4 message_submit_btn" >Send Message</button>
              </div>
            </div>
          </form>
        </div>

      </div> <!-- END row-->
    </div> <!-- END container-->
  </section>





     <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13250.883453278017!2d151.209776!3d-33.871084!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6b12ae3fd16bca1d%3A0x257a681863c74dc2!2sLevel+4%2F114-120+Castlereagh+St%2C+Sydney+NSW+2000%2C+Australia!5e0!3m2!1sen!2snp!4v1542365664750" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>


@endsection


@section('script')
  <script>
    $('.message_submit_btn').click(function(event) {
      $(this).parent().parent().find('.error').each(function(){
        $(this).text(' ');
      });
      event.preventDefault();
      var formData = $('.message_form').serializeArray();

      var url = "{{route('message')}}";

      $.post(url, formData)
  .done(function(data){
    $('.message_form').trigger('reset');
    if(data =="true"){
      $('#ex1').modal({
        fadeDuration: 250
      });
    }

  })
  .fail(function(xhr, status, error) {
      jQuery.each(xhr.responseJSON.errors, function(key, value){
        $("."+key).parent().find('.error').text(value);
  });


    });
    });
  </script>
@endsection
