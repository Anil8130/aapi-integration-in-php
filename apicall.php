<!DOCTYPE html>
<html>
<head>
	<title>api call</title>
</head>
<body>
	<?php 
	$url="https://gorest.co.in/public-api/users";
	$ch=curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true, // catch output (do NOT print!)
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 120,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_HTTPHEADER => array(
		"cache-control: no-cache",
		"content-type: application/json",
		),
		));  //want header    
	$result=curl_exec($ch);
	$var=json_decode($result);
			// echo '<pre>';
		// print_r($var->data);
		// echo '</pre>';
		$sh=$var->data;
		//print_r($sh);
		?>
		<table>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>email</th>
				<th>gender</th>
				<th>status</th>
				<th>created_at</th>
				<th>updated_at</th>
			</tr>
			<?php
	foreach ($sh as $k => $val) {
	// 	# code...
		?>
		<tr>
			<td><?php echo $k;?></td>
			<td><?php echo $val->name; ?></td>
			<td><?php echo $val->email; ?></td>
			<td><?php echo $val->gender; ?></td>
			<td><?php echo $val->status; ?></td>
			<td><?php echo $val->created_at; ?></td>
			<td><?php echo $val->updated_at; ?></td>
		</tr>
		
		<?php
		 }
		 ?>
</table>
</body>
</html>