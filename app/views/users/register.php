<!-- <!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cola Dating</title> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
<!-- <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/fileinput.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/user_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Dancing+Script">
</head>


<body>
    <div class="color-lump">
        <div class="container">
            <font color="white" size="7" face="Dancing Script">COLA</font>
        </div>
    </div> -->
<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="input">
    <div class="container2">

        <div class="content">
            <div class="title">Registration</div>
            <form action="<?php echo URLROOT; ?>/users/register" method="post">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Username</span>
                        <input type="text" name="username" class="<?php echo (!empty($data['username_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['username']; ?>" placeholder="Enter your username">
                        <span class="invalid-feedback"><?php echo $data['username_err'] ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Nickname</span>
                        <input type="text" name="nickname" class="<?php echo (!empty($data['nickname_err']) ? 'is-invalid' : ''); ?> " value="<?php echo $data['nickname']; ?>" placeholder="Enter your name">
                        <span class="invalid-feedback"><?php echo $data['nickname_err'] ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" class="<?php echo (!empty($data['email_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['email']; ?>" placeholder="Enter your email">
                        <span class="invalid-feedback"><?php echo $data['email_err'] ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phonenumber" class="<?php echo (!empty($data['phonenumber_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['phonenumber']; ?>" placeholder="Enter your number">
                        <span class="invalid-feedback"><?php echo $data['phonenumber_err'] ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" class="<?php echo (!empty($data['password_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['password']; ?>" placeholder="Enter your password">
                        <span class="invalid-feedback"><?php echo $data['password_err'] ?></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="passwordConfirmation" class="<?php echo (!empty($data['passwordConfirmation_err']) ? 'is-invalid' : ''); ?>" value="<?php echo $data['passwordConfirmation']; ?>" placeholder="Confirm your password">
                        <span class="invalid-feedback"><?php echo $data['passwordConfirmation_err'] ?></span>
                    </div>
                    <div class="mb-3 col-5">
                        <label for="formFile" class="form-label">Select Profile Picture</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                </div>
                <!-- <div class="gender-details is-invalid <?php echo (!empty($data['gender_err']) ? 'is-invalid' : ''); ?>">
                    <input type="radio" name="gender" id="dot-1" value = "Male">
                    <input type="radio" name="gender" id="dot-2" value = "Female">
                    <input type="radio" name="gender" id="dot-3" value = "Other">
                    <span class="invalid-feedback"><?php echo $data['passwordConfirmation_err'] ?></span>
                    <span class="gender-title">Gender</span>
                    
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                        <span class="invalid-feedback"><?php echo $data['passwordConfirmation_err'] ?></span>
                    </div>
                </div> -->


                <div class="button">
                    <input type="submit" value="Register">
                </div>
            </form>
        </div>

        <div>
            <center>Already have an account?</center>
            <a href="<?php echo URLROOT; ?>/users/login" class="link-primary">
                <center>Sign In</center>
            </a>
        </div>

    </div>
</div>


<!--     <form action="<?php echo URLROOT; ?>/users/register" method="POST" class = "vh-100">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="card " id="card">
                        <div class="card-body d-flex flex-column" id="cardbody">
                            <h1 class="mb-4">Registeration</h1>
                            
                            <div class="form-floating">
                                <input class="form-control mb-2" type="text" id="username" name = "username" placeholder="d" required>
                                <label for="username ">Username</label>
                            </div>

                            <div class="form-floating">
                                <input class="form-control mb-2" type="password" id="password" name = "password" placeholder="d" required>
                                <label for="password ">Password</label>
                                <span class="invalid-feedback">dddd</span>
                            </div>

                            <div class="form-floating">
                                <input class="form-control mb-2" type="password" id="passwordconfirm" name = "passwordconfirm" placeholder="d" required>
                                <label for="passwordconfirm ">Password Confirmation</label>
                            </div>

                            <div class="form-floating">
                                <input class="form-control mb-2" type="text" id="nickname" name = "nickname" placeholder="d" required>
                                <label for="nickname ">Nickname</label>
                            </div>

                            <div class="form-floating">
                                <input class="form-control mb-2" type="text" id="phonenumber" name = "phonenumber" placeholder="d" required>
                                <label for="phonenumber ">Phonenumber</label>
                            </div>

                            <div class="form-floating mb-2">
                                <input class="form-control" type="email" id="email" name = "email" placeholder="d" required>
                                <label for="email ">Email</label>
                            </div>

                            <div class="mb-2">
                                <button class="btn btn-outline-primary mt-3 w-100" type="submit" name="submit" id="register">Sign Up</button>
                            </div>

                            <div>Already have an account?
                                <br>
                                <a href="<?php echo URLROOT; ?>/users/login" class="link-primary">Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> -->
<?php require APPROOT . '/views/inc/footer.php'; ?>