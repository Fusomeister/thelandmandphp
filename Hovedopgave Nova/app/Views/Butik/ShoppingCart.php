<?php 
    use Helpers\Session; 
?>

<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

  <div class="panel panel-primary">
    <div class="panel-heading">Indkøbskurv</div>
    <div class="panel-body">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="center" colspan="2">Navn</th>
            <th>Type</th>           
            <th>Antal</th>
            <th>Pris</th>
            <th>Remove</th>
          </tr>
        </thead>
        <tbody>
            <!-- repeat this part -->
            <?php if($data != 0) { ?>
            <?php for($i = 0; $i < count($data); $i++) { ?>
          <tr>
              <td><img src="<?php echo $data[$i]->url ?>" class="img-thumbnail" id="cartImage" alt="Item description" title="Some shop item">
            </td>
            <td><?php echo $data[$i]->name ?></td>
            <td><?php echo $data[$i]->C_name ?></td>
            <td>1 stk</td>
            <td><?php echo str_replace(".", ",", $data[$i]->price) ?>kr</td>
            <td><a href="/removeItemFromCart/<?php echo $i ?>">X</a></td>
          </tr>
            <?php } ?>
          <?php } ?>

          <tr>
            <th>Total</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>          
            <td></td>
            <th><?php echo number_format($price, 2, ',','') ?>kr</th>  
            <th>&nbsp;</th>
          </tr>
          <tr>
            <th>Heraf Moms</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>           
            <td></td>
            <th><?php echo number_format($moms, 2, ',','') ?>kr</th>
            <th>&nbsp;</th>
          </tr>
        </tbody>
      </table>
      <a href="#" class="btn btn-primary btn-bg pull-right">Check ud</a>
    </div>
  </div>