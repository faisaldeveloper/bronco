<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-ui.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    
    <style>
	.myimg {
    border: 0 none;
    height: 87px;
    width: 100%;
    vertical-align: middle;
}
	</style>
</head>

<body>

<!-- Header -->
			<div id="header-wrapper">
				<header id="header" class="container">
					<div class="row">
						<div class="12u">
						
							<!-- Logo -->
								<h1><a href="#" id="logo"><img src="images/bronco44.png" class="myimg"  alt="logo" /></a></h1>
							
							<!-- Nav -->
								<nav id="nav">
									<a href="#">Home</a>
									<a href="#">Our Mission</a>
									<a href="#">About Us</a>
									<a href="#">Contact Us</a>
									<a href="#">Our Clients</a> 
								</nav>

						</div>
					</div>
				</header>
				<div id="banner">
					<div class="container">
						<div class="row">
							<div class="6u">
							
								<!-- Banner Copy -->
									
                                    <p>Bronco Fleet Service is now a VicRoads Licensed Vehicle Tester for Heavy Vehicles. Vehicles over 4.5t (Truck & Trailers only) can now be inspected for a Roadworthy Certificate at our Laverton branch.</p>
									<a href="#" class="button-big">Read More...</a>

							</div>
							<div class="6u">
								
								<!-- Banner Image -->
									<!--<a href="#" class="bordered-feature-image"><img src="images/bronco2.jpg" alt="" /></a>-->
                                    <?php 
										$this->widget('bootstrap.widgets.TbCarousel', array(
										'items'=>array(
										array(
									   // 'image'=>'http://placehold.it/830x400&text=First+thumbnail',
									   'image'=>Yii::app()->baseUrl.'/images/bronco0.png',
										'label'=>'First Thumbnail label',
										'caption'=>''),
										array(
									   // 'image'=>'http://placehold.it/830x400&text=Second+thumbnail',
									   'image'=>Yii::app()->baseUrl.'/images/bronco7.png',
										'label'=>'Second Thumbnail label',
										'caption'=>''),
										array(
									   // 'image'=>'http://placehold.it/830x400&text=Third+thumbnail',
									   'image'=>Yii::app()->baseUrl.'/images/bronco3.png',
										'label'=>'Third Thumbnail label',
										'caption'=>''),
										),
										)); 
									?>
							
							</div>
						</div>
					</div>
				</div>
			</div>
            
            
	<?php echo $content; ?>

	<div class="clear"></div>

			<!-- Footer -->
			<div id="footer-wrapper">
				<footer id="footer" class="container">
					<div class="row">
						<div class="8u">
						
							<!-- Links -->
								<section>
									<h2>Links to Important Stuff</h2>
									<div>
										<div class="row">
											<div class="3u">
												<ul class="link-list last-child">
													<li><a href="#">Neque amet dapibus</a></li>
													<li><a href="#">Sed mattis quis rutrum</a></li>
													<li><a href="#">Accumsan suspendisse</a></li>
													<li><a href="#">Eu varius vitae magna</a></li>
												</ul>
											</div>
											<div class="3u">
												<ul class="link-list last-child">
													<li><a href="#">Neque amet dapibus</a></li>
													<li><a href="#">Sed mattis quis rutrum</a></li>
													<li><a href="#">Accumsan suspendisse</a></li>
													<li><a href="#">Eu varius vitae magna</a></li>
												</ul>
											</div>
											<div class="3u">
												<ul class="link-list last-child">
													<li><a href="#">Neque amet dapibus</a></li>
													<li><a href="#">Sed mattis quis rutrum</a></li>
													<li><a href="#">Accumsan suspendisse</a></li>
													<li><a href="#">Eu varius vitae magna</a></li>
												</ul>
											</div>
											<div class="3u">
												<ul class="link-list last-child">
													<li><a href="#">Neque amet dapibus</a></li>
													<li><a href="#">Sed mattis quis rutrum</a></li>
													<li><a href="#">Accumsan suspendisse</a></li>
													<li><a href="#">Eu varius vitae magna</a></li>
												</ul>
											</div>
										</div>
									</div>
								</section>

						</div>
						<div class="4u">
							
							<!-- Blurb -->
								<section>
									<h2>An Informative Text Blurb</h2>
									<p>
										Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. Suspendisse eu 
										varius nibh. Suspendisse vitae magna eget odio amet mollis. Duis neque nisi, 
										dapibus sed mattis quis, sed rutrum accumsan sed. Suspendisse eu varius nibh 
										lorem ipsum amet dolor sit amet lorem ipsum consequat gravida justo mollis.
									</p>
								</section>
						
						</div>
					</div>
				</footer>
			</div>

		<!-- Copyright -->
			<div id="copyright">
				&copy; Bronco. All rights reserved.
			</div>
</body>
</html>
