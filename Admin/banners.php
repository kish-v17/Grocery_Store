<?php include("sidebar.php"); ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4 w-100">
                <div>
                    <h1>Banner Management</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Banners</li>
                    </ol>
                </div>
                <a class="btn btn-primary ms-auto" href="add-banner.php" >Add Banner</a>
            </div>

            <div class="card-body">
                <div class="row mb-3 mt-3">
                
                    <?php
                        $query = "SELECT Banner_Id, Banner_Image, View_Order, Active_Status FROM banner_details_tbl where View_Order<0 order by View_Order";
                        $result = mysqli_query($con, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($banner = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="col-12 col-md-6">
                    <table class="table border text-nowrap">
                    <?php 
                                    if($banner['View_Order']==-1)
                                        echo "<h5>Banner for free delivery</h5>";
                                    if($banner['View_Order']==-2)
                                        echo "<h5>Banner for first order discount</h5>";
                    ?>
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                                <tr>
                                    <td>
                                        <img src="../img/banners/<?php echo $banner['Banner_Image']; ?>" alt="Banner <?php echo $banner['Banner_Id']; ?>" width="200">
                                    </td>
                                    <td>
                                        <div class="d-flex flex-nowrap">
                                            <a href="update-banner.php?banner_id=<?php echo $banner['Banner_Id']; ?>" class="btn btn-secondary btn-sm ms-2">Edit</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        
                    
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">No banners found.</td>
                            </tr>
                            <?php
                        }
                        ?>
                </div>
                <h5>Banners for slider</h5>
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Image</th>
                            <th>View Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT Banner_Id, Banner_Image, View_Order, Active_Status FROM banner_details_tbl where View_Order>0 order by View_Order";
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($banner = mysqli_fetch_assoc($result)) {
                                ?>
                                <?php 
                                    if($banner['View_Order']==-1)
                                        echo "<tr><td colspan='3'>Banner for free delivery</td></tr>";
                                    if($banner['View_Order']==-2)
                                        echo "<tr><td colspan='3'>Banner for first order discount</td></tr>";
                                ?>
                                <tr>
                                    <td>
                                        <img src="../img/banners/<?php echo $banner['Banner_Image']; ?>" alt="Banner <?php echo $banner['Banner_Id']; ?>" width="200">
                                    </td>
                                    <td><?php echo $banner['View_Order']; ?></td>
                                    <td>
                                        <div class="d-flex flex-nowrap">
                                            <?php if ($banner['Active_Status'] == 1) { ?>
                                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deactivateModal<?php echo $banner['Banner_Id']; ?>" data-id="<?php echo $banner['Banner_Id']; ?>">Deactivate</button>
                                            <?php } else { ?>
                                                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#activateModal<?php echo $banner['Banner_Id']; ?>" data-id="<?php echo $banner['Banner_Id']; ?>">Activate</button>
                                            <?php } ?>
                                            <a href="update-banner.php?banner_id=<?php echo $banner['Banner_Id']; ?>" class="btn btn-secondary btn-sm ms-2">Edit</a>
                                            <?php
                                                if($banner['View_Order']>0)
                                                {
                                                    ?>
                                                <button class="btn btn-danger btn-sm ms-2" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $banner['Banner_Id']; ?>" data-id="<?php echo $banner['Banner_Id']; ?>">Delete</button>
                                                    <?php
                                                }
                                            ?>

                                        </div>
                                    </td>
                                </tr>

                                <!-- Deactivate Modal -->
                                <div class="modal fade" id="deactivateModal<?php echo $banner['Banner_Id']; ?>" tabindex="-1" aria-labelledby="deactivateModalLabel<?php echo $banner['Banner_Id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deactivateModalLabel<?php echo $banner['Banner_Id']; ?>">Confirm Deactivation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to deactivate this banner? This action can be reversed by reactivating the banner.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="deactivate-banner.php?banner_id=<?php echo $banner['Banner_Id']; ?>" class="btn btn-danger">Deactivate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Activate Modal -->
                                <div class="modal fade" id="activateModal<?php echo $banner['Banner_Id']; ?>" tabindex="-1" aria-labelledby="activateModalLabel<?php echo $banner['Banner_Id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="activateModalLabel<?php echo $banner['Banner_Id']; ?>">Confirm Activation</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to activate this banner? This action will make the banner visible on the website.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="activate-banner.php?banner_id=<?php echo $banner['Banner_Id']; ?>" class="btn btn-success">Activate</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $banner['Banner_Id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?php echo $banner['Banner_Id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?php echo $banner['Banner_Id']; ?>">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this banner? This action cannot be undone.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="delete-banner.php?banner_id=<?php echo $banner['Banner_Id']; ?>" class="btn btn-danger">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="4">No banners found.</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
<?php include("footer.php"); ?>
