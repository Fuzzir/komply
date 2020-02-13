<!DOCTYPE html>
    <?php echo $head; ?>
    
    <body>

        <?php 
        echo $navView; 
        if(isset($logout)) {
            echo $logout;
        }
        ?>
        <?php 
            echo $categoriesView;
            echo $contextView;
        ?>
    
    </body>
</html>