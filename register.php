<?php
	session_start();

	$msg = "";

	if (isset($_POST['submit'])) {
		$con = new mysqli('localhost', 'root', 'ivtree123', 'action-plan');

		
		$email = $con->real_escape_string($_POST['email']);
		$_SESSION['email']=$email;
		

		if ($email == "")
			$msg = "Please check your inputs!";
		else {
			$sql = $con->query("SELECT id FROM users WHERE email='$email'");
			if ($sql->num_rows > 0) {
				$msg = "Email already exists in the database!";
			} else {
				$token = 'qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*';
				$token = str_shuffle($token);
				$token = substr($token, 0, 10);
				$_SESSION['token']=$token;

				$con->query("INSERT INTO users (email,isEmailConfirmed,token)
					VALUES ('$email', '0', '$token');
				");       

                include_once "PHPMailer/PHPMailer.php";
                require 'phpmailer/PHPMailerAutoload.php';
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = "smtp.gmail.com";
				$mail->SMTPSecure = "ssl";
				$mail->Port = 465;
				$mail->SMTPAuth = true;

				$mail->Username = 'vikram.giriraj@ivtree.com';
				$mail->Password = 'Mysticeye@123';

                $mail->setFrom('vikram.giriraj@ivtree.com');
                $mail->addAddress($email);
                $mail->Subject = "Please verify email!";
                $mail->isHTML(true);
                $mail->Body = '<div><div class="aHl"></div><div tabindex="-1" id=":8r"></div><div class="ii gt" id=":92"><div tabindex="-1" class="a3s aXjCH msg3152237477592953147" id=":93" role="gridcell"><u></u> <div style="font-size:16px;background-color:#fdfdfd;margin:0;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;line-height:1.5;height:100%!important;width:100%!important"> <div> <div> </div> </div> <table width="100%" class="m_3152237477592953147body" style="box-sizing:border-box;border-spacing:0;width:100%;background-color:#fdfdfd;border-collapse:separate!important" bgcolor="#fdfdfd"> <tbody> <tr> <td valign="top" style="box-sizing:border-box;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top">&nbsp;</td> <td width="600" class="m_3152237477592953147container" valign="top" style="box-sizing:border-box;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top;display:block;width:600px;max-width:600px;margin:0 auto!important"> <div class="m_3152237477592953147content" style="box-sizing:border-box;display:block;max-width:600px;margin:0 auto;padding:10px"><span class="m_3152237477592953147preheader" style="color:transparent;display:none;height:0;max-height:0;max-width:0;opacity:0;overflow:hidden;width:0">Let\'s confirm your email address.</span> <div class="m_3152237477592953147header" style="box-sizing:border-box;width:100%;margin-bottom:30px;margin-top:15px"> <table width="100%" style="box-sizing:border-box;width:100%;border-spacing:0;border-collapse:separate!important"> <tbody> <tr> <td align="left" class="m_3152237477592953147align-left" valign="top" style="box-sizing:border-box;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top;text-align:left"><span class="m_3152237477592953147sg-image"><a style="box-sizing:border-box;color:#348eda;font-weight:400;text-decoration:none" href="https://uniclair.com/" target="_blank"><img width="123" height="22" class="CToWUd" style="max-width:100%;border-style:none;width:123px;height:22px" alt="uniclair-main" src="https://uniclair.com/wp-content/uploads/2018/04/Webp.net-resizeimage-1111.png"></a></span></td> </tr> </tbody> </table> </div> <div class="m_3152237477592953147block" style="box-sizing:border-box;width:100%;margin-bottom:30px;background:#ffffff;border:1px solid #f0f0f0"> <table width="100%" style="box-sizing:border-box;width:100%;border-spacing:0;border-collapse:separate!important"> <tbody> <tr> <td class="m_3152237477592953147wrapper" valign="top" style="box-sizing:border-box;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top;padding:30px"> <table width="100%" style="box-sizing:border-box;width:100%;border-spacing:0;border-collapse:separate!important"> <tbody> <tr> <td valign="top" style="box-sizing:border-box;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top"> <h2 style="margin:0;margin-bottom:30px;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-weight:300;line-height:1.5;font-size:24px;color:#294661!important">You\'re on your way!<br> Let\'s confirm your email address.</h2> <p style="margin:0;margin-bottom:30px;color:#294661;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;font-weight:300">By clicking on the following link, you are confirming your email address.</p> </td> </tr> <tr> <td valign="top" style="box-sizing:border-box;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top"> <table width="100%" class="m_3152237477592953147btn m_3152237477592953147btn-primary" style="box-sizing:border-box;border-spacing:0;width:100%;border-collapse:separate!important" cellspacing="0" cellpadding="0"> <tbody> <tr> <td align="center" valign="top" style="box-sizing:border-box;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top;padding-bottom:15px"> <table style="box-sizing:border-box;border-spacing:0;width:auto;border-collapse:separate!important" cellspacing="0" cellpadding="0"> <tbody> <tr> <td align="center" valign="top" style="box-sizing:border-box;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top;background-color:#8ecd4e;border-radius:2px;text-align:center" bgcolor="#8ecd4e"><a style="box-sizing:border-box;border-color:#8ecd4e;font-weight:400;text-decoration:none;display:inline-block;margin:0;color:#ffffff;background-color:#8ecd4e;border:solid 1px #8ecd4e;border-radius:2px;font-size:14px;padding:12px 45px" href="http://localhost/Action-plan/eula.php?email=$email&token=$token" target="_blank">Confirm Email Address</a></td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> </td> </tr> </tbody> </table> <p style="margin:0;margin-bottom:30px; margin-left:30px;color:#294661;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:12px;font-weight:200">This link will expire in 24 hours. Do contact us at <a style="text-decoration: none;" href="mailto:support@ivtree.com">support@ivtree.com</p> </div> <div class="m_3152237477592953147footer" style="box-sizing:border-box;clear:both;width:100%"> <table width="100%" style="box-sizing:border-box;width:100%;border-spacing:0;font-size:12px;border-collapse:separate!important"> <tbody> <tr style="font-size:12px"> <td align="center" class="m_3152237477592953147align-center" valign="top" style="box-sizing:border-box;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;vertical-align:top;font-size:12px;text-align:center;padding:20px 0"><span class="m_3152237477592953147sg-image" style="float:none;display:block;text-align:center"><a style="box-sizing:border-box;color:#348eda;font-weight:400;text-decoration:none;font-size:12px" href="https://uniclair.com/" target="_blank"><img width="89" height="16" class="CToWUd" style="max-width:100%;border-style:none;font-size:12px;width:89px;height:16px" alt="uniclair-main" src="https://uniclair.com/wp-content/uploads/2018/04/Webp.net-resizeimage-1111.png"></a></span> <p class="m_3152237477592953147tagline" style="color:#294661;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:12px;font-weight:400;margin-bottom:5px;margin:10px 0 20px">Unified Platform For Software Engineering</p> <p style="margin:0;color:#294661;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-weight:300;font-size:12px;margin-bottom:5px"> © IVTREE IT Solutions.</p><p style="margin:0;color:#294661;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-weight:300;font-size:12px;margin-bottom:5px">ThinkHub, 100-103 Export Promotion Industrial Park, Whitefield, Bengaluru, Karnataka 560066</p> <p style="margin:0;color:#294661;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-weight:300;font-size:12px;margin-bottom:5px"><a style="box-sizing:border-box;color:#348eda;font-weight:400;text-decoration:none;font-size:12px;padding:0 5px" href="https://in.linkedin.com/company/ivtree" target="_blank">LinkedIn</a></p> </td> </tr> </tbody> </table> </div> </div> </td> <td valign="top" style="box-sizing:border-box;padding:0;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Helvetica,Arial,sans-serif;font-size:16px;vertical-align:top">&nbsp;</td> </tr> </tbody> </table><div class="yj6qo"></div><div class="adL"> </div></div><div class="adL"> </div></div></div><div class="ii gt" id=":8o" style="display:none"><div tabindex="-1" class="a3s aXjCH undefined" id=":8n" role="gridcell"></div></div><div class="hi"></div></div>';

                if ($mail->send())
                    $msg = "Entered Email has been registered! Waiting for email verification...";
                else
                    $msg = "Something wrong happened! Please try again!";
			}
		}
	}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<div class="row justify-content-center">
			<div class="col-md-6 col-md-offset-3" align="center">

				<img src="images/Icon-250x80-transparant.png"><br><br>

				<?php if ($msg != "") echo $msg . "<br><br>" ?>

				<form method="post" action="register.php">
					<br>
					<input class="form-control" name="email" type="email" placeholder="Email..."><br>
					<input class="btn btn-primary" type="submit" name="submit" value="Register">
				</form>

			</div>
		</div>
	</div>
</body>
</html>
