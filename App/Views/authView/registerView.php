<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Style/style.css">
    <script src="./JS/script.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Register</title>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
<div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Register</h2>

    <form class="space-y-4" method="POST">
        <!-- First Name -->
        <div>
            <label for="firstname" class="block mb-2 text-sm font-medium text-gray-700">First Name</label>
            <input type="text" id="firstname" name="first_name" placeholder="Enter your first name" class="border text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Last Name -->
        <div>
            <label for="lastname" class="block mb-2 text-sm font-medium text-gray-700">Last Name</label>
            <input type="text" id="lastname" name="last_name" placeholder="Enter your last name" class="border text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Age -->
        <div>
            <label for="age" class="block mb-2 text-sm font-medium text-gray-700">Age</label>
            <input type="number" id="age" name="age" placeholder="Enter your age" class="border text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Email -->
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-700">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" class="border text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" class="border text-sm rounded-lg block w-full p-2.5 focus:ring-blue-500 focus:border-blue-500">
        </div>

        <!-- Submit Button -->
        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</button>
    </form>
    <p class="text-sm text-gray-600 text-center mt-4">Already have an account? <a href="/login" class="text-blue-600 hover:underline">Go to login</a></p>
</div>
</body>
</html>


