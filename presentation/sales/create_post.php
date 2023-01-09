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
            <div class="row">
                <div class="card card-primary card-outline card-outline-tabs m-2 w-100">
                    <!-- <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-monday" role="tablist">
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link active" id="custom-tabs-four-monday-tab" data-toggle="pill"
                                    href="#custom-tabs-four-monday" role="tab" aria-controls="custom-tabs-four-monday"
                                    aria-selected="true" style="color: #fff;">Monday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-tuesday-tab" data-toggle="pill"
                                    href="#custom-tabs-four-tuesday" role="tab" aria-controls="custom-tabs-four-tuesday"
                                    aria-selected="false" style="color: #fff;">Tuesday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-wenesday-tab" data-toggle="pill"
                                    href="#custom-tabs-four-wenesday" role="tab"
                                    aria-controls="custom-tabs-four-wenesday" aria-selected="false"
                                    style="color: #fff;">Wednesday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-thursday-tab" data-toggle="pill"
                                    href="#custom-tabs-four-thursday" role="tab"
                                    aria-controls="custom-tabs-four-thursday" aria-selected="false"
                                    style="color: #fff;">Thursday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-friday-tab" data-toggle="pill"
                                    href="#custom-tabs-four-friday" role="tab" aria-controls="custom-tabs-four-friday"
                                    aria-selected="false" style="color: #fff;">Friday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-saturday-tab" data-toggle="pill"
                                    href="#custom-tabs-four-saturday" role="tab"
                                    aria-controls="custom-tabs-four-saturday" aria-selected="false"
                                    style="color: #fff;">Saturday</a>
                            </li>
                            <li class="nav-item text-center" style="width: 150px;">
                                <a class="nav-link" id="custom-tabs-four-sunday-tab" data-toggle="pill"
                                    href="#custom-tabs-four-sunday" role="tab" aria-controls="custom-tabs-four-sunday"
                                    aria-selected="false" style="color: #fff;">Sunday</a>
                            </li>

                        </ul>
                    </div> -->
                    <div class=" card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <!-- ============================================================== -->
                            <!-- Monday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade show active" id="custom-tabs-four-monday" role="tabpanel"
                                aria-labelledby="custom-tabs-four-monday-tab">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Day</th>
                                            <th>Platfrom</th>
                                            <th>Keyword</th>
                                            <th>Today Need Create New Customer</th>
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
                                            <td>Monday</td>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="d_back_cover_dent" name="work[]"
                                                        value="d_dent" checked>
                                                    <label class="label_values" for="d_back_cover_dent">Facebook</label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="d_back_cover_dent" name="work[]"
                                                        value="d_dent" checked>
                                                    <label class="label_values" for="d_back_cover_dent">Whatsapp</label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="d_back_cover_dent" name="work[]"
                                                        value="d_dent">
                                                    <label class="label_values"
                                                        for="d_back_cover_dent">Instagram</label>
                                                </div>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" id="d_back_cover_dent" name="work[]"
                                                        value="d_dent">
                                                    <label class="label_values" for="d_back_cover_dent">lazada</label>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" id="d_back_cover_dent" name="" value=""
                                                    placeholder="Keyword Search">
                                            </td>
                                            <td>2</td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="840 G3"
                                                    name="contact_person_Model">
                                                <input type="text" class="form-control" placeholder="Zbook G7"
                                                    name="contact_person_Model">
                                                <input type="text" class="form-control" placeholder="5530"
                                                    name="contact_person_Model">
                                                <input type="text" class="form-control" placeholder="E7400"
                                                    name="contact_person_Model">
                                                <input type="text" class="form-control" placeholder="E7470"
                                                    name="contact_person_Model">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" placeholder="840 G3"
                                                    name="contact_person_Model">
                                                <input type="text" class="form-control" placeholder="Zbook G7"
                                                    name="contact_person_Model">
                                                <input type="text" class="form-control" placeholder="5530"
                                                    name="contact_person_Model">
                                                <input type="text" class="form-control" placeholder="E7400"
                                                    name="contact_person_Model">
                                                <input type="text" class="form-control" placeholder="E7470"
                                                    name="contact_person_Model">
                                            </td>
                                            <td><span class="badge bg-danger">Please Follow the Order</span></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <!-- ============================================================== -->
                            <!-- Tuesday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-tuesday" role="tabpanel"
                                aria-labelledby="custom-tabs-four-tuesday-tab">

                                <h5>Tuesday</h5>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Wednesday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-wenesday" role="tabpanel"
                                aria-labelledby="custom-tabs-four-wenesday-tab">

                                <h5>wenesday</h5>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Thursday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-thursday" role="tabpanel"
                                aria-labelledby="custom-tabs-four-thursday-tab">

                                <h5>thursday</h5>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Friday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-friday" role="tabpanel"
                                aria-labelledby="custom-tabs-four-friday-tab">

                                <h5>friday</h5>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Saturday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-saturday" role="tabpanel"
                                aria-labelledby="custom-tabs-four-saturday-tab">

                                <h5>saturday</h5>
                            </div>
                            <!-- ============================================================== -->
                            <!-- Sunday  -->
                            <!-- ============================================================== -->
                            <div class="tab-pane fade" id="custom-tabs-four-sunday" role="tabpanel"
                                aria-labelledby="custom-tabs-four-sunday-tab">

                                <h5>sunday</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 grid-margin stretch-card justify-content-center mx-auto mt-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="ion ion-clipboard mr-1"></i>
                        Daily Task
                    </h3>


                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Country</th>
                                <th>Customer Name</th>
                                <th>Whatsapp Number</th>
                                <th>Model He Instrested</th>
                                <th>He Can Pick Up From UAE</th>
                                <th>Posted Model</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1.</td>
                                <td>
                                    <select name="billing_country_region" class="info_select w-75"
                                        style="border-radius: 5px;">
                                        <option value="" selected>--Select Country--</option>
                                        <?php
                                            $query = "SELECT * FROM countries ORDER BY 'country_name' ASC";
                                            $result = mysqli_query($connection, $query);

                                            while ($countries = mysqli_fetch_array($result, MYSQLI_ASSOC)) :;
                                        ?>
                                        <option value="<?php echo $countries["country_name"]; ?>">
                                            <?php echo strtoupper($countries["country_name"]); ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="billing_city"
                                        placeholder="Customer Name">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="billing_city"
                                        placeholder="Whatsapp Number">
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="billing_city"
                                        placeholder="Interested Model">
                                </td>
                                <td>
                                    <select name="billing_country_region" class="info_select w-75"
                                        style="border-radius: 5px;">
                                        <option value="" selected>--Select Option--</option>
                                        <option value>Yes</option>
                                        <option value>No</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="billing_city"
                                        placeholder="Posted Model">
                                </td>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once("../includes/footer.php") ?>