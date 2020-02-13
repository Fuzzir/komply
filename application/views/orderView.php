<!DOCTYPE html>
<html>
<?=$head?>
<body>
    <?=$navView?>
    <div id="bill_info" style="max-width:500px; margin:auto; padding:1em">
        <?php if($this->session->userdata('logged')): ?>
        <form name="billing" method="post" action="<?=base_url('cart/place_order') ?>" >
                <h1 align="center">Adres zamówienia</h1>
                    <tr><td>Wartość zamówienia:</td><td><strong><?php echo number_format($this->cart->total(), 2); ?> zł</strong></td></tr>
                    <div class="form-group">
                      <label for="nazwa">Imię</label>
                      <input type="text" class="form-control" name='imie' required>
                    </div>
                    <div class="form-group">
                      <label for="nazwa">Nazwisko</label>
                      <input type="text" class="form-control" name='nazwisko' required>
                    </div>
                    <div class="form-group">
                      <label for="email">E-mail</label>
                      <input type="email" class="form-control" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                    </div>
                    <div class="form-group">
                      <label for="nazwa">Adres</label>
                      <input type="text" class="form-control" name='adres' required>
                    </div>
                    <div class="form-group">
                      <label for="nazwa">Kod pocztowy</label>
                      <input type="text" class="form-control" style="width:6em" maxlength="6" name='kod' pattern="[0-9]{2}+\-[0-9]{3}" title="Format xx-xxx" required>
                    </div>
                    <div class="form-group">
                      <label for="nazwa">Miejscowość</label>
                      <input type="text" class="form-control" name='miejscowosc' required>
                    </div>
                    <div class="form-group">
                      <label for="nazwa">Telefon</label>
                      <input type="text" class="form-control" maxlength="9" name='telefon' pattern="[0-9]{9}" required>
                    </div>


                    <a href="<?=base_url('cart/place_order')?>" style="text-decoration: none"><button type="submit" class="btn btn-success btn-block">
                    Zamów
                    </button></a>
            </div>
        </form>
        <?php else: echo "<br>Musisz być zalogowany, kliknij Wstecz i zaloguj się.<br><br>".anchor('cart','Wstecz'); endif;?>
    </div>
</body>
</html>