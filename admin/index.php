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
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $conn = mysqli_connect('127.0.0.1:3306', 'u110261070_Flagg', '246@Gkenya', 'u110261070_flagging');

    if (isset($_SESSION['uid'])) {
        ?>
        <script>
            alert("An error has occurred");
        </script>
        <?php
                session_start();
                session_destroy();
            
                $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/flagging';
                header("Location: $url");
                exit(); 
            }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="dash.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-std" rel="stylesheet">
    <link rel="icon" type="image/png" href="logo inverse.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.cdnfonts.com/css/tw-cen-mt-std');
        body{
            font-family: 'Tw Cen MT Std', sans-serif;
            
        }
    </style>
    <script src="https://kit.fontawesome.com/78efdac103.js" crossorigin="anonymous"></script>
    <!-- Include jsPDF library for PDF export -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- Include jsPDF AutoTable plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
</head>
<body>
    <main>
        <input type="checkbox" id="side-menu-toggler" class="side-menu-toggler">
        <nav class="side-nav">
            <label for="side-menu-toggler">
                <div class="hamburger">
                    <i class="fa-solid fa-bars fit"></i>
                    <i class="fa-regular fa-circle-xmark fit"></i>
                </div>
            </label>
            <ul class="side-nav-list">
                <li onclick="showAddUserForm()" class="side-nav-item">
                    <div class="side-nav-link fit">
                        <i class="bx bxs-user-plus"></i>
                        <span>Add User</span>
                    </div>
                </li>
                <li onclick="usen()" class="side-nav-item">
                    <div class="side-nav-link fit">
                         <i class="bx bx-body"></i><span>View Users</span>
                    </div>
                </li>
                <li class="side-nav-item">
                    <div class="side-nav-link fit">
                        <a href="application/index.php">
                            <i class="bx bxs-file-plus"></i>
                            <span class="nav-item">New Application</span>
                        </a>
                    </div>
                </li>
                <li onclick="applic()" class="side-nav-item">
                    <div class="side-nav-link fit">
                        <i class="bx bx-list-check"></i>
                        <span>Manage Applications</span>
                    </div>
                </li>
                <li onclick="showChangePasswordForm()" class="side-nav-item">
                    <div class="side-nav-link fit">
                        <i class="bx bx-reset"></i>   
                        <span>Change Password</span>
                    </div>
                </li>
            </ul>
        </nav>
        <header>
            <div class="header-left">
                <div class="logo">
                    <img src="logo inverse.png" alt="Company Logo" onclick="pend()"style="cursor:pointer;">
                </div>
                
                
            </div>
            <center>
                <h4 class="fit" style="Margin-top:3%;" id='sess'>Welcome: <?php echo $_SESSION['name'];?></h4>
            </center>
            <div class="header-right">
                <div class="notification-bell fit">
                   
                </div>
                <div class="admin-profile fit">
                    <input type="checkbox" name="toggle-profile-menu" id="profile-menu-toggler">
                    <label for="profile-menu-toggler">
                        <i class='bx bx-user' alt="Admin" class="admin-icon" style="cursor:pointer;"></i>
                        <!--<img src="Profile-PNG-File.png" >-->
                    </label>
                    <div class="profile-menu" id="profileMenu">
                        <ul>
                            <!--<li><a href="#">View Profile</a></li>-->
                            <li style='margin:0;'>
                                <i class="bx bx-log-out fit" style='color:#12171e'></i>
                                <a href="logout.php">
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <section class="content dashboard-content">
            <div id="form-container"></div>
            <div class="form-popup active" id="adding">
                <h3>Add User</h3>
                <form method="POST">
                    <input type="text" placeholder="ID" name="id" required>
                    <input type="text" placeholder="First Name" name="fname" required>
                    <input type="text" placeholder="Last Name" name="lname" required>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="tel" placeholder="phone No." name="phone" required>
                    </br>
                    <center><label>Password</label></center>
                    <input type="text" placeholder="Password" name="password" value="123456"readonly></br>
                    <input type="submit" name="add" value="Submit" style="padding: 10px 20px; background-color: #2c3e50; color: white; border: none; border-radius: 6px; cursor: pointer; margin-top: 10px; width: 50%; margin-left: 24%;">
                </form>
            </div>
            <?php
            if (isset($_POST['add'])&& $_POST['add'] !== "") {
                $Idd= $_POST['id'];
                $name1=$_POST['fname'];
                $name2=$_POST['lname'];
                $mail=$_POST['email'];
                $phone=$_POST['phone'];
                $passw=$_POST['password'];
                $secure_pass = md5($passw);
                $sl= "INSERT INTO `user` ( user_id, first_name, last_name, email, Telephone, password) VALUES ('$Idd','$name1','$name2','$mail','$phone','$secure_pass')";
                if (mysqli_query($conn, $sl)) {
                            echo "<script language=\"JavaScript\">\n";
                            echo "alert('User Successfully added');\n";
                            echo "window.location= 'index.php'";
                            echo "</script>";
                }else{
                            echo "<script language=\"JavaScript\">\n";
                            echo "alert('There is an error ');\n";
                            echo "window.location= 'index.php'";
                            echo "</script>";
                        } 
            }
            ?>
            <div class="form-popup active" id="changing">
                <h3>Change Password</h3>
                <form method="POST">
                    <input type="password" placeholder="Current Password" required>
                    <input type="password" placeholder="New Password" name="pass" required>
                    <input type="password" placeholder="Confirm New Password"  name="pass1" required>
                    <input type="submit" name="change" value="Change Password" style="padding: 10px 20px; background-color: #2c3e50; color: white; border: none; border-radius: 6px; cursor: pointer; margin-top: 10px; width: 50%; margin-left: 24%;">
                </form>
            </div>
            <?php
            if (isset($_POST['change'])&& $_POST['change'] !== "") {
                $pa= $_POST['pass'];
                $pa1= $_POST['pass1'];
                $die=$_SESSION['udi'];
                $secure_pass1 =  md5($pa1);
                if ($pa==$pa1&& $pa!==""){
                    $sq2= " UPDATE admi set password = '$secure_pass1' WHERE id like '$die' ";
                    if (mysqli_query($conn, $sq2)) {
    
                            echo "<script language=\"JavaScript\">\n";
                            echo "alert('Password Successfully Changed');\n";
                            echo "window.location= 'index.php'";
                            echo "</script>";
                        
                        
                        }else{
                            echo "<script language=\"JavaScript\">\n";
                            echo "alert('there is an error ');\n";
                            echo "window.location= 'index.php'";
                            echo "</script>";
                        } 
                }else{
                            echo "<script language=\"JavaScript\">\n";
                            echo "alert('Passwords Not matching ');\n";
                            echo "window.location= 'index.php'";
                            echo "</script>";
                        } 
                

            }
        ?>
            <div class="data" id="application">
                <div class="fixed-bar">
                    <div class="dropdown">
                        <button id="downloadBtn"><a href="export.php" class="buttons" style="float: left; background-color: #2c3e50; color: aliceblue; padding: 10px 20px;"><i class='bx bx-download'></i></a></button>
                         <!--<div id="dropdownOptions" class="dropdown-content">
                            <a href="export.php?type=csv" id="downloadCsv">Download CSV</a>
                            <a href="export.php?type=excel" id="downloadExcel">Download Excel</a>
                        </div>-->
                    </div> 
                    <center>
                       <div class="show-rows" style='margin-left:20%;width:100%;'>
                        <label for="rowsPerPage">Show</label>
                        <select id="rowsPerPage" onchange="changeRows()">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        
                      </div> 
                    </center>
                    
                    <div class="search-container"><input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search table..." title="Type in a name" name="query"><!--<input type="image" src="search.png" alt="Submit" class="search-icon" name="search">--></div> 
                    
                </div></br>
                <?php
                $sql="SELECT * FROM `flag_data` WHERE status='VALIDATED' OR status='REJECTED' ORDER BY id DESC";
                    if (mysqli_query($conn, $sql)) {
                        $data=mysqli_query($conn,$sql); 
                        echo "<table id='tabl' style='width:200%;font-size:18px;' >";
                                
                            echo "
                            <tr>
                                    <th > ID</th>
                                    <th > Issuing Body </th>
                                    <th > Certificate Type</th>
                                    <th > Origin</th>
                                    <th > Route</th>
                                    <th > Certificate No.</th>
                                    <th > Customs Decl No.</th>
                                    <th > Importer Name</th>
                                    <th > Importer Contact</th>
                                    <th > Exporter Name</th>
                                    <th > Agent Name</th>
                                    <th > Agent Contact</th>
                                    <th > Transport Mode</th>
                                    <th > Transporter Name</th>
                                    <th > Vehicle No.</th>
                                    <th > Discharge Loc</th>
                                    <th > Final Destination</th>
                                    <th > FOB Cur.</th>
                                    <th > FOB Val.</th>
                                    <th > Incoterm</th>
                                    <th > Freight Cur.</th>
                                    <th > Freight Val.</th>
                                    <th > Validation Notes</th>
                                    <th > Status</th>
                                    <th > Date</th>
                                    <th colspan=3>Actions</th>
                                    
                            </tr>";         
                    
                            while ($row =  mysqli_fetch_assoc($data)) {

                                echo '<tbody>';
                                
                                if($row['status']=='REJECTED'){
                                echo"<tr style='background-color:#fed7d6;border-bottom:1px inset lightgray;' >";
                                
                                    echo "<td><center> ". $row['id']."</center></td>";
                                    echo "<td><center> ". $row['issuingBody']."</center></td>";
                                    echo "<td><center> ". $row['certificateType']."</center></td>";
                                    echo "<td><center> ". $row['cargoOrigin']."</center></td>";
                                    echo "<td><center> ". $row['shipmentRoute']."</center></td>";
                                    echo "<td><center> ". $row['certificateNo']."</center></td>";
                                    echo "<td><center> ". $row['customsDeclNo']."</center></td>";
                                    echo "<td><center> ". $row['importerName']."</center></td>";
                                    echo "<td><center> ". $row['importerContact']."</center></td>";
                                    echo "<td><center> ". $row['exporterName']."</center></td>";
                                    echo "<td><center> ". $row['agentName']."</center></td>";
                                    echo "<td><center> ". $row['agentContact']."</center></td>";
                                    echo "<td><center> ". $row['transportMode']."</center></td>";
                                    echo "<td><center> ". $row['transporterName']."</center></td>";
                                    echo "<td><center> ". $row['vehicleNumber']."</center></td>";
                                    echo "<td><center> ". $row['dischargeLocation']."</center></td>";
                                    echo "<td><center> ". $row['finalDestination']."</center></td>";
                                    echo "<td><center> ". $row['fobCurrency']."</center></td>";
                                    echo "<td><center> ". $row['fobValue']."</center></td>";
                                    echo "<td><center> ". $row['incoterm']."</center></td>";
                                    echo "<td><center> ". $row['freightCurrency']."</center></td>";
                                    echo "<td><center> ". $row['freightValue']."</center></td>";
                                    echo "<td><center> ". $row['validationNotes']."</center></td>";
                                    echo "<td style='color:red;'><center><b><i>{$row['status']}</i></b></center></td>";
                                    echo "<td><center> ". $row['date']."</center></td>";
                                    echo "<td><a href='view.php?id1=". $row['id']."'><button style='background-color:#36454F;color:aliceblue;border:none;border-radius:10px;cursor:pointer;padding:5px;'>view
                                    </button></a></td>";
                                    echo "<td><a href='validate.php?id2=". $row['id']."'><button style='background-color:#AFE1AF;color:#36454F;border:none;border-radius:10px;cursor:pointer;padding:5px;'>VALIDATE
                                    </button></a></td>";
                                    echo "<td><a href='reject.php?id3=". $row['id']."'><button style='background-color:salmon;color:white;border:none;border-radius:10px;cursor:pointer;padding:5px;'>REJECT
                                    </button></a></td>";
                                
                                echo "</tr>";
                                }else{
                                        
                                         echo"<tr style='border-bottom:1px inset lightgray;' >";
                                
                                            echo "<td><center> ". $row['id']."</center></td>";
                                            echo "<td><center> ". $row['issuingBody']."</center></td>";
                                            echo "<td><center> ". $row['certificateType']."</center></td>";
                                            echo "<td><center> ". $row['cargoOrigin']."</center></td>";
                                            echo "<td><center> ". $row['shipmentRoute']."</center></td>";
                                            echo "<td><center> ". $row['certificateNo']."</center></td>";
                                            echo "<td><center> ". $row['customsDeclNo']."</center></td>";
                                            echo "<td><center> ". $row['importerName']."</center></td>";
                                            echo "<td><center> ". $row['importerContact']."</center></td>";
                                            echo "<td><center> ". $row['exporterName']."</center></td>";
                                            echo "<td><center> ". $row['agentName']."</center></td>";
                                            echo "<td><center> ". $row['agentContact']."</center></td>";
                                            echo "<td><center> ". $row['transportMode']."</center></td>";
                                            echo "<td><center> ". $row['transporterName']."</center></td>";
                                            echo "<td><center> ". $row['vehicleNumber']."</center></td>";
                                            echo "<td><center> ". $row['dischargeLocation']."</center></td>";
                                            echo "<td><center> ". $row['finalDestination']."</center></td>";
                                            echo "<td><center> ". $row['fobCurrency']."</center></td>";
                                            echo "<td><center> ". $row['fobValue']."</center></td>";
                                            echo "<td><center> ". $row['incoterm']."</center></td>";
                                            echo "<td><center> ". $row['freightCurrency']."</center></td>";
                                            echo "<td><center> ". $row['freightValue']."</center></td>";
                                            echo "<td><center> ". $row['validationNotes']."</center></td>";
                                            echo "<td style='color:#81c049;'><center><b><i>{$row['status']}</i></b></center></td>";
                                            echo "<td><center> ". $row['date']."</center></td>";
                                                echo "<td><a href='view.php?id1=". $row['id']."'><button style='background-color:#36454F;color:aliceblue;border:none;border-radius:10px;cursor:pointer;padding:5px;'>view
                                            </button></a></td>";
                                            echo "<td><a href='validate.php?id2=". $row['id']."'><button style='background-color:#AFE1AF;color:#36454F;border:none;border-radius:10px;cursor:pointer;padding:5px;'>VALIDATE
                                            </button></a></td>";
                                            echo "<td><a href='reject.php?id3=". $row['id']."'><button style='background-color:salmon;color:white;border:none;border-radius:10px;cursor:pointer;padding:5px;'>REJECT
                                            </button></a></td>";
                                        
                                        echo "</tr>"; 
                                         
                                    }
                               echo" </tbody>
                                ";
                                
                            }
                        echo "</table>";
                    } 
                ?>
               <!-- <div class="pagination">
                    <button id="prevBtn">Previous</button>
                    <span id="pageInfo">Page 1</span>
                    <button id="nextBtn">Next</button>
                </div>-->
                
            </div>
            <div class="data" id="pending">
                 <div class="fixed-bar">
                     <center>
                         <marquee behaviour='alternate'direction='right' ><h2>PENDING APPLICATIONS</h2></marquee>
                     </center>
                   
                </div></br>
                <?php
                $sql="SELECT * FROM `flag_data`WHERE status like 'PENDING' ORDER BY id DESC";
                    if (mysqli_query($conn, $sql)) {
                        $data=mysqli_query($conn,$sql); 
                       
                        echo "<table id='tabl' style='width:200%;font-size:18px;'>";
                            
                            echo "
                            <thead>
                            <tr>
                                    <th > ID</th>
                                    <th > Issuing Body </th>
                                    <th > Certificate Type</th>
                                    <th > Origin</th>
                                    <th > Route</th>
                                    <th > Certificate No.</th>
                                    <th > Customs Decl No.</th>
                                    <th > Importer Name</th>
                                    <th > Importer Contact</th>
                                    <th > Exporter Name</th>
                                    <th > Agent Name</th>
                                    <th > Agent Contact</th>
                                    <th > Transport Mode</th>
                                    <th > Transporter Name</th>
                                    <th > Vehicle No.</th>
                                    <th > Discharge Loc</th>
                                    <th > Final Destination</th>
                                    <th > FOB Cur.</th>
                                    <th > FOB Val.</th>
                                    <th > Incoterm</th>
                                    <th > Freight Cur.</th>
                                    <th > Freight Val.</th>
                                    <th > Validation Notes</th>
                                    <th > Status</th>
                                    <th > Date</th>
                                    <th colspan=3>Actions</th>
                            </tr>
                            </thead>
                            ";         
                    
                            while ($row =  mysqli_fetch_assoc($data)) {

                                echo '<tr >';
                                
                                    echo "<td><center> ". $row['id']."</center></td>";
                                    echo "<td><center> ". $row['issuingBody']."</center></td>";
                                    echo "<td><center> ". $row['certificateType']."</center></td>";
                                    echo "<td><center> ". $row['cargoOrigin']."</center></td>";
                                    echo "<td><center> ". $row['shipmentRoute']."</center></td>";
                                    echo "<td><center> ". $row['certificateNo']."</center></td>";
                                    echo "<td><center> ". $row['customsDeclNo']."</center></td>";
                                    echo "<td><center> ". $row['importerName']."</center></td>";
                                    echo "<td><center> ". $row['importerContact']."</center></td>";
                                    echo "<td><center> ". $row['exporterName']."</center></td>";
                                    echo "<td><center> ". $row['agentName']."</center></td>";
                                    echo "<td><center> ". $row['agentContact']."</center></td>";
                                    echo "<td><center> ". $row['transportMode']."</center></td>";
                                    echo "<td><center> ". $row['transporterName']."</center></td>";
                                    echo "<td><center> ". $row['vehicleNumber']."</center></td>";
                                    echo "<td><center> ". $row['dischargeLocation']."</center></td>";
                                    echo "<td><center> ". $row['finalDestination']."</center></td>";
                                    echo "<td><center> ". $row['fobCurrency']."</center></td>";
                                    echo "<td><center> ". $row['fobValue']."</center></td>";
                                    echo "<td><center> ". $row['incoterm']."</center></td>";
                                    echo "<td><center> ". $row['freightCurrency']."</center></td>";
                                    echo "<td><center> ". $row['freightValue']."</center></td>";
                                    echo "<td><center> ". $row['validationNotes']."</center></td>";
                                    echo "<td style='color:#fcbb31;'><center><b><i>{$row['status']}</i></b></center></td>";
                                    echo "<td><center> ". $row['date']."</center></td>";
                                        echo "<td><a href='view.php?id1=". $row['id']."'><button style='background-color:#36454F;color:aliceblue;border:none;border-radius:10px;cursor:pointer;padding:5px;'>view
                                    </button></a></td>";
                                    echo "<td><a href='validate.php?id2=". $row['id']."'><button style='background-color:#AFE1AF;color:#36454F;border:none;border-radius:10px;cursor:pointer;padding:5px;'>VALIDATE
                                    </button></a></td>";
                                    echo "<td><a href='reject.php?id3=". $row['id']."'><button style='background-color:salmon;color:white;border:none;border-radius:10px;cursor:pointer;padding:5px;'>REJECT
                                    </button></a></td>";
                                
                                echo "</tr>";
                                
                            }
                        echo "</table>";
                    } 
                ?>
                
            </div>
            <div class="data" id="use">
                <div class="fixed-bar">
                     <center>
                         <marquee behaviour='alternate'direction='right'><h2>USERS</h2></marquee>
                     </center>
                   
                </div></br>
                <?php
                $sql="SELECT * FROM `user` ";
                    if (mysqli_query($conn, $sql)) {
                        $data=mysqli_query($conn,$sql); 
                        echo "<table id='tabl' style='width:100%;font-size:150%;'>";
                            
                            echo "<tr>
                                    <th><center> ID</center></th>
                                    <th><center> First Name</center> </th>
                                    <th><center> Last Name</center></th>
                                    <th><center> Phone No.</center></th>
                                    <th><center> Email</center></th>
                                    
                                </tr>";         
                    
                            while ($row =  mysqli_fetch_assoc($data)) {

                                echo '<tr >';
                                
                                    echo "<td><center> ". $row['user_id']."</center></td>";
                                    echo "<td><center> ". $row['first_name']."</center></td>";
                                    echo "<td><center> ". $row['last_name']."</center></td>";
                                    echo "<td><center> ". $row['Telephone']."</center></td>";
                                    echo "<td><center> ". $row['email']."</center></td>";
                                    
                                    echo "<td><center><a href='?id5=". $row['id']."'><button style='background-color:salmon;color:white;border:none;border-radius:10px;cursor:pointer;padding:5px;'>DELETE
                                    </button></a></center></td>";
                                echo "</tr>";
                                
                            }
                        echo "</table>";
                    } if (isset($_GET['id5'])) {
									$de= $_GET['id5'];
									$sq= "DELETE from user where id like '$de'";
									if (mysqli_query($conn, $sq)) {

											echo "<script language=\"JavaScript\">\n";
											echo "alert('successfully removed');\n";
											echo "window.location= 'index.php'";
											echo "</script>";
										
										
										}else{
											echo "<script language=\"JavaScript\">\n";
											echo "alert('there is an error ');\n";
											echo "window.location= 'index.php'";
											echo "</script>";
										}
										$conn->close();
								}
                ?>
                
            </div>
        </section>
        <footer>
            <p class="fit">&copy; 2024 Golden Courts SARL. All rights reserved.</p>
        </footer>
    </main>

    <script src="dash.js"></script>
    
</body>
</html>

