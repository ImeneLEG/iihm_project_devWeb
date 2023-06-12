<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "select * from dblogin where email = '$email' and password = '$password'";

            $result = mysqli_query($con,$query);
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                header("Location: ../index.php#categories");
            } else {
                echo "Incorrect address or password!";
            }
        } 
		
		// Vérification des données de connexion
        
	}

?>