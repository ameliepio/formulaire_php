<?php


// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur

if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
echo "il y a un fichier";
        // Testons si le fichier n'est pas trop gros

        if ($_FILES['monfichier']['size'] <= 1000000)
        {

echo "le fichier ne depasse pas 1Mo";
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
echo "l'extension est autorisée";
?><php
<form action="cible_envoi.php" method="post" enctype="multipart/form-data">



                <input type="file" name="monfichier" /><br />

                <input type="submit" value="Envoyer le fichier" />

        </p>

</form>

<?php

                if (in_array($extension_upload, $extensions_autorisees))
                {
echo "extension upload";

                }
                // On peut valider le fichier et le stocker définitivement

                 move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));


                 echo "L'envoi a bien été effectué !";

         }

 }


?>
