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
    
    $conn= mysqli_connect('127.0.0.1:3306','u110261070_Flagg','246@Gkenya','u110261070_flagging');
    $val= $_GET['id1'];
    $sql="SELECT * FROM `flag_data`WHERE id = '$val' ";
    
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <link rel="stylesheet" href="style1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" type="image/png" href="logo inverse.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url('https://fonts.cdnfonts.com/css/tw-cen-mt-std');
        body{
            font-family: 'Tw Cen MT Std', sans-serif;
        }
        a{
            text-decoration:none;
            
            color:gray;
            padding:5px;
            border-radius:8px;
            border-style: double;
            
        }a:hover{
            background-color:silver;
            color:aliceblue;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                    
                                 $dii= $row['user_id'];
                                 $q= "SELECT * from user where user_id like '$dii'";
                                 $qad= "SELECT * FROM `admi` where user_id like '$dii'";
                                 
                               if (mysqli_query($conn, $q)->num_rows == 1)
        	 	                    {
        	 	                       $dat=mysqli_query($conn,$q);
                                        while ($row =  mysqli_fetch_assoc($dat)){ 
                                            echo "Flagged by: <b> ". $row['first_name']." ".$row['last_name']."</b>";
                                        }
        	 	                    }
        	 	                    
        	 	                    else if (mysqli_query($conn, $qad)->num_rows == 1 ){
        	 	                        
        	 	                        $date=mysqli_query($conn,$qad);
        	 	                        
                                        while ($rw =  mysqli_fetch_assoc($date)){ 
                                            echo "Flagged by: <b>". $rw['name']."</b>";
                                        }
        	 	                    }
        	 	                    
        	 	                    else {
        	 	                        echo "<b> Flagging Data </b> ";
        	 	                    }
                                }
                        }
            ?> 
        </header>
        <a id="bution" href="index.php" style="text-decoration:none;float:left;margin-left:1%;"><img src="back.png"></a>
        <form id="surveyForm" enctype="multipart/form-data" method= "POST" action="pdf.php">
            <div class="section">
                <h2>Expedition</h2>
                <div class="form-group">
                    <label for="issuingBody">Issuing Body</label>
                    <input type="text" id="certificateNo" name="issuing" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['issuingBody'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="certificateType">Certificate Type</label>
                    <input type="text" id="certificateNo" name="certificatetype" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['certificateType'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="cargoOrigin">Cargo Origin</label>
                    <input type="text" id="certificateNo" name="origin" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['cargoOrigin'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="shipmentRoute">Shipment Route</label>
                    <input type="text" id="certificateNo" name="route" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['shipmentRoute'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="certificateNo">Certificate No.</label>
                    <input type="text" id="certificateNo" name="certificateNo" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['certificateNo'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="feriAdCertificate">FERI/AD Certificate copy 
                    <?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo'<a id="bution" style="margin-left:13%;" href="viewdoc.php?name='.$row['feriAdCertificate'].'"> .... <img src="view.png"style="width:5%;">  Show </a>';
                                 
                                }
                        }
                    ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="customsDeclNo">Customs Decl. No.</label>
                    <input type="text" id="certificateNo" name="decl" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['customsDeclNo'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="customsEntryDoc">Customs Entry document copy
                    <?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo'<a id="bution" style="margin-left:5%;" href="viewdoc.php?name='.$row['customsEntryDoc'].'"> ....  <img src="view.png"style="width:5%;"> Show </a>';
                                 
                                }
                        }
                    ?>
                    </label>
                </div>
            </div>
            <div class="section">
                <h2>Import details</h2>
                <div class="form-group">
                    <label for="importerName">Importer name</label>
                    <input type="text" id="certificateNo" name="impoName" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['importerName'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="importerContact">Importer contact</label>
                    <input type="text" id="certificateNo" name="impoCont" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['importerContact'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
            </div>
            <div class="section">
                <h2>Export details</h2>
                <div class="form-group">
                    <label for="exporterName">Exporter name</label>
                    <input type="text" id="certificateNo" name="expoName" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['exporterName'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="exporterContact">Exporter contact</label>
                    <input type="text" id="certificateNo" name="Expocont" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['exporterName'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="agentName">Clearing/forwarding agent</label>
                    <input type="text" id="certificateNo" name="agent" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['agentName'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="agentContact">Clearing/forwarding agent contact</label>
                    <input type="text" id="certificateNo" name="agentcont" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['agentContact'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
            </div>
            <div class="section">
                <h2>Transport & Cargo details</h2>
                <div class="form-group">
                    <label for="transportMode">Transport mode</label>
                    <input type="text" id="certificateNo" name="mode" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['transportMode'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="transporterName">Transporter Name</label>
                    <input type="text" id="certificateNo" name="transponame" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['transporterName'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="vehicleNumber">Vehicle number</label>
                    <input type="text" id="certificateNo" name="vehicle" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['vehicleNumber'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="vehicleImages">Vehicle Image
                    <?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo'<a id="bution"style="margin-left:21%;" href="viewdoc.php?name='.$row['vehicleImages'].'"> .... <img src="view.png"style="width:3%;"> Show  </a>';
                                 
                                }
                        }
                    ?> 
                    </label>
                </div>
                <div class="form-group">
                    <label for="dischargeLocation">Discharge location/exit border</label>
                    <input type="text" id="certificateNo" name="exit" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['dischargeLocation'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="finalDestination">Final destination in DRC</label>
                    <input type="text" id="certificateNo" name="destination" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['finalDestination'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
            </div>
            <div class="section">
                <h2>Values</h2>
                <div class="form-group">
                    <label for="fobCurrency">FOB Currency</label>
                    <input type="text" id="certificateNo" name="currency" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['fobCurrency'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="fobValue">FOB value</label>
                    <input type="text" id="certificateNo" name="fob" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['fobValue'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="incoterm">Incoterm</label>
                    <input type="text" id="certificateNo" name="incoterm" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['incoterm'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="freightCurrency">Freight Currency</label>
                    <input type="text" id="certificateNo" name="freightcurrency" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['freightCurrency'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="freightValue">Freight value</label>
                    <input type="text" id="certificateNo" name="freight" value="<?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['freightValue'];
                                }
                        }
                    ?>" 
                    readonly >
                </div>
                <div class="form-group">
                    <label for="invoiceCopy">Commercial invoice copy
                    <?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo'<a id="bution"style="margin-left:14.9%;" href="viewdoc.php?name='.$row['invoiceCopy'].'"> ....  <img src="view.png"style="width:3%;"> Show </a>';
                                 
                                }
                        }
                    ?>
                    </label>
                </div><br>
                <div class="form-group" >
                    <label for="supportingDocs">Additional Supporting documents
                    <?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo'<a id="bution"style="margin-left:5%;"href="viewdoc.php?name='.$row['supportingDocs'].'"> ....  <img src="view.png"style="width:3%;"> Show </a>';
                                 
                                }
                        }
                    ?>
                    </label>
                </div>
                <div class="form-group">
                    <label for="validationNotes">Validation Notes</label>
                    <textarea id="validationNotes" name="validationNotes" placeholder="Enter validation notes" readonly><?php 
                         if (mysqli_query($conn, $sql)) {
                                $data=mysqli_query($conn,$sql);
                                while ($row =  mysqli_fetch_assoc($data)){ 
                                 echo $row['validationNotes'];
                                }
                        }
                    ?>" 
                    </textarea>
                </div>
            </div>
            <div class="form-group submit-button">
              <button style="margin-right:1%;" type="submit" name='sub'><i class="fa fa-print"> Print</i></button>
              
            </div>
            <div class="form-group submit-button">
               
            </div>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>
<?php
    
?>

