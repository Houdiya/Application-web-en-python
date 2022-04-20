<html>
<body>  
 <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css">
    </head>
    <body>
    </body>
</html>
<?php
        $NumDemande = $_POST['Numero_Demande'];
        $motif = $_POST['Motif'];
        $commentaire = $_POST['Commentaire'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/GAIA/Demande_Tracee/$NumDemande/$motif/$commentaire/");
        curl_setopt($curl, CURLOPT_POST,true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $_REQUEST);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $resp = curl_exec($curl);
        if ($e=curl_errno($ch)) {
                echo curl_error($ch);
        }
        else{
                 echo $resp;
                 echo "<script type='text/javascript'>
                 alert('Cliquer sur OK');
                 </script>";
                if(strpos($resp,"La demande est deja tracee ")!=false or strcmp($resp,"succesfull")!=0){
                        echo "<script>
                        window.location.href='http://gaia/';
                        </script>";
                }
                else{
                        echo "<script>
                        window.location.href='http://gaiatd/';
                        </script>";
                }
        }

        curl_close($curl);
?>

