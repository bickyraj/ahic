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
      <input type="text" class="form-control" name="edu[{{$count}}][qualification]" value="">
    </div>
    <div class="form-group col-md-6">
      <label > Educational Institution</label>
      <input type="text" class="form-control"  name="edu[{{$count}}][institution]" value="">
    </div>
    <div class="form-group col-md-3">
      <label > Started Month</label>
      <input type="text" class="form-control"  name="edu[{{$count}}][started_month]" value="">
    </div>
    <div class="form-group col-md-3">
      <label > Started Year</label>
      <input type="text" class="form-control"  name="edu[{{$count}}][started_year]" value="">
    </div>
    <div class="form-group col-md-3">
      <label > Completed Month</label>
      <input type="text" class="form-control"  name="edu[{{$count}}][completed_month]" value="">
    </div>
    <div class="form-group col-md-3">
      <label > Completed Year</label>
      <input type="text" class="form-control"  name="edu[{{$count}}][completed_year]" value="">
    </div>
  </div>
  <hr>
</div>
<script>
//remove this very quali
$('.remove_edu_qua').click(function(event) {
  event.preventDefault();
  var a = $(this).closest('.qua');
  a.remove();
});
</script>
