<?php 
session_start();
include_once('../../dataAccess/connection.php');
include_once('../../dataAccess/functions.php');
include_once('../../dataAccess/403.php');
include_once('../includes/header.php');

// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="col-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h3 class="card-title">Daily Marketing Update</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right"
                                    placeholder="Search">

                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th>Customer Name</th>
                                    <th>Company Name</th>
                                    <th>Model</th>
                                    <th>Which Model He Like Most</th>
                                    <th>Platform</th>
                                    <td>Status</td>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Zambia</td>
                                    <td>
                                        <select class="w-100" name="salutation" style="border-radius: 5px; width: 10%;"
                                            required>
                                            <option value="2">John Doe</option>
                                            <option value="4">Razer</option>
                                            <option value="6">Sample Doe</option>
                                            <option value="8">MSS</option>
                                        </select>
                                    </td>
                                    <td>E7400</td>
                                    <td>840 G3</td>
                                    <td>Whatsapp</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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