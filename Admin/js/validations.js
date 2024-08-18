function validateAddBannerForm() {
    let isValid = true;

    document.getElementById('bannerImageError').textContent = '';
    document.getElementById('bannerURLError').textContent = '';
    document.getElementById('bannerOrderError').textContent = '';

    const bannerImage = document.getElementById('bannerImage');
    if (bannerImage.files.length === 0) {
        document.getElementById('bannerImageError').textContent = 'Please upload a banner image.';
        isValid = false;
    }

    const bannerURL = document.getElementById('bannerURL').value.trim();
    const urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;
    if (bannerURL === '') {
        document.getElementById('bannerURLError').textContent = 'Banner URL is required.';
        isValid = false;
    } else if (!urlPattern.test(bannerURL)) {
        document.getElementById('bannerURLError').textContent = 'Please enter a valid URL.';
        isValid = false;
    }

    const bannerOrder = document.getElementById('bannerOrder').value.trim();
    if (bannerOrder === '') {
        document.getElementById('bannerOrderError').textContent = 'View order is required.';
        isValid = false;
    } else if (isNaN(bannerOrder) || bannerOrder <= 0) {
        document.getElementById('bannerOrderError').textContent = 'Please enter a valid order number.';
        isValid = false;
    }

    return isValid;
}

function validateAddToCartForm() {
    let isValid = true;

    // Clear previous error messages
    document.getElementById('userError').textContent = '';
    document.getElementById('productError').textContent = '';
    document.getElementById('quantityError').textContent = '';

    // Validate User Selection
    const user = document.getElementById('user').value;
    if (user === '') {
        document.getElementById('userError').textContent = 'Please select a user.';
        isValid = false;
    }

    // Validate Product Selection
    const product = document.getElementById('product').value;
    if (product === '') {
        document.getElementById('productError').textContent = 'Please select a product.';
        isValid = false;
    }

    // Validate Quantity
    const quantity = document.getElementById('quantity').value.trim();
    if (quantity === '') {
        document.getElementById('quantityError').textContent = 'Quantity is required.';
        isValid = false;
    } else if (isNaN(quantity) || quantity <= 0) {
        document.getElementById('quantityError').textContent = 'Please enter a valid quantity.';
        isValid = false;
    }

    return isValid;
}

function validateAddCategoryForm() {
    let isValid = true;

    // Clear previous error messages
    document.getElementById('categoryNameError').textContent = '';
    document.getElementById('parentCategoryError').textContent = '';

    // Validate Category Name
    const categoryName = document.getElementById('categoryName').value.trim();
    if (categoryName === '') {
        document.getElementById('categoryNameError').textContent = 'Category name is required.';
        isValid = false;
    }

    // Validate Parent Category Selection
    const parentCategory = document.getElementById('parentCategory').value;
    if (parentCategory === '') {
        document.getElementById('parentCategoryError').textContent = 'Please select a parent category.';
        isValid = false;
    }

    return isValid;
}

function validateAddOfferForm() {
    let isValid = true;

    document.getElementById('offerDescriptionError').textContent = '';
    document.getElementById('discountError').textContent = '';
    document.getElementById('minOrderError').textContent = '';

    const offerDescription = document.getElementById('offerDescription').value.trim();
    if (offerDescription === '') {
        document.getElementById('offerDescriptionError').textContent = 'Offer description is required.';
        isValid = false;
    }

    const discount = document.getElementById('discount').value.trim();
    if (discount === '') {
        document.getElementById('discountError').textContent = 'Discount is required.';
        isValid = false;
    } else if (isNaN(discount) || discount <= 0) {
        document.getElementById('discountError').textContent = 'Please enter a valid discount amount.';
        isValid = false;
    }

    const minOrder = document.getElementById('minOrder').value.trim();
    if (minOrder === '' || (isNaN(minOrder) || minOrder <= 0)) {
        document.getElementById('minOrderError').textContent = 'Please enter a valid minimum order amount.';
        isValid = false;
    }

    return isValid;
}
let productCount = 1;

document.getElementById('addProductBtn').addEventListener('click', function() {
    productCount++;
    const productContainer = document.getElementById('productContainer');
    
    const newProductEntry = document.createElement('div');
    newProductEntry.className = 'product-entry mb-3';
    newProductEntry.id = `productEntry${productCount}`;
    newProductEntry.innerHTML = `
        <h5>Product ${productCount}</h5>
        <div class="row align-items-end">
            <div class="col-md-5">
                <label for="productId${productCount}" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="productId${productCount}" name="products[${productCount - 1}][productId]">
                <div id="productId${productCount}Error" class="error-message"></div>
            </div>
            <div class="col-md-5">
                <label for="quantity${productCount}" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity${productCount}" name="products[${productCount - 1}][quantity]" min="1">
                <div id="quantity${productCount}Error" class="error-message"></div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger mt-2 deleteProductBtn" onclick="removeProduct(this)">Delete Product</button>
            </div>
        </div>
    `;
    productContainer.appendChild(newProductEntry);
});

