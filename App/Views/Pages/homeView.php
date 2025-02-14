<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style@.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home</title>
</head>
<body class="bg-gray-100">
<!-- Navbar -->
<nav class="bg-white border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3">
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-gray-900">FreelanceEdge</span>
        </a>

        <!-- Login & Sign Up Links -->
        <div class="flex md:order-2 space-x-4">
            <a href="/login" class="text-blue-700 font-medium px-4 py-2 hover:underline">Login</a>
            <a href="/register" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg px-4 py-2">Sign Up</a>

            <!-- Mobile Menu Button -->
            <button data-collapse-toggle="navbar" type="button" class="inline-flex items-center p-2 w-10 h-10 text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:ring-2 focus:ring-gray-200" aria-controls="navbar" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>

        <!-- Navigation Menu -->
        <div class="hidden md:flex md:items-center md:w-auto w-full" id="navbar">
            <ul class="flex flex-col md:flex-row md:space-x-8 p-4 md:p-0 mt-4 md:mt-0 bg-gray-50 md:bg-white rounded-lg md:border-0">
                <li><a href="#" class="block py-2 px-3 text-blue-700">Home</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 hover:text-blue-700">About</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 hover:text-blue-700">Services</a></li>
                <li><a href="#" class="block py-2 px-3 text-gray-900 hover:text-blue-700">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<div>
    <?php
    if (isset($_SESSION['firstName']) && isset($_SESSION['lastName'])) {
        echo "<p>Hello, " . $_SESSION['firstName'] . " " . $_SESSION['lastName'] . "</p>";
        echo "<div>
                <a  class=\"text-blue-700 font-medium px-4 py-2 hover:underline\" href='/logout'>Logout</a>
              </div>";
    }
    ?>
</div>
</body>
</html>









