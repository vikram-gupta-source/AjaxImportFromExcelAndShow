<?php
session_start();
error_reporting(0);

?>
<html>

<head>
    <title>Creaa Employee Details </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #b1f1f1;
        }

        .box {
            width: 800px;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <div class="container box">

        <h3>List of Employee</h3>

        <p><strong>Click on button to Refresh Employee records from database</strong></p>
        <div id="records"></div>

        <p>
            <input type="button" id="getemployee" value="Fetch Records" />
        </p>

    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <script type="text/javascript">
        $(function() {

            $(window).on("load", function() {
                $.ajax({

                    method: "GET",

                    url: "getrecords.php",

                }).done(function(data) {
                    console.log(data);
                    var string1 = JSON.stringify(data);

                    var result = JSON.parse(string1);
                    var string = '<table width="100%" class="table"><tr> <th>Name</th> <th>Age</th> <th>Department</th><th>Address</th><tr>';

                    $.each(result, function(key, value) {

                        string += "<tr> <td>" + value['employeeName'] + "</td><td>" + value['employeeAge'] + "</td><td>" + value['employeeDepartment'] + '</td>  \
<td>' + value['employeeAddress'] + "</td> </tr>";
                    });

                    string += '</table>';

                    $("#records").html(string);
                });
            });
            $("#getemployee").on('click', function() {

                $.ajax({

                    method: "GET",

                    url: "getrecords.php",

                }).done(function(data) {
                    console.log(data);
                    var string1 = JSON.stringify(data);

                    var result = JSON.parse(string1);
                    var string = '<table width="100%" class="table"><tr> <th>Name</th> <th>Age</th> <th>Department</th><th>Address</th><tr>';

                    $.each(result, function(key, value) {

                        string += "<tr> <td>" + value['employeeName'] + "</td><td>" + value['employeeAge'] + "</td><td>" + value['employeeDepartment'] + '</td>  \
                    <td>' + value['employeeAddress'] + "</td> </tr>";
                    });

                    string += '</table>';

                    $("#records").html(string);
                });
            });
        });
    </script>
</body>

</html>