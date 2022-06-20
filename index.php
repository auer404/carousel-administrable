<?php include("php_scripts/toolbox.php"); ?>
    
    <html>

    <head>
        
        <meta charset = "utf-8" />
        
        <title>Carousel</title>
        
        <link rel = "stylesheet" type = "text/css" href = "style.css" />
        
    </head>

    <body>
        
        <div id = "carousel">
            
            <div id = "carousel_roll">
              
              <?php
                
                $rows = selectAllFrom("elements");
                
                foreach($rows as $the_row) {
                    // $rows = le tableau passé en revue
                    // $the_row (alias au choix) = désignation de l'élément courant du tableau
                    echo "<div class = 'carousel_elem'><img src='images/";
                    echo $the_row["image_url"];
                    echo"'></div>";
           
                }
                
                ?>
               
               <!-- RENDRE CE CAROUSEL/SLIDER ADMINISTRABLE :
               
               Les images contenues dans le carousel doivent être administrables : elles doivent toutes avoir été mises en place via une page d'administration.
               
               • Partie admin : la liste des images modifiables (ajouts, suppressions doivent être possibles)
               
               -->
                
            </div>
            
        </div>
        
        <div id = "carousel_navigation">
            <div class = "carousel-nav-btn" id = "carousel-nav-prev">&lt;</div>
            <div class = "carousel-nav-btn" id = "carousel-nav-next">&gt;</div>
        </div>
        
        <script src = "scripts.js"></script>
        
    </body>
            
</html>