<?php
    require './header.php';
?>
<div class="container text-center my-5">
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
        <form action="createUser.php" method="POST">
            <div class="row mt-3">
                <div class="col-md-2 col-lg-3">
                    <label for="username">Username:</label>
                </div>
                <div class="col-md-6 col-lg-4">
                    <input class="border border-2 border-secondary form-control" type="text" name="username" id="username">
                </div>
                <div class="col-md-4 col-lg-3">
                    <p class="text-danger"><strong> <?php if(isset($this->formErrors['username'])) {echo $this->formErrors['username']; } else echo "" ?> </strong></p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2 col-lg-3">
                    <label for="email">Email:</label>
                </div>
                <div class="col-md-6 col-lg-4">
                    <input class="border border-2 border-secondary form-control" type="email" name="email" id="email">
                </div>
                <div class="col-md-4 col-lg-3">
                    <p class="text-danger"><strong> <?php if(isset($this->formErrors['email'])) {echo $this->formErrors['email']; } else echo "" ?> </strong></p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2 col-lg-3">
                    <label for="password">Password:</label> 
                </div>
                <div class="col-md-6 col-lg-4">
                    <input class="border border-2 border-secondary form-control" type="password" name="password" id="password">
                </div>
                <div class=" col-md-4 col-lg-3">
                    <p class="text-danger"><strong> <?php if(isset($this->formErrors['password'])) {echo $this->formErrors['password']; } else echo "" ?> </strong></p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-2 col-lg-3">
                    <label for="role">Role:</label> 
                </div>
            <div class="col-md-6 col-lg-4">
                <select class="border border-2 border-secondary form-select text-center" aria-label="Default select example" name="role" id="role">
                    <option value="">Choose Role</option>
                    <option value="Research Study Manager">Research Study Manager</option>
                    <option value="Researcher">Researcher</option>
                </select>
            </div>
            <div class=" col-md-4 col-lg-3">
                <p class="text-danger"><strong> <?php if(isset($this->formErrors['role'])) {echo $this->formErrors['role']; } else echo "" ?> </strong></p>
            </div>
            </div>

            <input type="hidden" name="submitted" id="submitted">

            <div class="row mt-3">
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Register</button>
                </div>
            </div>
        </form>

<?php
    require './footer.php';
?>