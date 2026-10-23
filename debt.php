<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Debt Tool</title>
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
        width: 300px;  /* Adjusts size */
        height: auto;
    }
</style>

<!-- container for visible elements on a webpage -->
<nav class="vertical-nav"> <!-- creates vertical buttons for movement between sites -->
    <a href="finances.php" class="nav-btn active">Input your Finances</a> <br>
    <a href="debt.php" class="nav-btn active">Debt Payoff Planner</a> <br>
    <a href="dashboard.php" class="nav-btn active">See Your Spending Dashboard</a> <br>
    <a href="about.php" class="nav-btn active">About Page</a>
</nav> <br> <br>

<h2>Debt Payoff Planner</h2>
<!-- The form submits to the same page using the POST method -->
<form method="POST" action="">
    <label for="num1">Enter your remaining debt balance:</label>
    <input type="number" step="any" name="num1" id="num1" required><br><br>

    <label for="num2">Enter the interest rate of your debt as a decimal (Example: 5% as 0.05):</label>
    <input type="number" min="0.00" max="0.999" step="0.0001" placeholder="0.00" name="num2" id="num2" required><br><br>

    <label for="num3">Enter the number of months from now you would like to be debt free (must be a whole number):</label>
    <input type="number" step="1" name="num3" id="num3" required><br><br>
    <br>
    <input type="submit" name="submit" value="Calculate Monthly Payment">
</form>

<?php
// Check if the form has been submitted
if (isset($_POST['submit'])) {
    // Retrieve and sanitize user inputs by casting them to floats (allows decimals)
    $number1 = (float)$_POST['num1'];
    $number2 = (float)$_POST['num2'];
    $number3 = (int)$_POST['num3'];

    // Perform amortization formula math
    $step1 = $number2 / 12;
    $step2 = 1 + $step1;
    $step3 = $step2 ** $number3;
    $step4= $step3 * $step1;
    $step5 = $step3 - 1;
    $step6 = $step4 / $step5;
    $step7 = $step6 * $number1;

    //  Shift decimal, round up to whole integer, shift decimal back
    $step7clean = ceil($step7 * 100) / 100;

// Format to ensure exactly 2 decimal places (handles trailing zeros)
    $step7final = number_format($step7clean, 2);

    $step2int = $number2 * 100 ;

    // Display the result
    echo "<h3>Result:</h3>";
    echo "<p>To Payoff Your Debt of $ $number1 in $number3 Months, with an Interest Rate of $step2int %, Your Monthly Payment Needs to be <strong>$ $step7final </strong>:<p>";
}
?>
<br> <br>


<?php
//  Define the months and their unique messages in an associative array
$monthMessages = [
    "January"   => "Happy Winter, Winter is a good time to budget for the upcoming year!",
    "February"  => "Happy Winter, Winter is a good time to budget for the upcoming year!",
    "March"     => "Happy Spring, It's everyone's favorite time of year. Tax Season! Be sure to file accurately!",
    "April"     => "Happy Spring, It's everyone's favorite time of year. Tax Season! Be sure to file accurately!",
    "May"       => "Happy Spring, It's everyone's favorite time of year. Tax Season! Be sure to file accurately!",
    "June"      => "️Happy Summer, Be cautious of higher leisurely spending this time of year!",
    "July"      => "Happy Summer, Be cautious of higher leisurely spending this time of year!",
    "August"    => "Happy Summer, Be cautious of higher leisurely spending this time of year!",
    "September" => "Happy Fall, Make sure your work benefits are in order and prepare for big holiday spending!",
    "October"   => "Happy Fall, Make sure your work benefits are in order and prepare for big holiday spending!",
    "November"  => "Happy Fall, Make sure your work benefits are in order and prepare for big holiday spending!",
    "December"  => "Happy Winter, Winter is a good time to budget for the upcoming year!"
];

// Initial variables for form submission
$selectedMonth = "";
$messageDisplay = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['month'])) {
    $selectedMonth = $_POST['month'];

    // Check if the selected month exists in the array to prevent errors
    if (array_key_exists($selectedMonth, $monthMessages)) {
        $messageDisplay = "<strong>" . htmlspecialchars($selectedMonth) . ":</strong> " . $monthMessages[$selectedMonth];
    }
}
?>


<h2>Select a Month for Seasonal Financial Advice</h2>

<!-- HTML Form -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="month-select">Choose a month:</label>
    <select name="month" id="month-select" required>
        <option value="">--Please choose an option--</option>

        <?php
        // Loop through the array to dynamically generate the dropdown list options
        foreach ($monthMessages as $month => $message) {
            // Keep the user's selection selected even after submission
            $selected = ($month === $selectedMonth) ? "selected" : "";
            echo "<option value=\"$month\" $selected>$month</option>";
        }
        ?>

    </select>
    <button type="submit">Submit</button>
</form>

<!-- 4. Display the unique message if a selection was made -->
<?php if (!empty($messageDisplay)): ?>
    <div style="margin-top: 20px; padding: 10px; background-color: #f0f0f0; border-left: 5px solid #007BFF;"> <!-- making the message look nice -->
        <p><?php echo $messageDisplay; ?></p>
    </div>
<?php endif; ?>

</body>
</html>
