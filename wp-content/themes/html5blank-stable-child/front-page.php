<?php get_header(); ?>
	
	<header class="hero-banner">
		<div class="container">
			<h1>living <span>healthy</span> should be easy</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod dolores harum fugiat praesentium corrupti illo ducimus, velit non! Quod dolores harum fugiat praesentium corrupti illo ducimus.</p>
			<p>Sign up for a free membership and you’ll get instant access to a lot more valuable information created exclusively for you!</p>
			<a href="http://localhost:8080/register/">Let's Get Started</a>
		</div>
	</header>

	<section class="health-tip-post">
		<?php echo do_shortcode( '[tip-custom-loop]' ); ?>
	</section>
	
	<section class="recent-post">
		<?php echo do_shortcode( '[custom-loop]' ); ?>
	</section>

	<section id="buffer">
		<div class="container">
			<h2 class="name-title">Abundant Living <span>Mommy</span> E Books</h2>
			<ul id="books">
				<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/detoxyourhomehandbook.jpg" class="img-responsive"></a></li>
				<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/healthy-pregnancy-guide.jpg" class="img-responsive"></a></li>
				<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/home-remedies-handbook.jpg" class="img-responsive"></a></li>
				<li><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/natural-beauty-guide.jpg" class="img-responsive"></a></li>
			</ul>
		</div>
	</section>

	<section class="meal-post">
		<?php echo do_shortcode( '[meal-loop]' ); ?>
	</section>

	<!-- <section id="buffer">
		<div class="container">
			<h2 class="name-title">Products I <i class="fa fa-heart" aria-hidden="true"></i></h2>
			<ul id="books">
				<a  href="http://www.amazon.com/gp/product/B00CPZPYLS/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=B00CPZPYLS&linkCode=as2&tag=brokencupstud-20&linkId=TIXWHDYPPPUY3KNP"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B00CPZPYLS&Format=_SL110_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=brokencupstud-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=brokencupstud-20&l=as2&o=1&a=B00CPZPYLS" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />

				<a  href="http://www.amazon.com/gp/product/B004R5ZJXW/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=B004R5ZJXW&linkCode=as2&tag=brokencupstud-20&linkId=WKG4DRPLUGNDUDD4"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B004R5ZJXW&Format=_SL110_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=brokencupstud-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=brokencupstud-20&l=as2&o=1&a=B004R5ZJXW" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />

				<a  href="http://www.amazon.com/gp/product/B012578TN0/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=B012578TN0&linkCode=as2&tag=brokencupstud-20&linkId=E5B3SXZZI5KVGODM"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B012578TN0&Format=_SL110_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=brokencupstud-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=brokencupstud-20&l=as2&o=1&a=B012578TN0" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />

				<a  href="http://www.amazon.com/gp/product/B002U0KUTE/ref=as_li_tl?ie=UTF8&camp=1789&creative=9325&creativeASIN=B002U0KUTE&linkCode=as2&tag=brokencupstud-20&linkId=O6I7PUDYY4U3CIVY"><img border="0" src="http://ws-na.amazon-adsystem.com/widgets/q?_encoding=UTF8&ASIN=B002U0KUTE&Format=_SL110_&ID=AsinImage&MarketPlace=US&ServiceVersion=20070822&WS=1&tag=brokencupstud-20" ></a><img src="http://ir-na.amazon-adsystem.com/e/ir?t=brokencupstud-20&l=as2&o=1&a=B002U0KUTE" width="1" height="1" border="0" alt="" style="border:none !important; margin:0px !important;" />

			</ul>
		</div>
	</section> -->
	<section class="affiliate">
		<?php echo do_shortcode( '[js-loop]' ); ?>
		</section>

<?php get_footer(); ?>