<?php
        $ND = $_POST['ND_Client'];
        $PW = $_POST['Password'];
        $curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/SPG/$ND/$PW/");
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_REQUEST);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($curl);
        if ($e=curl_errno($ch)) {
                //echo curl_error($ch);
		header('Location: http://localhost/index.php');
		exit();

        }
        else{
                echo $resp;
        } 
        curl_close($curl);
?>

