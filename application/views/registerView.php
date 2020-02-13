<!DOCTYPE html>
<?php echo $head; ?>
<body>

<?php echo $navView; ?>
<div class="container" style='max-width: 500px'>
            <form class="form-horizontal" role="form" action="register" method="POST" autocomplete="off">
                <h2>Formularz rejestracyjny</h2>
                <?php if($_SESSION['message']) echo '<div class="alert alert-danger">'.$_SESSION['message'].' </div>'; ?>
    
                <div class="form-group">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" placeholder="Email" name='email' class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required autofocus>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Hasło</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" name='password' placeholder="Hasło" class="form-control" required>
                    </div> 
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-3 control-label">Hasło (Potwierdź)</label>
                    <div class="col-sm-9">
                        <input type="password" id="repassword" name="repassword" placeholder="Potwierdź hasło" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary btn-block">Zarejestruj</button>
                    </div>
                </div>
            </form>
        </div>
</body>
</html>