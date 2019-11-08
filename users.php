<?php 
	header("Content-Type: text/html; charset=utf-8",true);
	
	include 'sistema/system.php';

    $link = DBconnec();
    $users = DBread($link, 'usuarios');
    var_dump($users[0]);
function mask($val, $mask){
 $maskared = '';
 $k = 0;
 for($i = 0; $i<=strlen($mask)-1; $i++)
 {
 if($mask[$i] == '#')
 {
 if(isset($val[$k]))
 $maskared .= $val[$k++];
 }
 else
 {
 if(isset($mask[$i]))
 $maskared .= $mask[$i];
 }
 }
 return $maskared;
}

function access_slug($num){
	$num = $num == '6' ? '7' : $num;
	$num = $num == '5' ? '6' : $num;

	switch ($num) {
		case '1':
			return 'aluno';
		break;
		case '2':
			return 'professor';
		break;
		case '3':
			return 'financeiro';
		break;
		case '4':
			return 'tecnico';
		break;
		case '5':
			return 'autonomo';
		break;
		case '6':
			return 'operador';
		break;
		case '7':
			return 'administrador';
		break;
	}
}

function access($num){
	$num = $num == '6' ? '7' : $num;
	$num = $num == '5' ? '6' : $num;
	
	switch ($num) {
		case '1':
			return 'Aluno';
		break;
		case '2':
			return 'Professor';
		break;
		case '3':
			return 'Financeiro';
		break;
		case '4':
			return 'Técnico';
		break;
		case '5':
			return 'Autônomo';
		break;
		case '6':
			return 'Operador';
		break;
		case '7':
			return 'Administrador';
		break;
	}
}
?>
<meta charset="utf-8">
<table>
	<tr>
		<td>id</td>
		<td>name</td>
		<td>email</td>
		<td>password</td>
		<td>access_level</td>
		<td>access_level_slug</td>
		<td>cpf</td>
		<td>birthday</td>
		<td>sex</td>
		<td>other_email</td>
		<td>state</td>
		<td>city</td>
		<td>phone1</td>
		<td>phone2</td>
		<td>confirm</td>
		<td>confirm_email</td>
		<td>limit</td>
		<td>drx_permission</td>
		<td>frx_permission</td>
		<td>photo</td>
		<td>status</td>
		<td>created_at</td>
		<td>updated_at</td>
	</tr>
	<?php 
		for ($i=0; $i < count($users); $i++) { 
	?>
	<tr>
		<td><?php echo $users[$i]['id_usuario'] ?></td>
		<td><?php echo utf8_decode($users[$i]['nome']) ?></td>
		<td><?php echo $users[$i]['email'] ?></td>
		<td>$2a$10$Pxdf7lMQ0KgUIPfNYm3II.ztv8z1a9BIkwxBZe.mhuDzroAi4JA6C</td>
		<td><?php echo access($users[$i]['nivel_acesso']) ?></td>
		<td><?php echo access_slug($users[$i]['nivel_acesso']) ?></td>
		<td><?php echo mask($users[$i]['cpf'], '###.###.###-##'); ?></td>
		<td>1968-01-24</td>
		<td><?php echo $users[$i]['genero'] ?></td>
		<td><?php echo $users[$i]['email_alternativo'] ?></td>
		<td><?php echo strtoupper($users[$i]['estado']) ?></td>
		<td><?php echo utf8_decode($users[$i]['cidade']) ?></td>
		<td><?php echo $users[$i]['telefone'] ?></td>
		<td> </td>
		<td><?php echo $users[$i]['confirmado'] ?></td>
		<td><?php echo $users[$i]['email_confirmado'] ?></td>
		<td><?php echo $users[$i]['limite'] ?></td>
		<td><?php echo $users[$i]['permissao_drx'] ?></td>
		<td><?php echo $users[$i]['permissao_frx'] ?></td>
		<td>avatar-1.png</td>
		<td>1</td>
		<td>2019-10-24 00:00:00</td>
		<td>2019-10-24 00:00:00</td>
	</tr>
	<?php 
		}
	?>
</table>


<?php 
	DBclose($link);
?>