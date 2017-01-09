<?php use Helpers\Session; ?>

<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

<table class="table forum table-striped">
        <thead>
    <tr>
        <th class="cell-stat"></th>
        <th>Udvalgte links</th>
        
        <?php if(Session::get('isAdmin') == 1) { ?>
        <th class="text-center">Slet</th>
        <th class="text-center">Rediger</th>
        <?php } ?>
    </tr>
    </thead>
    <tbody>
    <?php foreach($data as $link) { ?>
        <tr>
            <td class="text-center"><i class="fa fa-2x text-primary"></i></td>
            <td>
                <h4>
                    <a href="<?php echo $link->Url ?>"><?php echo $link->Title ?></a>
                    <br>
                    <small><?php echo $link->UrlDesc ?></small>
                </h4>
            </td>
            
            <?php if(Session::get('isAdmin') == 1) { ?>
            <td class="cell-stat text-center">
                <a href="/DeleteLink/<?php echo $link->PK_linksId ?>" 
                   class="glyphicon glyphicon-remove" role="button" 
                   onclick="return confirm('Er du sikker på, at du vil slette dette?')"></a>
            </td>
            <td class="cell-stat text-center">
                <a href="/links/editlink/<?php echo $link->PK_linksId ?>" 
                   class="glyphicon glyphicon-repeat" role="button"></a>
            </td>
            <?php } ?>
        </tr>       
    <?php } ?>
    </tbody>
</table>