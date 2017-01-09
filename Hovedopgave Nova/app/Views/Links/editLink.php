<form class="form-horizontal" method="POST" 
      action="/EditLinkPost/<?php echo $data->PK_linksId ?>">
<fieldset>
    
<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Titel</label>  
  <div class="col-md-4">
      <input value="<?php echo $data->Title ?>" id="textinput" name="title" type="text" placeholder="Titel" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Url (ex: www.google.dk)</label>  
  <div class="col-md-4">
      <input value="<?php echo substr($data->Url,7) ?>" id="textinput" name="url" type="text" placeholder="Url (ex: www.google.dk)" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Beskrivelse</label>  
  <div class="col-md-4">
      <input value="<?php echo $data->UrlDesc ?>" id="textinput" name="desc" type="text" placeholder="Beskrivelse" class="form-control input-md" required="">
    
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