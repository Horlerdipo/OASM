<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
</head>
<body>
	<?php //echo $error;?>

	<?php echo form_open('users/signup');?>

	<?php echo(form_error('matric_no'));?>
	<?php echo(form_label('Your Matric No/Staff ID'));?>
	<?php echo(form_input('matric_no',set_value('matric_no')));?>
	<br>
	<br>

	<?php echo(form_error('email'));?>
	<?php echo(form_label('Your Email'));?>
	<?php echo(form_input('email',set_value('email')));?>
	<br>
	<br>

	<?php echo(form_error('password'));?>
	<?php echo(form_label('Your Password'));?>
	<?php echo(form_password('password',set_value('password')));?>
	<br>
	<br>

	<?php echo(form_error('confpassword'));?>
	<?php echo(form_label('Confirm Your Password'));?>
	<?php echo(form_password('confpassword',set_value('confpassword')));?>
	<br>
	<br>

	<?php echo(form_error('type'));?>
	<?php echo(form_label('Which one are you?'));?>
	<?php echo(form_dropdown('type',['student'=>'student','lecturer'=>'lecturer']));?>

	<?php echo(form_submit('submit','submit'));?>

	<?php echo form_close();?>
	<a href="login"><button>sign in</button></a>
</body>
</html>