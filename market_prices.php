<?php
    session_start();
    include 'views/layout/header_v2.php';
?>
    <div class="container top-padding-50">
        <h2 class="text-center mb-4">Market Prices</h2>
        <table class="table table-hover table-bordered">
            <thead class="thead-light">
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">Products</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col">Last Updated</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <!-- <th scope="row">1</th> -->
                    <td>Meal-Meal</td>
                    <td>25Kg</td>
                    <td>K68</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">2</th> -->
                    <td>Dried Kapenta</td>
                    <td>Meda</td>
                    <td>K60</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Beans</td>
                    <td>Meda</td>
                    <td>K45</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Cooking Oil</td>
                    <td>2.5 litres</td>
                    <td>K45</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Sugar</td>
                    <td>2Kg</td>
                    <td>K18</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Eggs</td>
                    <td>Tray</td>
                    <td>K23</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Rice</td>
                    <td>Meda</td>
                    <td>K60</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Hungarian Sausage</td>
                    <td>1</td>
                    <td>K3.5</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Salt</td>
                    <td>1Kg</td>
                    <td>K3</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Tomato</td>
                    <td>Box</td>
                    <td>K80</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Onion</td>
                    <td>Heap</td>
                    <td>K2</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Bread</td>
                    <td>Loaf</td>
                    <td>K7</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Cabbage</td>
                    <td>Medium</td>
                    <td>K7</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Rape</td>
                    <td>Per bundle</td>
                    <td>K1</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Okra</td>
                    <td>Heap</td>
                    <td>K2</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Impwa</td>
                    <td>Heap</td>
                    <td>K2</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Potatoes</td>
                    <td>Pouch</td>
                    <td>K35</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Chicken</td>
                    <td>1</td>
                    <td>K35</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Groundnuts</td>
                    <td>Per pack</td>
                    <td>K10</td>
                    <td>December 17, 2015</td>
                </tr>
                <tr>
                    <!-- <th scope="row">3</th> -->
                    <td>Mice Meat</td>
                    <td>1 Kg</td>
                    <td>K25</td>
                    <td>December 17, 2015</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="top-padding-50"></div>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
    <!-- JS Script to show the number of items in user's cart -->
    <script src="assets/js/num_cart_items.js"></script>
    <script src="assets/js/product_filter.js"></script>

<?php include 'views/layout/footer_v2.php'; ?>