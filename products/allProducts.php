<?php
    session_start();
    ini_set('display_errors', 1);
    error_reporting(-1);             
    
    include('../header.php');
    include(__DIR__ . '/../sideNav.php');
    include('../assets/css/style.php');
    include(__DIR__ . '/../connect.php');

    $urlCategoryId = isset($_GET["categoryId"]) ? $_GET["categoryId"] : NULL;
    $urlFilterName = isset($_GET["filterName"]) ? $_GET["filterName"] : NULL;

    // echo $urlCategoryId;

    $sql = "SELECT p.id as product_id, p.*, pf.*
    FROM (
        SELECT * FROM product
        WHERE category_id = $urlCategoryId
    ) p
    LEFT JOIN (productFilter pf JOIN filter f ON pf.filter_id = f.id) ON p.id = pf.product_id 
    ";

    $productsArray = mysqli_query($conn, $sql);

    ?>
        <section class='all-products-container'>
    <?php

while ($product = mysqli_fetch_assoc($productsArray)) {
    $id = $product['product_id'];
    ?>
    <a href="productDetails.php?id=<?= $id ?>.php">
            <section class="card" style="width: 18rem;">
                <section class="card-body">

                    <?php
                        for($i = 0; $i < $product['rate']; $i++) {
                            ?>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#ffd500}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                            <?php
                        }
                    ?>

                    <p class="product-name"><?php echo $product['name']; ?></p>
                    <p class="product-name">id:<?php echo $product['product_id']; ?></p>

                    <?php if($product['discountedPrice']): ?>
                    <s class="product-price"><?php echo $product['price']; ?> تومان</s>
                    <p class="product-detail-price"><?php echo $product['discountedPrice']; ?>تومان </p>
                    <?php else: ?>
                    <p class="product-price"><?php echo $product['price']; ?> تومان</p>
                    <?php endif; ?>
                </section>
            </section>
        </a>
        <?php
    }
    ?>
    </section>
    <?php
    include('../utilities/side-nav-other-pages-wrapper.php'); // * THIS IS THE END TAG FOR WRAPPER OF SIDE-NAV AND THIS PAGE!!! **
    ?>
<?php 
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// If you put this inside a function and set it to onChange in inputs, eventlistener will fire everytime and multiple eventlistener will be set on each input
const checkboxes = document.querySelectorAll('[name=filter-input]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            console.log(222);
            let url = new URL(window.location.href);
            let oldUrl = window.location.href;
            let paramName = 'filterName';
            let paramValue = this.value;

            if (this.checked) {
                console.log('this.value', this.value)
                url.searchParams.append(paramName, paramValue);
            }  else {
                console.log('unchecked');
                url.searchParams.delete(paramName);
            }

            window.history.replaceState(null, null, url);
            window.location.reload();
        });
});
</script>