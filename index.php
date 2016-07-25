<?php
	$conn=mysqli_connect('localhost', 'root', '', 'bd_prueba_final_imaginate', '3306');
	
	$sql='select * from tabla_palabras';
	$ejec=mysqli_query($conn,$sql) or die("Fallo al ejecutar la consulta en la línea " . __LINE__ . ": " . mysqli_error($conn));
	$js_palabras='';
	$cont=0;
	$id_palabra_origen=NULL;
	while($reg=mysqli_fetch_array($ejec)){
		$js_palabras.=$cont++==0 ? '"'.$reg['palabra'].'"' : ',"'.$reg['palabra'].'"';

		if(@$_POST['palabra-origen']<>'' and $id_palabra_origen==NULL){
			if($_POST['palabra-origen']==$reg['palabra'])
				$id_palabra_origen=$reg['id_palabra'];
		}
	}
	@mysqli_free_result($ejec);
	
	if(@$_POST['palabra-origen']<>''){
		$sql_intervalo='select min(id_palabra) min_interval, max(id_palabra) max_interval from tabla_palabras';
		$ejec=mysqli_query($conn,$sql_intervalo) or die("Fallo al ejecutar la consulta en la línea " . __LINE__ . ": " . mysqli_error($conn));
		$reg=mysqli_fetch_array($ejec);
		@mysqli_free_result($ejec);
		
		do{
			$random=rand($reg['min_interval'],$reg['max_interval']);
		}while($random==$id_palabra_origen);
		
		$sql_intervalo='insert into tabla_palabras_transformadas(palabra_origen,palabra_transformada) values('.$id_palabra_origen.','.$random.')';
		mysqli_query($conn,$sql_intervalo) or die("Fallo al ejecutar la consulta en la línea " . __LINE__ . ": " . mysqli_error($conn));
		
		mysqli_close($conn);
		header('Location: ./');
		
		exit;
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<?php header('Content-Type: text/html; charset=iso-8859-1');?>
		<title>Prueba Final Imaginate</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="css/bootstrap.css" rel=stylesheet>
		<link href="css/estilos.css" rel=stylesheet>
	</head>
	<body>
	
		<div class="container">
			<div>
				<h3 class="text-center">Prueba de <strong>Transformar</strong> Palabras</h3>
			</div>
			<form id="form-palabra" method="POST">
				<div class="col-md-10">
					<input required placeholder="Ingresar Palabra" type="text" class="form-control text-center" name="palabra-origen" id="palabra-origen">
				</div>
				<div class="col-md-2">
					<input type="submit" class="form-control btn btn-info" value="Transformar">
				</div>
			</form>
			<div class="clearfix"></div>
			<div class="container-fluid">
				<div id="msj-error"></div>
			</div>
			
			<?php
				$sql='
					select
					
					tabla_palabra_origen.palabra as palabra_origen,
					tabla_palabra_transformada.palabra as palabra_transformada
					
					from tabla_palabras_transformadas
						inner join tabla_palabras as tabla_palabra_origen on
							tabla_palabra_origen.id_palabra=tabla_palabras_transformadas.palabra_origen
							
						inner join tabla_palabras as tabla_palabra_transformada on
							tabla_palabra_transformada.id_palabra=tabla_palabras_transformadas.palabra_transformada
					
					order by tabla_palabras_transformadas.id_palabra_transformada desc
				';
				$ejec=mysqli_query($conn,$sql) or die("Fallo al ejecutar la consulta en la línea " . __LINE__ . ": " . mysqli_error($conn));
				if(mysqli_num_rows($ejec)>0){
			?>
				<div class="clearfix"></div>
				
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Palabra Origen</th><th>Palabra Transformada</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$cont=0;
									while($reg=mysqli_fetch_array($ejec)){
								?>
										<tr <?php echo $cont++==0 ? 'class="success"' : ''; ?>>
											<td><?php echo $reg['palabra_origen']; ?></td>
											<td><?php echo $reg['palabra_transformada']; ?></td>
										</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-3"></div>
			<?php
				}else{
			?>
				<div class="clearfix"></div>
				<div class="container-fluid">
					<div class="alert alert-info alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>
							Aun no existen palabras transformadas
						</strong>
					</div>
				</div>
			<?php
				}
			?>
		</div>
		
		<script language="javascript" src="js/jquery.js"></script>
		<script language="javascript" src="js/bootstrap.js"></script>
		<script language="javascript" src="js/acciones.js"></script>
		<script language="javascript">
			var palabras=new Array(<?php echo $js_palabras; ?>);
		</script>
		<?php
			mysqli_close($conn);
		?>
	</body>
</html>