<!DOCTYPE html>
<?php 
    ob_start();
     session_start();
     ob_end_clean();
     if(isset($_SESSION['udi'])){
        $idd= $_SESSION['udi'];  
     }else{
         ob_start();
         header("Location:../index.php");
         ob_end_clean();
     }
    session_start();
    $conn= mysqli_connect('127.0.0.1:3306','u110261070_Flagg','246@Gkenya','u110261070_flagging');
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-std" rel="stylesheet">
        <style>
            @import url('https://fonts.cdnfonts.com/css/tw-cen-mt-std');
            body{
                font-family: 'Tw Cen MT Std', sans-serif;
                font-size:20px;
            }
        </style>
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link rel="icon" type="image/png" href="logo inverse.png">
        <title>Validation</title>
    </head>
    <body>
        <center>
        <form method="POST" action="" style="Width:50%;margin-top:10%;"  >
            
                <table style="Width:100%" >
                    <tr>
                        <td>
                            <h2 style="margin-left: 43%;">Validation</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="Label" value= "Give notes For Validation" style="outline:none; border:none; background:transparent;width:100%">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea name="notes" style="Width:100%; height:30vh; border:none;font-size:25px;font-family: 'Tw Cen MT Std', sans-serif;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="sub" value="Validate" style="padding: 10px 20px; background-color: #000033; color: white; border: none; border-radius: 6px; cursor: pointer; margin-top: 10px; width: 50%; margin-left: 24%;">
                        </td>
                    </tr>
                </table>
        </form>
        </center>
        <?php
        	if (isset($_POST['sub'])&& $_POST['sub'] !== "") {
        	    $not= $_POST['notes'];
				$die= $_GET['id2'];
				$sq2= " UPDATE flag_data set status = 'VALIDATED', validationNotes = '$not' WHERE id like '$die' ";
				if (mysqli_query($conn, $sq2)) {

						echo "<script language=\"JavaScript\">\n";
						echo "alert('successfully VALIDATED');\n";
						echo "window.location= 'index.php'";
						echo "</script>";
					
					
					}else{
						echo "<script language=\"JavaScript\">\n";
						echo "alert('there is an error ');\n";
						echo "window.location= 'index.php'";
						echo "</script>";
					}

				}
        ?>
    </body>
</html>