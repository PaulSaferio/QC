<?php
    define('MYSITE',TRUE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="login-container">
        <div class="logo-container">

             <img src="logo inverse.png" alt="Company Logo">
          
        </div>
        <div class="form-container">
            <!--<h1>Welcome back</h1>-->
            <form method="POST" action="" id="loginForm"  >
                <div class="form-group">
                    
                    <input type="email" id="email" name="email" required style="width: 99%;" placeholder="Email Address">
                    
                </div>
                <div class="form-group">
                   <div class="password-container">
                        <input type="password" id="password" name="password" required style="width: 99%;" placeholder="Password">
                        
                      <i class="far fa-eye" id="togglePassword" style=" cursor: pointer;margin-left: -32px;"></i>
                  </div>
                </div>
                <input type="submit" name="submit" value="Login">
              <a href="/forgot/forgot.php" class="forgot-password" id="forgotPasswordLink" onclick="forgotPasswordLink()">Forgot your password?</a>
            </form>
        </div>
        
       
    </div>
    <?php
        if (isset($_POST['submit']) && $_POST['submit'] !== "") {
        	$a= $_POST['email'];
        	$b= $_POST['password'];
        	$enc1= md5($b);
        	$conn= mysqli_connect('127.0.0.1:3306','u110261070_Flagg','246@Gkenya','u110261070_flagging');
        	
        	if (mysqli_connect_errno()) {
        
            	die("Failed to connect with MySQL: ". mysqli_connect_error());
        	}
        	else{
        	   
        	}
        	
        	$query="SELECT * FROM admi where email like '$a' and password like '$enc1' ";
        	$query1="SELECT * FROM `user` where email like '$a' and password like '$enc1' ";
        	$q1=mysqli_query($conn, $query);
        	$q2=mysqli_query($conn, $query1);
        	
         
        	if ($q1->num_rows == 1)
        	 	{
        		    $result= mysqli_fetch_assoc($q1);
        		    $mail= $result['email'];
        		    $pass= $result['password'];
        		    $name= $result['name'];
        		    $aID= $result['user_id'];
        		   
        		    if ($mail==$a && $pass=== $enc1) 
        		    	{
        		    	   
        		    		$qlogs="INSERT INTO logs (user_id,email,time,date) values('$aID','$mail',now(),curdate())";
        		    		mysqli_query($conn, $qlogs);
        		    		session_start();
        		    		$_SESSION['name']= $name;
        		    		$_SESSION['udi']= $aID;
        		    		header("Location: admin/index.php");
        		    		
        
        		    	}
        		    	else{ 
        			   	echo "<script language=\"JavaScript\">\n";
        				echo "alert('username or password is incorrect!');\n";
        				echo "window.location= 'index.php'";
        				echo "</script>";
        	   		}
        	 	}
        		else if (mysqli_query($conn, $query1)->num_rows == 1) {
        		    	$result= mysqli_fetch_assoc($q2);
        			    $mail= $result['email'];
        			    $pass= $result['password'];
        			    $name1= $result['first_name'];
        			    $name= $result['last_name'];
        			    $aID= $result['user_id'];
        			    
        			    if ($mail==$a && $enc1=== $pass) 
        			    	{
        			    	    
        			    		$qlogs="INSERT INTO logs (user_id,email,time,date) values('$aID','$mail',now(),curdate())";
        			    		mysqli_query($conn, $qlogs);
        			    		session_start();
        			    		$_SESSION['name1']= $name1;
        			    		$_SESSION['name2']= $name;
        			    		$_SESSION['udi']= $aID;
        			    		header("Location: user/index.php");
        			    		
        			    }
        			    else{ 
        			   	echo "<script language=\"JavaScript\">\n";
        				echo "alert('username or password is incorrect!');\n";
        				echo "window.location= 'index.php'";
        				echo "</script>";
        	   		}
        		}
        	    else{ 
        			   	echo "<script language=\"JavaScript\">\n";
        				echo "alert('username or password is incorrect!');\n";
        				echo "window.location= 'index.php'";
        				echo "</script>";
        	   		}
        	   		
        }
	
        ?>
    <script src="script.js"></script>
</body>
</html>
