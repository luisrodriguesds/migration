<?php 


	header("Content-Type: text/html; charset=utf-8",true);
	
	include 'sistema/system.php';

    $link = DBconnec();
    $prof_stan = DBread($link, 'alunos');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Professor_Studant</title>
</head>
<body>
	<table>
		<tr>
			<td>id</td>
			<td>professor_id</td>
			<td>studant_id</td>
			<td>status</td>
			<td>created_at</td>
			<td>updated_at</td>
		</tr>
		<?php 
			for ($i=0; $i < count($prof_stan); $i++) { 
		?>
			<tr>
				<td><?php echo ($i+1); ?></td>
				<td><?php echo $prof_stan[$i]['id_professor']; ?></td>
				<td><?php echo $prof_stan[$i]['id_aluno']; ?></td>
				<td>1</td>
				<td>2019-10-24</td>
				<td>2019-10-24</td>
			</tr>
		<?php
			}
		?>
	</table>
</body>
</html>
 <?php 
 	DBclose($link);
 ?>