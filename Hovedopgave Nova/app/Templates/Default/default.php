<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title><?= $title .' - ' .Config::get('app.name', SITETITLE); ?></title>
<?php

echo isset($meta) ? $meta : ''; // Place to pass data / plugable hook zone

Assets::css([
    template_url('dist/css/bootstrap.min.css', 'Default'),
    template_url('dist/css/bootstrap-theme.min.css', 'Default'),
    'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
    template_url('css/style.css', 'Default'),
  
    template_url('css/CustomNavBar.css', 'Default'),
    template_url('css/FrontPageHeader.css', 'Default'),
    template_url('css/styleForComments.css', 'Default'),
    template_url('css/shop-homepage.css', 'Default')
]);

echo isset($css) ? $css : ''; // Place to pass data / plugable hook zone
?>
    <?php use Helpers\Session ?>
</head>

<body style='padding-top: 70px;'>

<?= isset($afterBody) ? $afterBody : ''; // Place to pass data / plugable hook zone ?>

    <!-- NavBar -->
<div id="custom-bootstrap-menu" class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header"><a class="navbar-brand" href="/">Jens The Landmand</a>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-menubuilder">
            <ul class="nav navbar-nav navbar-left">             
                <li><a href="/butik">Butik</a></li>
                
                <li><a href="/forum">Forum</a></li>
                
                <li><a href="/links">Links</a></li>

                <li><a href="/om">Om</a></li>
                
                <?php if(Session::get('loggedin') == true) { ?>
                    <li><a href="/kontrolpanel">Kontrolpanel</a></li>
                <?php } ?>
                    
            </ul>
            <!-- Added opret and login -->
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/butik/shoppingCart">
                        <span class="glyphicon glyphicon-shopping-cart"></span>
                    </a>
                </li>
                <?php $username = Session::get('Username'); ?>
                <?php if(Session::get('loggedin') == true)
                    {
                        echo '<li><a href="/profile/'.$username.'">Hallo, '.$username.'</a></li>';                     
                        
                        echo '<li><a href="/logout">Log ud</a></li>';
                    }
                    else 
                    {
                        echo '<li><a href="/register">Opret</a></li>';
                        
                        echo '<li><a href="/login">Log ind</a></li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<!-- banner -->    
<header class="business-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="tagline">Jens The Landmand</h1>
            </div>
        </div>
    </div>
</header>
    
<div class="container">
    <?= $content; ?>
</div>


<!-- Lad være med at røre ved dette, ellers ødelægger du det -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row" style="margin: 15px 0 0;">
            <div class="col-lg-4">
                <p class="text-muted">Copyright &copy; <?php echo date('Y'); ?> <a href="http://www.novaframework.com/" target="_blank"><b>Nova Framework <?= VERSION; ?></b></a></p>
            </div>
            <div class="col-lg-8">
                <p class="text-muted pull-right">
                    <?php if(Config::get('app.debug')) { ?>
                    <small><!-- DO NOT DELETE! - Profiler --></small>
                    <?php } ?>
                </p>
            </div>
        </div>
    </div>
</footer>

<?php
Assets::js([
    'https://code.jquery.com/jquery-1.12.4.min.js',
    template_url('dist/js/bootstrap.min.js', 'Default'),
]);

echo isset($js) ? $js : ''; // Place to pass data / plugable hook zone

echo isset($footer) ? $footer : ''; // Place to pass data / plugable hook zone
?>

<!-- DO NOT DELETE! - Forensics Profiler -->

</body>
</html>
