<html>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
        <div id="container">
            <!-- zone de connexion -->
            
            <form method="POST" action="page2.php">
                <h1>Recupération</h1><br><br>
                
                <label><b>Valeur de type chaine de caractére:</b></label>
                <input type="text" placeholder="Valeur de type chaine de caractére" name="caract" required><br><br>

                <label><b>Valeur de type int:</b></label><br>
                <input type="number" placeholder="Valeur de type int" name="int" required>

                <input type="submit" id='submit' value='VALIDER' >

                <?php
            
                
                ?>
            </form>
        </div>
    </body>
</html>