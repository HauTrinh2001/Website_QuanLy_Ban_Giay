<?php
    if(!isset($_GET['thamso'])){$thamso="";}else{$thamso=$_GET['thamso'];}
    switch($thamso)
	{
		case "baitap":
            include("./Function/ThucHanh/ExerciseLink/Exercise_1.php");    
		break;
		case "baitapp2":
            include("./Function/ThucHanh/ExerciseLink/Exercise_2.php");    
		break;
		case "baitapp3":
            include("./Function/ThucHanh/ExerciseLink/Exercise_3.php");    
		break;
		case "thuonghieu":
            include("./Function/Brands/Brands_Page.php");     
		break;
		case "giay":
            include("./Function/Products/Products_Page.php");     
		break;
		default:
			include("./Function/Manager/Members.php");  
		
	}
?>