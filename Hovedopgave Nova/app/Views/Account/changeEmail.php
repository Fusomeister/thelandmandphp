<form class="form-horizontal" method="POST" action="/changeEmailPost">
 
   <!-- Page header -->
<div class="page-header page-heading">
    <h2 class="pull-left"><?= $title ?></h2>    
    <div class="clearfix"></div>
</div>
 
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="oldEmail"></label>  
  <div class="col-md-4">
  <input id="oldEmail" name="oldEmail" type="text"
         placeholder="Gammel e-mail" class="form-control input-md" required="">
   
  </div>
</div>
 
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="NyEmail"></label>  
  <div class="col-md-4">
  <input id="NyEmail" name="newEmail" type="text"
         placeholder="Ny e-mail" class="form-control input-md" required="">
   
  </div>
</div>
 
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton"
            class="btn btn-primary">Skift</button>
  </div>
</div>

</form>