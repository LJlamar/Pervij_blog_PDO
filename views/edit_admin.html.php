<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Мой первый блог</title>
        <link rel="stylesheet" href="../style.css">
        </head>
    <body>
        <div class="container">
            <h1>Редактирование статьи</h1>
            <a href="../admin/">Назад</a>
            <div>
                <!--<form method="post">-->
                <form method="post" action="index.php?action=edit&id=<?php echo($a['id']);?>">
                    
                    <label>
                        <input type="text" name="id" value="<?php echo($a['id']);?>" class="form-item" required hidden="">
                    </label>
                    <label>
                        Название:
                        <input class="form" type="text" name="title" value="<?php echo($a['title']);?>" class="form-item" required>
                    </label><br>
                    <label>
                        Дата:
                        <input class="date" type="date" name="date" value="<?php echo($a['date']);?>" class="form-item" required>
                    </label><br>
                    <label>
                        Содержание:<br>
                        <textarea class="form" class="form-item" name="text" required><?php echo($a['text']);?></textarea>
                    </label>
                    <input type="submit" value="Сохранить" class="btn">
                </form>
            </div>
        
            <footer>
                <p>Мой первый блог<br>Copyright &copy;2017</p>
            </footer>
        </div>
    </body>
</html>

