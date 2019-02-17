<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>CERN South Asia Science Education Program</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<link href="/img/favicon.ico" rel="icon">
	<link href="/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
	 rel="stylesheet">
	<link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="/lib/animate/animate.min.css" rel="stylesheet">
	<link href="/lib/venobox/venobox.css" rel="stylesheet">
	<link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="/css/style.css" rel="stylesheet">
</head>

<body>
	<header id="header" class="header-scrolled">
		<div class="container">
			<div id="logo" class="pull-left">
				<a href="/#intro" class="scrollto">
					<!-- <h1 class="mb-4 pb-0"><span>Kanona</span></h1> -->
				</a>
			</div>
		</div>
	</header>

	<main id="main" style="margin-top: 70px">
		<section class="registera" id="subtitle">
			<div class="container">
				<div class="row">
					<div class="col-lg-9">
						<h2>Register</h2>
					</div>
					<div class="col-lg-3"></div>
				</div>
			</div>
		</section>

		<section id="register" class="speakers-details wow fadeIn">
			<div class="container">
				<div class="section-header">
					<h2>Registration Form</h2>
				</div>
				<div class="form">
					<div id="sendmessage"></div>
					<div id="errormessage"></div>
					<form action="/php/insert_data.php" method="post" id="registerForm" role="form" class="contactForm">
						<div class="row">
							<div class="col-md-6">
								<div class="form-row">
									<div class="form-group col-md-10">
										<input type="text" name="f_name" class="form-control" id="first_name" placeholder="First Name" data-rule="minlen:1"
										data-msg="Please enter your first name" />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-10">
										<input type="text" name="l_name" class="form-control" id="last_name" placeholder="Last Name" data-rule="minlen:1"
										data-msg="Please enter your last name" />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-4">
										<input type="date" name="birth_date" class="form-control" id="birth_date" placeholder="Date oF Birth" data-rule="required"
										data-msg="Please enter your date of birth" />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-6">
										<input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" data-rule="phone" data-msg="Please enter a valid 10-digit phone no." />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-12">
										<input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" data-msg="Please enter a valid email" />
										<div class="validation"></div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-row">
									<div class="form-group col-md-8">
										<input type="text" class="form-control" name="city" id="city" placeholder="City of Residence" data-rule="required" data-msg="Please enter your city of residence" />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-10">
										<input type="text" class="form-control" name="employer" id="employer" placeholder="Current Employer" data-rule="required" data-msg="Please enter your current employer" />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-12">
										<label for="ex_employer1">Last 3 Employers (if applicable)</label>	
										<input type="text" class="form-control" name="ex_employer1" id="ex_employer1" placeholder="1." data-rule="" data-msg="" />
										<input type="text" class="form-control" name="ex_employer2" id="ex_employer2" placeholder="2." data-rule="" data-msg="" />
										<input type="text" class="form-control" name="ex_employer3" id="ex_employer3" placeholder="3." data-rule="" data-msg="" />
									</div>
									<div class="form-group col-md-12">
										<input type="text" class="form-control" name="subjects" id="subjects" placeholder="Subjects taught by you" data-rule="required" data-msg="Please enter the subjects taught by you" />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-10">
										<input type="text" class="form-control" name="curriculum" id="curriculum" placeholder="Curriculum taught by you" data-rule="required" data-msg="Please enter the curriculum taught by you" />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-7">
										<input type="number" class="form-control" name="class_size" id="class_size" placeholder="Typical class size taught by you" data-rule="required" data-msg="Please enter the class size taught by you" />
										<div class="validation"></div>
									</div>
									<div class="form-group col-md-12">
										<label for="IB_curr_yes">Have you taught IB Curriculum?</label>
										<div class="btn-group btn-group-toggle" data-toggle="buttons">
											<label class="btn btn-primary">
												<input type="radio" name="IB_curr" value="yes" id="IB_curr_yes"> Yes
											</label>
											<label class="btn btn-primary active">
												<input type="radio" name="IB_curr" value="no" id="IB_curr_no" checked> No
											</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="participatereason">What motivates you to participate?</label>
							<textarea id="participatereason" class="form-control" name="about" rows="5" data-rule="minlen:1500" data-msg="Please write 250-300 words" placeholder=""></textarea>
							<div class="validation"></div>
						</div>
						<div class="form-group">
							<label for="conceptteaching">Choose a concept and describe it in an innovative way – that is, without using the textbook language and instead, using on a real world example or an activity. Explain the concept as if you are explaining it to your students</label>
							<textarea id="conceptteaching" class="form-control" name="about" rows="5" data-rule="minlen:1500" data-msg="Please write 250-300 words" placeholder=""></textarea>
							<div class="validation"></div>
						</div>
						<div class="form-group">
						<label for="apply1">List three ways in which you will use and apply your learning from this workshop.</label>
							<input type="text" class="form-control" name="apply1" data-rule="required" data-msg="Please write your first reason" placeholder="1." id="apply1"/>
							<div class="validation"></div>
							<input type="text" class="form-control" name="apply2" data-rule="required" data-msg="Please write your second reason" placeholder="2." id="apply2"/>
							<div class="validation"></div>
							<input type="text" class="form-control" name="apply3" data-rule="required" data-msg="Please write your third reason" placeholder="3." id="apply3"/>
							<div class="validation"></div>
						</div>
						<div class="text-center"><button type="submit">Register</button></div>
					</form>
				</div>
			</div>
		</section>
	</main>

	<footer id="footer">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-7 footer-info">
						<h1 class="mb-4 pb-0"><span></span></h1>
					</div>

					<div class="col-lg-4 col-md-7 footer-links">
						<h4>Useful Links</h4>
						<ul>
							<li><i class="fa fa-angle-right"></i> <a target="_blank" href="https://home.cern/">CERN</a></li>
							<li><i class="fa fa-angle-right"></i> <a target="_blank" href="https://ecolint.ch">Ecolint</a></li>
							<li><i class="fa fa-angle-right"></i> <a target="_blank" href="http://www.lifelab.org.in/">Life Lab Foundation</a></li>
							<li><i class="fa fa-angle-right"></i> <a target="_blank" href="http://www.shivnadarfoundation.org">Shiv Nadar
									Foundation</a></li>
						</ul>
					</div>

					<div class="col-lg-4 col-md-7 footer-contact">
						<h4>Contact Us</h4>
						<p>
							Prachi Jha (Lifelab Foundation)<br>
							<strong>Phone:</strong> <a id='contact' href="tel:+918377833563">83778 33563</a><br>
							<strong>Email:</strong> <a id='contact' href="mailto:prachi@lifelab.org.in">prachi@lifelab.org.in</a>
						</p>
						<p>
							Vinita Sharat (Shiv Nadar School)<br>
							<strong>Phone:</strong> <a id='contact' href="tel:+919654143732">96541 43732</a><br>
							<strong>Email:</strong> <a id='contact' href="vinita.sharat@sns.edu.in">vinita.sharat@sns.edu.in</a>
						</p>

						<div class="social-links">
							<a target="_blank" href="https://www.facebook.com/ShivNadarSchool" class="facebook"><i class="fa fa-facebook"></i></a>
							<a target="_blank" href="https://twitter.com/ShivNadarSchool" class="twitter"><i class="fa fa-twitter"></i></a>
							<a target="_blank" href="https://www.linkedin.com/company/shiv-nadar-school" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>

				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-7">
					<div class="copyright">
						Website designed by <span style="color: #00ABEF">Aditya Kulshrestha</span>
					</div>
				</div>
				<div class="col-lg-6 col-md-7">
					<div class="copyright">
						&copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
					</div>
					<div class="credits">
						Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

	<script src="/lib/jquery/jquery.min.js"></script>
	<script src="/lib/jquery/jquery-migrate.min.js"></script>
	<script src="/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="/lib/easing/easing.min.js"></script>
	<script src="/lib/superfish/hoverIntent.js"></script>
	<script src="/lib/superfish/superfish.min.js"></script>
	<script src="/lib/wow/wow.min.js"></script>
	<script src="/lib/venobox/venobox.min.js"></script>
	<script src="/lib/owlcarousel/owl.carousel.min.js"></script>
	<script src="/js/contactform.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/scrollnav.js"></script>
</body>

</html>