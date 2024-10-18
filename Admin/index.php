<?php include("sidebar.php"); ?>
<!-- Amdmin Side Start --><div id="layoutSidenav_content">
<div class="container-fluid px-4">
    <h1 class="mt-4">Admin Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <!-- Statistics Cards Section -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="products.php" class="text-decoration-none">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Products</h5>
                            <h2>1,200</h2>
                        </div>
                        <i class="fas fa-box fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card bg-success text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Orders</h5>
                            <h2>3,450</h2>
                        </div>
                        <i class="fas fa-shopping-cart fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a href="orders.php" class="text-decoration-none">
                <div class="card bg-warning text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Revenue</h5>
                            <h2>₹58,000</h2>
                        </div>
                        <span style="font-size: 2em;">₹</span>
                    </div>
                </div>
            </a>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <a href="users.php" class="text-decoration-none">
                <div class="card bg-danger text-white shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5>Total Users</h5>
                            <h2>1,850</h2>
                        </div>
                        <i class="fas fa-users fa-2x"></i>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <!-- Recent Orders Section -->
     <?php 
     $query = "
         SELECT 
             oh.Order_Id, 
             CONCAT(u.First_Name, ' ', u.Last_Name) AS Customer_Name, 
             oh.Order_Date, 
             SUM(od.Quantity) AS Total_Quantity, 
             SUM(od.Quantity * od.Price) AS Total_Price, 
             oh.Order_Status
         FROM order_header_tbl oh
         JOIN user_details_tbl u ON oh.User_Id = u.User_Id
         JOIN order_details_tbl od ON oh.Order_Id = od.Order_Id
         GROUP BY oh.Order_Id, Customer_Name, oh.Order_Date, oh.Order_Status
         ORDER BY oh.Order_Date DESC limit 10
     ";
     
     $result = mysqli_query($con, $query);
     ?>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4>Recent Orders</h4>
            <a href="orders.php" class="btn btn-secondary">See All Orders</a>
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
    </div>

    <!-- Recent Products Section -->
            <?php
                $query = "
                SELECT 
                    product.Discount, 
                    product.Product_Name, 
                    product.Product_Id, 
                    product.Product_Image, 
                    category.Category_Name, 
                    product.Sale_Price, 
                    product.stock, 
                    COUNT(o.Order_Id) AS Sold_Quantity, 
                    product.is_active 
                FROM category_details_tbl AS category
                RIGHT JOIN product_details_tbl AS product ON category.Category_Id = product.Category_Id
                LEFT JOIN order_details_tbl AS o ON product.Product_Id = o.Product_Id 
                GROUP BY product.Product_Id 
                HAVING product.is_active = 1
                LIMIT 10
            ";
            $result = mysqli_query($con, $query);
            ?>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4>Recent Products</h4>
            <a href="products.php" class="btn btn-secondary">See All Products</a>
        </div>
        <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Sold Quantity</th>
                            <th>Stock</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(mysqli_num_rows($result)){
                                while($product = mysqli_fetch_assoc($result)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <img src="../img/items/products/<?php echo $product['Product_Image']; ?>" alt="<?php echo $product['Product_Name']; ?>" style="width: 50px; height: 50px; object-fit: cover;">
                                            <span class="ms-2"><?php echo $product['Product_Name']; ?></span>
                                        </td>
                                        <td>₹<?php echo $product['Sale_Price']; ?></td>
                                        <td><?php echo $product['Discount']; ?>%</td>
                                        <td><?php echo $product['Sold_Quantity']; ?></td>
                                        <td><?php echo $product['stock']; ?></td>
                                        <td><?php echo $product['Category_Name']; ?></td>
                                        <td>
                                            <div class="d-flex flex-nowrap">
                                                <a class="btn btn-info btn-sm me-1" href="view-product.php?product_id=<?php echo $product['Product_Id']; ?>">View</a>
                                                <a class="btn btn-success btn-sm me-1" href="update-product.php?product_id=<?php echo $product['Product_Id']; ?>">Update</a>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $product['Product_Id']; ?>" data-id="<?php echo $product['Product_Id']; ?>">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="deleteModal<?php echo $product['Product_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this product? This action cannot be undone.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="delete-product.php?product_id=<?php echo $product['Product_Id']; ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                            else{
                                echo "<tr>
                                    <td colspan='7'>There is no products to display!</td>
                                </tr>";
                            }   
                        ?>
                    </tbody>
                </table>
        </div>
        
      
    </div>
</div>

<?php include("footer.php"); ?>
