<?php

    try{
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=blog', 'blogger', '12345');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES "utf8"');

    }
    catch(PDOException $e){
        $output = 'Невозможно подключиться к базе данных: '.$e->getMessage();
        include 'output.html.php';
        exit();
    }
    //Данное сообщение необязательно, если Вам не требуется его постоянное отображение
    //удалите следующие строки или закомментируйте их
    $output = 'Подключение установлено.';
    include 'output.html.php';
