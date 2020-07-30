<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MBM Portfolio</title>
	<link rel="icon" type="image/png" href="images/avatar/logo.png"/>
	<meta name="description" content="MBM IT company" >
	<meta name="author" content="Mahmudjon Utkurov">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/linecons-font-style.css" rel="stylesheet">
	<link href="assets/css/jquery.fs.boxer.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link href="assets/css/content_slider_style.css" rel="stylesheet"/>
	<link href="assets/css/animate.css" rel="stylesheet"/>
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/responsive.css" rel="stylesheet">
	<link href="assets/css/v-light-red.css" rel="stylesheet">
</head>
<body>
	<!-- Page Top	 -->
	<div id="page-top"></div>
	<!-- Page Top End -->
<!-- Menu -->
	<div class="main-menu-continer">
		<div id="main-menu" class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-bars"></i>
					</button>

					<a class="navbar-brand" style="font-size: 25px;" href="./">
						MB<span>M</span> IT company
					</a>
				</div>

				<nav class="collapse navbar-collapse" role="navigation">
					<!-- Main navigation -->
					<ul id="headernavigation" class="nav navbar-nav pull-right">
						<li><a href="index.html">Asosiy</a></li>
						<li><a href="about-us.html">Biz haqimizda</a></li>
						<li><a href="team.html">Jamoa</a></li>
						<li><a href="service.html">Xizmatlarimiz</a></li>
						<li><a href="portfolio.html">Portfolio</a></li>
						<li><a href="news.html">Yangiliklar</a></li>
						<li class="active"><a href="#page-top"Aloqa</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</div>

	<!-- Page Name Section-->
	<div id="page-name-sec">
		<div class="parallax-style page-name-sec">
			<div class="pattern">
				<div class="container">
					<p class="page-name">
						MBM Aloqa
					</p>
					<p class="page-location">
						<a href="index.html">Asosiy</a> Aloqa
					</p>
				</div>
			</div>
		</div>
	</div>

