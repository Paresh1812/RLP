<? php 

$error = "";
if(array_key_exists("submit", $_POST))
{
    include("dbcon.php");
    
    if(!$_POST['email'])
    {
        $error .= "An Email Address is Required <br>";
    }

    if(!$_POST['password'])
    {
        $error .= "An password is Required <br>";
    }

    if($error != "")
    {
        $error = "There are error";
    }

    else
    {
        $query = "select * from Login where email = '".mysqli_real_escape_string($con , $_POST['email'])."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_array($result);

        if (@row['Email'] != $_POST['Email'])
        {
            $error = ": There are Error in your Form :<br>";
            $error = "Your Email is Wrong ! Please try Again !!!";
        }

        if(isset($row))
        {
            if ($row['password'] == $_POST['password'])
            {
                header("Location: Main.php");
            }

            else
            {
                $error = ": There are Error in your Form :<br>";
                $error = "Your Password is Wrong ! Please try Again !!!";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charseta = "utf-8">
<meta name = "viewport" content = "width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">"
<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@200&display=swap" rel="stylesheet">

<title>
Coaching Class Managment System
</title>

<style type = "text/css">
.container
{
    text-align: center;
    width: 40px;
    margin-top: 170px;
    font-family: 'Mulish', sans-serif;
    padding: 5px 15px;
    border: 5px solid #054842;
    border-style: outset;
    background: url(free.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

html{
    background: url(free.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover; 
}

body{
    background: none;
}

.heading{
    font-size: 50px;
    font-weight: bold;
    color: black;
    text-decoration: none;
}

.heading1{
    font-size: 30px;
    font-weight: bold;
    color: black;
}
p{
    font-family: 'Mulish', sans-serif;
    font-weight: bold;
    font-size: 150%;
    color: white;
    position: relative;
    top: 8px;
}

</style>

</head>

<body>

<nav class = "navbar fixed-top navbar navbar-dark bg-dark">
<p> Coaching Class Management System</p>
</nav>

<div class="container">
<h1 class="heading"> Login </h1>
<h2 class="heading1"> Coaching Class Management System </h2>

<form method="post">
<fieldset class="form-group">
<input class="form-control border" type="email" required="" name="email" placeholder="Enter Your Email">
</fieldset>

<fieldset class="form-group">
<input class="form-control border" type="password" required="" name="password" placeholder="Enter Your Password">
</fieldset>

<fieldset class="form-group">
<input class="btn btn-dark" type="submit" name="submit" value="Log In">
</fieldset>

<div class="error">
<? php 
if ($error!="")
{
    echo '<div class="alert alert-danger role="alert">' .$error.'</div>';
}
?>




</div>
</form>
<div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>