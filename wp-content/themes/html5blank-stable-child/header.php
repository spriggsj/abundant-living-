<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Abundant Living Mamma</title>
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href='https://fonts.googleapis.com/css?family=Noto+Serif:700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Libre+Baskerville' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  		
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>
</head>
<body>
<nav class="navbar navbar-transparent navbar-static-top">
                <div class="navbar  navbar-custom" style="border-radius:0px;"> 
                    <!-- Brand and toggle get grouped for better mobile display --> 
                        <div class="container"> 
                            <div class="row">
                                <div class="col-xs-12 col-md-5 main-img">
                                    <a href="#" class="navbar-brand">
                                      <?php include 'logo.php'?>
                                      <p id="branding">Abundant Living Mommy</p>
                                    </a>

                                </div>

                                <div class="col-xs-12 col-md-7">
                                    <div class="row">
                                        
                                             <div class="col-xs-9 col-md-12">
                                                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                                                <span class="icon-bar"></span> 
                                                <span class="icon-bar"></span> 
                                                <span class="icon-bar"></span> 
                                                </button>
                                            </div> 
                                 
                                        <!-- Collect the nav links, forms, and other content for toggling --> 
                                            <div class="collapse navbar-collapse navHeaderCollapse pull-right"> 
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
                <nav class="navbar navbar-default"id="fixedbar" >
                 <div class="navbar  navbar-custom" style="border-radius:0px;"> 
                    <!-- Brand and toggle get grouped for better mobile display --> 
                        <div class="container"> 
                            <div class="row">
                                <div class="col-xs-12 col-md-5 main-img">
                                    <a href="#" class="navbar-brand">
                                      <?php include 'logo.php'?>
                                      <p id="branding">Abundant Living Mommy</p>
                                    </a>

                                </div>
                                

                                <div class="col-xs-12 col-md-10">
                                    <div class="row">
                                        <div class="col-xs-3 col-sm-12 contact-img">
                                            
                                            
                                        </div>
                                              <div class="col-xs-9 col-md-12">
                                                <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                                                <span class="icon-bar"></span> 
                                                <span class="icon-bar"></span> 
                                                <span class="icon-bar"></span> 
                                                </button>
                                            </div>  
                                 
                                        <!-- Collect the nav links, forms, and other content for toggling --> 
                                            <div class="collapse navbar-collapse navHeaderCollapse pull-right"> 
                                                
                                                    <?php /* Primary navigation */
                                                        wp_nav_menu( array(
                                                        'menu' => 'primary',
                                                        'theme-location' => 'primary',
                                                        'depth' => 2,
                                                        'menu_class' => 'nav navbar-nav fixer',
                                                        'fallback-cb' => 'wp_bootstrap_navwalker::fallback',
                                                        //Process nav menu using our custom nav walker
                                                        'walker' => new wp_bootstrap_navwalker())
                                                        );
                                                    ?>
                                           
                                            </div>
                                    </div>

                                </div><!--end div class collapse navbar-collapse navHeaderCollapse -->
                             </div>
                        </div> <!--end div class container-fluid-->
                     </div> <!--end div class navbar  navbar-static-top navbar-custom-->
                </nav> 

	