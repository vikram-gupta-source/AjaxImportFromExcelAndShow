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
          body  
          {  
               margin:0;  
               padding:0;  
               background-color:#b1f1f1;  
          }  
          .box  
          {  
               width:800px;  
               padding:20px;  
               background-color:#fff;  
               border:1px solid #ccc;  
               border-radius:5px;  
               margin-top:10px;  
          }  
     </style>  
</head>  
<body>  
<?php 
   include 'navbar.php';
?>
     <div class="container box">  
          <h3 align="center">Employee Details into Database </h3>  
          <br /><br />  
          <br /><br />  
          <form mehtod="post" id="export_excel">  
               <label>Select Excel File</label>  
               <input type="file" name="excel_file" id="excel_file" />  
          </form>  
          <br />  
          <br />  
          <div id="result">  
          </div>  
     </div>  
</body>  
</html>  
<script>  
$(document).ready(function(){  
$('#excel_file').change(function(){  
     $('#export_excel').submit();  
});  
$('#export_excel').on('submit', function(event){  
     event.preventDefault();  
     $.ajax({  
          url:"export.php",  
          method:"POST",  
          data:new FormData(this),  
          contentType:false,  
          processData:false,  
          success:function(data){  
               $('#result').html(data);  
               $('#excel_file').val('');  
          }  
     });  
});  
});  
</script> 