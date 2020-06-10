<div id="container-categories" class = "grid-container">
    <?php
    while($row = $result_set_categories->fetch_assoc()) {
        echo '<div style = " background-image: url('.$row['category_image'] .');" onclick="loadProducts('.$row['category_id'].');">
                <p class = "category" >
                    ' . $row['category_name']. '
                </p>
              </div>';
    }
    ?>
</div>