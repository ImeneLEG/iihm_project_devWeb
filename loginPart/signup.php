<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        if (isset($_POST['user_name']) && isset($_POST['password'])) {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];
            $email = $_POST['email'];
        } 
		
		
        if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
            // Save to database
            /* $query = "INSERT INTO dblogin (`" . $user_name . "`, `" . $password . "`)"; */
            $query = "INSERT INTO dblogin (user_name, password, email) VALUES('$user_name', '$password', '$email')";
            $result = $con->query($query);

            header("Location: valid.php");
            die;
        } else {
            echo "Please enter some valid information!";
        }

	}

?>