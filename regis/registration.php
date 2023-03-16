<?php 

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            registatation form
        </title>
        <?php include 'css/style.php' ?>
        <?php include 'linkes/link.php' ?>
    </head>

    <body>

    <?php 

    include 'dbcon.php';
    
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con, $_POST['username']) ;
        $email = mysqli_real_escape_string($con,$_POST['email']) ;
        $mobilenumber = mysqli_real_escape_string($con,$_POST['mobilenumber']) ;
        $password = mysqli_real_escape_string($con,$_POST['password']) ;
        $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']) ;

        $pass = password_hash($password,PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword,PASSWORD_BCRYPT);

        $emailquery = "select * from registration where email='$email' ";
        $query = mysqli_query($con,$emailquery);

        $emailcount = mysqli_num_rows($query);

        if($emailcount>0){
            ?>
                        <script>
                            alert("Email is alreday Exist!!!");
                        </script>
                    <?php
        }else{
            if($password === $cpassword){
                $insertquery = "insert into registration (username, email, mobilenumber, password, cpassword) values('$username','$email','$mobilenumber','$pass','$cpass')";

                $iquery = mysqli_query($con, $insertquery);

                if($iquery){
                    ?>
                        <script>
                            alert("Inserted Successfully");
                        </script>
                    <?php
                }else{
                    ?>
                    <script>
                        alert(" Not Successfully");
                    </script>
                <?php
                }

            }else{

                ?>
                        <script>
                            alert("Password are not matched!!!");
                        </script>
                    <?php
            }
        }
    }

    ?>
        <div class="card bg-light">
            <img class="banner">
            <article class="card-body mx-auto" style="max-width: 400px;">
                <h4 class="card-title mt-3 text-center">Create Account</h4>
                <p class="text-center">Get started with your  Account</p>
                <p>
                    <a href="" class="btn btn-block btn-gmail"> <i class="fa fa-google"></i>Login via Gmail</a>
                    <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook"></i>Login via Facebook</a>
                </p>
                <p class="divider-text">
                    <span class="bg-light"> OR</span>
                </p>

                <form  action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i></span>
                        </div>
                        <input name="username" class="form-control" placeholder="Full name" type="text" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i></span>
                        </div>
                        <input name="email" class="form-control" placeholder="Email address" type="email" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i></span>
                        </div>
                        <input name="mobilenumber" class="form-control" placeholder="phone number" type="number" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                        </div>
                        <input class="form-control" placeholder="Create Password" type="password" name="password" value="" required>
                    </div>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i></span>
                        </div>
                        <input class="form-control" placeholder="Repeat Password" type="password" name="cpassword" value="" required>
                    </div>

                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
                    </div>

                    <p class="text-center"> Have an Account ?<a href="login.php">Login in</a></p>
                </form>
            </article>
        </div>
    </body>
</html>