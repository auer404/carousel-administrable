<?php include("../php_scripts/toolbox.php"); ?>

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>Modifier les contenus du carousel</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="admin_style.css">

</head>

<body>
	
   <?php
                
       $rows = selectAllFrom("elements");
       
       foreach($rows as $the_row) {
           // $rows = le tableau passé en revue
           // $the_row (alias au choix) = désignation de l'élément courant du tableau
           echo "<div class = 'admin_carousel_elem'><img src='../images/";
           echo $the_row["image_url"];
           echo"'>";
           echo "</div>";
       
       }
                
    ?>
    
    <form method="post" action="admin_php_scripts/add_image.php" enctype="multipart/form-data">
       <!-- enctype="multipart/form-data" : IMPORTANT POUR GÉRER FICHIERS -->
        
        <h3>Cliquez ou glissez une image ici</h3>
        <!-- 1) Glisser un fichier sur un input type=file revient à choisir ce fichier dans la boîte de sélection s'ouvrant au clic -->
        
        <!-- 2) le formulaire s'auto-valide lorsqu'on choisit un fichier -->
        <input type="file" name="new_image_input" onchange="this.parentElement.submit()">
        
        <!-- 3) Ce submit n'est plus utilisé donc /!\ un test doit sauter dans add_image.php -->
        <input type="submit" value="Ajouter" name="new_image_validation">
        
        <!-- 4) En CSS on stylise le form et le input type=file -->
        
    </form>
    
</body>

</html>