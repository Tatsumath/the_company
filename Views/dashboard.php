<?php
    session_start();

    require '../classes/User.php';
    $user = new User;
    $all_users = $user->getAllUsers();

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../Assets/css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <body>
    <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="dashboard.php" class="navbar-brand">
                <h1 class="h3">The Company</h1>
            </a>
            <div class="navbar-nav">
                <span class="navbar-text"><?= $_SESSION['full_name'] ?></span>
                <form action="../Actions/Logout.php" method="post" class="d-flex ms-2">
                    <button type="submit" class="text-danger bg-transport border-0">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="row justify-content-center gx-0">
        <div class="col-6">
            <h2 class="text-center">User Lists</h2>

            <table class="table table-hover align-middle">
                <thead>
                    <th></th>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Action Buttons</th>
                </thead>
                <tbody>
                    <?php
                        while($user = $all_users->fetch_assoc()){
                    ?>
                        <tr>
                            <td>
                                <?php 
                                    if($user['photo']){
                                ?>
                                    <img src="../Assets/images/<?= $user['photo']?>" alt="<?= $user['photo']?>" class="d-block ms-auto dashboard-photo">
                                <?php
                                    }else{
                                ?>
                                    <i class="fa-solid fa-user text-secondary d-block text-center dashboard-icon"> </i>
                                <?php   
                                    }
                                 ?>
                            </td>
                            <td><?= $user['id']?></td>
                            <td><?= $user['first_name']?></td>
                            <td><?= $user['last_name']?></td>
                            <td><?= $user['username']?></td>
                            <td>
                                <?php
                                if($_SESSION['id'] == $user['id']){
                                ?>
                                    <a href="../Views/edit-user.php" class="btn btn-outline-warning" title="Edit">
                                        <i class="fa-regular fa-pen-to-square">  </i>
                                    </a>
                                    <a href="../Views/delete-user.php" class="btn btn-outline-danger" title="Delete">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>

                                <?php
                                }
                                ?>
                            </td>
                        </tr>

                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>