function removeProduct(button) {
    const productEntry = button.closest('.product-entry');
    productEntry.remove();
}

function validateAddOrderForm() {
    let isValid = true;

    const userId = document.getElementById('userId').value.trim();
    const userIdError = document.getElementById('userIdError');
    if (userId === '') {
        userIdError.textContent = 'User ID is required.';
        isValid = false;
    } else {
        userIdError.textContent = '';
    }

    const orderDate = document.getElementById('orderDate').value.trim();
    const orderDateError = document.getElementById('orderDateError');
    if (orderDate === '') {
        orderDateError.textContent = 'Order Date is required.';
        isValid = false;
    } else {
        orderDateError.textContent = '';
    }

    for (let i = 1; i <= productCount; i++) {
        const productId = document.getElementById(`productId${i}`).value.trim();
        const productIdError = document.getElementById(`productId${i}Error`);
        const quantity = document.getElementById(`quantity${i}`).value.trim();
        const quantityError = document.getElementById(`quantity${i}Error`);

        if (productId === '') {
            productIdError.textContent = 'Product ID is required.';
            isValid = false;
        } else {
            productIdError.textContent = '';
        }

        if (quantity === '' || quantity <= 0) {
            quantityError.textContent = 'Quantity must be at least 1.';
            isValid = false;
        } else {
            quantityError.textContent = '';
        }
    }

    const shippingAddress = document.getElementById('shippingAddress').value.trim();
    const shippingAddressError = document.getElementById('shippingAddressError');
    if (shippingAddress === '') {
        shippingAddressError.textContent = 'Shipping Address is required.';
        isValid = false;
    } else {
        shippingAddressError.textContent = '';
    }

    const billingAddress = document.getElementById('billingAddress').value.trim();
    const billingAddressError = document.getElementById('billingAddressError');
    if (billingAddress === '') {
        billingAddressError.textContent = 'Billing Address is required.';
        isValid = false;
    } else {
        billingAddressError.textContent = '';
    }

    const orderStatus = document.getElementById('orderStatus').value.trim();
    const orderStatusError = document.getElementById('orderStatusError');
    if (orderStatus === '') {
        orderStatusError.textContent = 'Order Status is required.';
        isValid = false;
    } else {
        orderStatusError.textContent = '';
    }

    return isValid;
}

function validateAddProductForm() {
    let isValid = true;

    // Product Name Validation
    const productName = document.getElementById('productName');
    const productNameError = document.getElementById('productNameError');
    if (!productName.value.trim()) {
        productNameError.textContent = 'Product Name is required.';
        isValid = false;
    } else {
        productNameError.textContent = '';
    }

    // Product Image Validation
    const productImage = document.getElementById('productImage');
    const productImageError = document.getElementById('productImageError');
    if (!productImage.files.length) {
        productImageError.textContent = 'Product Image is required.';
        isValid = false;
    } else {
        productImageError.textContent = '';
    }

    // Product Price Validation
    const productPrice = document.getElementById('productPrice');
    const productPriceError = document.getElementById('productPriceError');
    const priceValue = parseFloat(productPrice.value);
    if (isNaN(priceValue) || priceValue <= 0) {
        productPriceError.textContent = 'Price must be a number greater than 0.';
        isValid = false;
    } else {
        productPriceError.textContent = '';
    }

    // Product Discount Validation
    const productDiscount = document.getElementById('productDiscount');
    const productDiscountError = document.getElementById('productDiscountError');
    const discountValue = parseFloat(productDiscount.value);
    if (isNaN(discountValue) || discountValue < 0 || discountValue > 100) {
        productDiscountError.textContent = 'Discount must be a number between 0 and 100.';
        isValid = false;
    } else {
        productDiscountError.textContent = '';
    }

    // Product Stock Validation
    const productStock = document.getElementById('productStock');
    const productStockError = document.getElementById('productStockError');
    const stockValue = parseInt(productStock.value, 10);
    if (isNaN(stockValue) || stockValue < 0) {
        productStockError.textContent = 'Stock Quantity must be a non-negative integer.';
        isValid = false;
    } else {
        productStockError.textContent = '';
    }

    // Product Category Validation
    const productCategory = document.getElementById('productCategory');
    const productCategoryError = document.getElementById('productCategoryError');
    if (productCategory.value === '') {
        productCategoryError.textContent = 'Category is required.';
        isValid = false;
    } else {
        productCategoryError.textContent = '';
    }

    // Product Description Validation
    const productDescription = document.getElementById('productDescription');
    const productDescriptionError = document.getElementById('productDescriptionError');
    if (productDescription.value.length > 500) {
        productDescriptionError.textContent = 'Description must be less than 500 characters.';
        isValid = false;
    } else {
        productDescriptionError.textContent = '';
    }

    return isValid;
};

