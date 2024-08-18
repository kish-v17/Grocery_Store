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
            <form action="update_offer_handler.php" method="post">
                <!-- Hidden field to identify the offer being updated -->
                <input type="hidden" name="offerId" value="1"> <!-- Replace with dynamic ID -->

                <div class="mb-3">
                    <label for="offerDescription" class="form-label">Offer Description</label>
                    <input type="text" class="form-control" id="offerDescription" name="offerDescription" value="10% discount on orders above ₹1000" required>
                </div>

                <div class="mb-3">
                    <label for="discount" class="form-label">Discount</label>
                    <input type="text" class="form-control" id="discount" name="discount" value="10%" required>
                </div>

                <div class="mb-3">
                    <label for="minOrder" class="form-label">Minimum Order Amount</label>
                    <input type="text" class="form-control" id="minOrder" name="minOrder" value="₹1000">
                </div>


                <button type="submit" class="btn btn-primary">Update Offer</button>
            </form>
        </div>
    </main>
<?php include("footer.php"); ?>
