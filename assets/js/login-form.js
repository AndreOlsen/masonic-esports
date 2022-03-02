jQuery(document).ready(function ($) {
	$(".switch-login-register-form").click(function (e) {
		e.preventDefault();
		$("#customer_login .u-column1").toggle();
		$("#customer_login .u-column2").toggle();
	});
});
