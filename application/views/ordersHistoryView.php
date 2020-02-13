<!DOCTYPE html>
<html>
    <?=$head?>
    <body>
        <?=$navView?>
            <div>
                <table class="table table-striped">
                    <thead><tr><th>Numer zamówenia</th><th>Data złożenia</th><th>Status</th><th>Kwota</th><th></th></tr></thead>
                    <tbody>
                        <?php for($i=0;$i<count($orders);$i++):?>
                    <tr>
                        <?php echo "<td>".$orders[$i]['order_id']."</td><td>"."<td>".$orders[$i]['order_date']."</td><td>".$orders[$i]['status']."</td><td>".$orders[$i]['total']."zł</td><td>".
                                anchor('orders/details/'.$orders[$i]['order_id'],'Szczegóły'). "</td></tr>"?>
                    </tr>
                    <?php endfor;?>
                    </tbody>
                </table>    
            </div>
        </div>
        
    </body>
</html>
