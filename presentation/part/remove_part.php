<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Al Sakb | Computers</title>
<link rel="icon" type="image/x-icon" href="../../static/dist/img/alsakb logo.png">

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../static/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet" href="../../static/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../static/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="../../static/plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../static/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="../../static/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="../../static/plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="../../static/plugins/summernote/summernote-bs4.min.css">
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Customer CSS -->
<link rel="stylesheet" href="../../static/dist/css/style.css">

<?php 
ob_start();
session_start();
include_once('../../dataAccess/connection.php');
 
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
 
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-5 grid-margin stretch-card justify-content-center mx-auto mt-5">
            <div class="card mt-5" style="background: #3f4156;">
                <div class="card-header bg-secondary d-flex">
                    <h4 class="card-title text-uppercase">Remove Item From</h4>

                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-uppercase">
                            <tr>
                                <th>Type</th>
                                <th>Device</th>
                                <th>Model</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="" method="post">
                                <tr>
                                    <td>Keyboard</td>
                                    <td>Dell</td>
                                    <td>E5530</td>
                                    <td>
                                        <input type="number" class="form-control" placeholder="Please Enter QTY"
                                            name="qty">
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="justify-content-between mx-auto mb-3 text-center">
                    <a href="#" class="btn btn-secondary btn-sm">Close</a>
                    <input class="btn btn-success btn-sm" type="submit" name="submit" value="Save Changes">

                </div>
            </div>
        </div>
        </form>
    </div>
</div>


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

[type='number'] {
    height: 22px;
    margin: inherit;
    margin-top: 4px;
    font-size: 10px;
    text-transform: uppercase;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    width: 60%;
}

.equal {
    padding: 5px 25px;
    border: 5px;
    border-radius: 10px;
}

.btn {
    font-size: 14px;
    text-transform: uppercase;
}
</style>


<?php include_once('../includes/footer.php');  ?>