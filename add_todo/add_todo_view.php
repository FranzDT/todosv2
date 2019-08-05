<?php
    
?>
<html>
    <head>
        <title>Add Todo</title>
    </head>
    <body>
        <form action="./add_todo_process.php" method="POST">
            Title: <input type="text" name="todo_title" placeholder="" value=""> <br>
            Description: <input type="text" name="todo_desc"><br>
            <input type="submit" value="Add">
        </form>  
    </body>
</html>
