<?php
function wp_custom_login_logo() {
    error_log("Custom login logo function called."); // Add this line for debugging
    ?>
    <style type="text/css">
		
		#login h1 a, .login h1 a {
            background-image: url(https://webperfection.co.in/img/logo.png);
            height: 100px;
            width: 300px;
            background-size: 300px 100px;
            background-repeat: no-repeat;
            padding-bottom: 10px;
        }
		
		body.login {
			background: #CCC;
		}
		
    </style>
    <?php 
}
add_action( 'login_enqueue_scripts', 'wp_custom_login_logo' );