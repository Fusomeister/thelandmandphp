<form class="form-horizontal">
    
   <!-- Page header -->
    <div class="page-header page-heading">
    <h2 class="pull-left"><?= $title ?></h2>    
    <div class="clearfix"></div>
    </div>
   
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="id">ID</label>  
      <div class="col-md-4">
      <input id="inputid" name="idname" type="text" 
             placeholder="<?php echo $data->PK_UserId ?>" class="form-control input-md">

      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="username">Brugernavn</label>  
      <div class="col-md-4">
      <input id="inputusername" name="usernamename" type="text" 
             placeholder="<?php echo $data->UserName ?>" class="form-control input-md">

      </div>
    </div>   

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="passwordHash">PasswordHash</label>  
      <div class="col-md-4">
        <input id="indputpasswordHash" name="PasswordHashname" type="text" 
               placeholder="<?php echo $data->PasswordHash ?>" class="form-control input-md">
      </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Email</label>  
      <div class="col-md-4">
      <input id="inputemail" name="emailname" type="text" 
             placeholder="<?php echo $data->Email ?>" class="form-control input-md">
      </div>
    </div>

    <!-- Buttons -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="changePasswordEmail"></label>
      <div class="col-md-4">
        <a href="/profil/changePassword" class="btn btn-primary" role="button">Skift kode</a>
        <a href="/profil/changeEmail" class="btn btn-primary" role="button">Skift e-mail</a>
      </div>
    </div>
   
</form>