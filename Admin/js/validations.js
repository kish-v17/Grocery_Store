function validateAddBannerForm() {
    let isValid = true;

    document.getElementById('bannerImageError').innerText = '';
    document.getElementById('bannerURLError').innerText = '';
    document.getElementById('bannerOrderError').innerText = '';

    const bannerImage = document.getElementById('bannerImage');
    if (bannerImage.files.length === 0) {
        document.getElementById('bannerImageError').innerText = 'Please upload a banner image.';
        isValid = false;
    }

    const bannerURL = document.getElementById('bannerURL').value.trim();
    const urlPattern = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;
    if (bannerURL === '') {
        document.getElementById('bannerURLError').innerText = 'Banner URL is required.';
        isValid = false;
    } else if (!urlPattern.test(bannerURL)) {
        document.getElementById('bannerURLError').innerText = 'Please enter a valid URL.';
        isValid = false;
    }

    const bannerOrder = document.getElementById('bannerOrder').value.trim();
    if (bannerOrder === '') {
        document.getElementById('bannerOrderError').innerText = 'View order is required.';
        isValid = false;
    } else if (isNaN(bannerOrder) || bannerOrder <= 0) {
        document.getElementById('bannerOrderError').innerText = 'Please enter a valid order number.';
        isValid = false;
    }

    return isValid;
}

function validateAddToCartForm() {
    let isValid = true;

    // Clear previous error messages
    document.getElementById('userError').innerText = '';
    document.getElementById('productError').innerText = '';
    document.getElementById('quantityError').innerText = '';

    // Validate User Selection
    const user = document.getElementById('user').value;
    if (user === '') {
        document.getElementById('userError').innerText = 'Please select a user.';
        isValid = false;
    }

    // Validate Product Selection
    const product = document.getElementById('product').value;
    if (product === '') {
        document.getElementById('productError').innerText = 'Please select a product.';
        isValid = false;
    }

    // Validate Quantity
    const quantity = document.getElementById('quantity').value.trim();
    if (quantity === '') {
        document.getElementById('quantityError').innerText = 'Quantity is required.';
        isValid = false;
    } else if (isNaN(quantity) || quantity <= 0) {
        document.getElementById('quantityError').innerText = 'Please enter a valid quantity.';
        isValid = false;
    }

    return isValid;
}

function validateAddCategoryForm() {
    let isValid = true;

    // Clear previous error messages
    document.getElementById('categoryNameError').innerText = '';
    document.getElementById('parentCategoryError').innerText = '';

    // Validate Category Name
    const categoryName = document.getElementById('categoryName').value.trim();
    if (categoryName === '') {
        document.getElementById('categoryNameError').innerText = 'Category name is required.';
        isValid = false;
    }

    // Validate Parent Category Selection
    const parentCategory = document.getElementById('parentCategory').value;
    if (parentCategory === '') {
        document.getElementById('parentCategoryError').innerText = 'Please select a parent category.';
        isValid = false;
    }

    return isValid;
}

function validateAddOfferForm() {
    let isValid = true;

    document.getElementById('offerDescriptionError').innerText = '';
    document.getElementById('discountError').innerText = '';
    document.getElementById('minOrderError').innerText = '';

    const offerDescription = document.getElementById('offerDescription').value.trim();
    if (offerDescription === '') {
        document.getElementById('offerDescriptionError').innerText = 'Offer description is required.';
        isValid = false;
    }

    const discount = document.getElementById('discount').value.trim();
    if (discount === '') {
        document.getElementById('discountError').innerText = 'Discount is required.';
        isValid = false;
    } else if (isNaN(discount) || discount <= 0) {
        document.getElementById('discountError').innerText = 'Please enter a valid discount amount.';
        isValid = false;
    }

    const minOrder = document.getElementById('minOrder').value.trim();
    if (minOrder === '' || (isNaN(minOrder) || minOrder <= 0)) {
        document.getElementById('minOrderError').innerText = 'Please enter a valid minimum order amount.';
        isValid = false;
    }

    return isValid;
}

function removeProduct(button) {
    const productEntry = button.closest('.product-entry');
    productEntry.remove();
}

