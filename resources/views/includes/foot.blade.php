    <script src="{{asset('/')}}public/ahic/js/vendors.bundle.js"></script>
    <script src="{{asset('/')}}public/ahic/js/scripts.js"></script>
    <script src="{{asset('/')}}public/ahic/js/bootstrap-notify.min.js"></script>
<script type="text/javascript">



</script>
@yield('script')

<script>
  $(document).ready(function() {
    $('.course_dropdown').click(function(){
          window.location.replace('courses');
    })
  });
</script>
</script>
  </body>
</html>
