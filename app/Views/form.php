<form action="dashboard/save-business" method="post">

<div class="row row-sm">
  <div class="col-lg-6">
    <h3>Enter Your Google Information</h3>
    <div class="form-group">
      <input class="form-control" placeholder="Type Your Business Address Here" type="text" name="businessId" id="address">
      <input type="hidden" name="place_id" id="place_id" value="">
      <input type="hidden" name="business_name" id="business_name" value="">
      <input type="hidden" name="latitude" id="latitude" value="">
      <input type="hidden" name="longitude" id="longitude" value="">
    </div>
    <input type="submit" value="save" class="btn btn-az-primary">
  </div>
  <div class="col-lg-6">
    <h3>Enter Your Facebook Information</h3>
    <div class="form-group">
      <input class="form-control" placeholder="Type Your Facebook Page Here" type="text" name="facebookPage" id="address">
      <input type="hidden" name="page_id" id="page_id" value="">
    </div>
    <input type="submit" value="save" class="btn btn-az-primary">
  </div>



</div>
</form>