<nav class="navbar navbar-inverse ">
        <div class="container-fluid">
            <div class="navbar-header">
            
            <a class="navbar-brand" id="logo" href="<?=base_url('main')?>">Komply</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Kategorie
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                        foreach ($categories as $row) {
                            echo '<li><a href='. base_url("main/index/{$row['categoriesID']}/0/") .">". $row['categories_name'].'</a></li>';
                        }
                    ?>
                </ul>
            </li>
            
            </ul>
            <form class="navbar-form navbar-left" method="GET" action="<?php echo base_url() ?>/main/search">
            <div class="form-group">
                <input type="text" class="form-control" name="query" placeholder="Wyszukaj">
            </div>
            <button type="submit" class="btn btn-default">Szukaj</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                
                <?php
                    echo $logged;
                ?> 
                <li>
                    <a href="<?php echo base_url('cart') ?>">
                            <span class="glyphicon glyphicon-shopping-cart"> <?php echo $this->cart->total_items();?></span>
                    </a>
                </li>
            </ul>
        </div>
</nav>