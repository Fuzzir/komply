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
            echo $contextView;
        ?>
    
    </body>
</html>