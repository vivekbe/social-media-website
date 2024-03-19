<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $targetid = $_SESSION['sno'];
    $sourceid = $_POST['friend'];
    $sql = "SELECT * FROM `friendlist` WHERE (sourceId = '$sourceid' AND targetID = '$targetid') AND (status = '0')";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $uniqueid= $row['f_id'];
    $updatequery = "UPDATE `friendlist` SET `status` = '1' WHERE `f_id` = '$uniqueid' ";
    $result2 = mysqli_query($conn,$updatequery);
    if($result)
      echo '<script type="text/javascript">
      alert(" Request Accepted");
      window.location.href="friendrequest.php";
      </script>';
    else{
        echo '<script type="text/javascript">
      alert("Error While Accepting Request");
      window.location.href="friendrequest.php";
      </script>';
    }
    
}

?>