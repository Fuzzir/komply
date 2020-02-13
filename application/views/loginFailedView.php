<div class="alert alert-danger">
  <strong>Błąd!</strong> Podane dane są nieprawidłowe.
</div>
<div id="div1">
    <form id="login_form" class="form-horizontal" method="post" action="login" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="login" id="login" placeholder="Wprowadz e-mail"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required autofocus>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Hasło:</label>
                        <div class="col-sm-10"> 
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="Wprowadz hasło" required>
                        </div>
                    </div>
                    <div class="form-group"> 
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Zaloguj</button>
                        </div>
                    </div>
    </form>
</div>
