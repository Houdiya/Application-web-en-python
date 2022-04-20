<?php
        $NumDemande = $_POST['Numero_Demande'];
        $ND = $_POST['ND_Client'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/GAIA/Provisoning/$NumDemande/$ND/");
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_REQUEST);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($curl);
        if ($e=curl_errno($ch)) {
                echo curl_error($ch);
        }
        else{
                echo $resp;
        	<meta http-equiv=Location content=https://www.youtube.com/watch?v=sD496tiPvNg/>
        } 
        curl_close($curl);
?>

