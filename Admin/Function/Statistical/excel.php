
  <?php  
  
  
  $columnHeader = '';  
  $columnHeader = "Sr NO1" . "\t" . "User 2" . "\t" . "3" . "\t" . "4" . "\t";  
    
  $setData = '';  
    
  while ($rec = mysqli_fetch_row($result_detail)) {  
      $rowData = '';  
      foreach ($rec as $value) {  
          $value = '"' . $value . '"' . "\t";  
          $rowData .= $value;  
      }  
      $setData .= trim($rowData) . "\n";  
  }  
    
    
  header("Content-type: application/octet-stream");  
  header("Content-Disposition: attachment; filename=User_Detail_Reoprt.xls");  
  header("Pragma: no-cache");  
  header("Expires: 0");  
    
  echo ucwords($columnHeader) . "\n" . $setData . "\n";  
    
  ?>  