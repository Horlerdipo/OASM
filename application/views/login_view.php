<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html>
<head>
	<title><?php ?></title>
</head>
<body>
	<?php echo $error; ?>
	<?php echo form_open("users/login");?>
	 <?php //echo form_error('username');?>
	Username
	<?php echo form_input('username',set_value('username'));?>
	<br>
	<br>
	Email
	<?php //echo form_error('email');?>
	<?php echo form_input('email',set_value('email'))?>
	<br>
	<br>
	Password
	<?php //echo form_error('password');?>
	<?php echo form_password('password',set_value('password'));?>
	<br>
	<br>
	<?php echo form_submit("submit","submit");?>
	<?php echo form_close();?>

	<a href="register"><button>sign up</button></a>

</body>
</html>