<?php
	$connection = mysqli_connect("localhost", "root", "", "check");

	$query 		= "SELECT * FROM brand";
	$result_set = mysqli_query($connection, $query);

	$province_list = "";
	while ( $result = mysqli_fetch_assoc($result_set) ) {
		$province_list .= "<option value=\"{$result['brand']}\">{$result['brand']}</option>";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dynamic Drop Down List</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Dynamic Drop Down List</h1>

    <form action="">

        <div>
            <label for="province">Select Province:</label>
            <select name="province" id="province">
                <?php echo $province_list; ?>
            </select>
        </div>

        <div>
            <label for="district">Select District:</label>
            <select name="district" id="district">

            </select>
        </div>

    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $("#province").on("change", function() {
            var provinceId = $("#province").val();
            var getURL = "get-model.php?brand=" + provinceId;
            $.get(getURL, function(data, status) {
                $("#district").html(data);
            });
        });
    });
    </script>
</body>

</html>
<style>
body {
    font-family: sans-serif;
    font-size: 25px;
    margin: 30px;
}

h1 {
    font-size: 30px;
}

form div {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
}

select {
    font-size: 25px;
    padding: 5px;
    width: 400px;
}
</style>