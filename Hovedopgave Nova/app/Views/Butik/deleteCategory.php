<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

<table class="table">
    <tr>
            <th>
                Kategori
            </th>
            <th>
                Slet
            </th>          
    </tr>
    <?php foreach($data as $item) { ?>
    <tr>
        <td>
            <?php echo $item->C_name ?>
        </td>
        <td>
            <a href="/DeleteCategoryPost/<?php echo $item->PK_catId ?>">X</a>
        </td>
    </tr>
    <?php } ?>
    
    
</table>