<?php include('header2.php'); ?>
    <div class="container sitemap cart-table">
        <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Orders</p>
        <table class="table cart-table text-nowrap">
            <tr class="heading">
                <th>Order ID</th>
                <th>Order status</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>View Orders</th>
            </tr>


            <?php display_orders(); ?>
        </table>

        
    </div>
    
<?php include('footer.php'); ?>

<?php 
    function display_orders(){
        for($i=1;$i<=5;$i++){
            echo '
            <tr>
                <td>123</td>
                <td>11-08-2024</td>
                <td>
                    2
                </td>
                <td>₹100.00</td>
                <td>
                    <a class="primary-btn order-link" href="order-details.php">View Order</a>
                </td>
            </tr>
            ';
        } 
    }
?>