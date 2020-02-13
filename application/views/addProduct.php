<!DOCTYPE html>
<?=$head?>
<?=$navView?>
    <body>
       
        <div id="addForm">
           	<form action="<?php echo base_url('products/add')?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
					  <label for="nazwa">Nazwa:</label>
					  <input type="text" class="form-control" name='nazwa' id="nazwa" required>
					</div>
					<div class="form-group">
					  <label for="cena">Cena:</label>
					  <input type="text" class="form-control" name="cena" id="cena" pattern="[0-9]+.[0-9]{2}" required>
					</div>
					<div class="form-group">
					  <label for="cena">Ilość:</label>
					  <input type="text" class="form-control" name="ilosc" id="ilosc" maxlength="5" size="5" pattern="[0-9]{1,10}" required>
					</div>
                    <div class="form-group">
  						<label for="kat">Kategoria:</label>
  						<select class="form-control" id="kat" name='kategoria'>
		                <?php 
		                    foreach ($categories as $row){
		                        echo "<option value=$row[categoriesID]>" . $row['categories_name'] . "</option>";
		                    }
		                ?>
                    	</select>
                    </div>
                    <div class="form-group">
					    <label for="exampleInputFile">Zdjęcie</label>
					    <input type="file" name="img" class="form-control-file" id="InputFile" aria-describedby="fileHelp">
					    <small id="fileHelp" class="form-text text-muted">Wybierz zdjęcie produktu</small>
					  </div>

					<?php
		                    foreach ($parameters as $row){
		                        echo '	<div class="form-group">
					  						<label for="">'.$row.'</label>
					  						<input type="text" class="form-control" name='.$row.'>
					  					</div>';
		                    }
		             ?>

            		<div class="form-group"> 
                        <div class="col-sm-offset-10 col-sm-10">
                            <button type="submit" class="btn btn-default">Dodaj</button>
                        </div>
                    </div>
            </form>

            </div>
        </div>
        
    </body>
</html>