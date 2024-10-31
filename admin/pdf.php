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
        $issuing=$_POST['issuing'];
        $type=$_POST['certificatetype'];
        $origin=$_POST['origin'];
        $route=$_POST['route'];
        $cert=$_POST['certificateNo'];
        $decla=$_POST['decl'];
        $imponame=$_POST['impoName'];
        $impocont=$_POST['impoCont'];
        $exponame=$_POST['expoName'];
        $expocont=$_POST['Expocont'];
        $agent=$_POST['agent'];
        $agentcont=$_POST['agentcont'];
        $mode=$_POST['mode'];
        $transname=$_POST['transponame'];
        $vehic=$_POST['vehicle'];
        $exit=$_POST['exit'];
        $desti=$_POST['destination'];
        $curren=$_POST['currency'];
        $fob=$_POST['fob'];
        $inco=$_POST['incoterm'];
        $fcurrency=$_POST['freightcurrency'];
        $freight=$_POST['freight'];
        $valid=$_POST['validationNotes'];
    

require('dompdf/vendor/autoload.php');
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml
        ('
        <center>
        <div style="Width:100%;background-color:#f39c12;height:6px;"></div>
            <h1>GOLDEN COURTS SARL</h1>
            <h3><em>Flagging Form</em></h3>
        <div style="Width:100%;background-color:#2c3e50;height:20px;"></div>
        </center></br>
        <div style="Width:100%; border:1px solid lightgrey;">
            <table style="Width:100%;">
               
               <tr>
                    <th colspan="2"style="background-color:lightgrey;3px solid white;">
                    <center>
                        <h4><b><em>EXPEDITION</em></b></h4>
                    </center>
                    </th>
                    <th colspan="2" style="background-color:lightgrey;">
                    <center>
                        <h4><b><em>EXPORT DETAILS</em></b></h4>
                    </center>
                    </th>
               </tr> <tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Issuing Body</em></b>
                    </td>
                    <td>
                        '.$issuing.'
                    </td>
                    <td>
                        <b><em>Exporter name</em></b>
                    </td>
                    <td>
                        '.$exponame.'
                    </td>
               </tr> <tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Certificate Type</em></b>
                    </td>
                    <td>
                        '.$type.'
                    </td>
                    <td>
                        <b><em>Exporter contact</em></b>
                    </td>
                    <td>
                        '.$expocont.'
                    </td>
               </tr> <tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Cargo Origin</em></b>
                    </td>
                    <td>
                        '.$origin.'
                    </td>
                    <td>
                        <b><em>Clearing/forwarding agent</em></b>
                    </td>
                    <td>
                        '.$agent.'
                    </td>
               </tr><tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Shipment Route</em></b>
                    </td>
                    <td>
                        '.$route.'
                    </td>
                    <td>
                        <b><em>Clearing/forwarding agent contact</em></b>
                    </td>
                    <td>
                        '.$agentcont.'
                    </td>
               </tr> <tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Certificate No.</em></b>
                    </td>
                    <td>
                        '.$cert.'
                    </td>
               </tr><tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Customs Decl. No.</em></b>
                    </td>
                    <td>
                        '.$decla.'
                    </td>
               </tr>
            </table>
        </div></br>
        <div style="Width:100%; border:1px solid lightgrey;">
            <table style="Width:100%;">
               
               <tr>
                    <th colspan="2" style="background-color:lightgrey;">
                    <center>
                        <h4><b><em>IMPORT DETAILS</em></b></h4>
                    </center>
                    </th>
                    <th colspan="2" style="background-color:lightgrey;">
                    <center>
                        <h4><b><em>TRANSPORT & CARGO DETAILS</em></b></h4>
                    </center>
                    </th>
               </tr> 
               <tr>
                    <td>
                        <b><em>Importer name</em></b>
                    </td>
                    <td>
                        '.$imponame.'
                    </td>
                    <td>
                        <b><em>Transport mode</em></b>
                    </td>
                    <td>
                        '.$mode.'
                    </td>
               </tr> <tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Importer contact</em></b>
                    </td>
                    <td>
                        '.$impocont.'
                    </td>
                    <td>
                        <b><em>Transporter Name</em></b>
                    </td>
                    <td>
                        '.$transname.'
                    </td>
               </tr><tr><td></td></tr>
                <tr>
                    <td>
                        <em> </em>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        <b><em>Vehicle number</em></b>
                    </td>
                    <td>
                        '.$vehic.'
                    </td>
               </tr><tr><td></td></tr>
                <tr>
                    <td>
                        <em> </em>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        <b><em>Discharge location/exit border</em></b>
                    </td>
                    <td>
                        '.$exit.'
                    </td>
               </tr><tr><td></td></tr>
               <tr>
                    <td>
                        <em> </em>
                    </td>
                    <td>
                        
                    </td>
                    <td>
                        <b><em>Final destination in DRC</em></b>
                    </td>
                    <td>
                        '.$desti.'
                    </td>
               </tr>
               
            </table>
        </div></br>
        <div style="Width:100%; border:1px solid lightgrey;">
            <table style="Width:100% ">
               
               <tr>
                    <th colspan="2" style="background-color:lightgrey;">
                        <center>
                            <h4><b><em>VALUES</em></b></h4>
                        </center>
                    </th>
               </tr> 
               <tr>
                    <td>
                        <b><em>FOB Currency </em></b>
                    </td>
                    <td>
                        '.$curren.'
                    </td>
               </tr> <tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>FOB value </em></b>
                    </td>
                    <td>
                        '.$fob.'
                    </td>
               </tr><tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Incoterm </em></b>
                    </td>
                    <td>
                        '.$inco.'
                    </td>
               </tr><tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Freight Currency </em></b>
                    </td>
                    <td>
                        '.$fcurrency.'
                    </td>
               </tr><tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Freight value </em></b>
                    </td>
                    <td>
                        '.$freight.'
                    </td>
               </tr><tr><td></td></tr>
               <tr>
                    <td>
                        <b><em>Validation Notes </em></b>
                    </td>
                    <td>
                        '.$valid.'
                    </td>
               </tr>
               
            </table>
        </div>
        <div style="Width:100%;background-color:#2c3e50;height:15vw;margin-top:10%">
        <div style="Width:100%;background-color:#f39c12;height:10px;"></div>
            <center>
                <p style="color:aliceblue;" >All rights reserved.&copy; Golden Courts SARL.</p>
            </center>
        </div>
        ');

$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Applications.pdf");
?>