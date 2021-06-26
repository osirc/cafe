<?php
   include("user.php");

    global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;
$email_empty_err="";
$pass_empty_err="";


if(isset($_POST['login'])) {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    if(!empty($myusername) && !empty($mypassword)){

        $sql = "SELECT * FROM users where username='$myusername' and password='$mypassword'";

        //$resultado = $connection->query($sql);
        //$numRows= $resultado->num_rows;
        $resultado =mysqli_query($connection,$sql);
        $rowCount = mysqli_num_rows($resultado);

        echo "<script type='text/javascript'>console.log('$rowCount');</script>";
        if($rowCount>0){
            while($row = mysqli_fetch_array($resultado)) {
                $user = new User();
                $user->name=$row['name'];

                $_SESSION['user'] = serialize($user);


                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['second_lastname'] = $row['second_lastname'];
                $_SESSION['email'] =  $row['email'];
            }
            header("Location: ./welcome.php?id=1");
        }else{
            $verificationRequiredErr = '<div class="alert alert-danger">Account verification is required for login.</div>';
        }

    } else {
        if(empty($email_signin)){
            $email_empty_err = "<div class='alert alert-danger email_alert'>User not provided.</div>";
        }

        if(empty($password_signin)){
            $pass_empty_err = "<div class='alert alert-danger email_alert'>Password not provided.</div>";
        }
    }

   }


?>