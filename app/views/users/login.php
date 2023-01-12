<?php require APPROOT . '/views/inc/header.php'; ?>

<div class="input">
    <div class="container">
        <form action="<?php echo URLROOT; ?>/users/login" method="POST" class="">
            <div class="container">
                <div class="row justify-content-evenly align-items-center" id="cardrow">
                    <!-- <div class="col-auto">
                        <img src="<?php echo URLROOT; ?>/img/yeh.jpg" id="IMG_1">
                    </div> -->
                    <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                        <div class="card" id="card">
                            <div class="card-body d-flex flex-column" id="cardbody">
                                <h1 class="mb-4">
                                    <font color="red" size="6" face="Dancing Script">COLA</font>
                                </h1>

                                <div class="form-floating">
                                    <input class="form-control mb-2 <?php echo (!empty($data['username_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['username']; ?>" type="text" name="username" id="username" placeholder="d">
                                    <label for="username ">Username</label>
                                    <span class="invalid-feedback"><?php echo $data['username_err'] ?></span>
                                </div>

                                <div class="form-floating">
                                    <input class="form-control mb-2 <?php echo (!empty($data['password_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['password']; ?>" type="password" name="password" id="password" placeholder="d">
                                    <label for="password ">Password</label>
                                    <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                                </div>
                                <span class="mt-1 w-100" id="message"></span>
                                <div class="mb-2">
                                    <!-- <button class="btn btn-outline-primary mt-3 w-100" type="submit" name="submit" id="login">Sign In</button> -->
                                    <div class="button">
                                        <input type="submit" value="Login">
                                    </div>
                                </div>

                                <div>Don't have an account?
                                    <br>
                                    <a href="<?php echo URLROOT; ?>/users/register" class="link-primary">Sign Up</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>