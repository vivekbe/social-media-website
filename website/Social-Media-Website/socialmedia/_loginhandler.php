<?php
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginemail'];
    $pass = $_POST['loginpass'];

    $sql = "Select * from user where email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            $_SESSION['name'] = $row['name'];
            header("Location: feed.php");
        } 
        else{
           $showError = "Password is Incorrect";
        }
    }
    else{
      $showError = "Account With This Email Does Not Exists";
    }
    echo '<script type="text/javascript">
    alert("'.$showError.'");
    window.location.href="index.php";
    </script>';
}

?>