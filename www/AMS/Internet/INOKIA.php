<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css">
    </head>
        <body>
        </body>
</html>

<?php
        $ND = $_POST['ND_Client'];
        $BP = $_POST['BP'];
        $QP = $_POST['QP'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/AMS/Internet/$ND/$BP/$QP/10/with%20translation/0/45/C45/");
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_REQUEST);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($curl);
        if ($e=curl_errno($ch)) {
                echo curl_error($ch);
        }
        else{
              echo "<script> confirm('Connexion réussi, vous serez rediriger sur la plateforme de P2CL');</script>";
        }
        curl_close($curl);
?>


