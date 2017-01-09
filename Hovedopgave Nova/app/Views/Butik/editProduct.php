<form class="form-horizontal" method="POST" 
      action="/editProductPost/<?php echo $product->PK_productId ?>">
<fieldset>

<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="navn">Navn</label>  
  <div class="col-md-4">
      <input id="navn" name="navn" type="text" value="<?php echo $product->name ?>"
         placeholder="Navn" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pDesc">Beskrivelse</label>  
  <div class="col-md-4">
  <input id="pDesc" name="pDesc" type="text" value="<?php echo $product->pDesc ?>"
         placeholder="Beskrivelse" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="price">Pris</label>  
  <div class="col-md-4">
  <input id="price" name="price" type="text" value="<?php echo str_replace(".", ",", $product->price) ?>"
         placeholder="Pris" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="category">Kategory</label>
  <div class="col-md-4">
    <select id="category" name="category" class="form-control">
        <?php foreach($category as $item) {  ?>
            <option value="<?php echo $item->PK_catId ?>"><?php echo $item->C_name ?></option>
        <?php } ?>
    </select>
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