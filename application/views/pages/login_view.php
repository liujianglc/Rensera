<?php
$login = array(
		'name'	=> 'userid',
		'id'	=> 'userid',
		'value' => set_value('userid'),
		'maxlength'	=> 80,
		'size'	=> 30,
		'class' =>'form-control',
		'placeholder' => 'User ID'
);
$login_label = 'User ID';
$password = array(
		'name'	=> 'password',
		'id'	=> 'password',
		'size'	=> 30,
		'class' =>'form-control',
		'placeholder'=>'Password'
);
$remember = array(
		'name'	=> 'remember',
		'id'	=> 'remember',
		'value'	=> 1,
		'checked'	=> set_value('remember'),
	'style' => 'margin:0;padding:0',
);
$captcha = array(
		'name'	=> 'captcha',
		'id'	=> 'captcha',
		'maxlength'	=> 8,
);
?>
<body class="login-page">
	<link rel="stylesheet" type="text/css" href="/assets/css/signin.css">
	<div class="container">
		<?php echo form_open($this->uri->uri_string(),array('class'=>'form-signin')); ?>
		<?php echo form_label($login_label, $login['id'],array('class'=>'sr-only')); ?>
		<?php echo form_input($login); ?>
		<?php echo form_label('Password', $password['id'],array('class'=>'sr-only')); ?>
		<?php echo form_password($password); ?>
		<div class="checkbox-login">
			<label for="rememberMe">
				<input type="checkbox" value="1" id="rememberMe" name="remember" style="display: inline-block;">
				<span class="label-text">Remember me</span>
			</label>
		</div>
		<button class="btn btn-lg btn-block btn-primary" type="submit">Sign In</button>
		<?php echo form_close(); ?>
	</div>
</div>
