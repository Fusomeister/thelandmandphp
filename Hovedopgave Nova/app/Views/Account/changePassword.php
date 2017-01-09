<form class="form-horizontal" method="POST" action="/changePasswordPost">
   
   <!-- Page header -->
<div class="page-header page-heading">
    <h2 class="pull-left"><?= $title; ?></h2>    
    <div class="clearfix"></div>
</div>
 
<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="oldPassword"></label>
  <div class="col-md-4">
    <input id="oldPassword" name="oldPassword" type="password" 
           placeholder="Gammel Adgangskode" class="form-control input-md" required="">
   
  </div>
</div>
 
<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="newPassword"></label>
  <div class="col-md-4">
    <input id="newPassword" name="newPassword" type="password" 
           placeholder="Ny Adgangskode" class="form-control input-md" required="">
   
  </div>
</div>
 
<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nyePasswordVerify"></label>
  <div class="col-md-4">
    <input id="nyePasswordVerify" name="newPasswordRepeat" type="password" 
           placeholder="Gentag Adgangskode" class="form-control input-md" required="">
   
  </div>
</div>
 
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Skift</button>
  </div>
</div>
 
</form>