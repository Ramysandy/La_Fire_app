<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title> Fire Recovery: Home Inventory Dashboard
    </title>
</head>

<body>
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
                    <a class="navbar-brand" href="../index.html">Recovery</a>
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
                                                <a class="nav-link" href="../index.html"><i class="fa fa-fw fa-home"></i> Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="pages/b1.php"><i class="fa fa-fw fa-plus"></i> Log Items</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="pages/b6.php"><i class="fas fa-download"></i> Export Items</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="pages/b5.php"><i class="fas fa-check-square"></i>Claim Status</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="pages/b2.php"><i class="fas fa-search"></i> Find Resources</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="pages/b3.php"><i class="fas fa-sign-out-alt"></i> Quick Help</a>
                                            
                                </li>
                                <li class="nav-item">
                                                <a class="nav-link" href="index.html"><i class="fa fa-fw fa-home"></i> Logout</a>
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
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title"> Fire Recovery: Home Inventory Dashboard
                                </h2>
                                <p class="pageheader-text"> The Recovery: Home Inventory Dashboard is a tool designed to help Los Angeles residents affected by fires efficiently document, track, and manage their lost or recovered belongings. <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"> Fire Recovery: Home Inventory 
</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <?php
// Include database connection
include 'config.php';

// Fetch data from inventory table
$inventory_query = "SELECT COUNT(*) as total_items, SUM(item_value) as total_value FROM inventory";
$inventory_result = $conn->query($inventory_query);
$inventory_data = $inventory_result->fetch_assoc();

// Fetch data from user_claims table
$claims_query = "SELECT COUNT(*) as total_approved_items, SUM(total_value) as total_approved_value FROM user_claims WHERE status = 'Approved'";
$claims_result = $conn->query($claims_query);
$claims_data = $claims_result->fetch_assoc();

// Calculate average value per item
$avg_value = $inventory_data['total_value'] / $inventory_data['total_items'];

// Close database connection
$conn->close();
?>

<div class="ecommerce-widget">
    <div class="row">
        <!-- Total Items Documented -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                <h5 class="text-muted" style="font-weight: bold; color:#900C3F ;">Total Items Logged</h5>

                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1" style="font-weight: bold; color: #900C3F ;"><?php echo number_format($inventory_data['total_items']); ?></h1>
                    </div>
                </div>
            </div>
        </div>
          <!-- Avg. Value Per Item -->
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted" style="font-weight: bold; color:#900C3F ;">Avg Value Per Items Logged</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1" style="font-weight: bold; color: #900C3F ;">$<?php echo number_format($avg_value, 2); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- Items Recovered -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted" style="font-weight: bold; color: #001e67;">Items Claimed (Approved)</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1" style="font-weight: bold; color: #001e67;"><?php echo number_format($claims_data['total_approved_items']); ?></h1>
                    </div>
                </div>
            </div>
        </div>
       
        <!-- Items Lost -->
        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-muted" style="font-weight: bold; color: #001e67;">Total Value Claimed </h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1" style="font-weight: bold; color: #001e67;">$<?php echo number_format($claims_data['total_approved_value'], 2); ?></h1>
                    </div>
                </div>
            </div>
        </div>
       
       
    </div>
