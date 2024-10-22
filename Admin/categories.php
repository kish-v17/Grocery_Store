<?php include("sidebar.php"); 
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $search_query = '';
    if (!empty($search)) {
        $search_query = "having category_id LIKE '%$search%' OR category.category_name LIKE '%$search%'";
    }
    $query = "select category.category_id, category.category_name, count(product.product_id) as 'products_count' from category_details_tbl as category left join  product_details_tbl as product  on product.category_id = category.category_id group by  category.category_id, category.category_name $search_query";
    $result = mysqli_query($con,$query);
    $total_records = mysqli_num_rows($result);
    $records_per_page = 10;
    $total_pages = ceil($total_records / $records_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start_from = ($page - 1) * $records_per_page;
    $query = "select category.category_id, category.category_name, count(product.product_id) as 'products_count' from category_details_tbl as category left join  product_details_tbl as product  on product.category_id = category.category_id group by  category.category_id, category.category_name $search_query LIMIT $start_from, $records_per_page";
    $result = mysqli_query($con,$query);
    
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Categories</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
                <a class="btn btn-primary text-nowrap" href="add-category.php">Add Category</a>
            </div>
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr class="text-nowrap">
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Products Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(mysqli_num_rows($result))
                    {
                        while($category = mysqli_fetch_assoc($result))
                        {
                        ?>
                            <tr>
                                <td><?php echo $category['category_id'] ?></td>
                                <td><?php echo $category['category_name'] ?></td>
                                <td><?php echo $category['products_count'] ?></td>
                                <td>
                                    <div class="d-flex flex-nowrap">
                                        <a class="btn btn-success btn-sm me-1" href="update-category.php?categoryId=<?php echo $category['category_id'] ?>">Edit</a>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $category['category_id'] ?>">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteModal<?php echo $category['category_id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this category? This action cannot be undone.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <a href="delete-category.php?category_id=<?php echo $category['category_id'] ?>" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    }
                    else
                    {
                        echo "<td colspan='5'>There is no category to display!<td>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        
                        <?php 
                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."&search=" . $search . "''>Previous</a></li>";
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=" . $search . "'>" . $i . "</a></li>";
                            }
                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."&search=" . $search . "''>Next</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div>            
        </div>
    </main>
<?php include("footer.php") ?>