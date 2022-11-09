<form action="" method="POST">
    <div class="input-group">
        <span class="mt-1 mx-3" style="font-size: 14px;">Search :</span>
        <input type="text" min="000001" name="search"
            value="<?php if(isset($_POST['search'])){echo $_POST['search']; } ?>" class="form-control"
            placeholder="Search data" width="50%">
    </div>
</form>
<?php 
if (isset($_POST['search'])) {
    $filtervalues = $_POST['search'];}
    echo $filtervalues;
?>