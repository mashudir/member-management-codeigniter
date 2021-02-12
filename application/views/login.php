<html lang="en">
<!--
Author     : Mashudi Rohmat Amd. Kom.
Project    : Member Management `Kalasan Youth`
Year       : 2021
-->
<head>
	<meta charset="utf-8" />
	<title>Kalasan Youth | Login</title>
	<meta name="description" content="Login page example" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="canonical" href="https://keenthemes.com/metronic" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<link href="<?php echo base_url() ?>assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url() ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/download.png" />
</head>
<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
	<div class="d-flex flex-column flex-root">
		<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
			<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?php echo base_url() ?>assets/media/bg/bg-3.jpg');">
				<div class="login-form text-center p-7 position-relative overflow-hidden">
					<div class="d-flex flex-center mb-15">
						<a href="#">
							<img src="<?php echo base_url() ?>assets/media/logos/ppd.jpeg" class="max-h-150px" alt="" />
						</a>
					</div>
					<div class="login-signin">
						<div class="mb-20">
							<h3>Sign In To Admin</h3>
							<div class="text-muted font-weight-bold">Jangan lupa senyum &amp; Bismillah</div>
						</div>
						<div class="badge badge-danger pulse"><?php echo $this->session->flashdata('msg'); ?></div>
						<form class="form" action="<?php echo base_url().'index.php/login/auth'?>" method="post">
							<div class="form-group mb-5">
								<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="username" name="username" autocomplete="off" />
							</div>
							<div class="form-group mb-5">
								<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Password" name="password" />
							</div>
							<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
							</div>
							<button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
	<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#0BB783", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#D7F9EF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
	<script src="<?php echo base_url() ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url() ?>assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
	<script src="<?php echo base_url() ?>assets/js/scripts.bundle.js"></script>
	<script src="<?php echo base_url() ?>assets/js/pages/custom/login/login-general.js"></script>
</body>
</html>