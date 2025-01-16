<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recovery</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
         <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../index.php">Recovery</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            
                            <li class="nav-item">
                                            <a class="nav-link" href="../index.php"><i class="fa fa-fw fa-home"></i> Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="b1.php"><i class="fa fa-fw fa-plus"></i> Log Items</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="b6.php"><i class="fas fa-download"></i> Export Items</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="b5.php"><i class="fas fa-check-square"></i>Claim Status</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="b2.php"><i class="fas fa-search"></i> Find Resources</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="b3.php"><i class="fas fa-sign-out-alt"></i> Quick Help</a>
                                        
                            </li>
                            <li class="nav-item">
                                            <a class="nav-link" href="../index.php"><i class="fa fa-fw fa-home"></i> Logout</a>
                                        </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <?php
// Include the database configuration file
include '../config.php';

// Function to get all claims for a user
function getUserClaims($conn, $user_id) {
    $sql = "SELECT * FROM user_claims WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to add a new claim
function addNewClaim($conn, $user_id, $status, $items_claimed, $total_value, $progress_percentage, $progress_link, $contact_link) {
    $sql = "INSERT INTO user_claims (user_id, status, items_claimed, total_value, progress_percentage, progress_link, contact_link) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issdiss", $user_id, $status, $items_claimed, $total_value, $progress_percentage, $progress_link, $contact_link);
    return $stmt->execute();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = 0; // Default user_id
    $status = $_POST['status'];
    $items_claimed = $_POST['items_claimed'];
    $total_value = $_POST['total_value'];
    $progress_percentage = $_POST['progress_percentage'];
    $progress_link = $_POST['progress_link'];
    $contact_link = $_POST['contact_link'];

    if (addNewClaim($conn, $user_id, $status, $items_claimed, $total_value, $progress_percentage, $progress_link, $contact_link)) {
        $success_message = "New claim added successfully!";
    } else {
        $error_message = "Error adding new claim. Please try again.";
    }
}

// Fetch user claims (using default user_id = 0)
$user_id = 0;
$claims = getUserClaims($conn, $user_id);
?>

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center mb-4">Claim Progress Tracker - User Overview</h3>

                <!-- Instructions -->
                <p class="lead text-center mb-4">Below is a table of your claims. You can track the progress of each claim and take necessary actions as needed.</p>

                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                <h5>Claim Process Steps</h5>
                                            
                            
                                            <!-- Claim Actions -->
                                            <hr>
                <!-- Claim Table -->
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                     
                            <th>Status</th>
                            <th>Items Claimed</th>
                            <th>Total Estimated Value</th>
                            <th>Progress</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($claims as $index => $claim): ?>
                        <tr>
                            <td><?php echo $index + 1; ?></td>
                         
                            <td><span class="badge badge-<?php echo $claim['status'] == 'Approved' ? 'success' : ($claim['status'] == 'Rejected' ? 'danger' : 'warning'); ?>"><?php echo $claim['status']; ?></span></td>
                            <td><?php echo $claim['items_claimed']; ?></td>
                            <td>$<?php echo number_format($claim['total_value'], 2); ?></td>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: <?php echo $claim['progress_percentage']; ?>%;" aria-valuenow="<?php echo $claim['progress_percentage']; ?>" aria-valuemin="0" aria-valuemax="100">
                                        <?php echo $claim['progress_percentage']; ?>% Complete
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="<?php echo $claim['progress_link']; ?>" class="btn btn-primary btn-sm mb-2" target="_blank">View Details</a><br>
                                <a href="<?php echo $claim['contact_link']; ?>" class="btn btn-secondary btn-sm" target="_blank">Contact Provider</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Action Section -->
                <hr>
                <h5>Next Steps</h5>
                <button class="btn btn-primary w-100 mb-2" data-toggle="modal" data-target="#addClaimModal">Add New Claim</button>
           
            </div>
        </div>
    </div>

    <!-- Add New Claim Modal -->
    <div class="modal fade" id="addClaimModal" tabindex="-1" role="dialog" aria-labelledby="addClaimModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addClaimModalLabel">Add New Claim</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add-claim-form" method="POST" action="">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="In Progress">In Progress</option>
                                <option value="Approved">Approved</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="items_claimed">Items Claimed</label>
                            <input type="text" class="form-control" id="items_claimed" name="items_claimed" placeholder="Enter items separated by commas" required>
                        </div>
                        <div class="form-group">
                            <label for="total_value">Total Estimated Value</label>
                            <input type="number" step="0.01" class="form-control" id="total_value" name="total_value" required>
                        </div>
                        <div class="form-group">
                            <label for="progress_percentage">Progress Percentage</label>
                            <input type="number" class="form-control" id="progress_percentage" name="progress_percentage" min="0" max="100" required>
                        </div>
                        <div class="form-group">
                            <label for="progress_link">Progress Link</label>
                            <input type="url" class="form-control" id="progress_link" name="progress_link" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_link">Contact Provider Link</label>
                            <input type="url" class="form-control" id="contact_link" name="contact_link" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


        
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
</body>
 
</html>