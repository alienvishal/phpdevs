<?php
require_once( 'header.php' );
?>


<h1>Welcome to Quiz World</h1>
<?php
require_once( '../Controller/quiz_controller.php' );

if( $_SERVER['REQUEST_METHOD'] == "POST" ){

	$quiz = new Quiz_controller();

	if( isset($_POST['login_submit']) ){
		
		$username = $_POST['username'];
		$password = $_POST['password'];

		$status = $quiz->login( $username, $password );
		$status_login = $status;
	}

	if( isset($_POST['register_submit']) ){

		$username = $_POST['username'];
		$password = $_POST['password'];
	
		$status = $quiz->register( $username, $password );
		$status_register = $status;
	}
}

?>

<div class="wrapper">
	
	
	<div class="login-box"> 
		
		<div class="login-header">
			<h2>Login Form</h2>
		</div>
		
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-control">
			
			<div class="warning_message">
				<span class="color"><?php if( isset($status_login) ) echo $status_login; ?></span>
			</div>

			<label>Username<span class="color">*</span></label>
			<input type="text" name="username" placeholder="Enter Username" value="<?php if( isset($_POST['login_submit']) ) echo $_POST['username']; ?>" />

			<label>Password<span class="color">*</span></label>
			<input type="password" name="password" placeholder="Enter Password" />

			<input type="submit" name="login_submit" class="btn_secondary">
		</form>
	</div>

	<div class="register-box">
		
		<div class="register-header">
			<h2>SignUp Form</h2>
		</div>
		
		<form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-control">
			
			<div class="warning_message">
				<span class="color"><?php if( isset($status_register) ) echo $status_register; ?></span>
			</div>

			<label>Username<span class="color">*</span></label>
			<input type="text" name="username" placeholder="Enter Username" value="<?php if( isset($_POST['register_submit']) ) echo $_POST['username']; ?>" />

			<label>Password<span class="color">*</span></label>
			<input type="password" name="password" placeholder="Enter Password" />

			<input type="submit" name="register_submit" class="btn_secondary">
		
		</form>
	</div>

</div>

<?php
require_once( 'footer.php' );
?>