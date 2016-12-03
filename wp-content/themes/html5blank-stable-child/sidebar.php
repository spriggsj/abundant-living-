<!-- sidebar -->
<aside class="sidebar" role="complementary">

	<?php
		$banner = get_post_meta(get_the_ID(), 'banner_input', true);

		if(isset($banner)){
		echo $banner;
		echo wp_oembed_get($banner);
		}
	?>


</aside>
<!-- /sidebar -->
