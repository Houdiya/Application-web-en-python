<?php
        $NumSerie = $_POST['Numero_Serie'];
        $TypeOlt = $_POST['Type_Olt'];
        $ND = $_POST['ND_Client'];
        $NRO = $_POST['NRO'];
        $Plaque = $_POST['Plaque'];
        $PBO1 = $_POST['PBO1'];
        $PBO2 = $_POST['PBO2'];
        $NumFibre = $_POST['Num_Fibre'];
        $Slot = $_POST['Slot'];
        $Port = $_POST['Port'];
        $ONT = $_POST['ONT'];
        $Ville = $_POST['Ville'];
        $Sous_Traitant = $_POST['Sous_Traitant'];
        $Tech = $_POST['Technicien'];
        $Commentaire1 = $_POST['Commentaire1'];
        $Commentaire2 = $_POST['Commentaire2'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/SMART_CONFIG/Ajout_Client/$NumSerie/$TypeOlt/$ND/$NRO/$Plaque/$PBO1/$PBO2/$NumFibre/$Slot/$Port/$ONT/$Ville/$Sous_Traitant/$Tech/$Commentaire1/$Commentaire2/");
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

