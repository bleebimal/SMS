<?php
require_once "includes/config.php";
require_once "includes/database.php";
#require_once "includes/rrd.php";

$result = json_decode(file_get_contents("php://input"));

$query = $db->prepare("SELECT id, rrdstep FROM servers WHERE id = ? AND passkey = ?");
$query->execute(array($result->uid, sha1($result->key)));

if($query->rowCount() == 0) {
	die("unauthorized");
}

$info = $query->fetch(PDO::FETCH_OBJ);

$fields = array(
	'time',
	'uptime',
	'status',
	'memtotal', 'memused', 'memfree', 'membuffers',
	'disktotal', 'diskused', 'diskfree',
	'load1', 'load5', 'load15',
	'interfaces',
	'processes'
);

$fieldarr = array();
foreach($fields as $field) {
	$fieldarr[] = $field . ' = ?';
}

# Create record in current stats if not already exists.
$dbq = $db->prepare('INSERT IGNORE INTO stats_current (`serverid`) VALUES (?)');
$dbq->execute(array(intval($result->uid)));

# Update current stats.
$dbq = $db->prepare('UPDATE stats_current SET ' . implode(', ', $fieldarr) . ' WHERE serverid = ?');

$data = array(
	//Time
	time(),
	//Uptime
	$result->uplo->uptime,
	//Status
	true,
	//Memory
	$result->ram->total, 
	$result->ram->used, 
	$result->ram->free, 
	$result->ram->bufcac, 
	//Disk
	$result->disk->total->total, 
	$result->disk->total->used, 
	$result->disk->total->avail,
	//Loads
	$result->uplo->load1, 
	$result->uplo->load5, 
	$result->uplo->load15,
	//Interfaces
	isset($result->interfaces) ? json_encode($result->interfaces) : '',
	//Processes
	json_encode($result->ps),
	//Server ID
	intval($result->uid)
);

if(!$dbq->execute($data)) {
	error_log(print_r($dbq->errorInfo(), true));
}


# Insert into stats history.
$qry = sprintf('INSERT INTO stats_history (%s, serverid) VALUES (%s ?)',
		implode(', ', $fields), str_repeat('?, ', count($fields)));

$dbq = $db->prepare($qry);

if(!$dbq->execute($data)) {
	error_log(print_r($dbq->errorInfo(), true));
}


// Update the rrd databases

#$rrd = new StatusRRD($result->uid, $info->rrdstep);
#$rrd->update($result);


// Check thrsholds.

$threshold_crit = 80;
$threshold_warn = 60;

$thresholds	 = array('RAM' 	=> intval((($result->ram->used - $result->ram->bufcac) / $result->ram->total) * 100)
					,'Disk'	=> intval(($result->disk->total->used / $result->disk->total->total) * 100)
					);

$sub = '';

// Check CRITICAL level.
foreach ($thresholds as $threshold) {
	if ($threshold >= $threshold_crit) {
		$sub = '[CRITICAL]';
		break;
	}
}

// Check WARNING level.
if (!$sub) {
	foreach ($thresholds as $threshold) {
		if ($threshold >= $threshold_warn) {
			$sub = '[WARNING]';
			break;
		}
	}
}

if ($sub) {
	
	$uid = intval($result->uid);
	
	$default_name = 'Bimal Gaire';
	$default_email = 'bimal.blee@gmail.com';
	$default_server = "Unknown Server (ID: $uid)";
	
	$qry = "SELECT id, name, provider FROM servers WHERE id = ?";
	
	$dbq = $db->prepare($qry);
	$dbq->execute(array($uid));
	
	if ($dbq->rowCount() != 0) {
		$srv = $dbq->fetch(PDO::FETCH_OBJ);
		$server = $srv->name;
		$qry = "SELECT id, name, email FROM providers WHERE id = ?";
		$dbq = $db->prepare($qry);
		$dbq->execute(array($srv->provider));
		if ($dbq->rowCount() != 0) {
			$prv = $dbq->fetch(PDO::FETCH_OBJ);
			$name = $prv->name;
			$email = $prv->email;
		}
		else {
			$name = $default_name;
			$email = $default_email;
		}
	}
	else {
		$name = $default_name;
		$email = $default_email;
		$server = $default_server;
	}
	
	$sub .= " $server has high resource consumption";
	
	$msg = "Dear $name,\n\n";
	$msg .= "It seems one of your servers is consuming a lot of resources.\n\n";
	$msg .= "Server: $server.\n";
	foreach ($thresholds as $k => $v)
		$msg .= "\t$k Usage: ${v}%.\n";
	$msg .= "\nThank You.\n";
	

	
	// Pear Mail Library.
	require_once "Mail.php";
	
	$headers = array('From'		=> 'servermonitoring1234@gmail.com'
	    			,'To'		=> $email
	    			,'Subject'	=> $sub
					);
	
	$smtp = Mail::factory('smtp', array(
	        'host' => 'smtp.gmail.com',
	        'port' => '587',
	        'auth' => true,
	        'username' => 'servermonitoring1234@gmail.com',
	        'password' => 'bimal123'
	    ));
	
	// Uncomment following line to enable send.
	$mail = $smtp->send($email, $headers, $msg); 
	
	
	 if (PEAR::isError($mail))
	    echo($mail->getMessage());
	else
	    echo('Message successfully sent.');
	// 

}

?>
