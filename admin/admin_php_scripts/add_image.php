<?php

include("../../php_scripts/toolbox.php");

//if (!isset($_POST["new_image_validation"])) {
//    // vérifier si l'info provient bien du bon formulaire (via le nom du submit)
//    header("location:../");
//    exit();
//}
// Test ci-dessus plus compatible avec fonctionnalité de glissage d'image - pas validé par JS lors de input.onchange(){ form.submit() }

$image_filename = upload_image("new_image_input" , "../../images/");

// Mais le résultat de upload_image peut aider à rester sécurisé :
if (!$image_filename) {header("location:../"); exit();}
// (La fonction n'accepte que les jpg , png et gif)

//echo "Image uploadée : " . $image_filename;

$DB = set_sql_connection();

$SQL_query = "INSERT INTO `elements` (`image_url`) VALUES (?)";

$prep = $DB->prepare($SQL_query);

$prep->execute([$image_filename]);

header("location:../");

?>