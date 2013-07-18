<?php

	session_start();
	
	function name_all_letters($name)
	{		
		if (ctype_alpha($name))
			return true;
		else
			return false;		}
	
	
	function password_six($password)
	{	
		if (strlen($password) >= 6)
			return true;
		else
			return false;		
	}
	
	function confirm_pw($password, $conf_pw)
	{	
		if ($password === $conf_pw)
			return true;
		else
			return false;		
	}
	
	function not_null($field)
	{	
		if ($field != NULL)
			return true;
		else
			return false;		
	}
	
	function valid_email($email)
	{
		if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			return true;
		}
		else
			return false;	
	}
	
	
	
	if (name_all_letters($_POST['first_name'])  == false) 
	{
		$_SESSION['first_name_mess'] = "Sorry, cannot have a numerical value in the first name field";		
	}
	
	if (name_all_letters($_POST['last_name']) == false) 
	{
		$_SESSION['last_name_mess'] = "Sorry, cannot have a numerical value in the last name field";
	}
	
	if (valid_email($_POST['email']) == false) 
	{
		$_SESSION['email_mess'] = "Email is invalid";
	}
	
	if (password_six(($_POST['password'])) == false)
	{
		$_SESSION['pass_mess'] = "Password must be at least six characters long";
	}
	
	if (confirm_pw($_POST['password'], $_POST['conf_pass'])  == false) 
	{
		$_SESSION['password_mess'] = "Password and Confirm Password do not match!";
	}
	
	if ((not_null($_POST['first_name']) == false))
	{
		$_SESSION['first_name_mess'] = "First name field cannot be empty";
	}
	
	if (not_null($_POST['last_name'] == false)) 
	{
		$_SESSION['last_name_mess'] = "Last name field cannot be empty";;
	}
	
	if (not_null($_POST['email']) == false) 
	{
		$_SESSION['email_mess'] = "Email field cannot be empty";
	}
	
	if ((not_null($_POST['password']) && not_null($_POST['conf_pass']))  == false)
	{
		$_SESSION['password_mess'] = "Password/Confirm Password field(s) cannot be empty!";
	}
	
	if ($_SESSION == null)
	{
	 $_SESSION['success']=0;
	}
	
	
	header('location: index.php');

?>