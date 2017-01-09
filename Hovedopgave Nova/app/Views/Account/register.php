<form class="form-horizontal" method="POST" action="/registerPost">

<!-- Page header -->
<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>    
    <div class="clearfix"></div>
</div>

<!-- error warnings -->
<div class="form-group">
    <label class="col-md-4 control-label" for="warnings"></label>
        <div class="col-md-4">
            <?= Session::getMessages(); ?>
    </div>       
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="username"></label>  
  <div class="col-md-4">
  <input id="username" name="UserName" type="text" 
         placeholder="Brugernavn" class="form-control input-md" required="">
   
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email"></label>  
  <div class="col-md-4">
  <input id="email" name="Email" type="text" 
         placeholder="E-mail" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailverify"></label>  
  <div class="col-md-4">
  <input id="emailverify" name="emailVerify" type="text" 
         placeholder="Gentag e-mail" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="password"></label>
  <div class="col-md-4">
    <input id="inputPassword" name="password" type="password" 
           placeholder="Kodeord" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="passwordverify"></label>
  <div class="col-md-4">
    <input id="inputPasswordVerify" name="passwordVerify" type="password" 
           placeholder="Gentag kodeord" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="isAdmin"></label>
  <div class="col-md-4">
    <select id="isAdmin" name="isAdmin" class="form-control">
      <option value="0">User</option>
      <option value="1">Admin</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="creatUser"></label>
  <div class="col-md-4">
    <button id="createUser" name="createUser" class="btn btn-primary">Opret</button>
  </div>
</div>

</form>
