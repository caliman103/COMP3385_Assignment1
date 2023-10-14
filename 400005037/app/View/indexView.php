<?php
    require './header.php';
?>
    <div class="container text-center my-5">
        <form action="index.php" method="POST"> 
        <div class="row mt-3">
                <div class="col-md-2 col-lg-1">
                    <label for="email">Email:</label>
                </div>
                <div class="col-md-6 col-lg-5">
                    <input class="border border-2 border-secondary form-control" type="email" name="email" id="email">
                </div>
                <div class="col-md-4 col-lg-3">
                    <p class="text-danger"><strong> <?php if(isset($this->formErrors['email'])) {echo $this->formErrors['email']; } else echo "" ?> </strong></p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2 col-lg-1">
                    <label for="password">Password:</label> 
                </div>
                <div class="col-md-6 col-lg-5">
                    <input class="border border-2 border-secondary form-control" type="password" name="password" id="password">
                </div>
                <div class=" col-md-4 col-lg-3">
                    <p class="text-danger"><strong> <?php if(isset($this->formErrors['password'])) {echo $this->formErrors['password']; } else echo "" ?> </strong></p>
                </div>
            </div>

            <input type="hidden" name="submitted" id="submitted">

            <div class="row m-5">
            <div class="col-4">
                    <a href="./register.php">Sign Up</a>
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" type="submit">Log In</button>
                </div>
            </div>
        </form>

<?php
    require './footer.php';
?>
        
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
