<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>

<div class="row page-titles m-2">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor"><i class="fa fa-warehouse" aria-hidden="true"></i></h3>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="row">
                <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="tab1" role="tablist">
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill"
                                    href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home"
                                    aria-selected="true" style="color: #fff;">Monday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile"
                                    aria-selected="false" style="color: #fff;">Tuesday</a>
                            </li>

                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-tab4" role="tab" aria-controls="custom-tabs-four-tab4"
                                    aria-selected="false" style="color: #fff;">Wednesday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-tab5" role="tab" aria-controls="custom-tabs-four-tab5"
                                    aria-selected="false" style="color: #fff;">Thursday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-tab6" role="tab" aria-controls="custom-tabs-four-tab6"
                                    aria-selected="false" style="color: #fff;">Friday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-tab7" role="tab" aria-controls="custom-tabs-four-tab7"
                                    aria-selected="false" style="color: #fff;">Saturday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill"
                                    href="#custom-tabs-four-tab8" role="tab" aria-controls="custom-tabs-four-tab8"
                                    aria-selected="false" style="color: #fff;">Sunday</a>
                            </li>

                        </ul>
                    </div>
                    <div class=" card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- ============================================================== -->
                            <!-- Monday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel"
                                aria-labelledby="custom-tabs-four-home-tab">
                                <div class="row">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Day</th>
                                                <th>Member</th>
                                                <th>Task Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>#</td>
                                                <td>Monday</td>
                                                <td>
                                                    <select class="" name="salutation" style="border-radius: 5px;"
                                                        required>
                                                        <option selected>--Select Sales Member--</option>
                                                        <option value="2">Riskan</option>
                                                        <option value="4">Abdulla</option>
                                                        <option value="6">Harshana</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                        data-target="#create_search">Create and
                                                        Search</button>
                                                    <button class="btn btn-sm btn-success" data-toggle="modal"
                                                        data-target="#posting_modal">Posting to
                                                        Customer</button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Tuesday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel"
                                aria-labelledby="custom-tabs-four-profile-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Day</th>
                                            <th>Member</th>
                                            <th>Task Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Tuesday</td>
                                            <td>
                                                <select class="" name="salutation" style="border-radius: 5px;" required>
                                                    <option selected>--Select Sales Member--</option>
                                                    <option value="2">Riskan</option>
                                                    <option value="4">Abdulla</option>
                                                    <option value="6">Harshana</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#create_search">Create and
                                                    Search</button>
                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#posting_modal">Posting to
                                                    Customer</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Wednesday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-tab4" role="tabpanel"
                                aria-labelledby="custom-tabs-four-tab4-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Day</th>
                                            <th>Member</th>
                                            <th>Task Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Wednesday</td>
                                            <td>
                                                <select class="" name="salutation" style="border-radius: 5px;" required>
                                                    <option selected>--Select Sales Member--</option>
                                                    <option value="2">Riskan</option>
                                                    <option value="4">Abdulla</option>
                                                    <option value="6">Harshana</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#create_search">Create and
                                                    Search</button>
                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#posting_modal">Posting to
                                                    Customer</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Thursday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-tab5" role="tabpanel"
                                aria-labelledby="custom-tabs-four-tab5-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Day</th>
                                            <th>Member</th>
                                            <th>Task Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Thursday</td>
                                            <td>
                                                <select class="" name="salutation" style="border-radius: 5px;" required>
                                                    <option selected>--Select Sales Member--</option>
                                                    <option value="2">Riskan</option>
                                                    <option value="4">Abdulla</option>
                                                    <option value="6">Harshana</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#create_search">Create and
                                                    Search</button>
                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#posting_modal">Posting to
                                                    Customer</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- ============================================================== -->
                            <!-- Friday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-tab6" role="tabpanel"
                                aria-labelledby="custom-tabs-four-tab6-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Day</th>
                                            <th>Member</th>
                                            <th>Task Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Friday</td>
                                            <td>
                                                <select class="" name="salutation" style="border-radius: 5px;" required>
                                                    <option selected>--Select Sales Member--</option>
                                                    <option value="2">Riskan</option>
                                                    <option value="4">Abdulla</option>
                                                    <option value="6">Harshana</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#create_search">Create and
                                                    Search</button>
                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#posting_modal">Posting to
                                                    Customer</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Saturday -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-tab7" role="tabpanel"
                                aria-labelledby="custom-tabs-four-tab7-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Day</th>
                                            <th>Member</th>
                                            <th>Task Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Saturday</td>
                                            <td>
                                                <select class="" name="salutation" style="border-radius: 5px;" required>
                                                    <option selected>--Select Sales Member--</option>
                                                    <option value="2">Riskan</option>
                                                    <option value="4">Abdulla</option>
                                                    <option value="6">Harshana</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#create_search">Create and
                                                    Search</button>
                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#posting_modal">Posting to
                                                    Customer</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Sunday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-tab8" role="tabpanel"
                                aria-labelledby="custom-tabs-four-tab8-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Day</th>
                                            <th>Member</th>
                                            <th>Task Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>#</td>
                                            <td>Sunday</td>
                                            <td>
                                                <select class="" name="salutation" style="border-radius: 5px;" required>
                                                    <option selected>--Select Sales Member--</option>
                                                    <option value="2">Riskan</option>
                                                    <option value="4">Abdulla</option>
                                                    <option value="6">Harshana</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-primary" data-toggle="modal"
                                                    data-target="#create_search">Create and
                                                    Search</button>
                                                <button class="btn btn-sm btn-success" data-toggle="modal"
                                                    data-target="#posting_modal">Posting to
                                                    Customer</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="create_search">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Posting to Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Media</th>
                            <th>Search Key Word</th>
                            <th>Target Customer QTY</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#</td>

                            <td class="d-block">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                    <label class="label_values" for="d_back_cover_dent">Facebook</label>
                                </div>
                                <div class="icheck-primary">
                                    <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                    <label class="label_values" for="d_back_cover_dent">Whatsapp</label>
                                </div>
                                <div class="icheck-primary">
                                    <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                    <label class="label_values" for="d_back_cover_dent">Instagram</label>
                                </div>
                                <div class="icheck-primary">
                                    <input type="checkbox" id="d_back_cover_dent" name="work[]" value="d_dent">
                                    <label class="label_values" for="d_back_cover_dent">lazada</label>
                                </div>

                            </td>
                            <td id="myDIV1">
                                <input type="text" class="form-control" placeholder="Search Key Word"
                                    name="contact_person_Model">

                            </td>
                            <td id="myDIV">
                                <input type="text" class="form-control" placeholder="Target QTY"
                                    name="contact_person_Model">

                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="posting_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Posting to Customer</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Morning
                                <br>9.00A.M-2.00P.M
                            </th>
                            <th>Afternoon
                                <br>3.00A.M-6.15P.M
                            </th>
                            <th>Follow The Order
                                <br>6.45A.M-9.00P.M
                            </th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#</td>

                            <td id="myDIV">
                                <input type="text" class="form-control" placeholder="840 G3"
                                    name="contact_person_Model">
                                <input type="text" class="form-control" placeholder="Zbook G7"
                                    name="contact_person_Model">
                                <input type="text" class="form-control" placeholder="5530" name="contact_person_Model">
                                <input type="text" class="form-control" placeholder="E7400" name="contact_person_Model">
                                <input type="text" class="form-control" placeholder="E7470" name="contact_person_Model">
                            </td>

                            <td id="myDIV">
                                <input type="text" class="form-control" placeholder="840 G3"
                                    name="contact_person_Model">
                                <input type="text" class="form-control" placeholder="Zbook G7"
                                    name="contact_person_Model">
                                <input type="text" class="form-control" placeholder="5530" name="contact_person_Model">
                                <input type="text" class="form-control" placeholder="E7400" name="contact_person_Model">
                                <input type="text" class="form-control" placeholder="E7470" name="contact_person_Model">
                            </td>
                            <td><span class="badge bg-danger">Please Follow the Order</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<style>
[type="text"] {
    height: 22px;
    margin-top: 4px;
    font-size: 10px;
    border: 1px solid #f1f1f1;
    border-radius: 5px;
    font-size: 12px;
    padding: 10px;
    font-family: "Poppins", sans-serif;
    color: #fff !important;
}
</style>

<script>
function myFunction1() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}

function myFunction2() {
    var x = document.getElementById("myDIV1");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>

<?php include_once('../includes/footer.php'); ?>