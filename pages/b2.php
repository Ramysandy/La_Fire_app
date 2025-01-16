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
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <h3 class="text-center mb-4 text-primary font-weight-bold">Lost & Found: Fire Recovery Companion</h3>
                    
                    <!-- Home Screen - Main Options -->
                    

                    <!-- Find Resources Section -->
                    <h3 class="text-center mb-4">Find Resources</h3>
                    <p class="lead text-center text-muted">Use this page to locate nearby resources such as shelters, donation centers, and fire relief organizations.</p>
                    <div class="row mb-4 justify-content-center">
    <div class="col-md-8 col-sm-12 text-center">
        <form method="POST" action="" class="w-100">
            <div class="row">
                <div class="col-md-6 col-12 mb-3">
                    <button type="submit" name="resource-type" value="shelters" class="btn btn-outline-primary btn-lg btn-block py-4 px-3" style="border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-size: 1.2rem; transition: transform 0.2s ease-in-out; width: 100%;">Find Shelters</button>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <button type="submit" name="resource-type" value="donation" class="btn btn-outline-success btn-lg btn-block py-4 px-3" style="border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-size: 1.2rem; transition: transform 0.2s ease-in-out; width: 100%;">Find Donation Centers</button>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <button type="submit" name="resource-type" value="medical" class="btn btn-outline-danger btn-lg btn-block py-4 px-3" style="border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-size: 1.2rem; transition: transform 0.2s ease-in-out; width: 100%;">Find Medical Aid</button>
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <button type="submit" name="resource-type" value="food" class="btn btn-outline-warning btn-lg btn-block py-4 px-3" style="border-radius: 12px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); font-size: 1.2rem; transition: transform 0.2s ease-in-out; width: 100%;">Find Food Distribution</button>
                </div>
            </div>
        </form>
    </div>
</div>

                    <?php
                    // Include database configuration
                    include '../config.php';

                    // Function to fetch data from Overpass API
                    function fetchOSMData($type) {
                        $queries = [
                            'shelters' => '[out:json];node["amenity"="shelter"](34.0522,-118.2437,34.2622,-118.1437);out;',
                            'donation' => '[out:json];node["amenity"="food_bank"](34.0522,-118.2437,34.2622,-118.1437);out;',
                            'medical' => '[out:json];node["amenity"="hospital"](34.0522,-118.2437,34.2622,-118.1437);out;',
                            'food' => '[out:json];node["amenity"="restaurant"](34.0522,-118.2437,34.2622,-118.1437);out;',
                        ];
                        $url = "https://overpass-api.de/api/interpreter?data=" . urlencode($queries[$type]);
                        return json_decode(file_get_contents($url), true);
                    }

                    // Function to save data with periodic update and duplicate check
                    function saveToDatabase($data, $type, $conn) {
                        foreach ($data['elements'] as $resource) {
                            $name = $resource['tags']['name'] ?? 'Unknown';
                            $description = $resource['tags']['description'] ?? 'No details available.';
                            $lat = $resource['lat'];
                            $lon = $resource['lon'];

                            // Check for existing records
                            $checkQuery = "SELECT id FROM resources WHERE name = ? AND latitude = ? AND longitude = ?";
                            $stmtCheck = $conn->prepare($checkQuery);
                            $stmtCheck->bind_param("sdd", $name, $lat, $lon);
                            $stmtCheck->execute();
                            $stmtCheck->store_result();

                            if ($stmtCheck->num_rows === 0) {
                                // Insert new data
                                $sql = "INSERT INTO resources (name, type, latitude, longitude, description) VALUES (?, ?, ?, ?, ?)";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("ssdds", $name, $type, $lat, $lon, $description);
                                $stmt->execute();
                            }

                            $stmtCheck->close();
                        }
                    }

                    // Handle resource fetching
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['resource-type'])) {
                        $resourceType = $_POST['resource-type'];
                        $data = fetchOSMData($resourceType);

                        if (!empty($data['elements'])) {
                            saveToDatabase($data, $resourceType, $conn);

                            // Display fetched resources
                            foreach ($data['elements'] as $resource) {
                                $name = htmlspecialchars($resource['tags']['name'] ?? 'Unknown');
                                $description = htmlspecialchars($resource['tags']['description'] ?? 'No details available.');
                                $lat = htmlspecialchars($resource['lat']);
                                $lon = htmlspecialchars($resource['lon']);
                                echo "<div class='list-group-item'>";
                                echo "<strong>$name</strong><br>";
                                echo "Latitude: $lat, Longitude: $lon<br>";
                                echo "<small>$description</small>";
                                echo "</div>";
                            }
                        } else {
                            echo "<div class='alert alert-warning'>No resources found for this category.</div>";
                        }
                    }
                    ?>

                    <!-- Resource Categories -->
                   
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