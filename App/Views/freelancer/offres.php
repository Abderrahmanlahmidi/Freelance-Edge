<?php
require_once __DIR__ . '/../../Controllers/OffreController.php';


$offreController = new OffreController();
$offres = $offreController->getAllOffres();

// var_dump($offreController);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="./offres.css" />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous" />

    <title>FrelancerEdge</title>
</head>


<body>
    <nav class="navbar">
        <div class="nav-container">
            <!-- Left Side -->
            <div class="nav-left">
                <div class="nav-links">
                    <div class="logo-section">
                        <i class="fas fa-book-reader logo-icon"></i>
                        <h1>Frelancer </h1>
                    </div>
                    <a href="home.html" class="nav-link ">
                        <i class="fas fa-home"></i>
                        <span>Accueil</span>
                    </a>
                    <a href="./Catalogue.html" class="nav-link active">
                        <i class="fas fa-book"></i>
                        <span>offres</span>
                    </a>
                    <a href="#" class="nav-link">

                    </a>
                    <a href="#" class="nav-link">
                    </a>

                    <a href="#" class="nav-link">

                    </a>
                </div>
            </div>

            <!-- rechrche -->

            <div class="nav-right">
            </div>
        </div>
    </nav>

    <div
        class="nav-right mt-5"
        style="display: grid; justify-content: center; width: 60%">
        <!-- Search Bar -->
        <div class="search-bar" id="rechrchebat">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Rechercher un offres..." />
        </div>
    </div>

    <div class="container mt-4">
        <div style="display: grid; grid-template-columns: repeat(2, 1fr)">
            <div class="filter-title" onclick="toggleFilter()">
                <i id="filter-icon" class="fas fa-chevron-down"></i> Filter
            </div>
            <button style="justify-self: end" onclick="toggleFilter()">
                <i id="filter-button-icon" class="fas fa-chevron-down"></i>
                <span id="filter-button-text">schow</span>
            </button>
        </div>
        <hr />
        <div id="filter-section" class="filter-container" style="display: none">
            <div class="row g-3">
                <div class="col-md-4">
                    <label>Category:</label>
                    <select class="form-select">
                        <option selected>all categories (1200)</option>
                        <option selected>Devlopement</option>

                    </select>
                </div>

                <div class="col-md-4">
                    <label>Duree:</label>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Select ur duree" />
                </div>
                <div class="col-md-4">
                    <label>Budgee:</label>
                    <input
                        type="number"
                        class="form-control"
                        placeholder="Select ur Bedget.." />
                </div>
            </div>
            <div class="d-flex justify-content-between mt-4">
                <button class="btn btn-reset"></button>
                <button class="btn btn-apply">Apply</button>
            </div>
        </div>
    </div>
    <section>

        <div class="container mt-4">
            <div class="row gy-4">
                <!-- gy-4 adds spacing between rows -->
                <?php

                foreach ($offres as $offre):
                ?>

                    <div class="col-md-9 mt-4">
                        <div class="book-card d-flex gap-4 p-3 shadow-sm rounded">
                            <img
                                src="https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c"
                                alt="Book Cover"
                                class="book-cover" />
                            <div class="book-details flex-grow-1">
                                <div class="book-author text-success fw-bold"><?= $offre->getTitre(); ?></div>
                                <div class="book-title fw-bold fs-5">
                                    <td>
                                        <img
                                            alt="..."
                                            src="photo"
                                            class="avatar avatar-sm rounded-circle me-2" />
                                        <a class="text-heading font-semibold"> <?= $offre->getClient()->getFirstNAme(); ?></a>

                                    </td>
                                </div>

                                <p class="text-muted small">
                                    <?= $offre->getDescriptionOffre(); ?>
                                </p>
                                <div class="fw-bold">
                                    duree: <span class="text-dark"><?= $offre->getDuree(); ?></span>
                                </div>
                                <div class="fw-bold">
                                    Budget: <span class="text-dark"><?= $offre->getBudget(); ?></span>
                                </div>

                                <span class="text-success fw-bold">devlopemnt</span>

                            </div>
                            <div
                                class="d-flex flex-column align-items-end justify-content-between">
                                <div class="book-icons">
                                    <i class="fas fa-star text-warning"></i> 4.4
                                    <i class="fas fa-bookmark text-muted"></i>
                                </div>

                                <a href="#"><button data-bs-toggle="modal"
                                data-bs-target="#proposition" class="btn btn-success btn-sm">TAke oofre Now</button></a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="pagination-container">
                <div class="pagination">
                    <a href="#">offre</a>
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">...</a>
                    <a href="#">8</a>
                    <a href="#" class="active">9</a>
                    <a href="#">10</a>
                    <a href="#">continue</a>
                </div>
            </div>
        </div>

    </section>
    <footer class="footer">
        <div class="footer-content">
            <!-- Footer Top -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Logo & About -->
                        <div class="col-lg-4">
                            <div class="footer-about">
                                <div class="footer-logo">
                                    <i class="fas fa-book-reader"></i>
                                    <h2>Frelancer-Edge</h2>
                                </div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit..</p>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="col-lg-2">
                            <div class="footer-links">
                                <h3>Liens Rapides</h3>
                                <ul>
                                    <li><a href="#">Accueil</a></li>
                                    <li><a href="#">Catalogue</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Contact Info -->
                        <div class="col-lg-3">
                            <div class="footer-contact">
                                <h3>Contact</h3>
                                <ul>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>123 Rue Mohammed V, Casablanca</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-phone"></i>
                                        <span>+212 522-XX-XX-XX</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <span>contact@frelence.ma</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div class="col-lg-3">
                            <div class="footer-hours">
                                <h3>Horaires</h3>
                                <ul>
                                    <li>
                                        <span class="day">Lundi - Vendredi:</span>
                                        <span class="time">8:00 - 18:00</span>
                                    </li>
                                    <li>
                                        <span class="day">Samedi:</span>
                                        <span class="time">9:00 - 14:00</span>
                                    </li>
                                    <li>
                                        <span class="day">Dimanche:</span>
                                        <span class="time">Fermé</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="bottom-content">
                        <p>&copy; 2024 Frelancer -Edge. Tous droits réservés</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <!--  -->
    
    <!-- add sugsition -->
    <div class="modal fade" id="proposition" tabindex="-1" aria-labelledby="propositionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel">Creat Proposition</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form method="POST" action="" enctype="multipart/form-data">
                       

                        <div class="mb-3">
                            <label for="firstname" class="form-label">Discription</label>
                            <input type="text" class="form-control" name="discription" id="discription">
                        </div>
                        


                        <button type="submit" name="submit" class="btn btn-primary">Add</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- add segsution -->
    <script>
        function toggleFilter() {
            var filterSection = document.getElementById("filter-section");
            var filterIcon = document.getElementById("filter-icon");

            if (filterSection.classList.contains("show")) {
                filterSection.classList.remove("show");
                filterIcon.style.transform = "rotate(0deg)";
            } else {
                filterSection.classList.add("show");
                filterIcon.style.transform = "rotate(180deg)";
            }
        }

        function toggleFilter() {
            var filterSection = document.getElementById("filter-section");
            var filterIcon = document.getElementById("filter-icon");

            if (filterSection.style.display === "none") {
                filterSection.style.display = "block";
                filterIcon.classList.remove("fa-chevron-down");
                filterIcon.classList.add("fa-chevron-up");
            } else {
                filterSection.style.display = "none";
                filterIcon.classList.remove("fa-chevron-up");
                filterIcon.classList.add("fa-chevron-down");
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>