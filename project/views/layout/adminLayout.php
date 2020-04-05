<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <link rel="stylesheet" href="css/adminLayout.css">
    <link rel="stylesheet" href="css/adminMenu.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="header">
        <h1>project</h1>
        <h2>Admin Panel</h2>
    </div>
    <div class="main">
        <div class="menu">
            <?php
             include 'views/layout/adminMenu.php';
            ?>
        </div>
        <div class="content">
            <?php
              renderBody();
            
            ?>
        </div>
    </div>
    <div class="footer">
        copyright @adminPanel <?php print date("Y")?>
    </div>
</body>
</html>