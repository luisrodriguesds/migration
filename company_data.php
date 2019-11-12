<?php 
	header("Content-Type: text/html; charset=utf-8",true);
	
	include 'sistema/system.php';

    $link = DBconnec();

    // $cnpjs = "54.490.582/0001-60, 90.003.400/0001-43, 34.621.748/0001-23, 12.255.788/0001-66, 22.341.402/0001-92, 11.890.096/0001-27, 00.348.003/0135-22, 06.250.885/0001-63, 03.342.704/0001-30, 09.261.843/0001-16, 02.980.103/0001-90, 23.731.971/0001-07, 78.023.116/0001-33";
    // $users = DBread($link, 'usuarios_comerciais', "");
    $empresas = DBread($link, 'pessoa_juridica', "ORDER BY id_pj ASC");
    // var_dump($empresas);
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
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Solicitações</title>
</head>
<body>


<table>
	<tr>
		<td>id</td>
		<td>cnpj</td>
		<td>fantasy_name</td>
		<td>company_name</td>
		<td>state_registration</td>
		<td>company_email</td>
		<td>company_phone</td>
		<td>cep</td>
		<td>street</td>
		<td>neighborhood</td>
		<td>number</td>
		<td>company_city</td>
		<td>company_state</td>
		<td>status</td>
		<td>created_at</td>
		<td>updated_at</td>
	</tr>
	<?php 
		for ($i=0; $i < count($empresas); $i++) { 
			$users = DBread($link, 'usuarios_comerciais', "WHERE id = '".$empresas[$i]['id_pj']."'");
			$end = DBread($link, 'enderecos', "WHERE id_endereco = '".$users[0]['id_endereco']."'");
	?>
		<tr>
			<td><?php echo ($i+1); ?></td>
			<td><?php echo mask($empresas[$i]['cnpj'], '##.###.###/####-##'); ?></td>
			<td><?php echo utf8_decode($empresas[$i]['nome_fantasia']); ?></td>
			<td><?php echo utf8_decode($users[0]['nome']); ?></td>
			<td><?php echo ($empresas[$i]['inscricao_estadual']); ?></td>
			<td><?php echo $users[0]['email']; ?></td>
			<td><!-- company_phone --></td>
			<td><?php echo $end[0]['cep'] ?></td>
			<td><?php echo utf8_decode($end[0]['logradouro']); ?></td>
			<td><?php echo utf8_decode($end[0]['bairro']); ?></td>
			<td><?php echo utf8_decode($end[0]['num_local']); ?></td>
			<td><?php echo utf8_decode($end[0]['cidade']); ?></td>
			<td><?php echo utf8_decode($end[0]['estado']); ?></td>
			<td>1</td>
			<td>2019-11-12</td>
			<td>2019-11-12</td>
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