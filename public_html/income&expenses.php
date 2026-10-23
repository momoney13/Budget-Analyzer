<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['income'] = (float) ($_POST['num1'] ?? 0);
    $_SESSION['rent'] = (float) ($_POST['num2'] ?? 0);
    $_SESSION['food'] = (float) ($_POST['num3'] ?? 0);
    $_SESSION['transportation'] = (float) ($_POST['num4'] ?? 0);
    $_SESSION['miscellaneous'] = (float) ($_POST['num5'] ?? 0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Income & Expenses</title>
    <link rel="stylesheet" href="Style.css">
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
        width: 100px;  /* Adjusts size */
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

<div class="analyzer-container"> <!-- AI helped with making form look nicer, Dominic coded all forms -->

    <h2>Monthly Spending Analyzer</h2>
<!-- The form submits to the same page using the POST method -->
<p>Enter your monthly income and expenses
    to analyze your spending habits. Your spending result will generate under the form on submission.</p>

<form method="POST" action="" class="budget-form">

    <h3>Your Financial Information</h3>

    <label for="num1">Monthly Net Income</label>
    <input type="number" step="any" min="0"
           name="num1" id="num1" required>

    <label for="num2">Cost of Rent</label>
    <input type="number" step="any" min="0"
           name="num2" id="num2" required>

    <label for="num3">Cost of Food</label>
    <input type="number" step="any" min="0"
           name="num3" id="num3" required>

    <label for="num4">Cost of Transportation</label>
    <input type="number" step="any" min="0"
           name="num4" id="num4" required>

    <label for="num5">Miscellaneous Spending</label>
    <input type="number" step="any" min="0"
           name="num5" id="num5" required>

    <input type="submit" name="submit"
           value="Calculate Remaining Balance">

</form>
</div>
</form>

<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {

// Get the numbers entered by the user
$number1 = (float)$_POST['num1'];
$number2 = (float)$_POST['num2'];
$number3 = (float)$_POST['num3'];
$number4 = (float)$_POST['num4'];
$number5 = (float)$_POST['num5'];

// Calculate remaining income
$spending = $number1 - ($number2 + $number3 + $number4 + $number5);

// Display the result
    echo '<div class="results-card">';
    echo '<h2>Your Spending Results</h2>';
    echo '<p>Remaining Monthly Income</p>';
    echo '<div class="balance">$' . number_format($spending, 2) . '</div>';
?>


<?php
if ($spending < 0) {
    echo "<p>Your Monthly Spending is Greater Than Your Monthly Income</p>";
} else {
    echo "<p>Your Monthly Spending is Less Than Your Monthly Income</p>";
}

?>

<br>
<?php
echo "<p>Rent Analysis</p>";

if ($number2 > ($number1 * .3)) {
    echo "<p>Based on your monthly income, your rent is higher than recommended (30%). A lower rent may improve your finances.</p>";
} else {
    echo "<p>Your cost of rent is within the recommended percentage (30%) of your monthly income.</p>";
}

?>

<br>
<?php
echo "<p>Food Cost Analysis</p>";

if ($number3 > ($number1 * .15)) {
    echo "<p>Based on your monthly income, your spending on food is higher than recommended (15%). Spending less on food each month may improve your finances.</p>";
} else {
    echo "<p>Your cost of food is within the recommended percentage (15%) of your monthly income.</p>";
}

?>

<br>
<?php
echo "<p>Transportation Cost Analysis</p>";

if ($number4 > ($number1 * .2)) {
    echo "<p>Based on your monthly income, your spending on transportation is higher than recommended (20%). Spending less on transportation each month may improve your finances.</p>";
} else {
    echo "<p>Your cost of transportation is within the recommended percentage (20%) of your monthly income.</p>";
}

?>
<br>
<?php
echo "<p>Miscellaneous Cost Analysis</p>";

if ($number5 > ($number1 * .15)) {
    echo "<p>Based on your monthly income, your spending on miscellaneous is higher than recommended (15%). Lowering extra monthly spending may improve your finances.</p>";
} else {
    echo "<p>Your cost of miscellaneous is within the recommended percentage (15%) of your monthly income.</p>";
}
echo '</div>'; // Closes result-card
} // Ends the form submission condition
?>

<!-- Help of AI, confirmation message on submission of form!-->
<?php if (isset($_POST['submit'])): ?>

    <div class="dashboard-notice">

        <h3>✓ Your Dashboard Has Been Updated!</h3>

        <p>
            Your latest financial information has been saved.
            Visit your Home Dashboard to view your updated
            spending breakdown and financial summary.
        </p>

        <a href="dashboard.php" class="dashboard-button">
            View Home Dashboard
        </a>

    </div>

<?php endif; ?>
</body>
</html>