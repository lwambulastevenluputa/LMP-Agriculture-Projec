<?php
include 'database/connect_pdo.php';
include 'classes/Product.php';
$product = new Product();
?>
<aside class="left-sidebar">
    <h2>Category</h2>
    <div class="panel-group category-products">

        <div style=" overflow-y: auto; overflow-x: hidden;">
            <div class="list-group-item checkbox">
                <?php $query = "SELECT DISTINCT category_name FROM categories ORDER BY category_name";
                $statement = $conn->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) : ?>
                <label>
                    <input type="checkbox" id="category" class="common_selector category product_check"
                        value="<?php echo $row['category_name']; ?>"> <?php echo $row['category_name']; ?>
                </label>
                <br />
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <h2>Brands</h2>
    <div class="panel-group category-products">

        <div style=" overflow-y: auto; overflow-x: hidden;">
            <div class="list-group-item checkbox">
                <?php $query = "SELECT DISTINCT(brand_name) FROM brands";
                $statement = $conn->prepare($query);
                $statement->execute();
                $result = $statement->fetchAll();
                foreach ($result as $row) : ?>
                <label><input type="checkbox" id="brand" class="common_selector brand product_check"
                        value="<?php echo $row['brand_name']; ?>"> <?php echo $row['brand_name']; ?></label><br />
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <h2>Price</h2>
    <div class="panel-group category-products">
        <div class="panel panel-default">
            <div class="panel-heading text-mango-orange">
                <h4 class="panel-title"><a href="">Under $25</a></h4>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="">$25 to $50</a></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="">$100 to $200</a></h4>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="">$200 - Above</a></h4>
            </div>
        </div>
    </div>

    <!-- <div class="brands_products">
        <h2>Brands</h2>
        <div class="brands-name">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><span class="pull-right">(50)</span>Adidas</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Nike</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>D&G</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Gucci</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Lacoste</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Cocolla</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Nestle</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>McDonalds</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>KFC</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Hungry Lion</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Subway</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Nike</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Sony</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>LG</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Apple</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Google</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>BMW</a></li>
                <li><a href="#"><span class="pull-right">(50)</span>Toyota</a></li>
            </ul>
        </div>
    </div> -->
</aside>