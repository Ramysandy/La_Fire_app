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
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                      
                            <h3 class="text-center mb-4">Lost & Found: Fire Recovery Companion</h3>
                            
                          
                        <!-- Item Log Form -->
                        <h3 class="text-center mb-4">Log Lost Items</h3>
                        
                        <!-- Instructions -->
                        <p class="lead text-center mb-4">Please log any items you’ve lost in the fire. This will help you with insurance claims, recovery, and the support process.</p>
                        
            <?php
// Include the database configuration file
include '../config.php';

// Feedback variables
$feedback = "";
$feedbackType = ""; // 'success' or 'danger'

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $itemName = $_POST['item-name'];
    $itemCategory = $_POST['item-category'];
    $itemValue = $_POST['item-value'];
    $itemNotes = $_POST['item-notes'];
    $itemPhoto = "uploads/default.jpeg";  // Default image if no photo is uploaded

    // Handle file upload (optional)
    if (isset($_FILES['item-photo']) && $_FILES['item-photo']['error'] == 0) {
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/webp'];
        $fileType = mime_content_type($_FILES['item-photo']['tmp_name']);
        $targetDir = "uploads/";
        $targetFile = $targetDir . uniqid() . "_" . basename($_FILES['item-photo']['name']);

        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['item-photo']['tmp_name'], $targetFile)) {
                $itemPhoto = $targetFile;
            } else {
                $feedback = "Failed to upload the photo. Check folder permissions.";
                $feedbackType = "danger";
            }
        } else {
            $feedback = "Invalid file type. Only JPG, PNG, GIF, and WEBP are allowed.";
            $feedbackType = "danger";
        }
    }

    // Insert data into the database
    if (empty($feedback)) {
        $sql = "INSERT INTO inventory (item_name, item_category, item_photo, item_value, item_notes, created_at) 
                VALUES ('$itemName', '$itemCategory', '$itemPhoto', $itemValue, '$itemNotes', NOW())";

        if ($conn->query($sql) === TRUE) {
            $feedback = "Item added successfully!";
            $feedbackType = "success";
        } else {
            $feedback = "Error: " . $conn->error;
            $feedbackType = "danger";
        }

        $conn->close();
    }
}
?>

<!-- Display feedback alert -->
<?php if (!empty($feedback)): ?>
    <div class="alert alert-<?php echo $feedbackType; ?> mt-4" role="alert">
        <?php echo $feedback; ?>
    </div>
<?php endif; ?>

<!-- Form -->
<form method="POST" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label for="item-name">Item Name</label>
        <input type="text" class="form-control" id="item-name" name="item-name" placeholder="e.g., Laptop, TV, Couch" required>
    </div>
    <div class="form-group mb-3">
        <label for="item-category">Category</label>
        <select class="form-control" id="item-category" name="item-category" required>
            <option value="Electronics">Electronics</option>
            <option value="Furniture">Furniture</option>
            <option value="Documents">Documents</option>
            <option value="Clothing">Clothing</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <div class="form-group mb-3">
        <label for="item-photo">Upload Photo (Optional)</label>
        <input type="file" class="form-control-file" id="item-photo" name="item-photo">
    </div>
    <div class="form-group mb-3">
        <label for="item-value">Estimated Value ($)</label>
        <input type="number" class="form-control" id="item-value" name="item-value" placeholder="Enter estimated value" required>
    </div>
    <div class="form-group mb-3">
        <label for="item-notes">Additional Notes</label>
        <textarea class="form-control" id="item-notes" name="item-notes" rows="3" placeholder="Details, condition, or sentimental value of the item" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100">Add Item</button>
</form>

                        
                        <!-- Saved Items List -->
                        <hr>
                        
                        
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