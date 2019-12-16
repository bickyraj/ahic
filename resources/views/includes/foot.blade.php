<script src="{{asset('/')}}public/front/js/vendors.bundle.js"></script>
<script src="{{asset('/')}}public/front/js/scripts.js"></script>
<script src="{{asset('/')}}public/front/js/bootstrap-notify.min.js"></script>
<script src="{{asset('/')}}public/modal/jquery.modal.min.js"> </script>

@yield('script')

<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).ready(function() {
  $('.course_dropdown').click(function(){
    window.location.replace('courses');
  })
});
</script>

<script>
$('.subscribe_btn').click(function(event) {
  var email = $('#subscribe_email').val();
  if(ValidateEmail(email)){
    $('.email_val').text('');

    $.post('{{route('newsletter')}}',{email:email},function(data){
      if(data =="true"){
        $('#subscribe_email').val('');
            $('#ex1').modal({
              fadeDuration: 250
            });
        //thanks for subscribing
      }

    })
  }
  else{
    $('.email_val').text('Please provide valid email');
  }


});

function ValidateEmail(mail)
{
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
  return (false)
}
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
