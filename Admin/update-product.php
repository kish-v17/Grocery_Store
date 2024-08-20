<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <div class="container-fluid px-4">
        <h1 class="mt-4">Update Product</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="product-management.php">Products</a></li>
            <li class="breadcrumb-item active">Update Product</li>
        </ol>

        <div class="card mb-4">
            <div class="card-body">
                <form id="updateProductForm" action="products.php" method="POST" enctype="multipart/form-data" onsubmit="return validateAddProductForm();">
                    <input type="hidden" name="product_id" value="123"> <!-- Static Product ID -->

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="product_name" value="Sample Product">
                                <div id="productNameError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productImage" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="productImage" name="product_image" accept="image/*">
                                <div id="productImageError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="productPrice" name="product_price" step="0.01" value="19.99">
                                <div id="productPriceError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productDiscount" class="form-label">Discount (%)</label>
                                <input type="number" class="form-control" id="productDiscount" name="product_discount" step="0.01" value="10">
                                <div id="productDiscountError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productStock" class="form-label">Stock Quantity</label>
                                <input type="number" class="form-control" id="productStock" name="product_stock" value="50">
                                <div id="productStockError" class="error-message"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select class="form-select" id="productCategory" name="product_category">
                                    <option value="" disabled>Select a category</option>
                                    <option value="Fruits and Vegetables" selected>Fruits and Vegetables</option>
                                    <option value="Dairy and Eggs">Dairy and Eggs</option>
                                    <option value="Bakery">Bakery</option>
                                    <option value="Beverages">Beverages</option>
                                    <option value="Snacks">Snacks</option>
                                    <option value="Personal Care">Personal Care</option>
                                    <option value="Household Supplies">Household Supplies</option>
                                </select>
                                <div id="productCategoryError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="productDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="productDescription" name="product_description" rows="4">This is a sample product description.</textarea>
                                <div id="productDescriptionError" class="error-message"></div>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Update Product</button>
                </form>
            </div>
        </div>
    </div>
<?php include("footer.php"); ?>
