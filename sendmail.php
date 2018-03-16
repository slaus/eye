<?php
// Email Submit
// Note: filter_var() requires PHP >= 5.2.0
if ( isset($_POST['email']) && isset($_POST['name']) && isset($_POST['message']) ) {

	// detect & prevent header injections
//	$test = "/(content-type|bcc:|cc:|to:)/i";
//	foreach ($_POST as $key => $val) {
//		if (preg_match($test, $val)) {
//			exit;
//		}
//	}

	//$to = "mister.slaus@gmail.com";	// receiver of the email
        $to="1magiclash@gmail.com";
        $subject = "Сообщение с сайта magic-lash.kiev.ua.";			// subject of the email
	$message = '
	<html>
		<head>
    			<meta charset="utf-8">
			<title>Контактная форма с сайта</title>
		</head>
		<body>
			<h3>Имя: <span style="font-weight: normal;">' . $_POST['name'] . '</span></h3>
			<h3>Email: <span style="font-weight: normal;">' . $_POST['email'] . '</span></h3>
			<div>
				<h3 style="margin-bottom: 5px;">Сообщение:</h3>
				<div>' . $_POST['message'] . '</div>
			</div>
		</body>
	</html>';

	$headers  = "Content-type: text/html; charset=utf-8 \r\n";

	// E-mail sending function
	if (mail($to, $subject, $message, $headers)) { 
	   echo '<html>
		    <head>
    	        <meta http-equiv="Refresh" content="5; URL=http://magic-lash.kiev.ua/" />
    	    </head>
		    <body>
	            <div align="center" style="margin-top:30%;">ВАШЕ ПИСЬМО БЫЛО ОТПРАВЛЕНО.<br>ЧЕРЕЗ 5 СЕКУНД ВЫ БУДЕТЕ ПЕРЕНАПРАВЛЕНЫ НА ГЛАВНУЮ СТРАНИЦУ.</div>
	        </body>
	    </html>';
	} else {
	   echo '<html>
		    <head>
    	        <meta http-equiv="Refresh" content="5; URL=http://magic-lash.kiev.ua/" />
    	    </head>
		    <body>
	            <div align="center" style="margin-top:30%;">ПРОИЗОШЛА ОШИБКА ПРИ ОТПРАВКИ СООБЩЕНИЯ.<br>ЧЕРЕЗ 5 СЕКУНД ВЫ БУДЕТЕ ПЕРЕНАПРАВЛЕНЫ НА ГЛАВНУЮ СТРАНИЦУ.</div>
	        </body>
	    </html>';
	}

}
?>
