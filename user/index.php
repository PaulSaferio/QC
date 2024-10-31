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
     
    /*if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }*/

    $conn = mysqli_connect('127.0.0.1:3306', 'u110261070_Flagg', '246@Gkenya', 'u110261070_flagging');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="300">
    <title>User Panel</title>
    <link rel="stylesheet" href="dash.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/tw-cen-mt-std" rel="stylesheet">
    <link rel="icon" type="image/png" href="logo inverse.png">
    <style>
        @import url('https://fonts.cdnfonts.com/css/tw-cen-mt-std');
        body {
            font-family: 'Tw Cen MT Std', sans-serif;
        }
    </style>
    <script src="https://kit.fontawesome.com/78efdac103.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <main>
        <input type="checkbox" id="side-menu-toggler" class="side-menu-toggler">
        <nav class="side-nav">
            <label for="side-menu-toggler">
                <div class="hamburger" id="hamburger">
                    <i class="fa-solid fa-bars fit"></i>
                    <i class="fa-regular fa-circle-xmark fit" id="closeIcon" style="display:none;"></i>
                </div>
            </label>
            <ul class="side-nav-list" id="sideNavList">
                <li onclick="showAddUserForm()" class="side-nav-item">
                    <div class="side-nav-link fit">
                        <i class="bx bxs-file-plus"></i>
                        <span>New Application</span>
                    </div>
                </li>
                <li onclick="usen()" class="side-nav-item">
                    <div class="side-nav-link fit">
                        <i class="bx bx-list-check"></i>
                        <span>View Applications</span>
                    </div>
                </li>
                <li onclick="applic()" class="side-nav-item">
                    <div class="side-nav-link fit">
                        <i class='bx bx-user-circle'></i>
                        <span>View Profile</span>
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
                    </a><img src="logo inverse.png" alt="Company Logo" style="cursor:pointer;" onclick="usen()">
                </div>
            </div>
            <center>
                <h2 class="fit" style="Margin-top:3%;" id='sess'>Welcome: <?php echo $_SESSION['name1']." ".$_SESSION['name2'];?></h2>
            </center>
            <div class="header-right">
                
                <div class="admin-profile fit" >
                    <input type="checkbox" name="toggle-profile-menu" id="profile-menu-toggler">
                    <label for="profile-menu-toggler">
                        <i class='bx bx-user' alt="Admin" class="admin-icon" style="cursor:pointer;"></i>
                        <!--<img src="Profile-PNG-File.png" alt="Admin" class="admin-icon">-->
                    </label>
                    <div class="profile-menu" id="profileMenu">
                        <ul>
                            <!--<li><a href="#">View Profile</a></li>-->
                            <i class="bx bx-log-out fit" style='color:#12171e' ></i>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <section class="content dashboard-content">
            <div class="dataa" id="application">
                <div class="form-popup active" >
                    <h3>User Profile</h3>
                    <?php
                        
                        $sqll = "SELECT * FROM `user` WHERE user_id like '$idd' ";
                        if ($result = mysqli_query($conn, $sqll)) {
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<table id='tabl' style='width:100%;font-size:18px;'>";
                                
                                echo "<tr>";
                                    echo "<td> ID Number</td> <td><input type='text' value='".$row['user_id']."' readonly></td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                    echo "<td>First Name</td> <td><input type='text' value='".$row['first_name']."' readonly></td>";
                               echo "</tr>";
                                
                            echo "<tr>";
                                    echo "<td>Last Name</td> <td><input type='text' value='".$row['last_name']."' readonly></td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                    echo "<td>Phone Number</td> <td><input type='text' value='".$row['Telephone']."' readonly></td>";
                                echo "</tr>";
                                
                                echo "<tr>";
                                    echo "<td>Email</td> <td><input type='text' value='".$row['email']."' readonly></td>";
                                echo "</tr>";
                                
                                echo "</table>";
                       
                            } 
                    
                            
                        }
                        else{
                                echo "error";
                            }
                    ?>
               </div>
            
            </div>
            <div class="data" id="use">
                <div class="fixed-bar">
                    <center>
                        <marquee behaviour='alternate'direction='right'><h2>MY APPLICATIONS</h2></marquee>
                       <!--<div class="show-rows" style='margin-left:20%;width:100%;'>
                        <label for="rowsPerPage">Show</label>
                        <select id="rowsPerPage" onchange="changeRows()">
                            <option value="10">10</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        
                      </div>--> 
                    </center>
                    
                    <!--<div class="search-container"><input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search table..." title="Type in a name" name="query"><!--<input type="image" src="search.png" alt="Submit" class="search-icon" name="search"></div>--> 
                    
                </div></br>
                    <?php
                        $idd= $_SESSION['udi'];
                        $sql = "SELECT * FROM `flag_data` WHERE user_id like '$idd' ORDER BY id DESC";
                        if ($result = mysqli_query($conn, $sql)) {
                            echo "<table id='tabl' style='width:200%;font-size:18px;'>";
                            
                            echo "<tr>
                                    <th>ID</th>
                                    <th>Issuing Body</th>
                                    <th>Certificate Type</th>
                                    <th>ECargo Origin</th>
                                    <th>Shipment Route</th>
                                    <th>Certificate No.</th>
                                    <th>Customs Decl No.</th>
                                    <th>Importer Name</th>
                                    <th>Importer Contact</th>
                                    <th>Exporter Name</th>
                                    <th>Agent Name</th>
                                    <th>Agent Contact</th>
                                    <th>Transporter Name</th>
                                    <th>Vehicle Number</th>
                                    <th>Discharge Location</th>
                                    <th>Final Destination</th>
                                    <th>FOB Currency</th>
                                    <th>FOB Value</th>
                                    <th>Incoterm</th>
                                    <th>Freight Value</th>
                                    <th>Validation Notes</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>ACTION</th>
                                </tr>";
                    
                            while ($row = mysqli_fetch_assoc($result)) {
                                if($row['status']=='PENDING'){
                                    echo "<tr style='background-color:#fdffd3;border-bottom:1px inset lightgray;'>";
                                        echo "<td><center>{$row['id']}</center></td>";
                                        echo "<td><center>{$row['issuingBody']}</center></td>";
                                        echo "<td><center>{$row['certificateType']}</center></td>";
                                        echo "<td><center>{$row['cargoOrigin']}</center></td>";
                                        echo "<td><center>{$row['shipmentRoute']}</center></td>";
                                        echo "<td><center>{$row['certificateNo']}</center></td>";
                                        echo "<td><center>{$row['customsDeclNo']}</center></td>";
                                        echo "<td><center>{$row['importerName']}</center></td>";
                                        echo "<td><center>{$row['importerContact']}</center></td>";
                                        echo "<td><center>{$row['exporterName']}</center></td>";
                                        echo "<td><center>{$row['agentName']}</center></td>";
                                        echo "<td><center>{$row['agentContact']}</center></td>";
                                        echo "<td><center>{$row['transporterName']}</center></td>";
                                        echo "<td><center>{$row['vehicleNumber']}</center></td>";
                                        echo "<td><center>{$row['dischargeLocation']}</center></td>";
                                        echo "<td><center>{$row['finalDestination']}</center></td>";
                                        echo "<td><center>{$row['fobCurrency']}</center></td>";
                                        echo "<td><center>{$row['fobValue']}</center></td>";
                                        echo "<td><center>{$row['incoterm']}</center></td>";
                                        echo "<td><center>{$row['freightValue']}</center></td>";
                                        echo "<td><center>{$row['validationNotes']}</center></td>";
                                        echo "<td style='color:#fcbb31;'><center><b><i>{$row['status']}</i></b></center></td>";
                                        echo "<td><center>{$row['date']}</center></td>";
                                        echo "<td><a href='view.php?id1=". $row['id']."'><button style='background-color:#36454F;color:aliceblue;border:none;border-radius:10px;cursor:pointer;padding:5px;'>view
                                        </button></a></td>";
                                    echo "</tr>";
                                }else if($row['status']=='REJECTED'){
                                    echo "<tr style='background-color:#ffd4d3;'>";
                                        echo "<td><center>{$row['id']}</center></td>";
                                        echo "<td><center>{$row['issuingBody']}</center></td>";
                                        echo "<td><center>{$row['certificateType']}</center></td>";
                                        echo "<td><center>{$row['cargoOrigin']}</center></td>";
                                        echo "<td><center>{$row['shipmentRoute']}</center></td>";
                                        echo "<td><center>{$row['certificateNo']}</center></td>";
                                        echo "<td><center>{$row['customsDeclNo']}</center></td>";
                                        echo "<td><center>{$row['importerName']}</center></td>";
                                        echo "<td><center>{$row['importerContact']}</center></td>";
                                        echo "<td><center>{$row['exporterName']}</center></td>";
                                        echo "<td><center>{$row['agentName']}</center></td>";
                                        echo "<td><center>{$row['agentContact']}</center></td>";
                                        echo "<td><center>{$row['transporterName']}</center></td>";
                                        echo "<td><center>{$row['vehicleNumber']}</center></td>";
                                        echo "<td><center>{$row['dischargeLocation']}</center></center></td>";
                                        echo "<td><center>{$row['finalDestination']}</center></td>";
                                        echo "<td><center>{$row['fobCurrency']}</center></td>";
                                        echo "<td><center>{$row['fobValue']}</center></td>";
                                        echo "<td><center>{$row['incoterm']}</center></td>";
                                        echo "<td><center>{$row['freightValue']}</center></td>";
                                        echo "<td><center>{$row['validationNotes']}</center></td>";
                                        echo "<td style='color:red;'><center><b><i>{$row['status']}</i></b></center></td>";
                                        echo "<td><center>{$row['date']}</center></td>";
                                        echo "<td><a href='view.php?id1=". $row['id']."'><button style='background-color:#36454F;color:aliceblue;border:none;border-radius:10px;cursor:pointer;padding:5px;'>view
                                        </button></a></td>";
                                    echo "</tr>";
                                }else{
                                    echo "<tr>";
                                        echo "<td><center>{$row['id']}</td>";
                                        echo "<td><center>{$row['issuingBody']}</center></td>";
                                        echo "<td><center>{$row['certificateType']}</center></td>";
                                        echo "<td><center>{$row['cargoOrigin']}</center></td>";
                                        echo "<td><center>{$row['shipmentRoute']}</center></td>";
                                        echo "<td><center>{$row['certificateNo']}</center></td>";
                                        echo "<td><center>{$row['customsDeclNo']}</center></td>";
                                        echo "<td><center>{$row['importerName']}</center></td>";
                                        echo "<td><center>{$row['importerContact']}</center></td>";
                                        echo "<td><center>{$row['exporterName']}</center></td>";
                                        echo "<td><center>{$row['agentName']}</center></td>";
                                        echo "<td><center>{$row['agentContact']}</center></td>";
                                        echo "<td><center>{$row['transporterName']}</center></td>";
                                        echo "<td><center>{$row['vehicleNumber']}</center></td>";
                                        echo "<td><center>{$row['dischargeLocation']}</center></td>";
                                        echo "<td><center>{$row['finalDestination']}</center></td>";
                                        echo "<td><center>{$row['fobCurrency']}</center></td>";
                                        echo "<td><center>{$row['fobValue']}</center></td>";
                                        echo "<td><center>{$row['incoterm']}</center></td>";
                                        echo "<td><center>{$row['freightValue']}</center></td>";
                                        echo "<td><center>{$row['validationNotes']}</center></td>";
                                        echo "<td style='color:#81c049;'><center><b><i>{$row['status']}</i></b></center></td>";
                                        echo "<td><center>{$row['date']}</center></td>";
                                        echo "<td><a href='view.php?id1=". $row['id']."'><button style='background-color:#36454F;color:aliceblue;border:none;border-radius:10px;cursor:pointer;padding:5px;'>view
                                        </button></a></td>";
                                    echo "</tr>";
                                }
                                
                            }
                    
                            echo "</table>";
                        }
                    ?>
            </div>
            <div class="form-popup active" id="changing">
                <h3>Change Password</h3>
                <form method="POST">
                    <input type="password" placeholder="Current Password" name="current_password" required>
                    <input type="password" placeholder="New Password" name="new_password" required>
                    <input type="password" placeholder="Confirm New Password" name="confirm_new_password" required>
                    <input type="submit" name="change_password" value="Change Password" style="padding: 10px 20px; background-color: #2c3e50; color: white; border: none; border-radius: 10px; cursor: pointer; margin-top: 10px; width: 50%; margin-left: 24%;">
                </form>
            </div>
        
            <?php
                    if (isset($_POST['change_password'])&& $_POST['change_password'] !== "") {
                        $pa= $_POST['new_password'];
                        $pa1= $_POST['confirm_new_password'];
                        $die=$_SESSION['udi'];
                        if ($pa==$pa1&& $pa!==""){
                            $sq2= " UPDATE user set password = '$pa1' WHERE id like '$die' ";
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
        </section>
        <footer>
            <p class="fit">&copy; 2024 Golden Courts SARL. All rights reserved.</p>
        </footer>
    </main>
    <script src="dash.js"></script>
</body>
</html>