<?php
    include('../footer.php');
    ini_set('display_errors', 1);
    error_reporting(-1); 
    
    include('../header.php');
    include('../assets/css/style.php');
    include(__DIR__ . '/../connect.php');

    $productId = $_GET['id']; // get id of the product from URL...
    // Used left join so that it won't join tables if value of brand_description_id is null...
    $sql = "SELECT * FROM product
    LEFT JOIN brandDescription ON product.brand_description_id = brandDescription.id
    WHERE product.id = '$productId'";

    $product = mysqli_query($conn, $sql);
    $productData = mysqli_fetch_assoc($product); 
?>

<section class="product-detail-card" style="width: 18rem;">
    <section class="card-body">
        <?php
            if ($productData) {
                ?><p class="product-detail-name"><?php echo $productData['name'];?></p>
                <?php for($i = 0; $i < $productData['rate']; $i++) {
                    ?>
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><style>svg{fill:#ffd500}</style><path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/></svg>
                        <?php
                    }
                    if($productData['amount'] != 0): ?>
                        <p class="product-detail-price"><?php echo $productData['price']; ?>تومان </p>
                    <?php else: ?>
                        <p class="product-price-not-exist">ناموجود | اگه موجود شد به من خبر بده!</p>
                    <?php endif;

                        if($productData['productDescription']): ?>
                            <section class='product-detail-product-description-sec'>
                                <hr>
                                <p>توضیحات</p>
                                <p class="product-detail-product-description"><?php echo $productData['productDescription']; ?></p>
                            </section>
                            <?php endif;
                            if($productData['brand_description_id']): ?>
                                <section>
                                    <hr>
                                    <small class="product-detail-name"><?php echo $productData['name']; ?></small>
                                    <br>
                                    <small class="product-detail-brand-description"><?php echo $productData['description']; ?></small>
                                </section>
                            <?php endif;
            } else {
                echo '<h2>This product does not exist</h2>';
            }
        ?>
                    

    </section>
</section>
    <?php
?>
