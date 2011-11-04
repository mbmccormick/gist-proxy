<?php

    // extract gist id from url
	$gist = $_GET[id];
    
    // download javascript file from github
	$fp = fopen("https://gist.github.com/" . $gist . ".js", "r");
	
    // parse javascript and render
    if ($fp)
    {
        while (($buff = fgets($fp)) !== false)
        {
            if ($buff == '\n')
                continue;
            
            $line = str_replace("document.write('", "", $buff);
            $line = str_replace("')\n", "\n", $line);
            
            echo $line;
        }
    }
    
    // close connection to github
    fclose($fp);

?>