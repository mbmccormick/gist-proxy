<?php

    // extract gist id from url
    $gist = $_GET[id];
    
    // create cache directory
    if (file_exists("gists/") == false)
        mkdir("gists", 0700);
    
    // check if we have need to update our local copy of the gist
    if (file_exists("gists/" . $gist . ".js") == false ||
        (time() - filemtime("gists/" . $gist . ".js")) > 1209600 ||
        $_GET[force] == "true") // if file exists, or file is greater than 14 days old, or force update
    {
        // download javascript file from github
        $ch = curl_init("https://gist.github.com/" . $gist . ".js");
        $fp = fopen("gists/" . $gist . ".js", "wb");
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
    }
    
    // open local copy of gist
    $fp = fopen("gists/" . $gist . ".js", "r");
    
    // parse javascript and render
    if ($fp)
    {
        while (($buff = fgets($fp)) !== false)
        {
            if ($buff == '\n')
                continue;
            
            $line = str_replace("document.write('", "", $buff);
            $line = str_replace("')\n", "\n", $line);
            $line = str_replace("\\n", "", $line);
            $line = str_replace("\\", "", $line);
            
            $line = str_replace("        ", "", $line);
            $line = str_replace("          ", "", $line);
            $line = str_replace("            ", "", $line);
            
            echo $line;
        }
    }
    
    // close connection to github
    fclose($fp);

?>