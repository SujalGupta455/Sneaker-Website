<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="thankyou.css">
</head>
<body>
    <div class="thank-you-container">
        <h1>Thank You!</h1>
        <?php
        if (isset($_GET['name'])) {
            $name = htmlspecialchars($_GET['name']);
            echo "<p>Thank you for your order, $name.</p>";
        } else {
            echo "<p>Thank you for your order.</p>";
        }
        ?>
        <a href="index.html" class="button">Continue Shopping</a>
    </div>
</body>
</html>