</div>


                      
                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header" style="font-weight: bold; color: #581845;" >Realtime Map of Wild fire</h5>
                                    <div class="card-body p-0">
                                        <!-- Embedded Website -->
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" 
                                                    src="https://www.arcgis.com/apps/webappviewer/index.html?id=2a2f0086b9704121bef9be969d631d54" 
                                                    allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            <?php
                            // Include database connection
                            include 'config.php';
                            
                            // Fetch resources from the database
                            $sql = "SELECT id, name, type FROM resources WHERE name != 'Unknown' AND type IN ('shelters', 'food', 'medical') LIMIT 7";
                            $result = $conn->query($sql);
                            
                            // Check if any data is returned
                            if ($result->num_rows > 0) {
                                // Fetch and display resources
                                $resources = [];
                                while ($row = $result->fetch_assoc()) {
                                    $resources[] = $row;
                                }
                            } else {
                                // Fetch all resources if specific filter fails
                                $sql = "SELECT id, name, type FROM resources WHERE name != 'Unknown' LIMIT 5";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $resources[] = $row;
                                }
                            }
                            
                            ?>
                            
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header" style="font-weight: bold; color: #B59410;">Find Resources</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table no-wrap p-table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">Category</th>
                                                        <th class="border-0">Percentage Distribution</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Display rows based on fetched data
                                                    if (isset($resources)) {
                                                        foreach ($resources as $resource) {
                                                            echo "<tr>";
                                                            echo "<td>" . htmlspecialchars($resource['name']) . "</td>";
                                                            echo "<td>" . htmlspecialchars($resource['type']) . "</td>";
                                                            echo "</tr>";
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td colspan="2">
                                                            <a href="pages/b2.php" class="btn btn-outline-light float-right">Details</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php
                            // Close the database connection
                            $conn->close();
                            ?>
                            
                                
                            
                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->






                            


                        </div>



                        <div class="row">
                            <!-- ============================================================== -->
                      
                            <!-- ============================================================== -->

                                          <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <?php
// Include database connection
include 'config.php';

// Fetch recently added items from the inventory table
$sql = "SELECT id, item_name, item_category, item_photo, item_value, created_at FROM inventory ORDER BY created_at DESC LIMIT 5";
$result = $conn->query($sql);

?>

<div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header" style="font-weight: bold; color:#FF69B4;">Recently Documented Items</h5>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-light">
                        <tr class="border-0">
                            <th class="border-0">#</th>
                       
                            <th class="border-0">Item Name</th>
                            <th class="border-0">Category</th>
                            <th class="border-0">Estimated Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td><?= $counter++; ?></td>
                                   

                                    <td><?= htmlspecialchars($row['item_name']); ?></td>
                                    <td><?= htmlspecialchars($row['item_category']); ?></td>
                                    <td>$<?= number_format($row['item_value'], 2); ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo '<tr><td colspan="5" class="text-center">No items found</td></tr>';
                        }
                        ?>
                        <tr>
                            <td colspan="5">
                                <a href="pages/b1.php" class="btn btn-outline-light float-right">View Details</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Close the database connection
$conn->close();
?>

                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

    
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- customer acquistion  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header"style="font-weight: bold; color:	#008000;" >Quick Links</h5>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                <a href="https://www.lafd.org/" target="_blank">  <strong>Call 911</strong><br>
                </a>
                </li>
                <li class="list-group-item">
                <a href="https://www.lafd.org/contact" target="_blank">    <strong>Local Fire Department</strong><br>
                 </a>
                </li>
                <li class="list-group-item">
                <a href="https://www.insurance.ca.gov/" target="_blank">      <strong>Insurance Claim Guide</strong><br>
               </a>
                </li>
                <li class="list-group-item">
                <a href="https://www.lafd.org/safety" target="_blank">   <strong>Fire Safety Tips</strong><br>
            </a>
                </li>
                <li class="list-group-item">
                <a href="https://www.fire.lacounty.gov/" target="_blank">    <strong>Emergency Evacuation Plan</strong><br>
                </a>
                </li>
            </ul>
        
                                 <center>                        <a href="pages/b2.php" class="btn btn-outline-light float-right">Details</a>
                                                      
                                 </center>      </div>
    </div>
</div>

                            <!-- ============================================================== -->
                            <!-- end customer acquistion  -->
                            <!-- ============================================================== -->






                            


                        </div>




                        <div class="row">
                            <!-- ============================================================== -->
              				                        <!-- product category  -->
                            <!-- ============================================================== -->

                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header" style="font-weight: bold; color:#FF69B4;">Product Category</h5>
        <div class="card-body">
            <div id="donut-chart" style="height: 315px;"></div>
            <div class="text-center m-t-40" id="legend"></div>
        </div>
    </div>
</div>

<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
    // Fetch data from server
    fetch('fetch_inventory_data.php')
    .then(response => response.json())
    .then(data => {
        createDonutChart(data);
    });

    function createDonutChart(data) {
        const containerWidth = document.getElementById('donut-chart').offsetWidth;
        const containerHeight = 315;
        const margin = 40;
        const radius = Math.min(containerWidth, containerHeight) / 2 - margin;

        // Clear existing content
        d3.select("#donut-chart").html("");

        // Prepare the SVG container for the donut chart
        const svg = d3.select("#donut-chart")
            .append("svg")
            .attr("width", '100%')
            .attr("height", containerHeight)
            .attr("viewBox", `0 0 ${containerWidth} ${containerHeight}`)
            .attr("preserveAspectRatio", "xMidYMid meet")
            .append("g")
            .attr("transform", `translate(${containerWidth / 2},${containerHeight / 2})`);

        // Calculate category percentages
        const categoryCounts = data.reduce((acc, item) => {
            acc[item] = (acc[item] || 0) + 1;
            return acc;
        }, {});

        const totalCount = data.length;

        const categoryPercentages = Object.entries(categoryCounts).map(([category, count]) => ({
            category,
            percentage: (count / totalCount) * 100
        }));

        const color = d3.scaleOrdinal()
            .domain(categoryPercentages.map(d => d.category))
            .range(['#FF69B4', '#FF1493', '#DB7093', '#C71585', '#FF69B4']);


        // Create the donut chart arcs
        const pie = d3.pie().value(d => d.percentage);
        const arc = d3.arc().innerRadius(radius * 0.6).outerRadius(radius);

        const arcs = svg.selectAll(".arc")
            .data(pie(categoryPercentages))
            .enter()
            .append("g")
            .attr("class", "arc");

        // Draw the arcs with animation
        arcs.append("path")
            .attr("d", arc)
            .attr("fill", d => color(d.data.category))
            .transition()
            .duration(1000)
            .attrTween("d", function(d) {
                const interpolate = d3.interpolate({startAngle: 0, endAngle: 0}, d);
                return function(t) {
                    return arc(interpolate(t));
                };
            });

        // Create the legend
        const legend = d3.select("#legend");
        legend.html(""); // Clear existing legend

        categoryPercentages.forEach((d, i) => {
            const legendItem = legend.append("span").attr("class", "legend-item mr-3");
            legendItem.append("span")
                .attr("class", "fa-xs mr-1 legend-tile")
                .style("display", "inline-block")
                .style("width", "10px")
                .style("height", "10px")
                .style("background-color", color(d.category));
            legendItem.append("span")
                .attr("class", "legend-text")
                .text(`${d.category} (${d.percentage.toFixed(1)}%)`);
        });
    }

    // Resize function
    function resizeDonutChart() {
        fetch('fetch_inventory_data.php')
        .then(response => response.json())
        .then(data => {
            createDonutChart(data);
        });
    }

    // Add event listener for window resize
    window.addEventListener('resize', resizeDonutChart);
</script>


                            
                            <!-- ============================================================== -->
                            <!-- end product category  -->
                                   <!-- product sales  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0" style="font-weight: bold; color:#800080;">Product and Claim Analytics</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>Inventory by Category</h6>
                    <div style="height: 250px;">
                        <canvas id="inventoryChart"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <h6>Claims by Status</h6>
                    <div style="height: 250px;">
                        <canvas id="claimsChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    fetch('a1.php')
        .then(response => response.json())
        .then(data => createInventoryChart(data));

    fetch('a2.php')
        .then(response => response.json())
        .then(data => createClaimsChart(data));
});

