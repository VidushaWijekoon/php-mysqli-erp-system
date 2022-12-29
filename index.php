<?php 

session_start(); 
require_once('dataAccess/connection.php');
require_once('dataAccess/functions.php'); 
require_once('dataAccess/login_functions.php'); 

// check for form submission
if(isset($_POST['submit'])) {

    $errors = array();

    // check if the username and password has been entered
    if (!isset($_POST['username']) || strlen(trim($_POST['username'])) < 1) {
        $errors[] = 'Username is Missing / Invalid';
    }

    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $errors[] = 'Password is Missing / Invalid';
    }

    // check if there are any errors in the form
    if (empty($errors)) {
        // save username and password into variables
        $username     = mysqli_real_escape_string($connection, $_POST['username']);
        $password     = mysqli_real_escape_string($connection, $_POST['password']);
        // $hashed_password = sha1($password);

        // prepare database query
        $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' LIMIT 1";
        $result_set = mysqli_query($connection, $query);

        verify_query($result_set);

        if (mysqli_num_rows($result_set) == 1) {
            // valid user found
            $user = mysqli_fetch_assoc($result_set);
            
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role_id'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['department'] = $user['department'];
            $_SESSION['epf'] = $user['epf'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['timestamp'] = time();  
            // $_SESSION['role'] = $user['role'];
            // updating last login
            $query = "UPDATE users SET last_login = NOW() WHERE user_id = {$_SESSION['user_id']} LIMIT 1";
            $result_set = mysqli_query($connection, $query);

            // insert last logged in time
            $query1 = "INSERT INTO users_logged_in_time(emp_id, username, logged_time, logged_out) 
                        VALUES ('{$_SESSION['user_id']}', '$username', CURRENT_TIMESTAMP, 0)";
            $query_run = mysqli_query($connection, $query1);

            $query = "SELECT * FROM users_logged_in_time ORDER BY logged_in_id DESC LIMIT 1";
            $run = mysqli_query($connection, $query);
            foreach($run as $r){
                $logged_in_id = $r['logged_in_id'];

                $_SESSION['logged_in_id'] = $r['logged_in_id'];
            }
            

            verify_query($result_set);

            if($query_run){
                if(isset($_REQUEST["remember"]) && $_REQUEST["remember"]==1){
                    setcookie("loggin time", $username . "," . time() * 3600);//expire after 1hour 
                }
            }

            // redirect to users.php
            login($_SESSION['role_id'], $_SESSION['department']);
        } else {
            // user name and password invalid
            $errors[] = 'Invalid Username / Password';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>AL SAKB</title>
    <link rel="icon" type="image/x-icon" href="static/images/">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./static/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="./static/plugins/fontawesome-pro/css/all.css">
</head>

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                <div class="d-flex justify-content-center">
                    <h3 id="form-title">LOGIN</h3>


                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST" action="">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user m-2"></i></span>
                            </div>
                            <input type="text" name="username" placeholder="Username..." class="form-control">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key m-2"></i></span>
                            </div>
                            <input type="password" name="password" placeholder="Password..." class="form-control">
                        </div>

                        <div class="d-flex justify-content-center mt-4 mb-4 login_container">
                            <input class="btn login_btn " type="submit" name="submit" value="Login">
                        </div>
                        <?php if (isset($errors) && !empty($errors)) { echo '<p class="error text-center">Invalid Username OR Password</p>'; } ?>

                    </form>
                </div>


            </div>
        </div>
    </div>
</body>
<style>
body,
html {
    margin: 0;
    padding: 0;
    height: 100%;
    font-family: 'Bree Serif', serif;
    background: #343a40;
}

.user_card {
    width: 500px;
    margin-top: auto;
    margin-bottom: auto;
    background: #3f4156;
    position: relative;
    display: flex;
    justify-content: center;
    flex-direction: column;
    padding: 40px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    border-radius: 5px;

}

.form_container {
    margin-top: 20px;
}

#form-title {
    color: #fff;
    margin-top: 10px;
}

.login_btn {
    width: 100%;
    background: #5a818e !important;
    color: white !important;
}

.login_btn:focus {
    box-shadow: none !important;
    outline: 0px !important;
}

.login_container {
    padding: 0 2rem;
}

.input-group-text {
    background: #575a7a !important;
    color: white !important;
    border: 0 !important;
    border-radius: 0.25rem 0 0 0.25rem !important;
}

.input_user,
.input_pass:focus {
    box-shadow: none !important;
    outline: 0px !important;
}

#messages {
    background-color: grey;
    color: #fff;
    padding: 10px;
    margin-top: 10px;
}

.error {
    background: #bf7979;
    border-radius: 5px;
    padding: 8px;
    margin: 0;
}

@media screen and (max-width: 1366px) and (max-height: 800px) {
    .user_card {
        width: 350px;
        margin-top: auto;
        margin-bottom: auto;
        background: #3f4156;
        position: relative;
        display: flex;
        justify-content: center;
        flex-direction: column;
        padding: 10px;
        font-size: 12px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        border-radius: 5px;
    }

    .form_container {
        margin-top: 10px;
    }

    .input-group-text {
        background: #575a7a !important;
        color: white !important;
        border: 0 !important;
        border-radius: 0.25rem 0 0 0.25rem !important;
        font-size: 10px;
    }

    .login_btn {
        width: 50%;
        background: #5a818e !important;
        color: white !important;
        font-size: 12px;
        padding: 3px 0 !important;
    }

    #form-title {
        font-size: 30px;
        letter-spacing: 2px;
    }

    [type="text"],
    [type="password"] {
        height: 30px;
        font-size: 15px;
    }

    .form-control {
        border-radius: 5px;
    }

    .fas {
        margin: 4px !important;
    }


}
</style>

</html>