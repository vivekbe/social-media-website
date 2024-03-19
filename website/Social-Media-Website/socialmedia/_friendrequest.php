<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $sourceid = $_SESSION['sno'];
    $targetid = $_POST['friend'];
    $existSql = "SELECT * FROM `friendlist` WHERE (sourceId = '$sourceid' AND targetID = '$targetid') OR (sourceId = '$sourceid' AND targetID = '$targetid')";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $row = mysqli_fetch_assoc($result);        
        if($row['status']){
        $showError = "Friend Request Already Sent"; 
        echo '<script type="text/javascript">
          alert("'.$showError.'");
          window.location.href="signup.php";
        </script>';
        }
        else{
            $showError = "You are already friends"; 
            echo '<script type="text/javascript">
             alert("'.$showError.'");
             window.location.href="signup.php";
            </script>';
        }
    }
    else{
    $sql = "INSERT INTO `friendlist` (  `sourceID`, `targetID`,`status`, `req_dt` ) VALUES ( '$sourceid' , '$targetid' , '0' ,current_timestamp())";
    $result = mysqli_query($conn, $sql);
    echo "<script>
              alert('Friend Request Sent');
              window.location.href='feed.php';
            </script>";
            
    }
}

?>