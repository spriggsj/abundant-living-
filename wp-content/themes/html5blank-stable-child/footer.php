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
               
           
	<footer class="footer">
		<div class="footer-about">
			<h2><span>love</span> what you see</h2>
			<p>Can't get enough Abundant Living Mommy.  Connect with me on these social media links.</p>
			<aside class="social-links">
				<a href="https://www.facebook.com/wendy.purviance" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
				<a href="#" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
				<a href="https://www.instagram.com/abundantlivingmommy/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
				<a href="https://www.pinterest.com/abundantlivingm/" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
				<a href="https://twitter.com/Abundant_mommy" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
				<a href="https://www.youtube.com/channel/UCVlYsSc-Oj96Whrw93VHX9A" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
			</aside>
		</div>

		<div class="disclaimer">
			<p>The information on this website has not been evaluated by the FDA and is not intended to diagnose, treat, prevent, or cure any disease.</p>
		</div>

		<div class="copyright">
			<p>Copyright &copy; 2016 Abundant Living Mommy &reg;</p>
		</div>

	</footer>

	<?php wp_footer(); ?>

	</body>
</html>