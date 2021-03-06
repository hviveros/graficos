<?php 
	require_once "php/conexion.php";

	$conexion = conexion();

	$sql = "SELECT fechaVenta, MontoVenta FROM ventas ORDER BY fechaVenta";
	$result = mysqli_query($conexion, $sql);

	$valoresY = array(); //montos
	$valoresX = array(); //fechas

	while ($ver = mysqli_fetch_row($result)) {
		$valoresX[] = $ver[0];
		$valoresY[] = $ver[1];
	}

	$datosX = json_encode($valoresX);
	$datosY = json_encode($valoresY);
?>

<div id="graficaBarras"></div>

<script>
	//funcion para convertir un JSON a un array js
	function crearCadenaBarras(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for (var x in parsed) {
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script>
	
	datosX = crearCadenaBarras('<?php echo $datosX ?>');
	datosY = crearCadenaBarras('<?php echo $datosY ?>');

	var data = [
	{
		x: datosX,
		y: datosY,
		type: 'bar',
		marker: {color: 'rgb(142,124,195)'}
	}
	];

	var layout = {
		title: 'Grafico de barras',
		barmode: 'stack',
		font: {
			family: 'Raleway, sans-serif'
		},
		xaxis: {
			title: 'Fechas',
			tickangle: -45
		},
		yaxis: {
			title: 'Montos'
		},
		bargap: 0.05
	};

	Plotly.newPlot('graficaBarras', data, layout);
</script>