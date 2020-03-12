<?php
    if (!isset($_SESSION['logged']) || !$_SESSION['logged'])
    {
        echo '<li><a href="'.base_url().'register"><span class="glyphicon glyphicon-user"></span> Rejestracja</a></li>
        <li><a href="'.base_url().'login"><span class="glyphicon glyphicon-log-in"></span> Logowanie</a></li>';
    } else {

        if(isset($_SESSION['type']) && $_SESSION['type']=="admin"){
            echo '<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$_SESSION['login'].'
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="'.base_url("orders").'">Zamówienia</a></li>
                    <li><a href="'.base_url("users").'">Użytkownicy</a></li>
                    <li><a href="'.base_url("products/add").'">Dodaj produkt</a></li>
                    <li><a href="'.base_url("login/logout").'">Wyloguj</a></li>
                </ul>
            </li>';
        } else {
        echo '<li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$_SESSION['login'].'
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="'.base_url("orders").'">Zamówienia</a></li>
                    <li><a href="'.base_url("login/logout").'">Wyloguj</a></li>
                </ul>
            </li>';
        }
    }
?>
