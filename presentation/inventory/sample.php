<!doctype html>
<html>

<head>
    <title>CALL FUNCTION AFTER DIV LOAD</title>
</head>

<body>
    <div id="ele"></div>
    <script>
    var int = setInterval('check()', 300);

    function check() {
        if (chobj('div') == true) {
            window.alert('true');
            int = window.clearInterval(int);
        } else {
            document.write('<p>false</p>');
        }
    }

    function chobj(ele) {
        return (document.getElementById('ele')) ? true : false;
    }
    </script>
</body>

</html>