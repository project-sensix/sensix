<?php

    if(isset($_GET["name"]) && isset($_GET["email"]) && isset($_GET["message"])) {
        require 'PHPMailerAutoload.php';

        $sensixMail = "project.sensix@gmail.com";
        $name       = $_GET["name"];
        $email      = $_GET["email"];
        $message    = $_GET["message"];

        $mailer = new PHPMailer();
        //$mailer->SMTPDebug = 3;                               // Enable verbose debug output
        $mailer->isSMTP();                                      // Set mailer to use SMTP
        $mailer->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mailer->SMTPAuth = true;                               // Enable SMTP authentication
        $mailer->Username = $sensixMail;                 // SMTP username
        $mailer->Password = 'Frtznbrmft2x16*';                           // SMTP password
        $mailer->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $mailer->Port = 465;                                    // TCP port to connect to

        // Empfänger hinzufügen
        $mailer->setFrom($sensixMail, "SENSIX by A3M");     // Absender
        $mailer->addAddress($sensixMail, $sensixMail);      // Empfänger
        $mailer->addAddress($email, $name);

        $mailer->Subject = "Kontaktanfrage | SENSIX";
        /*$mailer->Body    = "<h3>Du hast eine EMail bekommen!</h3> " . $_GET["name"] .
                        "<h3>E-Mail des Absenders</h3> " . $_GET["email"] .
                        "<h3>Nachricht des Absenders</h3> " . $_GET["message"];*/

        // Bilder anhängen, damit diese verschickt werden können
        $mailer->AddEmbeddedImage('../img/person.png', 'person');
        $mailer->AddEmbeddedImage('../img/message.png', 'message');
        $mailer->AddEmbeddedImage('../img/internet.png', 'internet');
        $mailer->AddEmbeddedImage('../img/facebook.png', 'facebook');
        $mailer->AddEmbeddedImage('../img/mail.png', 'mail');

        $mailer->Body = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width" />
		<!-- NOTE: external links are for testing only -->
		<!--<link href="//cdn.muicss.com/mui-0.8.1/email/mui-email-styletag.css" rel="stylesheet" />
		<link href="//cdn.muicss.com/mui-0.8.1/email/mui-email-inline.css" rel="stylesheet" />-->
	</head>
	<body style="color: #212121; font-family: \'Helvetica Neue\', Helvetica, Arial, Verdana, \'Trebuchet MS\'; font-weight: 400; font-size: 14px; line-height: 1.429; letter-spacing: 0.001em; background-color: #fafafa;  width: 100% !important; margin: 0 auto; min-width: 100%; margin: 0; padding: 0;">
		<table class="mui-body" cellpadding="0" cellspacing="0" border="0" style="  margin: 0; padding: 0; height: 100%; width: 100%; margin: 0 auto; color: #212121; font-family: \'Helvetica Neue\', Helvetica, Arial, Verdana, \'Trebuchet MS\';	font-weight: 400;	font-size: 14px;	line-height: 1.429;	letter-spacing: 0.001em; background-color: #f5f5f5;">
			<tr>
				<td>
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td class="" style="text-align: center; background-color: #009688; color: #FFFFFF;">
								<h1>SENSIX</h1>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td>
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td class="" style="text-align: center;  color: #ff5252;">
								<h1>Kontaktanfrage</h1>
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td>
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td class="" style="text-align: center; width: 50px;">
								<img src="cid:mail" width="28" height="28">
							</td>
							<td style="text-align: left;">
								' . $email . '
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td>
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td class="" style="text-align: center;  width: 50px;">
								<img src="cid:person" width="28" height="28">
							</td>
							<td style="text-align: left;">
								' . $name . '
							</td>
						</tr>
					</table>
				</td>
			</tr>

			<tr>
				<td>
					<table cellpadding="0" cellspacing="0" border="0" width="100%">
						<tr>
							<td class="" style="text-align: center;  width: 50px;">
								<img src="cid:message" width="28" height="28">
							</td>
							<td style="text-align: left;">
								' . $message . '
							</td>
						</tr>
					</table>
				</td>
			</tr>
			
			<tr>
				<td>
					<table cellpadding="0" cellspacing="0" border="0" width="100%" style="padding-top: 40px;">
						<tr>
							<td class="" style="text-align: center; background-color: #00695c; color: #FFFFFF; padding: 10px 0px 0px 0px;">
								© copyright Team A3M
							</td>
						</tr>

						<tr>
							<td class="" style="text-align: center; background-color: #00695c; color: #FFFFFF; width: 50px;">
								<table  cellpadding="0" cellspacing="0" border="0" width="100%">
									<tr>
										<td style="text-align: right; background-color: #00695c; color: #FFFFFF; width: 50px; padding: 10px 10px 10px 0px;">
											<a href="http://www.sensix.systems"><img src="cid:internet" width="28" height="28"></a>
										</td>
										<td style="text-align: left; background-color: #00695c; color: #FFFFFF; width: 50px; padding: 10px 10px 10px 0px;">
											<a href="http://www.facebook.com"><img src="cid:facebook" width="28" height="28"></a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>
        ';
        $mailer->AltBody = "Name: " . $name .
                        " EMail:" . $email .
                        " Nachricht:" . $message;

        if(!$mailer->send()) {
            // Fail
            echo json_encode([
                "mail_sent"  => "false",
                "mail_error" => $mailer->ErrorInfo
            ]);
        } else {
            // Success
            echo json_encode(["mail_sent" => "true"]);
        }
    } else
        echo json_encode(["mail_sent" => "nottrue"]);


?>