<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    table,
    td,
    th {
      border: 1px solid black;
      padding: 5px;
    }

    th {
      text-align: left;
    }
  </style>
</head>

<body>

  <?php
  $q = intval($_GET['q']);

  $con = mysqli_connect("localhost", "root", "", "wms");
  if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
  }

  mysqli_select_db($con, "wms");
  $sql = "SELECT * FROM issue_laptops WHERE alsakb_qr = '" . $q . "'";
  $result = mysqli_query($con, $sql);


  while ($row = mysqli_fetch_array($result)) {
    $alsakb = $row['alsakb_qr'];
    $test = $row['bios_lock'];
    $test2 = $row['computrace_lock'];
    $test3 = $row['me_region'];
    $test4 = $row['no_power'];
    $test5 = $row['no_display'];
    $test6 = $row['port_issue'];
    $test7 = $row['tpm_lock'];
    if ($test == 1) {
  ?>
      <div class="col-sm-12 row">
        <h4 class="col-lg-6 ">Bios Lock </h4>
        <input type='checkbox' style='background-color:red' checked disabled>
      </div>
    <?php
    }
    if ($test2 == 1) {
    ?>
      <div class="col-sm-12 row ">
        <h4 class="col-lg-6 ">Computrace Lock </h4>
        <input type='checkbox' style='background-color:red' checked disabled>
      </div>
    <?php
    }
    if ($test3 == 1) {
    ?>
      <div class="col-sm-12 row ">
        <h4 class="col-lg-6 ">ME Region</h4>
        <input type='checkbox' style='background-color:red' checked disabled>
      </div>
    <?php
    }
    if ($test4 == 1) {
    ?>
      <div class="col-sm-12 row ">
        <h4 class="col-lg-6 ">No Power </h4>
        <input type='checkbox' style='background-color:red' checked disabled>
      </div>
    <?php
    }
    if ($test5 == 1) {
    ?>
      <div class="col-sm-12 row ">
        <h4 class="col-lg-6 ">No Display </h4>
        <input type='checkbox' style='background-color:red' checked disabled>
      </div>
    <?php
    }
    if ($test6 == 1) {
    ?>
      <div class="col-sm-12 row ">
        <h4 class="col-lg-6 ">Port Issue </h4>
        <input type='checkbox' style='background-color:red' checked disabled>
      </div>
    <?php
    }
    if ($test7 == 1) {
    ?>
      <div class="col-sm-12 row ">
        <h4 class="col-lg-6 ">TPM Lock </h4>
        <input type='checkbox' style='background-color:red' checked disabled>
      </div>
    <?php
    }
    ?>
    <input type='text' class=" d-none" style='background-color:red' name='tpm' value="<?php echo $test7 ?>">
    <input type='text' class=" d-none" style='background-color:red' name='port' value="<?php echo $test6 ?>">
    <input type='text' class=" d-none" style='background-color:red' name='ndsply' value="<?php echo $test5 ?>">
    <input type='text' class=" d-none" style='background-color:red' name='npwr' value="<?php echo $test4 ?>">
    <input type='text' class=" d-none" style='background-color:red' name='me' value="<?php echo $test3 ?>">
    <input type='text' class=" d-none" style='background-color:red' name='cmplock' value="<?php echo $test2 ?>">
    <input type='text' class=" d-none" style='background-color:red' name='bios' value="<?php echo $test ?>">
    <input type='text' class=" d-none" name='qr' value='<?php echo $alsakb ?>'>
  <?php
  }
  mysqli_close($con);
  ?>
</body>

</html>