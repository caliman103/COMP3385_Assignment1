<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5 text-center">
        <div class="row">
            <div class="col-sm-4 col-md-3 col-lg-2">
                <img style="height:120px;" src="images/book-logo-x2.png" class="img-fluid" alt="...">
            </div>
            <div class="col-sm-6 col-md-7 col-lg-7">
                
            </div>
            <div class="mt-3 col-sm-2 col-md-2 col-lg-2">
                <?php if(isset($_SESSION['sessionUser'])): ?>
                    <p><a href="./app/sharedScripts/logout.php">Log Out</a></p> 
                <?php endif; ?>
            </div>
        </div>