function validateAddOrderForm() {
    let isValid = true;

    const userId = document.getElementById('userId').value.trim();
    const userIdError = document.getElementById('userIdError');
    if (userId === '') {
        userIdError.innerText = 'User ID is required.';
        isValid = false;
    } else {
        userIdError.innerText = '';
    }

    const orderDate = document.getElementById('orderDate').value.trim();
    const orderDateError = document.getElementById('orderDateError');
    if (orderDate === '') {
        orderDateError.innerText = 'Order Date is required.';
        isValid = false;
    } else {
        orderDateError.innerText = '';
    }

    for (let i = 1; i <= productCount; i++) {
        const productId = document.getElementById(`productId${i}`).value.trim();
        const productIdError = document.getElementById(`productId${i}Error`);
        const quantity = document.getElementById(`quantity${i}`).value.trim();
        const quantityError = document.getElementById(`quantity${i}Error`);

        if (productId === '') {
            productIdError.innerText = 'Product ID is required.';
            isValid = false;
        } else {
            productIdError.innerText = '';
        }

        if (quantity === '' || quantity <= 0) {
            quantityError.innerText = 'Quantity must be at least 1.';
            isValid = false;
        } else {
            quantityError.innerText = '';
        }
    }

    const shippingAddress = document.getElementById('shippingAddress').value.trim();
    const shippingAddressError = document.getElementById('shippingAddressError');
    if (shippingAddress === '') {
        shippingAddressError.innerText = 'Shipping Address is required.';
        isValid = false;
    } else {
        shippingAddressError.innerText = '';
    }

    const billingAddress = document.getElementById('billingAddress').value.trim();
    const billingAddressError = document.getElementById('billingAddressError');
    if (billingAddress === '') {
        billingAddressError.innerText = 'Billing Address is required.';
        isValid = false;
    } else {
        billingAddressError.innerText = '';
    }

    const orderStatus = document.getElementById('orderStatus').value.trim();
    const orderStatusError = document.getElementById('orderStatusError');
    if (orderStatus === '') {
        orderStatusError.innerText = 'Order Status is required.';
        isValid = false;
    } else {
        orderStatusError.innerText = '';
    }

}

function validateAddProductForm() {
    let isValid = true;

    // Product Name Validation
    const productName = document.getElementById('productName');
    const productNameError = document.getElementById('productNameError');
    if (!productName.value.trim()) {
        productNameError.innerText = 'Product Name is required.';
        isValid = false;
    } else {
        productNameError.innerText = '';
    }

    // Product Image Validation
    const productImage = document.getElementById('productImage');
    const productImageError = document.getElementById('productImageError');
    if (!productImage.files.length) {
        productImageError.innerText = 'Product Image is required.';
        isValid = false;
    } else {
        productImageError.innerText = '';
    }

    // Sale Price Validation
    const salePrice = document.getElementById('salePrice');
    const salePriceError = document.getElementById('salePriceError');
    const salePriceValue = parseFloat(salePrice.value);
    if (isNaN(salePriceValue) || salePriceValue <= 0) {
        salePriceError.innerText = 'Sale Price must be a number greater than 0.';
        isValid = false;
    } else {
        salePriceError.innerText = '';
    }

    // Cost Price Validation
    const costPrice = document.getElementById('costPrice');
    const costPriceError = document.getElementById('costPriceError');
    const costPriceValue = parseFloat(costPrice.value);
    if (isNaN(costPriceValue) || costPriceValue <= 0) {
        costPriceError.innerText = 'Cost Price must be a number greater than 0.';
        isValid = false;
    } else {
        costPriceError.innerText = '';
    }

    // Product Discount Validation
    const productDiscount = document.getElementById('productDiscount');
    const productDiscountError = document.getElementById('productDiscountError');
    const discountValue = parseFloat(productDiscount.value);
    if (isNaN(discountValue) || discountValue < 0 || discountValue > 100) {
        productDiscountError.innerText = 'Discount must be a number between 0 and 100.';
        isValid = false;
    } else {
        productDiscountError.innerText = '';
    }

    // Product Stock Validation
    const productStock = document.getElementById('productStock');
    const productStockError = document.getElementById('productStockError');
    const stockValue = parseInt(productStock.value, 10);
    if (isNaN(stockValue) || stockValue < 0) {
        productStockError.innerText = 'Stock Quantity must be a non-negative integer.';
        isValid = false;
    } else {
        productStockError.innerText = '';
    }

    // Product Category Validation
    const productCategory = document.getElementById('productCategory');
    const productCategoryError = document.getElementById('productCategoryError');
    if (productCategory.value === '') {
        productCategoryError.innerText = 'Category is required.';
        isValid = false;
    } else {
        productCategoryError.innerText = '';
    }

    // Product Description Validation
    const productDescription = document.getElementById('productDescription');
    const productDescriptionError = document.getElementById('productDescriptionError');
    if (productDescription.value.length > 500) {
        productDescriptionError.innerText = 'Description must be less than 500 characters.';
        isValid = false;
    } else {
        productDescriptionError.innerText = '';
    }

    if (!isValid) {
        event.preventDefault();
        return false;  // Prevent form submission
    }
    return isValid;
}


