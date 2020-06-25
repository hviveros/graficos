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

<div id="graficaLineal"></div>

<script>
	//funcion para convertir un JSON a un array js
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for (var x in parsed) {
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script>

	datosX = crearCadenaLineal('<?php echo $datosX ?>');
	datosY = crearCadenaLineal('<?php echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter',
		marker: {
			color: 'rgb(164, 194, 244)',
			size: 12
		},
		line: {
			color: 'gray',
			width: 0.5
		}
	};
	var layout = {
		title: 'Grafico lineal',
		xaxis: {
			title: 'Fechas'
		},
		yaxis: {
			title: 'Montos'
		}
	};

	var data = [trace1];

	Plotly.newPlot('graficaLineal', data, layout);
</script>