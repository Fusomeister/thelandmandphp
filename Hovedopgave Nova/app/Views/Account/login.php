<form class="form-horizontal" method="POST" action="/loginPost">

    <!-- Page header -->
    <div class="page-header page-heading">
        <h2 class="pull-left"><?=$title;?></h2>    
        <div class="clearfix"></div>
    </div>
    
    <div class="form-group">
        <label class="col-md-4 control-label" for="warnings"></label>
            <div class="col-md-4">
                <?= Session::getMessages(); ?>
            </div>       
    </div>
        
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="UserName"></label>  
      <div class="col-md-4">
      <input id="UserName" name="username" type="text" placeholder="Brugernavn" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="PasswordHash"></label>
      <div class="col-md-4">
        <input id="PasswordHash" name="password" type="password" placeholder="Kodeord" class="form-control input-md" required="">

      </div>
    </div>

    <!-- Button -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="login"></label>
      <div class="col-md-4">
        <button id="login" name="login" class="btn btn-primary">Log ind</button>
      </div>
    </div>

</form>