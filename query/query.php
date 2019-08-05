<?php     
        function usernameQuery($username)
        {
                $sql = "SELECT username 
                        FROM users
                        WHERE username = '$username'";
                
                return $sql;
        }

        function userRegQuery($first_name, $last_name, $username, $password, $role)
        {
                $sql = "INSERT INTO users(first_name, last_name, username, password, user_role_id, date_created)
                        VALUES ('$first_name'
                        , '$last_name'
                        , '$username'
                        , '$password'
                        , $role
                        , (SELECT CURDATE()))";

                return $sql;
        }

        function passwordQuery($username, $password)
        {
                $sql = "SELECT password
                        FROM users
                        WHERE username = '$username'";
                return $sql;
        }

        function getUserQuery($username)
        {
                $sql = "SELECT user_id, username, first_name, last_name, user_role_id
                        FROM users
                        WHERE username = '$username'";
                return $sql;
        }

        function signInQuery($username)
        {
                $sql = "UPDATE users 
                        SET last_signin = (SELECT CURDATE())
                        WHERE username = '$username'";
                return $sql;
        }    
        
        function addTodoQuery($user_id, $todo_title, $todo_desc)
        {
                $sql = "INSERT INTO todo (todo_title, todo_desc, todo_status, user_id, date_created)
                        VALUES ('$todo_title'
                        , '$todo_desc'
                        , 'backlog'
                        , $user_id
                        , (SELECT CURDATE()))";
                
                return $sql;
        }

        function showUserTodo($user_id) 
        {
                $sql = "SELECT *
                        FROM users
                        WHERE user_id = $user_id";
                        
                return $sql;
        }
        function getUserTodoQuery($user_id)
        {       
                $sql = "SELECT * FROM todo WHERE user_id = $user_id";
                
                return $sql;
        }

        function getTodoQuery($todo_id)
        {       
                $sql = "SELECT todo_title, todo_desc FROM todo WHERE todo_id = $todo_id";

                return $sql;
        }

        function editTodoQuery($todo_id, $todo_title, $todo_desc)
        {       
                $sql = "UPDATE todo SET todo_title='$todo_title', todo_desc='$todo_desc' WHERE todo_id = $todo_id";

                return $sql;
        }

        function getUsers(){
                $sql = "SELECT * FROM users";
                return $sql;
        }

        function adminGetUserQuery($user_id)
        {
                $sql = "SELECT * FROM users WHERE user_id = $user_id";
                return $sql;
        }

        function editUserQuery($user_id, $first_name, $last_name, $username)
        {
                $sql = "UPDATE users
                        SET first_name='$first_name', last_name='$last_name', username='$username'
                        WHERE user_id = $user_id";
                return $sql;
        }
?>
