<?php 
include "sidebar.php"; 
// Query to fetch the required data
$sql = "
SELECT 
    oh.Order_Id,
    CONCAT(u.First_Name, ' ', u.Last_Name) AS Customer_Name,
    oh.Order_Date,
    SUM(od.Quantity) AS Total_Quantity,
    SUM(od.Quantity * od.Price) AS Total_Price,
    oh.Order_Status
FROM 
    order_header_tbl oh
JOIN 
    user_details_tbl u ON oh.User_Id = u.User_Id
JOIN 
    order_details_tbl od ON oh.Order_Id = od.Order_Id
GROUP BY 
    oh.Order_Id, Customer_Name, oh.Order_Date, oh.Order_Status
ORDER BY 
    oh.Order_Date DESC
";

$result = mysqli_query($con, $sql);
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Order Management</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
                <a class="btn btn-primary text-nowrap" href="add-order.php">Add Order</a>
            </div>
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Order Date</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Order Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) 
                        {
                            while ($row = mysqli_fetch_assoc($result)) 
                            {
                                ?>
                                <tr>
                                <td><?php echo $row['Order_Id']; ?></td>
                                <td><a href='user-profile.php?username=<?php echo $row["Customer_Name"]; ?>'><?php echo $row["Customer_Name"]; ?></a></td>
                                <td><?php echo $row['Order_Date']; ?></td>
                                <td><?php echo $row['Total_Quantity']; ?></td>
                                <td>₹<?php echo number_format($row['Total_Price'], 2); ?></td>
                                <td><?php echo $row['Order_Status']; ?></td>
                                <td>
                                    <div class='d-flex flex-nowrap'>
                                        <a href='view-order.php?order_id=<?php echo $row["Order_Id"]; ?>' class='btn btn-info btn-sm me-1'>View</a>
                                        <a href='update-order.php?order_id=<?php echo $row["Order_Id"]; ?>' class='btn btn-primary btn-sm me-1'>Edit</a>
                                        <button class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#deleteModal<?php echo $row["Order_Id"]; ?>'>Delete</button>
                                    </div>
                                </td>
                            </tr>
                            
                            <div class="modal fade" id="deleteModal<?php echo $row["Order_Id"]; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this order? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete-order.php?order_id=<?php echo $row["Order_Id"]; ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center'>No orders found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    
<?php include("footer.php"); ?>
