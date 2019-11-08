<?php 

	header("Content-Type: text/html; charset=utf-8",true);
	
	include 'sistema/system.php';

    $link = DBconnec();
    $solicitations = DBread($link, 'solicitacoes as s, usuarios as u, solicitacoes_academicas as sa', "WHERE s.id_solicitacao = sa.id_solicitacao AND u.id_usuario = sa.id_usuario ORDER BY s.id_solicitacao ASC", 's.*, u.id_usuario');
    // var_dump($solicitations[0]);

function shape($num){
	switch ($num) {
		case '1':
			return 'Pó';
		break;
		case '2':
			return 'Filme';
		break;
		case '3':
			return 'Pastilha';
		break;
		case '4':
			return 'Eletródo';
		break;
		case '5':
			return 'Outro';
		break;
	}
}

function _convert($content) {
    if(!mb_check_encoding($content, 'UTF-8')
        OR !($content === mb_convert_encoding(mb_convert_encoding($content, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32'))) {

        $content = mb_convert_encoding($content, 'UTF-8');

        if (mb_check_encoding($content, 'UTF-8')) {
            // log('Converted to UTF-8');
        } else {
            // log('Could not converted to UTF-8');
        }
    }
    return $content;
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
		<td>user_id</td>
		<td>equipment_id</td>
		<td>gap_id</td>
		<td>name</td>
		<td>method</td>
		<td>settings</td>
		<td>status</td>
		<td>composition</td>
		<td>shape</td>
		<td>flammable</td>
		<td>radioactive</td>
		<td>toxic</td>
		<td>corrosive</td>
		<td>hygroscopic</td>
		<td>note</td>
		<td>received_date</td>
		<td>solicitation_date</td>
		<td>conclusion_date</td>
		<td>analyze_time</td>
		<td>download</td>
		<td>created_at</td>
		<td>updated_at</td>
	</tr>

	<?php 
		for ($i=0; $i < count($solicitations); $i++) { 
            $method = json_decode($solicitations[$i]['configuracao'], true);
			
	?>
		<tr>
			<td><?php echo $solicitations[$i]['id_solicitacao'] ?></td>
			<td><?php echo $solicitations[$i]['id_usuario'] ?></td>
			<td><?php echo $solicitations[$i]['id_equipamento'] ?></td>
			<td><?php echo $solicitations[$i]['id_fenda'] ?></td>
			<td><?php echo $solicitations[$i]['identificacao_da_amostra'] ?></td>
			<td><?php echo strtoupper($method['tecnica']) ?></td>
			<td><?php echo $solicitations[$i]['configuracao'] ?></td>
			<td><?php echo $solicitations[$i]['status'] ?></td>
			<td><?php 
				echo utf8_decode($solicitations[$i]['composicao']);

			?></td>
			<td><?php echo shape($solicitations[$i]['tipo']) ?></td>
			<td><?php echo ($solicitations[$i]['inflamavel'] == '0' ? 'Não' : 'Sim') ?></td>
			<td><?php echo ($solicitations[$i]['radioativo'] == '0' ? 'Não' : 'Sim') ?></td>
			<td><?php echo ($solicitations[$i]['toxico'] == '0' ? 'Não' : 'Sim') ?></td>
			<td><?php echo ($solicitations[$i]['corrosivo'] == '0' ? 'Não' : 'Sim') ?></td>
			<td><?php echo ($solicitations[$i]['higroscopico'] == '0' ? 'Não' : 'Sim') ?></td>
			<td><?php echo utf8_decode($solicitations[$i]['observacoes']) ?></td>
			<td><?php echo date('Y-m-d H:i:s', strtotime($solicitations[$i]['data_recebimento'])) ?></td>
			<td><?php echo date('Y-m-d H:i:s', strtotime($solicitations[$i]['data_solicitacao'])) ?></td>
			<td><?php echo date('Y-m-d H:i:s', strtotime($solicitations[$i]['data_conclusao'])) ?></td>
			<td><?php echo date('Y-m-d H:i:s', strtotime($solicitations[$i]['tempo_analise'])) ?></td>
			<td>
				<?php 
					$download = DBread($link, 'resultados', "WHERE id_solicitacao = '".$solicitations[$i]['id_solicitacao']."'");
					echo str_replace('resultados/', '', $download[0]['arquivo']);
				?>
			</td>
			<td><?php echo date('Y-m-d H:i:s', strtotime($solicitations[$i]['data_solicitacao'])) ?></td>
			<td><?php echo date('Y-m-d H:i:s', strtotime($solicitations[$i]['data_solicitacao'])) ?></td>
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