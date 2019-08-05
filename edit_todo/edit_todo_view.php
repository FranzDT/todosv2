<?php
    require "../function/function.php";
    $id = $_GET['todoid'];
    $result = getTodo($id);
    while ($row = $result->fetch_assoc())
    {
        $title = $row['todo_title'];
        $desc = $row['todo_desc'];
    }
?>
<html>
    <head>
        <title>Edit Todo</title>
    </head>
    <body>
        <form action="./edit_todo_process.php" method="POST">
            Title: <input type="text" name="todo_title" placeholder="<?php echo $title; ?>"> <br>
            Description: <input type="text" name="todo_desc" placeholder="<?php echo $desc; ?>"> <br>
            <input type="hidden" name="todo_id" value="<?php echo $id; ?>">
            <input type="hidden" name="user_id" value="<?php echo $_GET['user_id'] ?>">
            <input type="submit" value="Update">
        </form>
    </body>
</html>
