<?php
    //Подключение к базе данных, через отдельный файл:
    include_once $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/database.php';
    //Исполнение функции отображения списка статей:

    //Здесь мы осуществляем ФУНКЦИЮ отображения всех статей
    try{
        $sql = $pdo->prepare("SELECT * FROM articles ORDER BY date DESC");
        $sql->execute();
        }

    //Этот участок отвечает за выдачу сообщения об ошибке работы с БД:
    catch(PDOException $e){
        $output = 'Невозможно отобразить список статей: '.$e->getMessage();
        //файл-оформление сообщения об ошибке:        
        include $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/output.html.php';
        exit();
    }
    //перевод результата команды в массив с массивами-построчниками и присвоение рез-та переменной
    $articles = $sql->fetchAll(PDO::FETCH_ASSOC);
    require_once("views/articles.html.php");