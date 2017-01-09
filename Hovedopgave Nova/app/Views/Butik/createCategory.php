<form class="form-horizontal" method="POST" action="/CreateCategoryPost">
<fieldset>

<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="category"></label>  
  <div class="col-md-4">
  <input id="category" name="category" type="text" placeholder="Kategori navn" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Send</button>
  </div>
</div>

</fieldset>
</form>