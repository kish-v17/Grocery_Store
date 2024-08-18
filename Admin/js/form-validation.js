function validateAddBannerForm(){
    let isValid = true;

    // Clear previous error messages
    clearError('bannerImageError');
    clearError('bannerURLError');
    clearError('bannerOrderError');
    clearError('bannerStatusError');

    // Validate Banner Image (required)
    const bannerImage = document.getElementById('bannerImage').value;
    if (bannerImage === '') {
        showError('bannerImageError', 'Banner Image is required.');
        isValid = false;
    }

    // Validate Banner URL (required and format)
    const bannerURL = document.getElementById('bannerURL').value;
    const urlPattern = /^https?:\/\/\S+\.\S+$/;  // Regular expression for URL validation
    if (bannerURL === '') {
        showError('bannerURLError', 'Banner URL is required.');
        isValid = false;
    } else if (!urlPattern.test(bannerURL)) {
        showError('bannerURLError', 'Please enter a valid URL (e.g., https://example.com).');
        isValid = false;
    }

    // Validate View Order (required and must be a positive number)
    const bannerOrder = document.getElementById('bannerOrder').value;
    if (bannerOrder === '') {
        showError('bannerOrderError', 'View Order is required.');
        isValid = false;
    } else if (isNaN(bannerOrder) || bannerOrder <= 0) {
        showError('bannerOrderError', 'View Order must be a positive number.');
        isValid = false;
    }

    // Validate Status (required)
    const bannerStatus = document.getElementById('bannerStatus').value;
    if (bannerStatus === '') {
        showError('bannerStatusError', 'Status is required.');
        isValid = false;
    }

    // Return the overall validity of the form
    return isValid;
}



// Function to show an error message
function showError(elementId, message) {
    document.getElementById(elementId).innerText = message;
}

// Function to clear an error message
function clearError(elementId) {
    document.getElementById(elementId).innerText = '';
}


