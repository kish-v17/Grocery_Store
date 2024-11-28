<?php include('header.php'); 
    $query = "select oh.Order_Id, oh.User_Id, oh.Order_Status, DATE(oh.Order_Date) AS Order_Date, sum(od.Quantity) as 'Quantity', oh.Total from order_header_tbl oh left join order_details_tbl od on oh.Order_Id = od.Order_Id group by oh.Order_Id, oh.Order_Status, oh.Order_Date, oh.Total, oh.User_Id having oh.User_Id =". $_SESSION["user_id"];
    $result = mysqli_query($con, $query);
?>
<div class="container sitemap cart-table">
    <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Orders</p>
    <table class="table cart-table text-nowrap">
        <tr class="heading">
            <th>Order ID</th>
            <th>Order status</th>
            <th>Order date</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>View Orders</th>
        </tr>
        <?php while($order = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?php echo $order["Order_Id"]; ?></td>
            <td><?php echo $order["Order_Status"]; ?></td>
            <td><?php echo $order["Order_Date"]; ?></td>
            <td><?php echo $order["Quantity"]; ?></td>
            <td>₹<?php echo number_format($order["Total"],2); ?></td>
            <td>
                <a class="primary-btn order-link" href="order-details.php?order_id=<?php echo $order["Order_Id"]; ?>">View Order</a>
            </td>
        </tr>
        <?php }?>
    </table>


</div>

<?php include('footer.php'); ?>