function createInventoryChart(data) {
    const ctx = document.getElementById('inventoryChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(item => item.category),
            datasets: [{
                label: 'Item Value',
                data: data.map(item => item.value),
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Value'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Item Categories'
                    }
                }
            }
        }
    });
}

function createClaimsChart(data) {
    const ctx = document.getElementById('claimsChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: data.map(item => item.status),
            datasets: [{
                label: 'Total Value',
                data: data.map(item => item.value),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Value'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Claim Status'
                    }
                }
            }
        }
    });
}
</script>


                            <!-- ============================================================== -->
                            <!-- end product sales  -->
                            <!-- ============================================================== -->
                           
                                <!-- ============================================================== -->
                                <!-- end top perfomimg  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
    <div class="card">
        <h5 class="card-header" style="font-weight: bold; color: #3498db;">Claimed Object Status</h5>
        <div class="card-body">
            <div id="claim-status-donut-chart" style="height: 315px;"></div>
            <div class="text-center m-t-40" id="claim-status-legend"></div>
        </div>
    </div>
</div>

<script src="https://d3js.org/d3.v7.min.js"></script>
<script>
    fetch('fetch_claim_status.php')
    .then(response => response.json())
    .then(data => {
        createClaimStatusDonutChart(data);
    });

    function createClaimStatusDonutChart(data) {
        const containerWidth = document.getElementById('claim-status-donut-chart').offsetWidth;
        const containerHeight = 315;
        const margin = 40;
        const radius = Math.min(containerWidth, containerHeight) / 2 - margin;

        d3.select("#claim-status-donut-chart").html("");

        const svg = d3.select("#claim-status-donut-chart")
            .append("svg")
            .attr("width", '100%')
            .attr("height", containerHeight)
            .attr("viewBox", `0 0 ${containerWidth} ${containerHeight}`)
            .attr("preserveAspectRatio", "xMidYMid meet")
            .append("g")
            .attr("transform", `translate(${containerWidth / 2},${containerHeight / 2})`);

        const statusCounts = data.reduce((acc, item) => {
            acc[item.status] = (acc[item.status] || 0) + 1;
            return acc;
        }, {});

        const totalCount = data.length;

        const statusPercentages = Object.entries(statusCounts).map(([status, count]) => ({
            status,
            percentage: (count / totalCount) * 100
        }));

        const color = d3.scaleOrdinal()
            .domain(statusPercentages.map(d => d.status))
            .range(['#87CEEB', '#00BFFF', '#1E90FF', '#4169E1', '#6495ED']);


        const pie = d3.pie().value(d => d.percentage);
        const arc = d3.arc().innerRadius(radius * 0.6).outerRadius(radius);

        const arcs = svg.selectAll(".claim-status-arc")
            .data(pie(statusPercentages))
            .enter()
            .append("g")
            .attr("class", "claim-status-arc");

        arcs.append("path")
            .attr("d", arc)
            .attr("fill", d => color(d.data.status))
            .transition()
            .duration(1000)
            .attrTween("d", function(d) {
                const interpolate = d3.interpolate({startAngle: 0, endAngle: 0}, d);
                return function(t) {
                    return arc(interpolate(t));
                };
            });

        const tooltip = d3.select("body").append("div")
            .attr("class", "claim-status-tooltip")
            .style("position", "absolute")
            .style("background", "#fff")
            .style("border", "1px solid #ccc")
            .style("padding", "5px")
            .style("border-radius", "5px")
            .style("opacity", 0);

        arcs.on("mouseover", function(event, d) {
            tooltip.transition()
                .duration(200)
                .style("opacity", .9);
            tooltip.html(`${d.data.status}: ${d.data.percentage.toFixed(1)}%`)
                .style("left", (event.pageX) + "px")
                .style("top", (event.pageY - 28) + "px");
        })
        .on("mouseout", function(d) {
            tooltip.transition()
                .duration(500)
                .style("opacity", 0);
        });

        const legend = d3.select("#claim-status-legend");
        legend.html("");

        statusPercentages.forEach((d, i) => {
            const legendItem = legend.append("span").attr("class", "legend-item mr-3");
            legendItem.append("span")
                .attr("class", "fa-xs mr-1 legend-tile")
                .style("display", "inline-block")
                .style("width", "10px")
                .style("height", "10px")
                .style("background-color", color(d.status));
            legendItem.append("span")
                .attr("class", "legend-text")
                .text(`${d.status} (${d.percentage.toFixed(1)}%)`);
        });
    }

    function resizeClaimStatusDonutChart() {
        fetch('fetch_claim_status.php')
        .then(response => response.json())
        .then(data => {
            createClaimStatusDonutChart(data);
        });
    }

    window.addEventListener('resize', resizeClaimStatusDonutChart);
</script>

                           
                        </div>

             
                        







            
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>
 
</html>