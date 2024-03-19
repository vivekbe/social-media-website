<?php
$showAlert = false;
$showError =false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST["loginemail"];
    $name = $_POST["fullname"];
    $password = $_POST["loginpass"];
    $birth_day = $_POST["birthday_day"];
    $birth_month = $_POST["birthday_month"];
    $birth_year = $_POST["birthday_year"];
    $gender = $_POST["sex"];
    $course = $_POST["course"];
    $branch = $_POST["branch"];
    $batch = $_POST["batch"];
    $clgid = $_POST["clgid"] ;
    // $exists=false;

    // Check whether this username exists
    $existSql = "SELECT * FROM `user` WHERE email = '$email' OR clg_id = '$clgid'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Account With This Email or College Id Already Exists"; 
        echo '<script type="text/javascript">
          alert("'.$showError.'");
          window.location.href="signup.php";
        </script>';
    }
    else{
        // $exists = false; 
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (  `name` , `email` , `birth_date`, `birth_month` , `birth_year` , `gender` , `course` , `branch` , `batch` , `clg_id` , `password`, `dt` ) VALUES ('$name', '$email' , '$birth_day' , '$birth_month' , '$birth_year' , '$gender' , '$course'  ,'$branch' , '$batch' , '$clgid' , '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            echo "<script>
              alert('Acount Created Sucessfully');
              window.location.href='index.php';
            </script>"; 
            //header("Location: signup.php?account");
    }
}
    
?>