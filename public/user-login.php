<?php 
require('../inc/LoginCredentials.class.php');

include("user-connection.php");

session_start();


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$pass_word = $_POST['pass_word'];
		

		if(!empty($user_name) && !empty($pass_word) && !is_numeric($user_name))
		{

			//read from database
			

			$query = "select * from user_table where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);
		

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pass_word'] === $pass_word)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
	
		}else
		{
			echo "wrong username or password!";
		}
	}
	
	
require_once("../tpl/user-login.tpl.php");

?>



