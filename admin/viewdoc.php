<?php
    /*if(isset($_POST['search'])){
    $con = mysqli_connect('127.0.0.1:3306', 'u110261070_Flagg', '246@Gkenya', 'u110261070_flagging');

    //$con = new PDO("mysql:host=localhost;dbname=qfms","root","");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $fid = $_POST['id'];
    $stmt = $con->prepare("SELECT filename FROM rabbit_tbl WHERE id= '" .$fid. "'");

    $stmt->execute();

        while($row = $stmt->fetch()){
            header('Content-type: application/pdf');
            header("Content-Disposition: inline");
            echo "/pdffiles" .$row['id'];
            readfile('pdffiles/');
        }
    }*/
    
        //download.php
       /* $filename=$_GET['name']; // YOUR File name retrive from database
        $file= "../uploads/".$filename; // YOUR Root path for pdf folder storage
        $len = filesize($file); // Calculate File Size
        ob_clean();
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public"); 
        header("Content-Description: File Transfer");
        header("Content-Type:application/pdf"); // Send type of file
        $header="Content-Disposition: attachment; filename=$filename;"; // Send File Name
        header($header );
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".$len); // Send File Size
        @readfile($file);
        exit;*/
        
        $filename=$_GET['name'];
        
        //echo $filename;
        //header('Content-type: application/pdf');
        //header("Content-Disposition: inline");
        //echo "/../uploads/".$filename;
        //readfile('/../uploads/'.$filename.'');
        
        $file= "../uploads/".$filename;
        $content = file_get_contents($file);
        
        header('Content-Type: application/pdf');
        header('Content-Length: '.strlen( $content ));
        header('Content-disposition: inline; filename="' . $file . '"');
        header('Cache-Control: public, must-revalidate, max-age=0');
        header('Pragma: public');
        header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
        header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
        echo $content;



?>


        
        
