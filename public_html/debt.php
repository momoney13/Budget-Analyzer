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

<!-- ORIGINAL CODE: Debt Payoff Planner form -->
<!-- AI-ASSISTED: Added container, CSS classes,
     descriptions, and improved form layout -->

<div class="debt-container">

    <h2>Debt Payoff Planner</h2>

    <p>Calculate your monthly payment and plan
        your path to becoming debt-free.</p>

    <form method="POST" action="" class="debt-form">

        <h3>Your Debt Information</h3>

        <!-- ORIGINAL: Debt balance input -->
        <label for="num1">Remaining Debt Balance</label>
        <input type="number" step="any" min="0.01"
               name="num1" id="num1" required>

        <!-- ORIGINAL: Interest rate input -->
        <label for="num2">Annual Interest Rate</label>
        <p class="input-help">
            Enter as a decimal (Example: 5% = 0.05)
        </p>
        <input type="number" min="0" max="0.999"
               step="0.0001" placeholder="0.05"
               name="num2" id="num2" required>

        <!-- ORIGINAL: Number of months input -->
        <label for="num3">Months Until Debt-Free</label>
        <input type="number" step="1" min="1"
               name="num3" id="num3" required>

        <!-- ORIGINAL: Submit button -->
        <input type="submit" name="submit"
               value="Calculate Monthly Payment">

    </form>
</div>


<?php
// ORIGINAL CODE: Check if the form has been submitted
if (isset($_POST['submit'])) {

    // ORIGINAL CODE: Retrieve user inputs
    $number1 = (float)$_POST['num1'];
    $number2 = (float)$_POST['num2'];
    $number3 = (int)$_POST['num3'];

    // AI-ASSISTED: Validate inputs before calculation
    if ($number1 > 0 && $number2 >= 0 &&
        $number2 <= 0.999 && $number3 > 0) {

        // ORIGINAL CODE: Monthly interest rate
        $step1 = $number2 / 12;

        // AI-ASSISTED: Handle zero interest
        if ($step1 == 0) {
            $step7 = $number1 / $number3;
        } else {

            // ORIGINAL CODE: Amortization formula
            $step2 = 1 + $step1;
            $step3 = $step2 ** $number3;
            $step4 = $step3 * $step1;
            $step5 = $step3 - 1;
            $step6 = $step4 / $step5;
            $step7 = $step6 * $number1;
        }

        // ORIGINAL CODE: Round payment upward
        $step7clean = ceil($step7 * 100) / 100;
        $step7final = number_format($step7clean, 2);
        $step2int = $number2 * 100;

        // AI-ASSISTED: Display result in styled card
        echo '<div class="debt-results">';

        echo '<h2>Your Debt Payoff Results</h2>';

        echo '<p>Estimated Monthly Payment</p>';

        echo '<div class="debt-payment">$'
            . $step7final . '</div>';

        echo '<p>To pay off your debt of $'
            . number_format($number1, 2)
            . ' in ' . $number3
            . ' months at an annual interest rate of '
            . $step2int . '%, you should pay approximately $'
            . $step7final . ' per month.</p>';

        echo '</div>';

    } else {
        // AI-ASSISTED: Invalid input message
        echo '<p class="debt-error">
              Please enter valid debt information.
              </p>';
    }
}
?>

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


<!-- ORIGINAL FEATURE: Seasonal Financial Advice -->
<!-- AI-ASSISTED: Added styling and layout -->

<div class="seasonal-container">

    <h2>Seasonal Financial Advice</h2>

    <p>Select a month to receive budgeting advice
        for that time of year.</p>

    <form method="POST" action="" class="seasonal-form">

        <label for="month-select">Choose a Month</label>

        <!-- ORIGINAL: Month selection dropdown -->
        <select name="month" id="month-select" required>

            <option value="">-- Select a Month --</option>

            <?php
            // ORIGINAL CODE: Generate dropdown options
            foreach ($monthMessages as $month => $message) {
                $selected = ($month === $selectedMonth)
                    ? "selected" : "";

                echo "<option value=\"$month\" $selected>"
                    . "$month</option>";
            }
            ?>

        </select>

        <button type="submit">Get Financial Advice</button>

    </form>

    <!-- ORIGINAL: Display selected month's message -->
    <!-- AI-ASSISTED: Styled result container -->
    <?php if (!empty($messageDisplay)): ?>

        <div class="seasonal-message">
            <p><?php echo $messageDisplay; ?></p>
        </div>

    <?php endif; ?>

</div>

</body>
</html>