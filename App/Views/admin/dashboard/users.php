<?php
require_once __DIR__ . '/../../../Controllers/UtilisateurController.php';


$controller = new UtilisateurController();
$users = $controller->getAllUsers();

// var_dump($users);




if (isset($_POST['submit'])) {
    // require_once __DIR__ . '/../../Controllers/UtlisateurController.php'; 
    // $controller = new UtlisateurController();
    $controller->addUser();
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Frelancer-Edge</title>
    <link rel="stylesheet" href="./style.css" />
    <link
        href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css"
        rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<body>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav
            class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
            id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button
                    class="navbar-toggler ms-n2"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#sidebarCollapse"
                    aria-controls="sidebarCollapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                    <h3 class="text-success">
                        <img src="" width="40" /><span
                            class="text-info">Frelancer</span>Edg
                    </h3>
                </a>
                <!-- User menu (mobile) -->

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a
                                class="nav-link "
                                aria-current="page"
                                href="./homedashbord.php">
                                <i class="bi bi-people"></i> homedashbord
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link active text-warning"
                                aria-current="page"
                                href="./users.php">
                                <i class="bi bi-people"></i> users
                            </a>
                        </li>


                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-5 opacity-20" />

                    <!-- Push content down -->
                    <div class="mt-auto"></div>
                    <!-- User (md) -->

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person-square"></i> Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                href="#"
                                onclick="return confirm('Are you sure you want to logout?')">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">
                                    <img src="" width="40" /> Welcome Admin
                                </h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">


                                    <a
                                        href="#"
                                        class="btn d-inline-flex btn-sm btn-primary mx-1" data-bs-toggle="modal" data-bs-target="#creatuserModal">
                                        <span class="pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Create</span>
                                    </a>

                                </div>
                            </div>
                        </div>

                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">

                        </ul>
                    </div>
                </div>
            </header>

            <!-- Main -->


            <!-- Main -->
            <section class="py-6 bg-surface-secondary">
                <div class="container-fluid">



                    <!-- Card stats -->

                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Applications</h5>

                        </div>
                        <!-- recherche -->

                        <!-- recherche -->
                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">photo</th>
                                        <th scope="col">Fullname</th>
                                        <th scope="col">email</th>
                                        <th scope="col">password</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" class="text-center">Action</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--  -->
                                    <?php foreach ($users as $user): ?>
                                        <tr>
                                            <td>
                                                <a class="text-heading font-semibold" href="#"> <?= $user->getId(); ?> </a>
                                            </td>

                                            <td>
                                                <img
                                                    alt="..."
                                                    src="<?= $user->getPhoto(); ?>"
                                                    class="avatar avatar-sm rounded-circle me-2" />
                                            </td>

                                            <td>
                                                <a class="text-heading font-semibold"> <?= $user->getFullName(); ?> </a>
                                            </td>
                                            <td>
                                                <a class="text-heading font-semibold"> <?= $user->getEmail(); ?></a>
                                            </td>

                                            <td>
                                                <a class="text-heading font-semibold">
                                                    <?= $user->getPassword(); ?>
                                                </a>
                                            </td>


                                            <td>
                                                <a class="text-heading font-semibold">
                                                <?= $user->getRole()->getRoleName(); ?>

                                                </a>
                                            </td>



                                            <td class="text-end">
                                                <a
                                                    href="#"
                                                    class="btn d-inline-flex btn-sm btn-warning mx-1"
                                                    data-bs-toggle="modal" data-bs-target="#edituserModal">
                                                    <span class="pe-2">
                                                        <i class="bi bi-pencil"></i>
                                                    </span>
                                                    Edit
                                                </a>
                                                <a>

                                                    <form method="POST" action="" style="display: inline;">
                                                        <input type="hidden" name="id">
                                                        <button
                                                            type="submit"
                                                            name="delete"
                                                            class="btn d-inline-flex btn-sm btn-danger mx-1">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>

                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>

                                    <!--  -->
                                </tbody>
                            </table>
                        </div>


                        <div class="card-footer border-0 py-5">

                            <span class="text-muted text-sm">Showing 3 users out of Limit results found</span>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a class="page-link disabled" href="#">Previous</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link bg-info text-white" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>

                        </div>


                    </div>
                </div>
            </section>
        </div>
    </div>








    <!-- start Modal creat -->
    <div class="modal fade" id="creatuserModal" tabindex="-1" aria-labelledby="creatuserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Creat New user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="users.php" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label>Photo</label>
                            <input type="file" id="CRedit-photo" name="photo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="fullname" class="form-label">fullname</label>
                            <input type="text" class="form-control" name="fullname" id="fullname">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">password</label>
                            <input type="text" class="form-control" name="password" id="password">
                        </div>

                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="edit-role" name="role">
                                <option value="1">admin</option>
                                <option value="2">client</option>
                                <option value="3">frelancer</option>
                            </select>
                        </div>


                        <button type="submit" name="submit" class="btn btn-primary">submit</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal Creat -->



    <!-- start Modal Eding user  -->
    <div class="modal fade" id="edituserModal" tabindex="-1" aria-labelledby="edituserModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Edit users</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="users.php" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label>edit Photo</label>
                            <input type="text" id="CRedit-photo" name="editphoto" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="editfullname" class="form-label">edit fullname</label>
                            <input type="text" class="form-control" name="editfullname" id="editfullname">
                        </div>

                        <div class="mb-3">
                            <label for="editemail" class="form-label"> edit Email address</label>
                            <input type="email" class="form-control" name="editemail" id="editemail" required>
                        </div>

                        <div class="mb-3">
                            <label for="editpassword" class="form-label">edit password</label>
                            <input type="text" class="form-control" name="editpassword" id="editpassword">
                        </div>

                        <div class="mb-3">
                            <label for="editrole" class="form-label">Edit Role</label>
                            <select class="form-select" id="edit-role" name="role">
                                <option value="1">admin</option>
                                <option value="2">client</option>
                                <option value="3">frelancer</option>
                            </select>
                        </div>


                        <button type="save" name="save" class="btn btn-primary">save</button>

                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Modal Eding user -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>