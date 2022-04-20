
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
        $Login = $_POST['Login'];
        $Password = $_POST['Password'];
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "http://localhost:5000/api/v1.0/AUTH/$Login/$Password/");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
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
		if(strpos($resp,"SMART_CONFIG")!=false){
			echo "<script>
                        window.location.href='http://smart/';
               		</script>";
		}
                if(strpos($resp,"la plateforme d'accueil")!=false){
                        echo "<script>
                        window.location.href='http://site/';
                        </script>";
		}
		if(strpos($resp,"les applications")!=false){
                        echo "<script>
                        window.location.href='http://site/';
                        </script>";
                }
		if(strpos($resp,"Administrateur")!=false){
                        echo "<script>
                        window.location.href='http://gaiaad/';
                        </script>";
                }
                if(strpos($resp,"login ou mot de passe incorrect")!=false){
                        echo "<script>
                        window.location.href='http://user/';
                        </script>";
                }

		echo "OK";
	}
        curl_close($curl);
	
?>

