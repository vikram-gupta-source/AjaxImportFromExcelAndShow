<?php   
 include 'config.php';

 error_reporting(0);
 if(!empty($_FILES["excel_file"]))  
 {  
      
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
      if($file_array[1] == "xlsx" || $file_array[1] == "xls" )  
      {  
           include("PHPExcel/Classes/PHPExcel/IOFactory.php");  
           $output = '';  
           $output .= "  
           <label class='text-success'>Data Inserted</label>  
                <table class='table table-bordered'>  
                     <tr>  
                          <th>Employee Name</th>  
                          <th>Age</th>  
                          <th>Deparment</th>  
                          <th>Address</th>  
                     </tr>  
                     ";  
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
           foreach($object->getWorksheetIterator() as $worksheet)  
           {  
                $highestRow = $worksheet->getHighestRow();  
                for($row=2; $row<=$highestRow; $row++)  
                {  
                     $name = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(0, $row)->getValue());  
                     $age = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(1, $row)->getValue());  
                     $department = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(2, $row)->getValue());  
                     $address = mysqli_real_escape_string($conn, $worksheet->getCellByColumnAndRow(3, $row)->getValue());  
                     $query = "  
                     INSERT INTO tbl_employee (employeeName, employeeAge, employeeDepartment, employeeAddress) VALUES ('".$name."', ".$age.", '".$department."', '".$address."')  
                     ";  
                    mysqli_query($conn, $query);  
                     $output .= '  
                     <tr>  
                          <td>'.$name.'</td>  
                          <td>'.$age.'</td>  
                          <td>'.$department.'</td>  
                          <td>'.$address.'</td>  
                     </tr>  
                     ';  
                }  
           }  
           $output .= '</table>';  
           echo $output;  
           
      }  
      else  
      {  
           echo '<label class="text-danger">Invalid File</label>';  
      }  
 }  
 ?>  