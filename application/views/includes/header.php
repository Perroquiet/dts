<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame Remove this if you use the .htaccess -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<?php
		// Title Information. Page setting takes precedence.
		if (isset($page_title)) {
			echo '<title>' . $page_title . '</title>';
		} else if (isset($app_name)) {
			echo '<title>' . $app_name . '</title>';
		} else {
			echo '<title>Untitled</title>';
		}
		
		// Page description. Page setting takes precedence.
		if (isset($page_description)) {
			echo '<meta name="description" content="' . $page_description . '">';
		} else if (isset($app_description)) {
			echo '<meta name="description" content="' . $app_description . '">';
		}
		
		// Page author meta information. Page setting takes precedence.
		if (isset($page_author)) {
			echo '<meta name="author" content="' . $page_author . '">';
		} else if (isset($app_author)) {
			echo '<meta name="author" content="' . $app_author . '">';
		}
	?>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Place favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
	<link rel="shortcut icon" href="<?php echo base_url();?>application/public/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo base_url();?>application/public/apple-touch-icon.png">
	
<?php  
	// Custom CSS
	if (isset($cs_scripts)){ 
		if (count($cs_scripts)){
			foreach($cs_scripts as $cs_script) {
				echo "\t" . '<link rel="stylesheet" href="' . $cs_script .  '">' . "\r\n";
			}
		} else {
			echo "\t" . '<link rel="stylesheet" href="' . base_url() . 'application/public/css/style.css?v=2">' . "\r\n";
		}
	} else {
		echo "\t" . '<link rel="stylesheet" href="' . base_url() . 'application/public/css/style.css?v=2">' . "\r\n";
	}
	
	// This is for the google code network javascript libraries
	if (isset($google_cdn_enabled)){ 
		if ($google_cdn_enabled) {
			echo "\t" . '<script type="text/javascript" src="https://www.google.com/jsapi?key=ABQIAAAAGW6MLoWMIAe5INZpFpwxfhS2gkfCU64-Pi6CskyDkNcib-7tAxRsy8nEeH_LrY66v_Ok4ba9MTZnzA"></script>' . "\r\n";
		}
	}
 
	// All JavaScript at the bottom, except for Modernizr which enables HTML5 elements & feature detects
	if (isset($modernizr_enabled)){ 
		if ($modernizr_enabled) {
			echo "\t" . '<script src="<?php echo base_url();?>application/public/js/libs/modernizr-1.7.min.js"></script>' . "\r\n";
		}
	}
	
	// Grab Google CDN's jQuery, with a protocol relative URL
	if (isset($jquery_enabled)){ 
		if ($jquery_enabled) {
			//echo "\t" . '<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>' . "\r\n";
			echo "\t" . '<script type="text/javascript" src="' . base_url() . 'js/jquery.js"></script>' . "\r\n";
		}
	}	
	
	// Grab Google CDN's jQuery UI, with a protocol relative URL
	if (isset($jqueryui_enabled)){ 
		if ($jqueryui_enabled) {
			// application\public\js\libs\strict\js
			echo "\t" . '<script src="' . base_url() . 'application/public/js/libs/strict/js/jquery-ui-1.8.11.custom.min.js"></script>' . "\r\n";
			// application\public\js\libs\strict\css\custom-theme
			echo "\t" . '<link rel="stylesheet" href="' . base_url() . 'application/public/js/libs/strict/css/custom-theme/jquery-ui-1.8.11.custom.css">' . "\r\n";
		}
	}	
	
	// Custom JS
	if (isset($js_scripts)){ 
		if (count($js_scripts)){
			foreach($js_scripts as $js_script) {
				echo "\t" . '<script src="' . $js_script . '"></script>' . "\r\n";
			}
		}
	}
	?>
	
  <!--[if lt IE 7 ]>
    <script src="<?php echo base_url();?>application/public/js/libs/dd_belatedpng.js"></script>
    <script>DD_belatedPNG.fix("img, .png_bg"); // Fix any <img> or .png_bg bg-images. Also, please read goo.gl/mZiyb </script>
  <![endif]-->

  <!-- Google Analytics -->
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?php echo $app_ga; ?>']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
</head>

<body>