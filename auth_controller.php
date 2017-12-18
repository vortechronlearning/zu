<?php
namespace Base;

use Illuminate\Database\Capsule\Manager as Database;

include_once "database.php";
include_once "helpers.php";
include_once "Hasher.php";

reset_error();

// handle login functionality
if(isset($_POST['submit']) && $_POST['submit'] == 'login'){

	$email = validate('email', 'login.php');
	$password = validate('password', 'login.php');

	$user = Database::table('tbl_staffs_a163495')->where('fld_staff_email', $email)->first();

	if(is_null($user)){

		error('not exist', 'Staff is not exist, please signup!', 'login.php');

	}else{

		if(!\Hasher::checkPassword($password, $user['fld_staff_password'])){
			error('password wrong', 'Your email or password is wrong!', 'login.php');
		}

		$_SESSION['id'] = $user['fld_staff_id'];
		$_SESSION['name'] = $user['fld_staff_fname'];
		header("Location: catalogue.php?page=1");
		exit;

	}


}

// handle signup functionality
if(isset($_POST['submit']) && $_POST['submit'] == 'signup'){

	$pc = validate('passcode', 'signup.php');
	$name = validate('name', 'signup.php');
	$email = validate('email', 'signup.php');
	$pw = validate('password', 'signup.php');
	$pw_r = validate('password_retype', 'signup.php');

	if($pw !== $pw_r){
		error('not equal', 'Password and password retype is not equal!', 'signup.php');
	}

	if($pc !== $passcode){
		error('not equal pc', 'Passcode is not exist, you are not permited to register new staff!', 'signup.php');
	}

	if(strlen($pw) < 7){
		error(1321, 'Password must more than 7 character!', 'signup.php');
	}

	// check if user exist
	$result = Database::table('tbl_staffs_a163495')->where('fld_staff_email', $email)->first();

	if(is_null($result)){

		Database::table('tbl_staffs_a163495')->insertGetId(
		    [
		    	'fld_staff_id' => mt_rand(10, 100000000), 
		    	'fld_staff_fname' => $name, 
		    	'fld_staff_email' => $email, 
		    	'fld_staff_password' => \Hasher::hashPassword($pw)
		    ]
		);

	}else{
		error('exist', 'Staff is already registered with this email!', 'signup.php');
	}

	header('Location: login.php');
}

