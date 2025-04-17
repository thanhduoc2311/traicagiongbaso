<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../connect.php';
    $db = new Connect();
    
    $idca = $_POST['idca'];
    $targetDir = "../img/";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $imgUrl = 'img/' . $fileName;  
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    $idloai = 4; 
    $ngaydang = date("Y-m-d H:i:s"); 
    
    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif', 'mp4', 'webm', 'ogg');
    if (in_array(strtolower($fileType), $allowedTypes)) {        
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {            
            $sqlInsertHinhanh = "INSERT INTO hinhanhca (idca, urlhinh, idloai, ngaydang) VALUES (?, ?, ?, ?)";
            $paramsHinhanh = [$idca, $imgUrl, $idloai, $ngaydang];

            if ($db->execWithParams($sqlInsertHinhanh, ['idca', 'urlhinh', 'idloai', 'ngaydang'], $paramsHinhanh)) {
                echo 'success';
            } else {
                echo 'error'; 
            }
        } else {
            echo 'error'; 
        }
    } else {
        echo 'invalid'; 
    }
}
?>
