<?php include "sidebar.php"; ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Add Category</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="add-category.php" method="POST" onsubmit="return validateAddCategoryForm()">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="category_name">
                                <div id="categoryNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="add-category">Add Category</button>
                </form>
            </div>
        </div>
    </div>

<?php include "footer.php"; ?>
<?php
    if(isset($_POST["add-category"])){
        $category_name = $_POST["category_name"];

        $query ="INSERT INTO `category_details_tbl` (`Category_Name`) VALUES ('$category_name')";

        $sql=mysqli_query($con,$query);

        if($sql){
            ?>
            <script>
                window.location.href='categories.php';
            </script>
            <?php
        }
        else{
            echo mysqli_error($con);  
        }   
        
    }
?>
