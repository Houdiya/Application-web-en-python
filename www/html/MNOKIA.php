<?php
        $ND = $_POST['ND_Client'];
        $BP = $_POST['BP'];
        $QP = $_POST['QP'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/AMS/Migration/$ND/$BP/$QP/");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
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

