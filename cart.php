<?php include('header.php'); ?>
    <div class="container sitemap cart-table">
        <p class="my-5"><a href="index.php" class="text-decoration-none dim link">Home /</a> Cart</p>
        <!-- table start -->
        <div class="row font-bold">
            <div class="col-4">
                Product
            </div>
            <div class="col-3 text-center">Price</div>
            <div class="col-2 ">
                Quantity
            </div>
            <div class="col-3 text-center">Subtotal</div>
        </div>

        <div class="row">
            <div class="col-4">
                <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate</div>
            </div>
            <div class="col-3 text-center">₹100.00</div>
            <div class="col-2 ">
                <div class="d-flex qty-mod">
                    <button class="number-button qty-minus">-</button>
                    <input type="number" class="qty" name="qty" id="" value="3">
                    <button class="number-button qty-plus">+</button>
                </div>
            </div>
            <div class="col-3 text-center">₹300.00</div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="img/items/chocolate2.webp" alt="Chocolate image" class="image-item d-inline-block">
                <div class="d-inline-block">Chocolate 2</div>
            </div>
            <div class="col-3 text-center">₹200.00</div>
            <div class="col-2 ">
                <div class="d-flex qty-mod">
                    <button class="number-button qty-minus">-</button>
                    <input type="number" name="" id="" value="3">
                    <button class="number-button qty-plus">+</button>
                </div>
            </div>
            <div class="col-3 text-center">₹600.00</div>
        </div>
        <!-- table end -->
    </div>
    <div class="container mb-5">
        <div class="d-flex justify-content-between align-items-center cart-page mb-5">
            <a class="btn-msg" href="shop.php">Return to shop</a>
            <button class="btn-msg">Update Cart</button>
        </div>
        <div class="row justify-content-end">
            <div class="col-md-5">
                <div class="bold-border p-4">
                    <h5 class="mb-3">Cart Total</h5>
                    <div class="d-flex align-items-center p-2">
                        <div>Subtotal:</div>
                        <div class="price">₹200.00</div>
                    </div>
                    <div class="my-2 line"></div>
                    <div class="d-flex align-items-center p-2">
                        <div>Shipping:</div>
                        <div class="price">₹100.00</div>
                    </div>
                    <div class="my-2 line"></div>
                    <div class="d-flex align-items-center p-2">
                        <div>Total:</div>
                        <div class="price">₹300.00</div>
                    </div>
                    <div class="d-flex justify-content-center w-100 mt-3">
                        <a class="btn-msg checkout-link" href="checkout.php">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>


<!-- 
        <table class="table cart-table">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            
            <tr>
                <td>
                    <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                    <div class="d-inline-block">Chocolate</div>
                </td>
                <td>₹100.00</td>
                <td>
                    <div class="d-flex">
                        <button class="number-button qty-minus">-</button>
                        <input type="number" name="" id="" value="3">
                        <button class="number-button qty-plus">+</button>
                    </div>
                </td>
                <td>₹300.00</td>
            </tr>
            <tr>
                <td>
                    <img src="img/items/chocolate.webp" alt="Chocolate image" class="image-item d-inline-block">
                    <div class="d-inline-block">Chocolate</div>
                </td>
                <td>₹100.00</td>
                <td>
                    <div class="d-flex">
                        <button class="number-button qty-minus">-</button>
                        <input type="number" name="" id="" value="3">
                        <button class="number-button qty-plus">+</button>
                    </div>
                </td>
                <td>₹300.00</td>
            </tr>
        </table>



-->

<!-- css -->
 <!-- 
.cart-table>:not(caption)>*>*{/*to remove bottom border*/
    border-bottom-width: 0px !important;
    /* padding:20px; */
}
.cart-table tr{
    box-shadow: 0 2px 4px 0px rgba(0, 0, 0, 0.075);
    border-radius: 5px;
    vertical-align: middle;

}
.cart-table>tbody>tr>th{
    padding:20px;
    font-weight: normal;
    color:black;
    vertical-align: middle;
}

.cart-table .image-item{
    width:75px;
    padding:10px;
}
.cart-table>tbody>tr>td:not(:first-child),.cart-table>tbody>tr>th:not(:first-child){
    text-align: center;
}
.cart-table .d-flex input[type="number"]{
    width:30px;
    text-align: center;
    border-width:1px 0px;
    border-color:var(--dim);
    height:30px;
}
.cart-table .d-flex button{
    align-self: stretch;
    width:25px;
    background-color: white;
    border:1px solid var(--dim);
 
}
.cart-table td:nth-child(3) {
    height:inherit;
    display: flex; 
    justify-content: center;
    align-items: center;
    height: 91px;
}
.cart-table .qty-plus{
    border-radius: 0px 3px 3px 0px;
}
.cart-table .qty-minus{
    border-radius: 3px 0px 0px 3px;
} -->