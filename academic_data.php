<?php 


	header("Content-Type: text/html; charset=utf-8",true);
	
	include 'sistema/system.php';

    $link = DBconnec();
    $users = DBread($link, 'usuarios');
function title($num){
	switch ($num) {
		case '0':
			return 'Graduando';
		break;
		case '1':
			return 'Graduado';
		break;
		case '2':
			return 'Especializando';
		break;
		case '3':
			return 'Especialista';
		break;
		case '4':
			return 'Mestrando';
		break;
		case '5':
			return 'Mestre';
		break;
		case '6':
			return 'Doutorando';
		break;
		case '7':
			return 'Doutor';
		break;
	}
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Academic</title>
</head>
<body>
	<table>
		<tr>
			<td>id</td>
			<td>user_id</td>
			<td>ies</td>
			<td>department</td>
			<td>title</td>
			<td>laboratory</td>
			<td>research</td>
			<td>description</td>
			<td>status</td>
			<td>created_at</td>
			<td>updated_at</td>
		</tr>
		<?php 
			for ($i=0; $i < count($users); $i++) { 
		?>
			<tr>
				<td><?php echo ($i+1) ?></td>
				<td><?php echo $users[$i]['id_usuario']; ?></td>
				<td><?php echo utf8_decode($users[$i]['ies']); ?></td>
				<td><?php echo utf8_decode($users[$i]['departamento']); ?></td>
				<td><?php echo title($users[$i]['titulo']) ?></td>
				<td><?php echo utf8_decode($users[$i]['laboratorio']); ?></td>
				<td><?php echo utf8_decode($users[$i]['area_de_pesquisa']); ?></td>
				<td>   </td>
				<td>1</td>
				<td>2019-10-25</td>
				<td>2019-10-25</td>
			</tr>
		<?php
			}
		?>
	</table>
</body>
</html>

<?php DBclose($link); ?>