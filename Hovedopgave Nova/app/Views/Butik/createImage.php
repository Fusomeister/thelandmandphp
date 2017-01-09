<form class="form-horizontal" method="POST" 
      action="/AddPicturePost">
<fieldset>

<!-- Form Name -->
<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="appendedtext"></label>
  <div class="col-md-4">
    <div class="input-group">
      <input id="appendedtext" name="url" class="form-control" placeholder="ex. http://imgur.com/MGoLxO2" type="text">
      <span class="input-group-addon">.jpg</span>
    </div>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="desc"></label>  
  <div class="col-md-4">
  <input id="desc" name="desc" type="text" placeholder="Beskrivelse" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Seng</button>
  </div>
</div>

</fieldset>
</form>
