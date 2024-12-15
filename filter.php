<form action="" method="post">
    <div class="invisible container border p-3 row" id="filter-section">
        <div class="col-6 col-sm-4 col-md-3 invisible mb-2">
            <h6 class="mb-2"><span>Customer Ratings</span></h6>
            <div>
                <div class="text-nowrap">
                    <input type="radio" name="ratings" id="4star" value="4"
                        <?php echo isset($_POST['ratings']) && $_POST['ratings'] == '4' ? 'checked' : ''; ?>>
                    <label for="4star">4 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="ratings" id="3star" value="3"
                        <?php echo isset($_POST['ratings']) && $_POST['ratings'] == '3' ? 'checked' : ''; ?>>
                    <label for="3star">3 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="ratings" id="2star" value="2"
                        <?php echo isset($_POST['ratings']) && $_POST['ratings'] == '2' ? 'checked' : ''; ?>>
                    <label for="2star">2 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="ratings" id="1star" value="1"
                        <?php echo isset($_POST['ratings']) && $_POST['ratings'] == '1' ? 'checked' : ''; ?>>
                    <label for="1star">1 <i class="fa fa-star" aria-hidden="true"></i> and above</label>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 invisible mb-2">
            <h6 class="mb-2"><span>Price</span></h6>
            <div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="lt50" value="lt50"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == 'lt50' ? 'checked' : ''; ?>>
                    <label for="lt50">Less than Rs 50</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="51to100" value="51to100"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == '51to100' ? 'checked' : ''; ?>>
                    <label for="51to100">Rs 51 to 100</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="101to200" value="101to200"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == '101to200' ? 'checked' : ''; ?>>
                    <label for="101to200">Rs 101 to 200</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="201to500" value="201to500"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == '201to500' ? 'checked' : ''; ?>>
                    <label for="201to500">Rs 201 to 500</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="price-range" id="gt500" value="gt500"
                        <?php echo isset($_POST['price-range']) && $_POST['price-range'] == 'gt500' ? 'checked' : ''; ?>>
                    <label for="gt500">More than Rs 500</label>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 invisible mb-2">
            <h6 class="mb-2"><span>Discount</span></h6>
            <div>
                <div class="text-nowrap">
                    <input type="radio" name="discount" id="lt5" value="lt5"
                        <?php echo isset($_POST['discount']) && $_POST['discount'] == 'lt5' ? 'checked' : ''; ?>>
                    <label for="lt5">Less than 5%</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="discount" id="5to15" value="5to15"
                        <?php echo isset($_POST['discount']) && $_POST['discount'] == '5to15' ? 'checked' : ''; ?>>
                    <label for="5to15">5% to 15%</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="discount" id="15to25" value="15to25"
                        <?php echo isset($_POST['discount']) && $_POST['discount'] == '15to25' ? 'checked' : ''; ?>>
                    <label for="15to25">15% to 25%</label>
                </div>
                <div class="text-nowrap">
                    <input type="radio" name="discount" id="gt25" value="gt25"
                        <?php echo isset($_POST['discount']) && $_POST['discount'] == 'gt25' ? 'checked' : ''; ?>>
                    <label for="gt25">More than 25%</label>
                </div>
            </div>
        </div>

        <div class="col-6 col-sm-4 col-md-3 invisible mb-2 d-flex align-items-end justify-content-end">
            <input type="submit" value="Apply" name="filter-submit" class="primary-btn js-filter-btn">
        </div>
    </div>
</form>