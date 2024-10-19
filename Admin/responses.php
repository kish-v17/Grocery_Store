<?php include("sidebar.php"); 
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '';

if (!empty($search)) {
    $search_query = "WHERE Response_Id LIKE '%$search%' OR Name LIKE '%$search%' OR Email LIKE '%$search%' OR Phone LIKE '%$search%' OR Message LIKE '%$search%'";
}

$query = "SELECT Response_Id, Name, Email, Phone, Message FROM responses_tbl $search_query";
$result = mysqli_query($con, $query);
$total_records = mysqli_num_rows($result);

$records_per_page = 10;
$total_pages = ceil($total_records / $records_per_page);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start_from = ($page - 1) * $records_per_page;

$query = "SELECT Response_Id, Name, Email, Phone, Message, Reply FROM responses_tbl $search_query LIMIT $start_from, $records_per_page";
$result = mysqli_query($con, $query);
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                <div>
                    <h1>Responses</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Responses</li>
                    </ol>
                </div>
            </div>
            <div class="card-body">
                <table class="table border text-nowrap">
                    <thead class="table-light">
                        <tr>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Message</th>
                            <th>Reply</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(mysqli_num_rows($result))
                    {
                        while($response = mysqli_fetch_assoc($result))
                        {
                            ?>
                        <tr>
                            <td><?php echo $response["Name"]; ?></td>
                            <td><?php echo $response["Email"]; ?></td>
                            <td><?php echo $response["Phone"]; ?></td>
                            <td style="max-width: 250px;" class="text-wrap"><?php echo $response["Message"]; ?></td>
                            <td style="max-width: 250px; word-wrap: break-word;" class="text-wrap"><?php echo $response["Reply"]; ?></td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    <?php if(!$response['Reply']){ ?>
                                        <button class="btn btn-primary btn-sm me-1" data-bs-toggle="modal" data-bs-target="#replyModal<?php echo $response["Response_Id"]; ?>">Reply</button>
                                    <?php } ?>
                                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $response["Response_Id"]; ?>">Delete</button>
                                </div>
                            </td>
                        </tr>
                        <?php if(!$response['Reply']){ ?>
                        <!-- Reply Modal -->
                        <div class="modal fade" id="replyModal<?php echo $response["Response_Id"]; ?>" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="replyModalLabel">Reply to Response</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="response-reply.php" method="POST">
                                                <div class="mb-3">
                                                    <label for="subject" class="form-label">Subject</label>
                                                    <input type="text" class="form-control" id="subject" name="subject" >
                                                </div>
                                                <input type="hidden" name="response_id" value="<?php echo $response["Response_Id"];; ?>">
                                                <div class="mb-3">
                                                    <label for="message" class="form-label">Message</label>
                                                    <textarea class="form-control" id="message" name="message" rows="3" ></textarea>
                                                </div>
                                                <input type="hidden" name="email_id" value="<?php echo $response["Email"]; ?>">
                                                <button type="submit" class="btn btn-primary">Send</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php } ?>
                            <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal<?php echo $response["Response_Id"]; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this category? This action cannot be undone.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <a href="delete-response.php?response_id=<?php echo $response["Response_Id"]; ?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <?php
                        }
                    ?>
                    </tbody>
                        <?php
                    }
                    else{
                        echo "<td colspan='5'>There is no response to display!</td>";
                    }
                ?>
                
                </table>
            </div>
            <div class="d-flex justify-content-end">
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        
                        <?php 
                            if ($page > 1) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page - 1)."&search=" . $search . "''>Previous</a></li>";
                            }
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li class='page-item " . ($i == $page ? 'active' : '') . "'><a class='page-link' href='?page=" . $i . "&search=" . $search . "'>" . $i . "</a></li>";
                            }
                            if ($page < $total_pages) {
                                echo "<li class='page-item'><a class='page-link' href='?page=".($page + 1)."&search=" . $search . "''>Next</a></li>";
                            }
                        ?>
                    </ul>
                </nav>
            </div> 
        </div>
    </main>


<?php include("footer.php") ?>
