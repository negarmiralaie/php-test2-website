<?php
    ini_set('display_errors', 1);
    error_reporting(-1);             
    
    include(__DIR__ . '/connect.php');

    $sql = "SELECT category, subCategory, filterName FROM filter;";
    $result = mysqli_query($conn, $sql);

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        // create an array of array: [category][subCategory]: filterName
        if (!isset($data[$row['category']])) {
            $data[$row['category']] = array();
        }
        if (!isset($data[$row['category']][$row['subCategory']])) {
            $data[$row['category']][$row['subCategory']] = array();
        }
        $data[$row['category']][$row['subCategory']][] = $row['filterName'];
    }

    // **********************************************************

    $urlCategoryId = isset($_GET["categoryId"]) ? $_GET["categoryId"] : null;

    // ******************************* CHANGE ABOVE AND BELOW CODE TO FILTER ALL PRODUCTS IN A PAGE

    $categorySql = "SELECT categoryName FROM category WHERE id = $urlCategoryId"; 
    $result2 = mysqli_query($conn, $categorySql);
    
    if ($result2->num_rows > 0) {
        $row = $result2->fetch_assoc();
        $urlCategoryName = $row["categoryName"];
    } else {
        echo "No results";
    }

    echo "<section class='side-nav-products-wrapper'>"; // ** END TAG FOR THIS WRAPPER, WILL BE AT THE END OF EACH PAGE
    echo "<form action='' method='POST' class='side-nav-form'>";
    foreach ($data as $category => $subCategories) {
        if ($urlCategoryName == $category) {
            echo "<h2>$category</h2>";
            
            echo "<section>";
            foreach ($subCategories as $subCategory => $filterNames) {
                echo "<b>$subCategory</b>";
                foreach ($filterNames as $filterName) {
                    echo '<section class="filter-names-wrapper">';
                    echo '<input class="myCheck" type="checkbox" name="filter-input" value="' . $filterName . '" id="' . $filterName . '"/>';
                    echo "<label for=$filterName>$filterName</label>";
                    echo '</section>';
                }
            }
            echo "</section>";
        }
    }
    echo "</form>";

    
    ?>
<?php
?>