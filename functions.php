<?php
    
    function check_cookie() {
        $link = mysqli_connect("localhost", "root", "","shop");
        if (check_database_con($link)) return;

        foreach ($_COOKIE as $k=>$v) {$_COOKIE[$k] = mysqli_real_escape_string($link, $v);}
        foreach ($_SERVER as $k=>$v) {$_SERVER[$k] = mysqli_real_escape_string($link, $v);}

        if (!isset($_COOKIE['id']))
        {
            echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Rejestracja</a></li>
             <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logowanie</a></li>';
            return;
        }

        $q = mysqli_fetch_assoc(mysqli_query($link, "select ID_user from session where id = '$_COOKIE[id]' and web = '$_SERVER[HTTP_USER_AGENT]' AND ip = '$_SERVER[REMOTE_ADDR]';"));

        if (! empty($q['ID_user'])){
            echo '<li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">'. $_COOKIE['email'] .'
                        <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Moje konto</a></li>
                            <li><a href="?logout">Wyloguj</a></li>
                        </ul>
                    </li>';
        } else {
            echo '<li><a href="#"><span class="glyphicon glyphicon-user"></span> Rejestracja</a></li>
            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Logowanie</a></li>';
        };
    }

    function check_logout() {
        $link = mysqli_connect("localhost", "root", "","shop");
        if (check_database_con($link)) return;
        if (isset($_GET['logout'])){
            $q = mysqli_query($link, "delete from session where id = '$_COOKIE[id]' and web = '$_SERVER[HTTP_USER_AGENT]';");	
            setcookie("id",0,time()-1);
            unset($_COOKIE['id']);
            unset($_COOKIE['email']);
        }           
    }

    function check_database_con($link) {
        if (!$link){
            die("Błąd połączenia: " . mysqli_connect_error());
            return 1;
        }
        return 0;    
    }
?>