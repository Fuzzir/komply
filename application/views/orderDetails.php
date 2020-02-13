<!DOCTYPE html>
<html>
    <?=$head?>
    <body>
        <?=$navView?>
            <div style="padding: 2em">
                <table class="table table-striped">
                    <thead><tr><th>Nazwa</th><th>Ilość</th><th>Cena</th><th>Razem</th></tr></thead>
                    <tbody>
                        <?php for($i=0;$i<count($items[0]);$i++):?>
                    <tr>
                        <?php echo "<td>".$items[0][$i]['name']."</td>"."<td>".$items[0][$i]['order_item_quantity']."</td>"."<td>".$items[0][$i]['order_item_price']."</td><td>".$items[0][$i]['order_total']."</td></tr>"?>
                    </tr>
                    <?php endfor;?>
                    </tbody>
                </table>
                <span class="border">
                <div class="" style="border-width: .2rem; padding:1.5rem">
                    <h3>Adres</h3>
                <address>
                <strong><?=$items[1][0]['imie'].' '.$items[1][0]['nazwisko']?></strong><br>
                <?=$items[1][0]['kod'].' '.$items[1][0]['miejscowosc']?><br>
                <br>
                <abbr title="Phone">Telefon:</abbr><?=$items[1][0]['telefon'] ?><br>
                <strong>E-mail</strong><br>
                <a href="mailto:#"><?=$items[1][0]['email'] ?></a>
                </address>
                </div>
                </span>
                
                <?php 
                    if(isset($_SESSION['type']) && $_SESSION['type']=="admin"){

                ?>

                <form class="form-inline" method="post" action="<?=base_url('orders/changestatus')?>">
                <div class="form-group">
                <select class="form-control" name="status">
                    <option selected>Zmień status...</option>
                
                <?php foreach ($statusy as $row):
 
                    echo '<option value="'.$row["order_code"].'">'.$row["status_description"].'</option>';

                endforeach;?>
                </select>
                </div>
                <input type="hidden" name="orderID" value="<?=$items[2]?>">
                <button class="btn btn-outline-secondary" type="submit">Potwierdź</button>
                
                </form>
            <?php } ?>
            </div>
        </div>
        
    </body>
</html>
