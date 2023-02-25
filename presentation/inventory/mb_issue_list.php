<?php
session_start();
include_once '../../dataAccess/connection.php';
include_once '../../dataAccess/functions.php';
include_once '../../dataAccess/403.php';
include_once '../includes/header.php';
// checking if a user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../index.php');
}
?>
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <a href="warehouse_dashboard.php">
            <i class="fa-solid fa-left fa-2x m-2" style="color: #ced4da;"></i>
        </a>
    </div>
</div>
<div class="row m-2">
<div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Received QTY From Motherboard</span>
                <span class="info-box-number">
                <?php
     $sql="SELECT COUNT(alsakb_qr) as count FROM issue_laptops WHERE issue_type2='1' ";
      $query_run = mysqli_query($connection, $sql);
      $count=0;
      foreach($query_run as $a){
        $count=$a['count'];
      }
      
    ?>
<a href="javascript:getGrossProfit(0)">
<?php
     $sql="SELECT COUNT(alsakb_qr) as count FROM issue_laptops WHERE issue_type2='1' AND mb_received='1'";
      $query_run = mysqli_query($connection, $sql);
      foreach($query_run as $a){
        echo "<div style='font-size:26px'>". $a['count']." / ".$count."</div>";
      }
    ?>
</a>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Completed QTY in Motherboard</span>
                <span class="info-box-number">
<a href="javascript:getGrossProfit(1)">
<?php
     $sql="SELECT COUNT(alsakb_qr) as count FROM issue_laptops WHERE issue_type2='1' AND status='2'";
      $query_run = mysqli_query($connection, $sql);
      foreach($query_run as $a){
        echo "<div style='font-size:26px'>". $a['count']." / ".$count."</div>";
      }
    ?>
</a>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Remaining QTY in Motherboard</span>
                <span class="info-box-number">
<a href="javascript:getGrossProfit(2)" id="marks" value="2">
<?php
     $sql="SELECT COUNT(alsakb_qr) as count FROM issue_laptops WHERE issue_type2='1' AND status='1'";
      $query_run = mysqli_query($connection, $sql);
      foreach($query_run as $a){
        echo "<div style='font-size:26px'>". $a['count']." / ".$count."</div>";
      }
    ?>
</a>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- <div class="col-12 col-sm-6 col-md-3 mt-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fa-solid fa-warehouse"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">All QTY in Motherboard</span>
                <span class="info-box-number">
<a href="javascript:getGrossProfit(0)" id="marks" value="2">
<?php
     $sql="SELECT COUNT(alsakb_qr) as count FROM issue_laptops WHERE issue_type2='1'";
      $query_run = mysqli_query($connection, $sql);
      foreach($query_run as $a){
        echo "<div style='font-size:26px'>". $a['count']." / ".$count."</div>";
      }
    ?>
</a>
                </span>
            </div>
          
        </div>
    </div> -->
</div>

<div id="txtHint"></div>
<?php
$value=1;
if($value == 1) {
    for($i=0;$i<$value;$i++){
        echo "<script>";
        echo "var gross_profit = 0;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById('txtHint').innerHTML = this.responseText;
          }
        };
        xmlhttp.open('GET','mb_view.php?q='+gross_profit,true);
        xmlhttp.send();";
        echo "</script>";
    }
   
} 
?>
<script type="text/javascript">
        const getGrossProfit = (str) => {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","mb_view.php?q="+str,true);
    xmlhttp.send();  }

	</script>

