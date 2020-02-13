<!DOCTYPE html>
<?php
	echo $head;
	echo '<body>';
	echo $navView;
	$product = $product[0];
	if( !$product ) {
		echo '<div class="alert alert-danger">
            <strong>Błąd!</strong> Taki produkt nie istnieje.
            </div>';
	} else {

?>
	<div class="container">
        	<div class="row">
               <div class="col-xs-4 item-photo">
                    <img style="max-width:100%;" src="<?php echo base_url('img').'/'.$product['product_img']?>" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">
                    <h3><?=$product['product_name']?></h3>    
        
                    <h6 class="title-price"><small>Cena:</small></h6>
                    <h3 style="margin-top:0px;"><?=$product['product_price']?> zł</h3>               
        
                    <div class="section" style="padding-bottom:20px; padding-top: 20px">
                        <button type="button" class="btn btn-success" id="link"><span class="glyphicon glyphicon-shopping-cart"> </span><a href="<?= base_url("cart/add/$product[product_id]")?>"> Do koszyka</a></button>
                    </div>                                        
                </div>                              
        
                <div class="col-xs-9">
                    <h4>Specyfikacja</h4>
                    <div style="width:100%;border-top:1px solid silver">
                    	<br>
                            <table class="table table-striped">
							  <tbody>
							    <tr>
							      <th>Procesor</th>
							      <td><?=$product['proccessor']?></td>
							    </tr>
							    <tr>
							      <th>Pamieć RAM</th>
							      <td><?=$product['ram_amount']?></td>
							    </tr>
							    <tr>
							      <th>Typ dysku</th>
							      <td><?=$product['drive_type']?></td>
							    </tr>
							    <tr>
							      <th>Pojemność dysku</th>
							      <td><?=$product['drive_size']?></td>
							    </tr>
							    <tr>
							      <th>Karta graficzna</th>
							      <td><?=$product['graphics_card']?></td>
							    </tr>
							    <tr>
							      <th>Przekątna ekranu</th>
							      <td><?=$product['screen_size']?></td>
							    </tr>
							    <tr>
							      <th>Rozdzielczość ekranu</th>
							      <td><?=$product['screen_resolution']?></td>
							    </tr>
							    <tr>
							      <th>System operacyjny</th>
							      <td><?=$product['os']?></td>
							    </tr>

							  </tbody>
							</table>
                    </div>
                </div>		
            </div>
        </div>
       <?php } ?>
</body>