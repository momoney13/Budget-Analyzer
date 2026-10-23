
<?php
session_start();

$income = $_SESSION['income'] ?? 0;
$rent = $_SESSION['rent'] ?? 0;
$food = $_SESSION['food'] ?? 0;
$transportation = $_SESSION['transportation'] ?? 0;
$miscellaneous = $_SESSION['miscellaneous'] ?? 0;

$totalSpending = $rent + $food + $transportation + $miscellaneous;
$remainingIncome = $income - $totalSpending;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal Budget Analyzer</title>
    <link rel="stylesheet" href="Style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h1>Personal Budget Analyzer</h1>
<h3>Track Your Spending. Build Better Habits.</h3>

<img src="https://cdn.iconscout.com/icon/free/png-512/free-market-icon-svg-download-png-453340.png?f=webp&w=512" class="top-right-corner"> <!-- adds image -->
<!-- puts the image in the top right corner -->
<style>
    .top-right-corner {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 9999; /* Ensures it stays on top of other content */
        width: 100px;  /* Adjust size  */
        height: auto;
    }
</style>

<nav> <!--Start of navigation method-->
    <ul>
        <li><a href="dashboard.php">Home Dashboard</a></li>
        <li><a href="income&expenses.php">Monthly Spending Analyzer</a></li>
        <li><a href="debt.php">Debt Payoff Planner</a></li>
        <li><a href="about.php">About</a></li>
    </ul>
</nav>


<h2 class="dashboard-title">Spending Dashboard</h2>

<div class="dashboard-cards">

    <div class="summary-card">
        <h4>Monthly Income</h4>
        <p>$<?php echo number_format($income, 2); ?></p>
    </div>

    <div class="summary-card">
        <h4>Total Expenses</h4>
        <p>$<?php echo number_format($totalSpending, 2); ?></p>
    </div>

    <div class="summary-card">
        <h4>Remaining Balance</h4>
        <p>$<?php echo number_format($remainingIncome, 2); ?></p>
    </div>

</div>
<!-- AI help with dashboard chart -->
<div class="chart-section">
    <h2>Monthly Spending Breakdown</h2>
    
    <div class="chart-container">

        <canvas id="spendingChart"></canvas>

        <div class="chart-center-text">
            <span>Total Expenses</span>
            <strong>$<?php echo number_format($totalSpending, 2); ?></strong>
        </div>

    </div>

<script>
    const spendingData = {
        labels: ['Rent', 'Food', 'Transportation', 'Miscellaneous'],
        datasets: [{
            data: [
                <?php echo json_encode((float)$rent); ?>,
                <?php echo json_encode((float)$food); ?>,
                <?php echo json_encode((float)$transportation); ?>,
                <?php echo json_encode((float)$miscellaneous); ?>
            ],
            backgroundColor: [
                '#142b4a',
                '#4a90c3',
                '#85b8dc',
                '#c8d8e8'
            ],
            borderWidth: 2
        }]
    };

    new Chart(document.getElementById('spendingChart'), {
        type: 'doughnut',
        data: spendingData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

</body>
</html>