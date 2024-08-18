<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Offer</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="offers.php">Offers</a></li>
                <li class="breadcrumb-item active">Update Offer</li>
            </ol>

            <!-- Update Offer Form -->
            <form action="" method="POST" onsubmit="return validateAddOfferForm()">
                <div class="mb-3">
                    <label for="offerDescription" class="form-label">Offer Description</label>
                    <input type="text" class="form-control" id="offerDescription" name="offerDescription" value="Existing Offer Description">
                    <div id="offerDescriptionError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="text" class="form-control" id="discount" name="discount" value="10%">
                    <div id="discountError" class="error-message"></div>
                </div>

                <div class="mb-3">
                    <label for="minOrder" class="form-label">Minimum Order Amount</label>
                    <input type="text" class="form-control" id="minOrder" name="minOrder" value="100">
                    <div id="minOrderError" class="error-message"></div>
                </div>

                <button type="submit" class="btn btn-primary">Update Offer</button>
            </form>
        </div>
    </main>
<?php include("footer.php"); ?>
