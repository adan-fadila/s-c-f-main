
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Easiest Way to Add Input Masks to Your Forms</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    
</head>
<body>
    <div class="registration-form" >
        <form action="db/setUser.php" method ="post">
            <div class="form-icon">
                <span><i class="icon icon-user"></i></span>
            </div>
            <div class="form-group">
                <input type="text" name="userName" class="form-control item" id="username" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control item" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="text" name="email" class="form-control item" id="email" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="date" name="birthday" class="form-control item" id="birth-date" placeholder="Birth Date">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Create Account</button>
            </div>
        </form>
       
    </div>
</body>
</html>
