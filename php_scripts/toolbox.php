<?php

function set_sql_connection() {

    return new PDO('mysql:host=localhost;dbname=Carousel_administrable', 'root', 'root');
    
}



function selectAllFrom($table_name) {
                
   $SQL_connection = set_sql_connection();
   
   $SQL_query = "SELECT * FROM `$table_name`";
   
   $result = $SQL_connection->query($SQL_query);
   
   return $result->fetchAll();
                    
}



/* La fonction upload_image a besoin de deux paramètres :

    - $input_name : l'attribut "name" de l'input dont doit provenir le fichier à traiter (input de type "file")
    
    - $target_directory : le chemin vers le dossier dans lequel le fichier doit aboutir
    
    La fonction upload_image fait deux choses :
    
    - Elle place une copie du fichier sélectionné dans le dossier cible
    
    - Elle doit renvoyer/retourner le nom du fichier uploadé (ou false si l'upload n'a pas marché)
*/

function upload_image($input_name, $target_directory) {
    
    if (!isset($_FILES[$input_name])) { return false; }

    $target_file = $target_directory . basename($_FILES[$input_name]["name"]); // Chemin + nom du fichier (à l'arrivée)

    $uploadOk = 1; // Servira à garder trace d'éventuelles erreurs

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // Extension

    $is_image = getimagesize($_FILES[$input_name]["tmp_name"]);
    
    if($is_image !== false) {
        $uploadOk = 1; // erreur
    } else {
        $uploadOk = 0;
    }
        
    // Limiter le poids
    if ($_FILES[$input_name]["size"] > 500000) { // 500KB
        $uploadOk = 0;
    }
    
    // Filtrer les formats acceptés
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        $uploadOk = 0;
    }
     
    if ($uploadOk == 1) { // Si tout est conforme, on tente d'uploader le fichier
        
        // On remplace le nom final par un timestamp (manière rapide d'éviter les doublons)
        
        $final_file_name = time() . "." . $imageFileType;
        
        $target_file = $target_directory . $final_file_name;
        
        if (move_uploaded_file($_FILES[$input_name]["tmp_name"], $target_file)) {
            
            // En cas de réussite : on retourne le nom du fichier uploadé (et la fonction s'arrête ici)
            
            return basename($final_file_name);
        }
            
    }
  
    // Si l'upload n'a pas fonctionné
    return false;
    
}

?>