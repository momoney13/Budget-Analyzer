<!DOCTYPE html>
<html lang="en">
<head>
    <title>Writing Results from a User Form</title>
</head>
<body>


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

<div style="text-align: center;">
    <?php
    echo "<h2>Here are the variables from the user form</h2>\n";
    ?>
</div>

<div style="text-align: center;">

    <?php
    // Verify that the data was sent via the POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Collect and sanitize user inputs to prevent XSS (Cross-Site Scripting)
        $name = htmlspecialchars(trim($_POST['firstname']));
        $lname = htmlspecialchars(trim($_POST['lastname']));
        $email = htmlspecialchars(trim($_POST['email']));

        // Validate that fields are not empty
        if (!empty($name) && !empty($email && !empty($lname))) {

            // Ensure the email format is structurally valid
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<h3>Submission Successful!</h3>";
                echo "Thank you, <b>" . $name . "</b>. We have received your email: <b>" . $email . "</b>.";
                echo
                "<nav> 
    <a href='finances.php' class='nav-btn active'>Start Budgeting Your Finances</a> <br> <nav>";


            } else {
                echo "Invalid email format. Please go back and try again.";
                echo
                "<nav> 
    <a href='budgethome.php' class='nav-btn active'>Return to Input Page</a> <br> <nav>";
            }
        } else {
            echo "All fields are required. Please go back and try again.";
            echo
            "<nav> 
    <a href='budgethome.php' class='nav-btn active'>Return to Input Page</a> <br> <nav>";
        }
    } else {
        // Redirect back to the form if accessed directly
        header("Location: budgethome.php");
        exit();
    }
    ?>

</div>

</body>
</html>
