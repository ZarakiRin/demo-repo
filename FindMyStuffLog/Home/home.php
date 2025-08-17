<?php
$conn = new mysqli("localhost", "root", "", "ijan");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize counts
$lost = $claimed = $pending = 0;

// Query counts per status
$sql = "SELECT status, COUNT(*) as count FROM items GROUP BY status";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    switch ($row['status']) {
        case 'lost': $lost = $row['count']; break;
        case 'claimed': $claimed = $row['count']; break;
        case 'pending': $pending = $row['count']; break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../Home/Home.css">
    <link rel="stylesheet" href="../Dashboard/dashboard.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <title>Users</title>
</head>
<body>
    <?php include '../Dashboard/dashboard.php'; ?>


    
<main>

        <h1>Dashboard</h1>
    <div class="date">
            <input type="date">
        </div>

        <div class="insights">
            <div class="card">
                <div class="top">
                    <span class="material-symbols-outlined icon">bar_chart</span>
                    <div class="progress">
                        <svg>
                            <circle class="bg-circle" cx='38' cy='38' r='36'></circle>
                            <circle class="value-circle" cx='38' cy='38' r='36' style="stroke-dasharray: 226; stroke-dashoffset: 43;"></circle>
                        </svg>
                    </div>
                </div>
                <div class="bottom">
                    <div class="details">
                        <h3>Total Item Lost</h3>
                        <h1><?= $lost ?></h1>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                    <div class="percentage">
                        81%
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="top">
                    <span class="material-symbols-outlined icon">bar_chart</span>
                    <div class="progress">
                        <svg>
                            <circle class="bg-circle" cx='38' cy='38' r='36'></circle>
                            <circle class="value-circle" cx='38' cy='38' r='36' style="stroke-dasharray: 226; stroke-dashoffset: 85;"></circle>
                        </svg>
                    </div>
                </div>
                <div class="bottom">
                    <div class="details">
                        <h3>Total Item Claimed</h3>
                        <h1><?= $claimed ?></h1>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                    <div class="percentage">
                        62%
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="top">
                    <span class="material-symbols-outlined icon">trending_up</span>
                    <div class="progress">
                        <svg>
                            <circle class="bg-circle" cx='38' cy='38' r='36'></circle>
                            <circle class="value-circle" cx='38' cy='38' r='36' style="stroke-dasharray: 226; stroke-dashoffset: 128;"></circle>
                        </svg>
                    </div>
                </div>
                <div class="bottom">
                    <div class="details">
                        <h3>Total Item Pending</h3>
                        <h1><?= $pending ?></h1>
                        <small class="text-muted">Last 24 Hours</small>
                    </div>
                    <div class="percentage">
                        44%
                    </div>
                </div>
            </div>
        </div>
        </main>
</body>
</html>