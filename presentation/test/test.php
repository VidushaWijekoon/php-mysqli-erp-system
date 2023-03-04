<body>
    <p id="time"></p>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
    var timestamp = '<?= time(); ?>';

    function updateTime() {
        $('#time').html(Date(timestamp));
        timestamp++;
    }
    $(function() {
        setInterval(updateTime, 1000);
    });
</script>