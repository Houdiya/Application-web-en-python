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
        $ND = $_POST['ND_Client'];
        $Prenom = $_POST['prenom'];
	$Nom = $_POST['nom'];
        $Debit = $_POST['debit'];
        $Bouquet_Orange = $_POST['Bouquet'];
        $TypeOlt = $_POST['Type_Olt'];

	$curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/GAIA/Ajout_Demande/$NumDemande/$ND/$Prenom/$Nom/$Debit/$Bouquet_Orange/$TypeOlt/");
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
                if(strpos($resp,"La demande est deja enrigistree")!=false or strcmp($resp,"succesfull")!=0){
                        echo "<script>
                        window.location.href='http://gaia/';
                        </script>";
                }
                else{
                        echo "<script>
                        window.location.href='http://gaiaad/';
                        </script>";
                }
        }
        curl_close($curl);
?>

