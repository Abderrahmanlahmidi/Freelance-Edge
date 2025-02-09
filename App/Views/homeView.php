<?php

if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
    echo "Hello, " . $_SESSION['firstName'] . " " . $_SESSION['lastName'];
    echo "<div>
            <a href='/logout'>Logout</a>
          </div>";
}

?>








