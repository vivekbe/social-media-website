<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    session_start();
    include '_dbconnect.php';
    $article = $_POST['article'];
    if(!(empty($_POST['article']))){
      $sno = $_SESSION['sno'] ;
      $sql = "INSERT INTO posts ( `sno`, `post_text`, `post_dt`) VALUES ('$sno', '$article', current_timestamp())";
      $result = mysqli_query($conn, $sql);
    }
    header("location:feed.php");
}

?>