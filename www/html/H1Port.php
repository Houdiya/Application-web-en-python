<?php
        $NumSerie = $_POST['Numero_Serie'];
        $ND = $_POST['ND_Client'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/U2000/PORT/$NumSerie/$ND/");
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_REQUEST);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($curl);
        if ($e=curl_errno($ch)) {
                echo curl_error($ch);
        }
        else{
                echo $resp;
        } 
        curl_close($curl);
?>


