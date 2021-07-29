<?php 
include "config.php";
$result_array = array();

$sql = "SELECT employeeName, employeeAge, employeeDepartment, employeeAddress FROM tbl_employee ";
// echo $sql;
$result = $conn->query($sql);

/* If there are results from database push to result array */

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

        array_push($result_array, $row);

    }

}

/* send a JSON encded array to client */
header('Content-type: application/json');
echo json_encode($result_array);

$conn->close();

?>