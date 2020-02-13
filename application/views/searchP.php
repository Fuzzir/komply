
<div class="wrapper" >
	<div class="desc">	
		<h3>Lista produktów</h3>

	</div>

	<div class="content">

		<div class="product-grid product-grid--flexbox">
			<div class="product-grid__wrapper">

<?php
if(!empty($products)){
	foreach ($products as $row):
 
    	echo '
    		<div class="product-grid__product-wrapper">
					<div class="product-grid__product">
						<div class="product-grid__img-wrapper">			
							<img src="'.base_url('img')."/".$row['product_img'].'" class="img-responsive" style="width:250px; height:250px"/>
						</div>
						<span class="product-grid__title">'.$row['product_name'].'</span>
						<span class="product-grid__price">'.$row['product_price'].' zł</span>
						<div class="product-grid__extend-wrapper">
							<div class="product-grid__extend">
								
								<button type="button" class="btn btn-success" id="link"><span class="glyphicon glyphicon-shopping-cart"> </span><a href=" '.base_url("cart/add/$row[product_id]").'"> Do koszyka</a></button>
								<span class="product-grid__btn product-grid__view"><i class="fa fa-eye"></i> <a href=" '.base_url("products/details/$row[product_id]").'">Szczegóły</a> </span>
							</div>
						</div>
					</div>
				</div>
    	';
	endforeach; 
} else { echo "Brak wyników"; } ?>


</div>		
		</div>
	</div>
</div>

