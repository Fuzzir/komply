<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <title>Sklep komputerowy</title>
  
    </head>
    
    <body>
        <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                         
            </button>
            <a class="navbar-brand" href="index.php">Sklep komputerowy</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategorie
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Komputery</a></li>
                    <li><a href="#">Monitory</a></li>
                    <li><a href="#">Podzespoły komputerowe</a></li>
                </ul>
            </li>
            
            </ul>
            <form class="navbar-form navbar-left" style="float:right">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Wyszukaj">
            </div>
            <button type="submit" class="btn btn-default">Szukaj</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <?php
                    include 'functions.php';
                    check_logout();
                    check_cookie();
                ?> 
                
            </ul>
        </div>
        </nav>
    
    </body>
</html>