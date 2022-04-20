<?php
        $NumSerie = $_POST['Num_Serie'];
        $ND = $_POST['ND_Client'];
        $SousType = $_POST['Sous_Type'];
        $TypeOlt = $_POST['Type_Olt'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/SMART_CONFIG/Ajouter_Modem/$NumSerie/$ND/$SousType/$TypeOlt/");
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

