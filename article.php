<?php
    //Подключение к базе данных, через отдельный файл:
    include_once $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/database.php';
    
    //Исполнение функции отображения выбранной статьи:
    try{        
        $sql = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
        //далее осуществляется связка значения полученного при нажатии на ссылку ранее
        //и значения id, передаваемого в команде ранее
        $sql->bindValue('id', $_GET['id']);
        //и выполнение команды
        $sql->execute();

        }
        //Этот участок отвечает за выдачу сообщения об ошибке работы с БД:
        catch(PDOException $e){
                $output = 'Невозможно отобразить статью: '.$e->getMessage();
                include $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/output.html.php';
                exit();
        }

        $article = $sql->fetch(PDO::FETCH_ASSOC);

        include("views/article.html.php");