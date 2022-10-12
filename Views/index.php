<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body class="bg-light">
    <div style="height: 100vh;">
        <div class="row h-100 m-0">
            <div class="card my-auto mx-auto w-25">
                <div class="card-header bg-white border-0 py-3">
                    <h1 class="text-center">Login</h1>
                </div>
                <div class="card-body">
                    <form action="../Actions/Login_action.php" method="post">
                        <input type="text" name="username" class="form-control mb-2 " placeholder="USERNAME" required autofocus>
                        <input type="password" name="password" class="text form-control" placeholder="PASSWORD" required>
                        <button type="submit" class="form-control btn btn-primary w-100">Login</button>
                    </form>
                   
                    <p class="text-center small mt-3"> Create An Account<a href="../Views/Register.php"> Register </a></p>
                    <p>This is a sample application the in using OOP style of Programming</p>

                <!--This is end of card body  -->
                </div>

            <!-- This is end of card -->
            </div>
        </div>
    </div>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>