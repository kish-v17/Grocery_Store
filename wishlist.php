<?php include('header.php'); ?>
<div class="container sitemap cart-table">
    <p class="my-5"><a href="index.php" class="text-decoration-none dim link ">Home /</a> Wishlist</p>
    <table class="table cart-table text-nowrap">
        <tr class="heading">
            <th>Product</th>
            <th>Price</th>
            <th>Subtotal</th>
            <th>Actions</th>
        </tr>

        <tr>
            <td>
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </td>
            <td>₹100.00</td>
            <td>₹300.00</td>
            <td>
                <a class="primary-btn update-btn">Add to cart</a>
                <a class="primary-btn delete-btn">Delete</a>
            </td>
        </tr>
        <tr>
            <td>
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </td>
            <td>₹100.00</td>
            <td>₹300.00</td>
            <td>
                <a class="primary-btn update-btn">Add to cart</a>
                <a class="primary-btn delete-btn">Delete</a>
            </td>
        </tr>
    </table>
</div>
<div class="container mb-5">
    <div class="d-flex justify-content-end align-items-center cart-page mb-5">
        <button class="btn-msg">Move all to cart</button>
    </div>
</div>
<?php include('footer.php'); ?>