<!-- Contact Section -->
	<section id="contact">
		<!-- Contact Form-->
		<div id="contact-form-section" class="contact-form-section">
			<div class="white-bg">
				<div class="sec-head-container">
					<div class="sec-head-style">
						<h2 class="section-title wow bounceInDown">
							MB<span>M</span> Aloqa
						</h2><!-- /.section-title -->

						<div class="section-description">
							Biz bilan aloqaga chiqish uchun quyidagi ko'rsatilgan manzillarga murojaat qiling. Unutmang biz sizga xizmat ko'rsatishdan mamnunmiz!
						</div>
					</div>
				</div><!-- /.sec-head-container -->

				<div class="container">
					<div class="row">
						<div class="contact-form-container">
							<form id="contact-form"  action="email.php" method="post" name="contactform">
								<div class="col-md-6">
									<div id="name_error" class="error"><img src="assets/images/email/error.png" alt="Error!">Iltimos, F.I.O ni to'liq kiriting</div>
									<input id="name" class="form-control" name="name" type="text" placeholder=" F.I.O" required>

									<div id="email_error" class="error"><img src="assets/images/email/error.png" alt="Error!">Iltimos, elektron manzilingizni kiriting</div>
									<input id="email" class="form-control" name="email" type="email" placeholder="elektron manzil" required>

									<div id="subject_error" class="error"><img src="assets/images/email/error.png" alt="Error!">Mavzu nomi ko'rsating</div>
									<input id="subject" class="form-control" name="subject" type="text" placeholder="mavzu nomi" required>
								</div><!-- /.col-md-6 -->

								<div class="col-md-6">
									<div id="message_error" class="error"><img src="assets/images/email/error.png" alt="Error!">Xabaringizni to'liq yozib qoldiring</div>
									<textarea id="your_message" class="form-control" name="your_message" placeholder="xabaringizni qoldiring" rows="4" required></textarea>

									<div id="submit">
										<button type="submit" id="send_message" class="btn btn-sm btn-light-red full-width btn-effect">Yuborish</button>
									</div><!-- /#submit -->
								</div><!-- /.col-md-6 -->
								<div class="col-md-12">
									<?php if($_GET['status'] == "success"){
										echo '<p style="color: green;">Xabaringiz muoffaqiyatli yuborildi</p>';
									} else {
										echo'<p style="color: red;"> Kechirasiz, xabar yuborishda muammolar paydo bo\'ldi</p>';
									}?>
									<!-- <div id="mail_success" class="success"><img src="assets/images/email/success.png" alt="Success!">Xabaringiz muoffaqiyatli yuborildi</div>
									<div id='mail_fail' class='error'>
										<img src="assets/images/email/error.png" alt="Error!"> Kechirasiz, xabar yuborishda muammolar paydo bo'ldi.
									</div> -->
								</div><!-- /.col-md-12 -->
							</form><!-- /#contact-form -->
						</div><!-- /.contact-form-container -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.white-bg -->
		</div><!-- /#contact-form-section -->
		<!-- Contact Form End-->

		<!-- Contact Details End-->
		<div id="contact-details">
			<div class="gray-bg contact-details">
				<div class="container">
					<div class="row">
						<h3 class="text-center title">Biz bilan aloqaga chiqing</h3>
						<div class="contact-info">

								<div class="col-md-3 col-sm-6 contact-info-box wow bounceInDown center animated" data-wow-delay=".2s">

									<span class="icon map-marker">
										<i aria-hidden="true" class="li_location"> </i>
									</span>
									<p class="contact-details-title">Manzil</p>
									<span class="texts">Toshkent shahri, Shayhontohur tumani,Mahtumquli koʼchasi 2-uy. Moʼljal Huvaydo restorani.
									</span>
								</div> <!-- /.contact-info-box -->

								<div class="col-md-3 col-sm-6 contact-info-box wow bounceInDown center animated" data-wow-delay=".4s">
									<span class="icon envelope">
										<i aria-hidden="true" class="li_mail"></i>
									</span>
									<p class="contact-details-title">Email</p>
									<span class="texts"><a href="#">info@mbmitc.uz</a> <br>
										<a href="#">mahmudjon2127@gmail.com</a>
									</span>
								</div><!--  /.contact-info-box -->

								<div class="col-md-3 col-sm-6 contact-info-box wow bounceInDown center animated" data-wow-delay=".6s">
									<span class="icon phone">
										<i aria-hidden="true" class="li_phone"></i>
									</span>
									<p class="contact-details-title">Telefon</p>
									<span class="texts">+998 (97) 766 82 78 <br>
										+998 (97) 734 17 75
									</span>
								</div><!-- /.contact-info-box -->

								<div class="col-md-3 col-sm-6 contact-info-box wow bounceInDown center animated" data-wow-delay=".8s">
									<span class="icon skype"><i class="fa fa-skype"></i></span>
									<p class="contact-details-title">Skype</p>
									<span class="texts"><a href="#">support.mbmitc@skype.com</a> <br>
										<a href="#">help.mbmitc@skype.com</a>
									</span>
								</div><!-- /.contact-info-box -->
						</div><!-- /.contact-info -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.gray-bg  /.contact-details -->
		</div><!-- /#contact-details -->
		<!-- Contact Details End-->

	</section><!-- /#contact -->
	<section id="google-map-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <object style="border:0; height: 450px; width: 100%;" data="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11982.25646227903!2d69.204007!3d41.3400908!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7b28c283edeb9cd4!2sAvlod21!5e0!3m2!1sru!2s!4v1579547481182!5m2!1sru!2s"></object>
          </div>
        </div>
      </div>
    </section>
	<!-- Google Map Section End -->




	<!-- Footer Section -->
	<footer id="footer-section">
		<div class="footer-section parallax-style">
			<div class="pattern">
				<div class="container">
					<div class="footer-social-btn">
						<a href="#" class="twitter-btn wow rollIn center animated" data-wow-delay=".1s"><i class="fa fa-twitter"></i></a>
						<a href="#" class="twitter-btn wow rollIn center animated" data-wow-delay=".1s"><i class="fa fa-location-arrow"></i></a>
						<a href="#" class="facebook-btn wow rollIn center animated" data-wow-delay=".2s"><i class="fa fa-facebook"></i></a>
						<a href="#" class="dribbble-btn wow rollIn center animated" data-wow-delay=".3s"><i class="fa fa-instagram"></i></a>
						<a href="#" class="linkedin-btn wow rollIn center animated" data-wow-delay=".4s"><i class="fa fa-linkedin"></i></a>
						<a href="#" class="pinterest-btn wow rollIn center animated" data-wow-delay=".5s"><i class="fa fa-pinterest"></i></a>
						<a href="#" class="google-plus-btn wow rollIn center animated" data-wow-delay=".6s"><i class="fa fa-google-plus"></i></a>
						<a href="#" class="youtube-btn wow rollIn center animated" data-wow-delay=".7s"><i class="fa fa-youtube"></i></a>
						<a href="#" class="rss-btn wow rollIn center animated" data-wow-delay=".8s"><i class="fa fa-rss"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- Footer Section End -->


	<div id="scroll-to-top">
		<span>
			<i class="fa fa-chevron-up"></i>
		</span>
	</div>

	<script src="assets/js/modernizr-2.8.0.min.js"></script>
	<script src="assets/js/jquery-2.1.0.min.js"></script>
	<!-- <script src="assets/js/email-validation.js"></script> -->
	<script src="assets/js/plugins.js"></script>
	<script src="assets/js/functions.js"></script>
	<script src="assets/js/jquery.parallax.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/jquery.content_slider.min.js"></script>
	<script src="assets/js/jquery.mousewheel.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="assets/js/gmap3.js"></script>
</body>
</html>