function validateAddReviewForm() {
    let isValid = true;

    // Product ID Validation
    const productid = document.getElementById('productid');
    const productidError = document.getElementById('productidError');
    if (!productid.value.trim()) {
        productidError.textContent = 'Product ID is required.';
        isValid = false;
    } else {
        productidError.textContent = '';
    }

    // User ID Validation
    const userid = document.getElementById('userid');
    const useridError = document.getElementById('useridError');
    if (!userid.value.trim()) {
        useridError.textContent = 'User ID is required.';
        isValid = false;
    } else {
        useridError.textContent = '';
    }

    // Rating Validation
    const rating = document.getElementById('rating');
    const ratingError = document.getElementById('ratingError');
    if (rating.value === '') {
        ratingError.textContent = 'Rating is required.';
        isValid = false;
    } else {
        ratingError.textContent = '';
    }

    // Review Validation
    const review = document.getElementById('review');
    const reviewError = document.getElementById('reviewError');
    if (review.value === '') {
        reviewError.textContent = 'Review is required.';
        isValid = false;
    }
    else if (review.value.length > 500) {
        reviewError.textContent = 'Review must be less than 500 characters.';
        isValid = false;
    } else {
        reviewError.textContent = '';
    }

    return isValid;
}
function validateAddUserForm() {
    let isValid = true;

    // First Name Validation
    const firstName = document.getElementById('firstName');
    const firstNameError = document.getElementById('firstNameError');
    if (!firstName.value.trim()) {
        firstNameError.textContent = 'First Name is required.';
        isValid = false;
    } else {
        firstNameError.textContent = '';
    }

    // Last Name Validation
    const lastName = document.getElementById('lastName');
    const lastNameError = document.getElementById('lastNameError');
    if (!lastName.value.trim()) {
        lastNameError.textContent = 'Last Name is required.';
        isValid = false;
    } else {
        lastNameError.textContent = '';
    }

    // Email Validation
    const email = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim()) {
        emailError.textContent = 'Email is required.';
        isValid = false;
    } else if (!emailRegex.test(email.value)) {
        emailError.textContent = 'Email must be a valid email address.';
        isValid = false;
    } else {
        emailError.textContent = '';
    }

    // Phone Validation
    const phone = document.getElementById('phone');
    const phoneError = document.getElementById('phoneError');
    const phoneRegex = /^[0-9]{10}$/; // Assumes phone numbers are 10 digits
    if (!phone.value.trim()) {
        phoneError.textContent = 'Phone is required.';
        isValid = false;
    } else if (!phoneRegex.test(phone.value)) {
        phoneError.textContent = 'Phone must be a valid 10-digit number.';
        isValid = false;
    } else {
        phoneError.textContent = '';
    }

    // Password Validation
    const password = document.getElementById('password');
    const passwordError = document.getElementById('passwordError');
    if (!password.value.trim()) {
        passwordError.textContent = 'Password is required.';
        isValid = false;
    } else if (password.value.length < 6) {
        passwordError.textContent = 'Password must be at least 6 characters long.';
        isValid = false;
    } else {
        passwordError.textContent = '';
    }

    return isValid;
}
function validateLoginInfoForm() {
    let isValid = true;

    // Admin Email Validation
    const adminEmail = document.getElementById('adminEmail');
    const adminEmailError = document.getElementById('adminEmailError');
    if (!adminEmail.value.trim()) {
        adminEmailError.textContent = 'Email is required.';
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(adminEmail.value)) {
        adminEmailError.textContent = 'Enter a valid email address.';
        isValid = false;
    } else {
        adminEmailError.textContent = '';
    }

    // Admin Password Validation
    const adminPassword = document.getElementById('adminPassword');
    const adminPasswordError = document.getElementById('adminPasswordError');
    if (!adminPassword.value.trim()) {
        adminPasswordError.textContent = 'Password is required.';
        isValid = false;
    } else {
        adminPasswordError.textContent = '';
    }

    return isValid;
}

function validateContactInfoForm() {
    let isValid = true;

    // Contact Email Validation
    const contactEmail = document.getElementById('contactEmail');
    const contactEmailError = document.getElementById('contactEmailError');
    if (!contactEmail.value.trim()) {
        contactEmailError.textContent = 'Contact Email is required.';
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(contactEmail.value)) {
        contactEmailError.textContent = 'Enter a valid email address.';
        isValid = false;
    } else {
        contactEmailError.textContent = '';
    }

    // Contact Number Validation
    const contactNumber = document.getElementById('contactNumber');
    const contactNumberError = document.getElementById('contactNumberError');
    if (!contactNumber.value.trim()) {
        contactNumberError.textContent = 'Contact Number is required.';
        isValid = false;
    } else if (!/^\d{10}$/.test(contactNumber.value)) {
        contactNumberError.textContent = 'Enter a valid 10-digit contact number.';
        isValid = false;
    } else {
        contactNumberError.textContent = '';
    }

    // Site Name Validation
    const siteName = document.getElementById('siteName');
    const siteNameError = document.getElementById('siteNameError');
    if (!siteName.value.trim()) {
        siteNameError.textContent = 'Site Name is required.';
        isValid = false;
    } else {
        siteNameError.textContent = '';
    }

    return isValid;
}
