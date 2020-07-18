<?php
    session_start();
    require_once "connection.php";

    if($stmt = $link->prepare('SELECT id, password FROM Users WHERE username=?')){
        $stmt->bind_param('s', $_POST['user']);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt->bind_result($id, $password);
            $stmt->fetch();
            if(password_verify($_POST['pass'], $password)){
                session_regenerate_id();
                $_SESSION['loggedin'] = true;
                header('Location: main.php');
            }
            else{
                echo '<h1>Eroare la autentificare!</h1>';
                echo '<h2>Parola incorecta!</h2>';
            }
        }
        else{
            echo '<h1>Eroare la autentificare!</h1>';
            echo '<h2>Username incorect!</h2>';
        }
    }
?>