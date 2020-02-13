<?php
    $link = mysqli_connect("localhost", "root", "","shop");
    foreach ($_POST as $k=>$v) {$_POST[$k] = mysqli_real_escape_string($link, $v);}
    foreach ($_SERVER as $k=>$v) {$_SERVER[$k] = mysqli_real_escape_string($link, $v);}

    if (isset($_POST['login'])){

    $q = mysqli_fetch_assoc( mysqli_query($link, "select count(*) cnt, ID_user, email from user where email='{$_POST['login']}' and password = '{$_POST['pass']}';"));

    if ($q['cnt']) {
        $id = md5(rand(-10000,10000) . microtime()) . md5(crc32(microtime()) . $_SERVER['REMOTE_ADDR']);
        mysqli_query($link, "delete from sesssion where ID_user = '$q[ID_user]';"); 	
        mysqli_query($link, "insert into session (ID_user, id, ip, web) values 
        ('$q[ID_user]','$id','$_SERVER[REMOTE_ADDR]','$_SERVER[HTTP_USER_AGENT]')");
        if (! mysqli_errno($link)){
                setcookie("id", $id);
                setcookie('email', $q['email']);
                echo "zalogowano pomyślnie!";
                header("location:index.php");
                
                } else {echo "błąd podczas logowania!";}
                
            } else {
                echo "błąd logowania!";
            } }
?>        
