<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

<?php
session_start();
include('db.php');

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $pattern  = '/^[a-zA-Z0-9]{3,20}$/';
    $emptyerr = $nameerr = $passworderr =  '';

    if(empty($name) || empty($password)) {
        $emptyerr =  'Inputs Are Required';
    } else {
        if(!preg_match($pattern , $name)) {
            $nameerr =  'Username is Invalid';
        }
        if(!preg_match($pattern , $password)) {
            $passworderr =  'password is Invalid';
        }
       

        if(preg_match($pattern , $name) && preg_match($pattern , $password)) {
           $sql  = 'INSERT INTO users (username , password ) VALUES  (:name , :password)';
           $stmt = $conn->prepare($sql);
           $stmt->bindParam(':name' , $name);
           $stmt->bindParam(':password' , password_hash($password , PASSWORD_DEFAULT));
           $stmt->execute();
           header('Location: index.php');
        } 


        
    }


}


?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="display-6 m-3 text-center">Signup</div>
                <span class="text-danger"><?php if(!empty($emptyerr)) {echo $emptyerr;} ?></span>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" class="form-group">
                <input value= "<?php if(!empty($name)) { echo $name;} ?>" type="text" name="name" placeholder="Enter Your Username" class="form-control m-1">
                <span class="text-danger"><?php if(!empty($nameerr)) {echo $nameerr;} ?></span>
                <input value= "<?php if(!empty($password)) { echo $password;} ?>" type="password"  name="password" placeholder="Enter Password" class="form-control m-1">
                <span class="text-danger"><?php if(!empty($addresserr)) {echo $addresserr;} ?></span>
                <span class="text-danger"><?php if(!empty($phoneerr)) {echo $phoneerr;} ?></span>
                <input type="submit" value="Signup" class="form-control btn btn-primary">
            </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>