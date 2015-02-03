<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
include_once 'header.html';
?>

<!-- login form box -->


<div class="container">


                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="form-signin" method="post" action="index.php" name="loginform">
                        <h2 class="form-signin-heading">Logowanie</h2>

                        <label for="login_input_username" class="sr-only" >Username</label>
                        <input id="login_input_username" class="form-control" placeholder="Login" type="text" name="user_name" required />

                        <label for="login_input_password" class="sr-only" >Password</label>
                        <input id="login_input_password" class="form-control" placeholder="Password" type="password" name="user_password" autocomplete="off" required />
                        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Zaloguj się</button>

                    </form>
                    <p>
                    <a href="register.php">Zarejestruj sie</a>
                    </p>
                </div>


</div>


<?php include_once 'footer.html';?>
