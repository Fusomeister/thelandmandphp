<?php 
    use Helpers\Session; 
?>

<div class="page-header page-heading">
    <h2 class="pull-left"><?=$title;?></h2>  
    <div class="clearfix"></div>
</div>

    <!-- Page Content -->
        <div class="row">

            <div class="col-md-3">
                <div class="list-group">
                    <?php if(Session::get('isAdmin') == 1) { ?>
                        <div align="right"><a href="/butik/createCategory"><span class="glyphicon glyphicon-plus"></span></a></div>
                    <?php } ?>
                    <a href="/butik">Slet søgning</a>
                    <?php foreach($category as $item) { ?>
                    <a href="/butik/search<?php echo $item->PK_catId ?>"
                       class="list-group-item"><?php echo $item->C_name ?></a>                   
                    <?php } ?>
                    
                </div>
            </div>

            <div class="col-md-9">
                <div class="row carousel-holder">
                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img id="karuselImage" class="slide-image" src="http://imgur.com/FzbNXO6.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img id="karuselImage" class="slide-image" src="http://imgur.com/npRsWHb.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img id="karuselImage" class="slide-image" src="http://placehold.it/800x300" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>
                
               <!-- http://placehold.it/320x150 -->
                <div class="row">
                    <?php foreach($products as $product) { ?>
                    <form class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="<?php echo $product->url ?>" id="shopimages" alt="">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo str_replace(".", ",", $product->price) ?>kr  /<?php echo $product->antal ?></h4>
                                <h4><a href="#"><?php echo $product->name ?></a>
                                </h4>
                                <p><?php echo $product->pDesc ?></p>   
                                <a href="/AddProductToCart/<?php echo $product->PK_productId ?>" id="addProduct" name="addProduct" class="btn btn-success btn-xs pull-right">Tilføj</a>
                            </div>                            
                            <div class="ratings">            
                                <p>                                    
                                    <?php if(Session::get('isAdmin') == 1) { ?>
                                        <a href="/DeleteProduct/<?php echo $product->PK_productId ?>" 
                                           onclick="return confirm('Er du sikker, at du vil slette dette?')">
                                            <i class="fa fa-fw fa-trash"></i></a>
                                            <a href="/butik/editProduct/<?php echo $product->PK_productId ?>"><i class="fa fa-fw fa-wrench"></i></a>
                                    <?php } ?>                                    
                                </p>
                            </div>
                        </div>
                    </form>
                    <?php } ?>                   
                </div>
            </div>
        </div>
    <br>
    <br>
    <br>
    <br>
    <br>