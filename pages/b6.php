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

// Initialize search query and feedback
$searchQuery = "";
$feedback = "";
$feedbackType = "";

// Check if a search keyword is provided
if (isset($_POST['search-bar']) && !empty($_POST['search-bar'])) {
    $searchQuery = "%" . $_POST['search-bar'] . "%";
    $sql = "SELECT * FROM inventory WHERE 
            item_name LIKE ? OR 
            item_category LIKE ? OR 
            item_value LIKE ? OR 
            item_notes LIKE ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $searchQuery, $searchQuery, $searchQuery, $searchQuery);
} else {
    $sql = "SELECT * FROM inventory";
    $stmt = $conn->prepare($sql);
}

$stmt->execute();
$result = $stmt->get_result();

// Check if there are any results
if ($result->num_rows == 0) {
    $feedback = "No relevant items found.";
    $feedbackType = "danger";
}
?>

<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <h3 class="text-center mb-4">Previously Logged Items</h3>
               
                <!-- Search Bar with Button -->
                <div class="form-group d-flex justify-content-center mb-4">
                    <div class="input-group w-50" style="display: flex; align-items: center; max-width: 500px;">
                        <form method="POST" action="" style="width: 100%; display: flex; align-items: center;">
                            <input type="text" class="form-control" id="search-bar" name="search-bar" placeholder="Search for items..." value="<?php echo isset($_POST['search-bar']) ? $_POST['search-bar'] : ''; ?>" style="border-radius: 10px 0 0 10px; padding: 10px;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" style="border-radius: 0 10px 10px 0; padding: 10px 20px;">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div>
                        </form>
                    </div>
                    <!-- Export Button -->
                    <form method="POST" action="export_pdf.php" target="_blank">
                        <button type="submit" name="export-pdf" class="btn btn-success ml-3" style="padding: 10px 20px;">
                            <i class="fas fa-file-pdf"></i> Export to PDF
                        </button>
                    </form>
                </div>

                <!-- Display feedback alert if no items found -->
                <?php if (!empty($feedback)): ?>
                    <div class="alert alert-<?php echo $feedbackType; ?> mt-4" role="alert">
                        <?php echo $feedback; ?>
                    </div>
                <?php endif; ?>

                <!-- Items List (Dynamically Updated) -->
                <div class="row" id="items-list">
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="col-md-4 mb-4 item-card" data-name="<?php echo htmlspecialchars($row['item_name']); ?>">
                            <div class="card shadow-sm border-light">
                                <img src="<?php echo !empty($row['item_photo']) ? $row['item_photo'] : 'uploads/default.jpeg'; ?>" class="card-img-top mx-auto d-block" alt="Item Image" style="max-width: 100%; height: 200px; object-fit: cover;">
                                <div class="card-body text-center">
                                    <h5 class="card-title font-weight-bold"><?php echo htmlspecialchars($row['item_name']); ?></h5>
                                    <p class="card-text">Estimated Value: $<?php echo number_format($row['item_value'], 2); ?></p>
                                    <p class="card-text">Category: <?php echo htmlspecialchars($row['item_category']); ?></p>
                                    <p class="card-text"><small>Condition: <?php echo htmlspecialchars($row['item_notes']); ?></small></p>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

                <?php
                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>
    </div>
</div>

        
<style>

    /* Custom Styling */
.card {
    border: none;
    border-radius: 10px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.card-img-top {
    border-radius: 10px;
    object-fit: cover;
    width: 100%;
    height: 200px; /* Adjust based on the image size */
}

.card-body {
    padding: 15px;
}

.font-weight-bold {
    font-weight: 600;
}

.input-group {
    max-width: 500px;
    width: 100%;
}

.input-group-append .btn {
    border-radius: 0 10px 10px 0;
}

#search-bar {
    border-radius: 10px 0 0 10px;
}

/* Center the image */
.mx-auto.d-block {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

/* Add shadow to the cards for a better effect */
.card.shadow-sm {
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}

/* Responsive Images */
@media (max-width: 767px) {
    .card-img-top {
        height: 150px;
    }
}

/* Text Alignment */
.card-body h5 {
    text-align: center;
}

.card-body p {
    text-align: center;
}


</style>        
        
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