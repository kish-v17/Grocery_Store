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

