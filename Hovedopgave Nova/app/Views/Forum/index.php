<?php use Helpers\Session; ?>

<!-- Page header -->
<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

<table class="table forum table-striped">
    <thead>
    <tr>    
        <th class="cell-stat"></th>
        <th>Spørgsmål</th>
        <th class="cell-stat text-center hidden-xs hidden-sm">Svar</th>
        <th class="cell-stat-2x hidden-xs hidden-sm">Spurgt af</th>
        <?php if(Session::get('isAdmin') == 1) { ?>
        <th class="text-center">Slet</th>

        <?php } ?>
    </tr>
    </thead>

    <tbody>

    <tbody>
    <?php foreach($data as $topic) { ?>
        <tr>
            <td class="text-center"><i class="fa fa-question fa-2x text-primary"></i></td>
            <td>
                <h4>
                    <a href="/forum/comments/<?php echo $topic->PK_TopicId ?>"><?php echo $topic->Title ?></a>
                    <br>
                    <small><?php echo substr($topic->Note, 0, 30)?>...</small>
                    
                </h4>
            </td>
            <td class="text-center hidden-xs hidden-sm"><a href="#">89</a></td>
            <td class="hidden-xs hidden-sm">by <a href="#"><?php echo $topic->UserName ?></a>
            <br>
            <small>
                <i class="fa fa-clock-o"></i>
            </small>
            
            <?php if(Session::get('isAdmin') == 1) { ?>
            <td class="cell-stat text-center">
                <a href="/DeleteTopic/<?php echo $topic->PK_TopicId ?>" 
                   class="glyphicon glyphicon-remove" role="button"
                   onclick="return confirm('Er du sikker, at du vil slette dette?')"></a>
            </td>

            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
       
</table>
<hr>
<form class="form-horizontal" method="POST" action="/createTopic">

        <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="UserName"></label>  
      <div class="col-md-12">
      <input id="title" name="title" type="text" placeholder="Spørgsmål" class="form-control input-md" required="">

      </div>
    </div>
        
<!-- Textarea -->
<div class="form-group">
  <label for="comment"></label>
  <div class="col-md-12">
      <textarea class="form-control" placeholder="Beskrivelse" rows="5" name="note"
            id="note" required=""></textarea>
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