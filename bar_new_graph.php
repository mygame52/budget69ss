<?
$labels = array();
$data = array();

for ($i=1; $i<=$arr_total; $i++) {
	array_push($labels, $exp[$i][0]);
	array_push($data, $exp[$i][1]);
}

print_r($exp);
// print_r($labels);
// print_r($data);

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<canvas id="myChart" width="200" height="200"></canvas>

<script>
	$(document).ready(function() {
		showGraph();
	})

	function showGraph() {

		var labels = <?php echo json_encode($labels) ?>;
		var data = <?php echo json_encode($data) ?>;

		// console.log('labels', labels);
		// console.log('data', data);

		var ctx = document.getElementById("myChart");
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: labels,
				datasets: [{
					label: 'การใช้งบประมาณ',
					data: data,
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255,99,132,1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true
						}
					}]
				}
			}
		});
	}
</script>