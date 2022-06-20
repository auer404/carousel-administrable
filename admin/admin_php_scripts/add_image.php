<?php

include("../../php_scripts/toolbox.php");

if (!isset($_POST["new_image_validation"])) {
    // vérifier si l'info provient bien du bon formulaire (via le nom du submit)
    header("location:../");
    exit();
}

$image_filename = upload_image("new_image_input" , "../../images/");

// Phase intermédiaire avant gestion requête + redirection finale :
// On teste si l'upload fonctionne.
//echo "Image uploadée : " . $image_filename;

$DB = set_sql_connection();

$SQL_query = "INSERT INTO `elements` (`image_url`) VALUES (?)";

$prep = $DB->prepare($SQL_query);

$prep->execute([$image_filename]);

header("location:../");

?>