<?php
    //Подключение к базе данных, через отдельный файл:
    include_once $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/database.php';
    //Присваивание выполняемого действия переменной action:
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }else{
        $action = "";
    }
    //ФУНКЦИЯ ДОБАВЛЕНИЯ СТАТЬИ:
    if($action == "add"){
        
        if(!empty($_POST)){
            //Проверка на пустой заголовок статьи
            if($_POST['title'] == ''){
                return false;
            }
            //Непосредственно ФУНКЦИЯ - команда добавления статьи
            try{
                $sql = $pdo->prepare("INSERT INTO articles SET title = :title, date = :date, text = :text");
                $sql->bindValue('title', $_POST['title']);
                $sql->bindValue('date', $_POST['date']);
                $sql->bindValue('text', $_POST['text']);
                $sql->execute();
                header("Location: index.php");
            }
            catch(PDOException $e){
            $output = 'Невозможно добавить статью: '.$e->getMessage();
            include $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/output.html.php';
            exit();
        }        
        }
    include("../views/article_admin.html.php");
    
    }elseif(($action == "edit") & isset($_GET['id'])){
                
        //ФУНКЦИЯ - команда редактирования статьи:
        
        //Сначала - выдача УЖЕ ИМЕЮЩИХСЯ 
        //данных статьи на основе переданного идентификатора
        //и заполнения этими данными веб-формы для изменения
        try{
            $sql = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
            $sql->bindValue('id', $_GET['id']);
            $sql->execute();
    
        }
        catch(PDOException $e){
            $output = 'Невозможно получить данные: '.$e->getMessage();
            include $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/output.html.php';
            exit();
        }
        $a = $sql->fetch(PDO::FETCH_ASSOC);
                
        if(!empty($_POST)){
            if($_POST['title'] == ''){
            return false;
            }    
            //Непосредственно ФУНКЦИЯ редактирования статьи:
            try{
                $sql = $pdo->prepare("UPDATE articles SET title = :title, date = :date, text = :text WHERE id = :id");
                $sql->bindValue(':id', $_GET['id']);
                $sql->bindValue(':title', $_POST['title']);
                $sql->bindValue(':date', $_POST['date']);
                $sql->bindValue(':text', $_POST['text']);
                $sql->execute();
                header("Location: index.php");
            }
            catch(PDOException $e){
                $output = 'Невозможно обновить статью: '.$e->getMessage();
                include $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/output.html.php';
                exit();
            }
        }
        include("../views/edit_admin.html.php");
        
    }elseif(($action == "delete") & isset($_GET['id'])){
        //ФУНКЦИЯ удаления статьи
        //выдача значения id удаляемой статьи для подтверждения удаления
        //с выводом страницы подтверждения,
        //без подтверждения удаления данный участок не нужен
        try{
            $sql = $pdo->prepare("SELECT * FROM articles WHERE id = :id");
            $sql->bindValue('id', $_GET['id']);
            $sql->execute();
    
        }
        catch(PDOException $e){
            $output = 'Невозможно получить данные: '.$e->getMessage();
            include $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/output.html.php';
            exit();
        }
        $a = $sql->fetch(PDO::FETCH_ASSOC);
        include("../views/delete_admin.html.php");
        
        if(($action == "delete") & (isset($_POST['id']))){
            //Непосредственно ФУНКЦИЯ удаления статьи
            try{
                $sql = $pdo->prepare("DELETE from articles WHERE id = :id");
                $sql->bindValue(':id', $_POST['id']);
                $sql->execute();
                header("Location: index.php");
            }
            catch(PDOException $e){
                $output = 'Невозможно получить данные: '.$e->getMessage();
                include $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/output.html.php';
                exit();
            }    
        }
        
    }
    
            //Далее выдача и отображение всех статей
    else{
         try{
            $sql = $pdo->prepare("SELECT * FROM articles ORDER BY id DESC");
            $sql->execute();
        }
        catch(PDOException $e){
            $output = 'Невозможно получить данные: '.$e->getMessage();
            include $_SERVER['DOCUMENT_ROOT'].'/Course/blog2/output.html.php';
            exit();
        }
        $articles = $sql->fetchAll(PDO::FETCH_ASSOC);
         include("../views/articles_admin.html.php");
     }