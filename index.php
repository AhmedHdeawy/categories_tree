<?php

/**
 * --------------------------------------------
 * 
 * Author: Ahmed Hdeawy
 */

// Start DB Connection
$mysqli = mysqli_connect('localhost', 'root', 'ahmed12', 'categories_db');

// Check if errros happens
if ($mysqli->connect_errno) {
    echo 'Errr Happens';
}

// Call Function to Print Categories With Childs is tree
getCategoriesTree(0);


function getCategoriesTree($catID)
{
    global $mysqli;

    // SQL Query
    $sql = "SELECT * FROM categories WHERE parent_id = $catID";
    
    // Run Query
    $result = $mysqli->query($sql);
    
    // Loop the result
    while ($row = $result->fetch_assoc()) {
        
        // Print using HTML list                
        echo '<ul>';
            // Print Category title
            echo "<li>{$row['title']} </li>";

            // Recusrsive Function to Fetch this Category childs
            getCategoriesTree($row['id']);

        echo '</ul>';   // End of List
    }
}
