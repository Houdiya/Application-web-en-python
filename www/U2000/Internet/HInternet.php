<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css">
    </head>
    <body>
<html>
<?php
        $ND = $_POST['ND_Client'];
        $UpTP = $_POST['Up'];
        $DwTP = $_POST['Dw'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/U2000/Internet/$ND/$UpTP/$DwTP/GEM5/45/45/0/multi/");
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

