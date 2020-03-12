<!DOCTYPE html>
<html>
<?=$head?>
<body>
<?=$navView?>

<div style="max-width: 80em; margin: auto">
	<table class="table table-striped">
		<thead><tr><th>Nazwa użytkownika</th><th>Typ konta</th><th></th></tr></thead>
		<tbody>
		<?php for($i=0;$i<count($users);$i++):?>
			<tr>
				<?php echo "<td>".$users[$i]['email']."</td><td>".$users[$i]['type']."</td><td><a href='".base_url('users/delete/').$users[$i]['ID_user']."' onclick=\"return confirm('Czy chcesz usunąć konto?')\">
				Usuń konto</a> </td></tr>"; ?>
			</tr>
		<?php endfor;?>
		</tbody>
	</table>
</div>
</body>
</html>

