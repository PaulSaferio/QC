<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password </title>
    <link rel="stylesheet" href="forgot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
 <!-- Forgot Password Form -->
    <div class="login-container">
        <div class="form-container" id="forgot-password-container" style="display: none;">
            <form id="forgotPasswordForm">
                <div class="form-group">
                    <input type="text" id="userId" name="userId" required placeholder="Enter your ID">
                </div>
                <input type="submit" class="btn" value="Submit">
            </form>
        </div>

        <!-- Reset Password Form -->
        <div class="form-container" id="reset-password-container" >
            <form id="resetPasswordForm" method="POST" action="">
                <div class="form-group">
                    <input type="text" id="userId" name="userId" required placeholder="Enter your ID">
                </div>
                <div class="form-group">
                    <input type="password" id="newPassword" name="newPassword" required placeholder="New Password">
                </div>
                <div class="form-group">
                    <input type="password" id="confirmPassword" name="confirmPassword" required placeholder="Confirm Password">
                </div>
                <input type="submit" class="btn" value="Reset Password" name="submit">
            </form>
        </div>
    </div> 
    <?php
         if (isset($_POST['submit']) && $_POST['submit'] !== "") {
             $a= $_POST['userId'];
        	 $b= $_POST['newPassword'];
        	 $c= $_POST['confirmPassword'];
        	 $conn= mysqli_connect('127.0.0.1:3306','u110261070_Flagg','246@Gkenya','u110261070_flagging');
        	 if (mysqli_connect_errno()) {
        
            	die("Failed to connect with MySQL: ". mysqli_connect_error());
        	}
        	$query="SELECT * FROM admi where user_id like '$a'";
        	$query1="SELECT * FROM `user` where user_id like '$a' ";
        	$q1=mysqli_query($conn, $query);
        	$q2=mysqli_query($conn, $query1);
        	
        	if ($q1->num_rows == 1){
        	    
        	    if($b==$c){
        	        
        	        $enc= md5($b);
        	        $sq="UPDATE admi SET password='$enc' where user_id like '$a'";
        	        mysqli_query($conn,$sq);
        	        echo "<script language=\"JavaScript\">\n";
    				echo "alert('SUCCESS!');\n";
    				echo "window.location= '../index.php'";
    				echo "</script>";
    				
        	    }else{
        	        echo "<script language=\"JavaScript\">\n";
    				echo "alert('Passwords Do Not Match!');\n";
    				echo "window.location= 'forgot.php'";
    				echo "</script>";
        	    }
        	    
        	}else if ($q2->num_rows == 1){
        	    
        	    if($b==$c){
        	        
        	        $enc1= md5($b);
        	        $sq1="UPDATE user SET password='$enc1' where user_id like '$a'";
        	        mysqli_query($conn,$sq1);
        	        echo "<script language=\"JavaScript\">\n";
    				echo "alert('SUCCESS!');\n";
    				echo "window.location= '../index.php'";
    				echo "</script>";
    				
        	    }else{
        	        echo "<script language=\"JavaScript\">\n";
    				echo "alert('Passwords Do Not Match!');\n";
    				echo "window.location= 'forgot.php'";
    				echo "</script>";
        	    }
        	    
        	}else{ 
        			   	echo "<script language=\"JavaScript\">\n";
        				echo "alert('That ID DOES NOT EXIST!');\n";
        				echo "window.location= 'forgot.php'";
        				echo "</script>";
        	   		}
         }
    ?>
    <script src="forgot.js"></script>
</body>
</html>