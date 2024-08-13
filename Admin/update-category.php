<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Update Category</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="categoryName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryName" name="category_name" value="Existing Category Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parentCategory" class="form-label">Parent Category</label>
                                <select class="form-select" id="parentCategory" name="parent_category">
                                    <option value="" disabled>Select a parent category</option>
                                    <option value="None">None</option>
                                    <option value="Fruits and Vegetables">Fruits and Vegetables</option>
                                    <option value="Dairy and Eggs">Dairy and Eggs</option>
                                    <option value="Bakery" selected>Bakery</option>
                                    <option value="Beverages">Beverages</option>
                                    <option value="Snacks">Snacks</option>
                                    <option value="Personal Care">Personal Care</option>
                                    <option value="Household Supplies">Household Supplies</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>
