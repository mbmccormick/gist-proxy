<?php

	$fname = $_GET[id];
        
	$ch = curl_init($_POST[RecordingUrl]);
	$fp = fopen(ServerRootPath . "/download/conference/" . $fname . ".mp3", 'wb');
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);

?>