<?php
 
 
$filename = 'archivos/';
$filename=$filename.basename($_FILES['uploaded_file']['name']);
echo $filename;
 
if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'],$filename)) {
    echo 'TRUE';
} else {
    echo "FAIL";
}
 
?>