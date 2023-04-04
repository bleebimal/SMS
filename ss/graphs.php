<h2 style="text-align: center;">Graphs</h2>
<?php
	$serverid = $_GET['s'];
?>
<p><img src="graph.php?serverid=<?php echo $serverid; ?>=&memory" /></p>
<p><img src="graph.php?serverid=<?php echo $serverid; ?>=&disk" /></p>
