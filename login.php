<?php
   include("user.php");

    global $wrongPwdErr, $accountNotExistErr, $emailPwdErr, $verificationRequiredErr, $email_empty_err, $pass_empty_err;
$email_empty_err="";
$pass_empty_err="";


if(isset($_POST['login'])) {
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];

    if(!empty($myusername) && !empty($mypassword)) {

        $stmt = $conn->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $stmt->bind_param("ss",$myusername,$mypassword);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if($result->num_rows > 0) {
                if($row = $result -> fetch_assoc()) {
                    $user = new User();
                    $user->name=$row['first_name'];
                    $_SESSION['user'] = serialize($user);
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['name'] = $row['first_name'];
                   // $_SESSION['username'] = $row['username'];
                    $_SESSION['lastname'] = $row['last_name'];
                    //$_SESSION['second_lastname'] = $row['second_lastname'];
                    $_SESSION['email'] =  $row['email'];
                }
            } else {
                $verificationRequiredErr = '<div class="alert alert-danger">Account verification is required for login.</div>';
            }
            header("Location: ./welcome.php?id=1&active=1");
        }
        

        /*$sql = "SELECT * FROM user where email='$myusername' and password='$mypassword'";

        //$resultado = $conn->query($sql);
        //$numRows= $resultado->num_rows;
        $resultado =mysqli_query($conn,$sql);
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
            header("Location: ./welcome.php?id=1&active=1");
        }else{
            $verificationRequiredErr = '<div class="alert alert-danger">Account verification is required for login.</div>';
        }*/

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