<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <meta name="google-site-verification" content="cuLUAwAE3Dec4hmEwft29d_5xWnnXuyAohwpedhkPXI" />
    	<title>Abundant Living Mamma</title>
    	<link href="//www.google-analytics.com" rel="dns-prefetch">
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script async defer data-pin-hover="true" data-pin-color="red" data-pin-tall="true" src="//assets.pinterest.com/js/pinit.js"></script>
    	<?php wp_head(); ?>
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-79862875-1', 'auto');
  ga('send', 'pageview');

</script>
<meta name="msvalidate.01" content="C83C0425FEF46D1CFAFCD955EC5B6B91" />
    </head>

    <body>

        <div class="login">
            <aside class="login-bar-menu">
                <?php wp_nav_menu( array( 'theme_location' => 'login-menu' ) ); ?>
            </aside>
            
            <aside class="login-pop-up">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">
                  
                    <?php 
                        $UserCookie = CheckLoginCookie();
                        $username  = $UserCookie['Username'];
                        if($username){
                            echo do_shortcode( '[user-data field_name="First Name"]' ); ?>
                            <i class="fa fa-sort-desc" aria-hidden="true"></i>
                            <?php
                        }else{
                            echo "Login";
                        }
                    ?>

                </button>
                <a class="forgot-password-mobile" href="http://www.abundantlivingmommy.com/forgot-password/">Forgot Password</a>

                <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <?php echo do_shortcode( '[login-logout-toggle login_redirect_page="http://www.abundantlivingmommy.com/" logout_redirect_page="http://www.abundantlivingmommy.com/"]' ); ?>
                        </div>
                    </div>
                </div>
            </aside>
        </div>

        <nav class="navbar navbar-default">
                    <div class="navbar navbar-static-top navbar-custom"> 
                    <!-- Brand and toggle get grouped for better mobile display --> 
                        <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-7 main-img">
                                    <a href="<?php echo home_url(); ?>" class="main-logo">
                                        <aside>
                                            <?php include 'logo.php'; ?>
                                        </aside>
                                        <div>
                                            <h1 class="main-name">Abundant Living <span>Mommy</span></h1>
                                            <p>simple healthy tips, that will transform your family for the <span>abundant life</span></p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-5">
                                    <div class="row">
                                         <div class="col-xs-12 col-md-12">
                                            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                                            <span class="icon-bar"></span> 
                                            <span class="icon-bar"></span> 
                                            <span class="icon-bar"></span> 
                                            </button>
                                        </div> 
                                 
                                        <!-- Collect the nav links, forms, and other content for toggling --> 
                                        <div class="collapse navbar-collapse navHeaderCollapse"> 
                                            <div class="col-xs-12 main-nav">
                                                <?php /* Primary navigation */
                                                    wp_nav_menu( array(
                                                    'menu' => 'primary',
                                                    'theme-location' => 'primary',
                                                    'depth' => 2,
                                                    'menu_class' => 'nav navbar-nav ',
                                                    'fallback-cb' => 'wp_bootstrap_navwalker::fallback',
                                                    //Process nav menu using our custom nav walker
                                                    'walker' => new wp_bootstrap_navwalker())
                                                    );
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div><!--end div class collapse navbar-collapse navHeaderCollapse -->
                            </div>
                        </div><!--end div class container-fluid-->
                    </div><!--end div class navbar  navbar-static-top navbar-custom-->
                </nav> 
                
            <nav class="navbar navbar-default fudge" id="fixedbar">
                    <div class="navbar navbar-static-top navbar-custom"> 
                    <!-- Brand and toggle get grouped for better mobile display --> 
                        <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-7 main-img">
                                    <a href="<?php echo home_url(); ?>" class="main-logo">
                                        <aside>
                                            <?php include 'logo.php'; ?>
                                        </aside>
                                        <div>
                                            <h1 class="main-name">Abundant Living <span>Mommy</span></h1>
                                            <p>simple healthy tips, that will transform your family for the <span>abundant life</span></p>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-5">
                                    <div class="row">
                                         <div class="col-xs-12 col-md-12">
                                            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                                            <span class="icon-bar"></span> 
                                            <span class="icon-bar"></span> 
                                            <span class="icon-bar"></span> 
                                            </button>
                                        </div> 
                                 
                                        <!-- Collect the nav links, forms, and other content for toggling --> 
                                        <div class="collapse navbar-collapse navHeaderCollapse"> 
                                            <div class="col-xs-12 main-nav">
                                                <?php /* Primary navigation */
                                                    wp_nav_menu( array(
                                                    'menu' => 'primary',
                                                    'theme-location' => 'primary',
                                                    'depth' => 2,
                                                    'menu_class' => 'nav navbar-nav ',
                                                    'fallback-cb' => 'wp_bootstrap_navwalker::fallback',
                                                    //Process nav menu using our custom nav walker
                                                    'walker' => new wp_bootstrap_navwalker())
                                                    );
                                                ?>
                                            </div>
                                        </div>
                                    </div>

                                </div><!--end div class collapse navbar-collapse navHeaderCollapse -->
                            </div>
                        </div><!--end div class container-fluid-->
                    </div><!--end div class navbar  navbar-static-top navbar-custom-->
                </nav>

        <nav class="secondary-nav">
            <div class="container">
                <?php /* sub_nav navigation */
                    wp_nav_menu( array(
                    'menu' => 'sub_nav',
                    'theme-location' => 'sub-nav',
                    ));
                ?>
            </div>
        </nav>
	