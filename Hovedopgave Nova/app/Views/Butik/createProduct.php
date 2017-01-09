<form class="form-horizontal" method="POST" 
      action="/AddProductPost">
<fieldset>

<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="navn"></label>  
  <div class="col-md-4">
  <input id="navn" name="navn" type="text" placeholder="navn" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pDesc"></label>  
  <div class="col-md-4">
  <input id="pDesc" name="pDesc" type="text" placeholder="Beskrivelse" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price"></label>  
  <div class="col-md-4">
  <input id="price" name="price" type="text" placeholder="Pris" class="form-control input-md">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="category"></label>
  <div class="col-md-4">
    <select id="antal" name="antal" class="form-control">
            <option value="kg">pr. kg</option>
            <option value="stk"> pr. stk</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="category"></label>
  <div class="col-md-4">
    <select id="category" name="category" class="form-control">
        <?php foreach($category as $item) {  ?>
            <option value="<?php echo $item->PK_catId ?>"><?php echo $item->C_name ?></option>
        <?php } ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic"></label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
        <?php foreach($images as $item) {  ?>
            <option value="<?php echo $item->PK_imageId ?>"><?php echo $item->iDesc ?></option>
        <?php } ?>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" type="sumit" name="singlebutton" class="btn btn-primary">Send</button>
  </div>
</div>

</fieldset>
</form>