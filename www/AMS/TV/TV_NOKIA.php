
<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="monstyle.css" media="screen" type="text/css">
    </head>
        <body>
        </body>
</html>

<?php
        $ND = $_POST['ND_Client'];
        $BP = $_POST['BP'];
        $QP = $_POST['QP'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/AMS/TV/$ND/$BP/$QP/10/400/0/C400/");
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