function validateAddReviewForm() {
    let isValid = true;

    // Product ID Validation
    const productid = document.getElementById('productid');
    const productidError = document.getElementById('productidError');
    if (!productid.value.trim()) {
        productidError.innerText = 'Product ID is required.';
        isValid = false;
    } else {
        productidError.innerText = '';
    }

    // User ID Validation
    const userid = document.getElementById('userid');
    const useridError = document.getElementById('useridError');
    if (!userid.value.trim()) {
        useridError.innerText = 'User ID is required.';
        isValid = false;
    } else {
        useridError.innerText = '';
    }

    // Rating Validation
    const rating = document.getElementById('rating');
    const ratingError = document.getElementById('ratingError');
    if (rating.value === '') {
        ratingError.innerText = 'Rating is required.';
        isValid = false;
    } else {
        ratingError.innerText = '';
    }

    // Review Validation
    const review = document.getElementById('review');
    const reviewError = document.getElementById('reviewError');
    if (review.value === '') {
        reviewError.innerText = 'Review is required.';
        isValid = false;
    }
    else if (review.value.length > 500) {
        reviewError.innerText = 'Review must be less than 500 characters.';
        isValid = false;
    } else {
        reviewError.innerText = '';
    }

    return isValid;
}
function validateAddUserForm() {
    let isValid = true;

    // First Name Validation
    const firstName = document.getElementById('firstName');
    const firstNameError = document.getElementById('firstNameError');
    if (!firstName.value.trim()) {
        firstNameError.innerText = 'First Name is required.';
        isValid = false;
    } else {
        firstNameError.innerText = '';
    }

    // Last Name Validation
    const lastName = document.getElementById('lastName');
    const lastNameError = document.getElementById('lastNameError');
    if (!lastName.value.trim()) {
        lastNameError.innerText = 'Last Name is required.';
        isValid = false;
    } else {
        lastNameError.innerText = '';
    }

    // Email Validation
    const email = document.getElementById('email');
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email.value.trim()) {
        emailError.innerText = 'Email is required.';
        isValid = false;
    } else if (!emailRegex.test(email.value)) {
        emailError.innerText = 'Email must be a valid email address.';
        isValid = false;
    } else {
        emailError.innerText = '';
    }

    // Phone Validation
    const phone = document.getElementById('phone');
    const phoneError = document.getElementById('phoneError');
    const phoneRegex = /^[0-9]{10}$/; // Assumes phone numbers are 10 digits
    if (!phone.value.trim()) {
        phoneError.innerText = 'Phone is required.';
        isValid = false;
    } else if (!phoneRegex.test(phone.value)) {
        phoneError.innerText = 'Phone must be a valid 10-digit number.';
        isValid = false;
    } else {
        phoneError.innerText = '';
    }

    // Password Validation
    const password = document.getElementById('password');
    const passwordError = document.getElementById('passwordError');
    if (!password.value.trim()) {
        passwordError.innerText = 'Password is required.';
        isValid = false;
    } else if (password.value.length < 8) {
        passwordError.innerText = 'Password must be at least 8 characters long.';
        isValid = false;
    } else {
        passwordError.innerText = '';
    }

    return isValid;
}
function validateLoginInfoForm() {
    let isValid = true;

    // Admin Email Validation
    const adminEmail = document.getElementById('adminEmail');
    const adminEmailError = document.getElementById('adminEmailError');
    if (!adminEmail.value.trim()) {
        adminEmailError.innerText = 'Email is required.';
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(adminEmail.value)) {
        adminEmailError.innerText = 'Enter a valid email address.';
        isValid = false;
    } else {
        adminEmailError.innerText = '';
    }

    // Admin Password Validation
    const adminPassword = document.getElementById('adminPassword');
    const adminPasswordError = document.getElementById('adminPasswordError');
    if (!adminPassword.value.trim()) {
        adminPasswordError.innerText = 'Password is required.';
        isValid = false;
    } else {
        adminPasswordError.innerText = '';
    }

    return isValid;
}

function validateContactInfoForm() {
    let isValid = true;

    // Contact Email Validation
    const contactEmail = document.getElementById('contactEmail');
    const contactEmailError = document.getElementById('contactEmailError');
    if (!contactEmail.value.trim()) {
        contactEmailError.innerText = 'Contact Email is required.';
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(contactEmail.value)) {
        contactEmailError.innerText = 'Enter a valid email address.';
        isValid = false;
    } else {
        contactEmailError.innerText = '';
    }

    // Contact Number Validation
    const contactNumber = document.getElementById('contactNumber');
    const contactNumberError = document.getElementById('contactNumberError');
    if (!contactNumber.value.trim()) {
        contactNumberError.innerText = 'Contact Number is required.';
        isValid = false;
    } else if (!/^\d{10}$/.test(contactNumber.value)) {
        contactNumberError.innerText = 'Enter a valid 10-digit contact number.';
        isValid = false;
    } else {
        contactNumberError.innerText = '';
    }

    // Site Name Validation
    const siteName = document.getElementById('siteName');
    const siteNameError = document.getElementById('siteNameError');
    if (!siteName.value.trim()) {
        siteNameError.innerText = 'Site Name is required.';
        isValid = false;
    } else {
        siteNameError.innerText = '';
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
