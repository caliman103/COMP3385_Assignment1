<?php
    require './header.php';
?>
        <div class="my-4 row">
            <div class="col-sm-5 col-md-5 col-lg-4">
                <p><?php echo $_SESSION['sessionUser']['role'] . ": ".$_SESSION['sessionUser']['username']?></p>
            </div>
            <div class="col-md-3 col-sm-3 col-lg-5">

            </div>
            <div class="col-sm-3 col-md-4 col-lg-3 ">
                <p>Email:<?php echo " ".$_SESSION['sessionUser']['email']?></p> 
            </div>
        </div>

        <div class="row">
        <?php if(in_array("View All Studies", $this->userPermissions)): ?>
            <div class="m-1 col-sm-4 col-md-3 border border-3 p-3">
                <a class="text-primary" href=".">View All Studies</a> 
            </div>
            <?php endif ?>

            <div class="col-sm-3 col-md -4">

            </div>

            <?php if(in_array("Create New Study", $this->userPermissions)): ?>
            <div class="m-1 col-sm-4 col-md-3  border border-3 p-3">
            <a class="text-warning" href=".">Create New Study</a>
            </div>
            <?php endif; ?>

        </div>

        <div class="row my-4">
        <?php if(in_array("Delete Previous Study", $this->userPermissions)): ?>
            <div class="m-1 col-sm-4 col-md-3  border border-3 p-3">
            <a class="text-info" href=".">Delete Previous Study</a>
            </div>
            <?php endif ?>

            <div class="col-sm-3 col-md -4">
            </div>
            <?php if(in_array("Create New Researchers", $this->userPermissions)): ?>
            <div class="m-1 col-sm-4 col-md-3 border border-3 p-3">
                <a class="text-danger" href="./createUser.php">Create New Researchers</a>
            </div>
            <?php endif ?>
        </div>
                
<?php
    require './footer.php';
?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>