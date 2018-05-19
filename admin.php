<?php
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_FILES['testfile'])) {
    
    $fileName = $_FILES['testfile']['name'];
    $jsonDir = 'uploads/';
    $info = pathinfo($jsonDir . $fileName);
    
    if($info['extension']==='json') {
    $tmpFile = file_get_contents($_FILES['testfile']['tmp_name']);
    $decode = json_decode($tmpFile);
    
    if ($_FILES['testfile']['error'] == UPLOAD_ERR_OK && move_uploaded_file($_FILES['testfile']['tmp_name'], "$jsonDir/$fileName"));
    header('Location: ' . 'list.php');
        
    }
    
    else{
    echo "Не удалось загрузить файл с тестами. Структура не подходит";
    
    }}
    
?> 

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Загрузить тест</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="alert alert-success" role="alert">
        <form method="post" enctype=multipart/form-data>
            <input type=file name=testfile>
            <input type=submit>
        </form>
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Загрузить тест</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="list.php">Список тестов</a>
            </li>
        </ul>
    </div>
</body>
</html>
