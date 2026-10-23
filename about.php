<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About</title>
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
        width: 300px;  /* Adjust size */
        height: auto;
    }
</style>

<nav class="vertical-nav"> <!-- creates vertical buttons for movement between sites -->
    <a href="finances.php" class="nav-btn active">Input your Finances</a> <br>
    <a href="debt.php" class="nav-btn active">Debt Payoff Planner</a> <br>
    <a href="dashboard.php" class="nav-btn active">See Your Spending Dashboard</a> <br>
    <a href="about.php" class="nav-btn active">About Page</a>
</nav> <br> <br>

<br> <br>

<main>
    <h2>About the Personal Budget Analyzer</h2>
    <p>The Personal Budget Analyzer is a web application designed to help people understand their day-to-day finances and make progress toward savings goals. Instead of showing a single calculation, it brings together income, expenses, and savings information so users can review their budget over time.</p>

    <h2>What the application does</h2>
    <p>Users enter income and expenses through forms and organize spending into categories. They can also create savings goals and record progress toward them. The application analyzes the saved information to show totals, compare income with expenses, summarize spending by category, and show how close a user is to each savings target. These results are intended to help users spot spending patterns and decide where they may want to adjust their budget.</p>

    <h2>How it is being developed</h2>
    <p>The application uses HTML to structure its pages and forms, CSS to provide a consistent and readable interface, PHP to process submitted information and perform the budget calculations, and a json flatfile to store the information between visits. The file is the application's external data source: PHP will read and update records there as users add or change their financial information. Keeping the data in a flatfile allows the application to build summaries from multiple entries rather than relying on a one-time form submission.</p>
    <p>Development is organized around the main tasks a user needs to complete: reviewing a dashboard, managing income and expenses, and setting savings goals. The navigation connects these areas, while the shared colors, headings, and layout help the pages feel like one application. Form values will be checked before they are stored, and calculations will use the saved records so that the displayed summaries stay connected to the user's entries.</p>

    <h2>Team contribution</h2>
</main>


</body>
</html>
