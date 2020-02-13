<!DOCTYPE html>
<html>
    <?=$head?>
    <body>
        <?=$navView?>
            <div style="max-width: 80em; margin: auto">
                <table class="table table-striped">
                    <thead><tr><th>Numer zamówenia</th><th>E-mail</th><th>Data złożenia</th><th>Status</th><th>Kwota</th><th></th></tr></thead>
                    <tbody>
                        <?php for($i=0;$i<count($orders);$i++):?>
                    <tr>
                        <?php echo "<td>".$orders[$i]['order_id']."</td>"."<td>".$orders[$i]['login']."</td>"."<td>".$orders[$i]['order_date']."</td><td>".$orders[$i]['status']."</td><td>".$orders[$i]['total']."zł</td><td>".
                                anchor('orders/details/'.$orders[$i]['order_id'],'Szczegóły'). "</td></tr>"?>
                    </tr>
                    <?php endfor;?>
                    </tbody>
                </table>    
            </div>
        </div>
        
    </body>
</html>
