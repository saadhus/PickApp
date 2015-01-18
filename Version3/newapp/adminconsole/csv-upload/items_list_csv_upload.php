<?php  //item list csv file uploading
ob_start();
include_once "../../accesscontrol.php";

dbConnect("someappname_users_db");

$table_id = mysql_real_escape_string($_SESSION['table_id']);
$table_name = $table_id . "_item_table";

if ($_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = $_FILES[csv][tmp_name]; 
    $handle = fopen($file,"r"); 
     
    //loop through the csv file and insert into database 
    do { 
        if ($data[0]) { 
            mysql_query("INSERT INTO $table_name (item_name, location) VALUES 
                ( 
                    '".addslashes($data[0])."', 
                    '".addslashes($data[1])."'
                ) 
            "); 
        } 
    } while ($data = fgetcsv($handle,1000,",","'")); 
    // 

    //redirect 
    header('Location: items_list.php?success=1'); die; 

} 

?>