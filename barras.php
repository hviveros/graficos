<?php 
	require_once "php/conexion.php";
?>

<div id="graficaBarras"></div>

<script>
	var data = [
	{
		x: ['giraffes', 'orangutans', 'monkeys'],
		y: [20, 14, 23],
		type: 'bar'
	}
	];

	Plotly.newPlot('graficaBarras', data);
</script>