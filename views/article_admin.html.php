<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Мой первый блог</title>
        <link rel="stylesheet" href="../style.css">
    </head>
    <body>
        <div class="container">
            <h1>Добавление статьи</h1>
            <a href="../admin/">Назад</a>
            <div>
                <form method="post" action="index.php?action=add">
                    <label>
                        Название:
                        <input class="form" type="text" name="title" value="" required>
                    </label><br>
                    <label>
                        Дата:
                        <input class="date" type="date" name="date" value="yyyy-mm-dd" required>
                    </label><br>
                    <label>
                        Содержание:<br>
                        <textarea class="form" name="text" required></textarea>
                    </label><br>
                    <input type="submit" value="Сохранить">
                </form>
            </div>
        
            <footer>
                <p>Мой первый блог<br>Copyright &copy;2017</p>
            </footer>
        </div>
    </body>
</html>

