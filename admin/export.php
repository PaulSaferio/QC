
<?php 

  //Create Connection of Database
  $con = mysqli_connect('127.0.0.1:3306', 'u110261070_Flagg', '246@Gkenya', 'u110261070_flagging');
   
  // Fetch data from Users table
  $result = mysqli_query($con, "SELECT * FROM flag_data");
  
  //Create header of excel
  $content = '<table border=1 style="">
                    
                    <tr>
                        <th style="background-color:black; color: aliceblue;"> ID</th>
                        <th style="background-color:black; color: aliceblue;"> Issuing Body </th>
                        <th style="background-color:black; color: aliceblue;"> Certificate Type</th>
                        <th style="background-color:black; color: aliceblue;"> ECargo Origin</th>
                        <th style="background-color:black; color: aliceblue;"> Shipment Route</th>
                        <th style="background-color:black; color: aliceblue;"> Certificate No.</th>
                        <th style="background-color:black; color: aliceblue;"> Customs Decl No.</th>
                        <th style="background-color:black; color: aliceblue;"> Importer Name</th>
                        <th style="background-color:black; color: aliceblue;"> Importer Contact</th>
                        <th style="background-color:black; color: aliceblue;"> Exporter Name</th>
                        <th style="background-color:black; color: aliceblue;"> Agent Name</th>
                        <th style="background-color:black; color: aliceblue;"> Agent Contact</th>
                        <th style="background-color:black; color: aliceblue;"> Transport Mode</th>
                        <th style="background-color:black; color: aliceblue;"> Transporter Name</th>
                        <th style="background-color:black; color: aliceblue;"> Vehicle Number</th>
                        <th style="background-color:black; color: aliceblue;"> Discharge Location</th>
                        <th style="background-color:black; color: aliceblue;"> Final Destination</th>
                        <th style="background-color:black; color: aliceblue;"> FOB Currency</th>
                        <th style="background-color:black; color: aliceblue;"> FOB Value</th>
                        <th style="background-color:black; color: aliceblue;"> Incoterm</th>
                        <th style="background-color:black; color: aliceblue;"> Freight Currency</th>
                        <th style="background-color:black; color: aliceblue;"> Freight Value</th>
                        <th style="background-color:black; color: aliceblue;"> Validation Notes</th>
                        <th style="background-color:black; color: aliceblue;"> Status</th>
                        <th style="background-color:black; color: aliceblue;"> Date</th>
                        
                </tr>'; 

  //fetch all data with the help of mysqli_fetch_array 
  while($row = mysqli_fetch_array($result))  
  {  
  	  $content .='<tr>';
	    $content .="<td ><center> ". $row['id']."</center></td>";
	    $content .="<td ><center> ". $row['issuingBody']."</center></td>";
	    $content .="<td ><center> ". $row['certificateType']."</center></td>";
	    $content .="<td ><center> ". $row['cargoOrigin']."</center></td>";
	    $content .="<td ><center> ". $row['shipmentRoute']."</center></td>";
	    $content .="<td ><center> ". $row['certificateNo']."</center></td>";
	    $content .="<td ><center> ". $row['customsDeclNo']."</center></td>";
	    $content .="<td ><center> ". $row['importerName']."</center></td>";
	    $content .="<td ><center> ". $row['importerContact']."</center></td>";
	    $content .="<td ><center> ". $row['exporterName']."</center></td>";
	    $content .="<td ><center> ". $row['agentName']."</center></td>";
	    $content .="<td ><center> ". $row['agentContact']."</center></td>";
	    $content .="<td ><center> ". $row['transportMode']."</center></td>";
	    $content .="<td ><center> ". $row['transporterName']."</center></td>";
	    $content .="<td ><center> ". $row['vehicleNumber']."</center></td>";
	    $content .="<td ><center> ". $row['dischargeLocation']."</center></td>";
	    $content .="<td ><center> ". $row['finalDestination']."</center></td>";
	    $content .="<td ><center> ". $row['fobCurrency']."</center></td>";
	    $content .="<td ><center> ". $row['fobValue']."</center></td>";
	    $content .="<td ><center> ". $row['incoterm']."</center></td>";
	    $content .="<td ><center> ". $row['freightCurrency']."</center></td>";
	    $content .="<td ><center> ". $row['freightValue']."</center></td>";
	    $content .="<td ><center> ". $row['validationNotes']."</center></td>";
	    $content .="<td ><center> ". $row['status']."</center></td>";
	    $content .="<td ><center> ". $row['date']."</center></td>";
	   $content .='<tr>';   
  } 
  $content.='</table>'; 

  //This code is use to create excel format
  header('Content-Type:application/xls');  
  header('Content-Disposition: attachment; filename=Flagging_Data.xls');
  echo $content;
  exit();

?>
