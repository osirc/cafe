<!doctype html>
<html lang="en">

<head>
    <?php include('./header.php'); ?>
</head>

<body>

<!-- Header -->

<!-- Login script -->
<?php include('./login.php'); ?>

<!-- Login form -->
<div class="App">
    <div class="vertical-center">
        <div class="inner-block">

            <form action="" method="post">
                <h3>Login</h3>

                <?php echo $accountNotExistErr; ?>
                <?php echo $emailPwdErr; ?>
                <?php echo $verificationRequiredErr; ?>
                <?php echo $email_empty_err; ?>
                <?php echo $pass_empty_err; ?>

                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="username" id="username" />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" />
                </div>

                <button type="submit" name="login" id="sign_in" class="btn btn-outline-primary btn-lg btn-block">Sign
                    in</button>
            </form>
        </div>
    </div>
</div>

</body>

</html>