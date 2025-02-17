<?php




?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Frelancer-Edg</title>
  <link rel="stylesheet" href="./style.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css"
    rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</head>

<style>
    @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);

    /* Bootstrap Icons */
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
</style>

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
                class="nav-link active text-warning"
                aria-current="page"
                href="./homedashbord.php">
                <i class="bi bi-people"></i> homedashbord
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link "
                aria-current="page"
                href="./users.php">
                <i class="bi bi-people"></i> users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="./validation.php">
                <i class="bi bi-bookmarks"></i> Validation
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

      <section class="py-6 bg-surface-secondary">
        <div class="container-fluid">

          <!-- Card stats -->
          <div class="row g-6 mb-6">



            <div class="col-xl-3 col-sm-6 col-12">
              <div class="card shadow border-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <span class="h6 font-semibold text-muted text-sm d-block mb-2">All Users</span>
                      <span class="h3 font-bold mb-0">12</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                        <i class="bi bi-people"></i>
                      </div>
                    </div>
                  </div>
                  <div class="mt-2 mb-0 text-sm">

                    <span class="text-nowrap text-xs text-muted">Since last month</span>
                  </div>
                </div>
              </div>
            </div>



          </div>





        </div>
      </section>

      <!-- Main -->



    </div>
  </div>








  <!-- start Modal creat -->
  <div class="modal fade" id="creatuserModal" tabindex="-1" aria-labelledby="creatuserModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Creat New Contact</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="POST" action="contactsdashboard.php" enctype="multipart/form-data">

            <div class="mb-3">
              <label>Photo</label>
              <input type="text" id="CRedit-photo" name="photo" class="form-control">
            </div>

            <div class="mb-3">
              <label for="firstname" class="form-label">Firstname</label>
              <input type="text" class="form-control" name="firstname" id="firstname">
            </div>

            <div class="mb-3">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="lastname" class="form-control" name="lastname" id="lastname">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" required>
            </div>

            <div class="mb-3">
              <label for="nemuro" class="form-label">Nemuro</label>
              <input type="text" class="form-control" name="numero" id="numero">
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
          <h5 class="modal-title" id="loginModalLabel">Edit Contact</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form method="POST" action="./contactsdashboard.php">
            <div class="mb-3">
              <label for="editfirstname" class="form-label">Firstname</label>
              <input type="text" class="form-control" name="editfirstname" id="editfirstname">
            </div>

            <div class="mb-3">
              <label for="lastname" class="form-label">Lastname</label>
              <input type="editlastname" class="form-control" name="editlastname" id="editlastname">
            </div>

            <div class="mb-3">
              <label for="editemail" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="editemail" required>
            </div>

            <div class="mb-3">
              <label for="editnemuro" class="form-label">Nemuro</label>
              <input type="text" class="form-control" name="editnemuro" id="nemuro">
            </div>

            <div class="mb-3">
              <label for="editphoto" class="form-label">Photo</label>
              <input type="text" id="CRedit-photo" name="editphoto" class="form-control">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">save</button>
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