<!-- Page header -->
<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>    
    <div class="clearfix"></div>
</div>

<ul class="media-list forum">   
    <!-- Forum Post. Dette er spørgsmålet --> 
    <li class="media well">
      <div class="pull-left user-info" href="#">
        <strong><a href="#"><?=$username;?></a></strong>
        <br>
        <small class="btn-group btn-group-xs">
        </small>
      </div>
      <div class="media-body">
        <!-- Post Info Buttons -->
        <div class="forum-post-panel btn-group btn-group-xs">
        </div>
        <!-- Post Info Buttons END -->
        <!-- Post Text -->
        <p><?=$note;?></p>
        <!-- Post Text EMD -->
      </div>
    </li>
    <!-- Forum Post END -->
    <hr>
      
<?php foreach($data as $comment) { ?>
    <!-- Forum Post. Dette er  -->
    <li class="media well">
      <div class="pull-left user-info" href="#">
        <strong><a href="#"><?=$comment->UserName;?></a></strong>
        <br>
        <small class="btn-group btn-group-xs">
        </small>
      </div>
      <div class="media-body">
        <!-- Post Info Buttons -->
        <div class="forum-post-panel btn-group btn-group-xs">
        </div>
        <!-- Post Info Buttons END -->
        <!-- Post Text -->
        <p><?=$comment->comment;?></p>
        <!-- Post Text EMD -->
      </div>
    </li>
<?php } ?>
<!-- Forum Post END -->
</ul>
<hr>

<form class="form-horizontal" method="POST" action="/CreateCommentPost/<?=$id;?>">

<!-- Textarea -->
<div class="form-group">
  <label for="comment"></label>
  <div class="col-md-12">
  <textarea class="form-control" rows="5" name="newComment"
            id="newComment" required=""></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton"
            class="btn btn-primary">Send</button>
  </div>
</div>

</form>

<br>
<br>
<br>
<br>
<br>
