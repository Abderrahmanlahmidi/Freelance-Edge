// Register
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true;


        const firstName = document.getElementById("firstname");
        const lastName = document.getElementById("lastname");
        const age = document.getElementById("age");
        const email = document.getElementById("email");
        const password = document.getElementById("password");


        document.querySelectorAll(".error").forEach(el => el.remove());


        [firstName, lastName, age, email, password].forEach(input => {
            input.classList.remove("border-green-500", "border-red-500");
        });


        if (!/^[a-zA-Z]{2,}$/.test(firstName.value.trim())) {
            showError(firstName, "First name must be at least 2 letters long and contain only letters.");
            isValid = false;
        } else {
            firstName.classList.add("border-green-500");
        }


        if (!/^[a-zA-Z]{2,}$/.test(lastName.value.trim())) {
            showError(lastName, "Last name must be at least 2 letters long and contain only letters.");
            isValid = false;
        } else {
            lastName.classList.add("border-green-500");
        }


        const ageValue = parseInt(age.value, 10);
        if (isNaN(ageValue) || ageValue < 18 || ageValue > 99) {
            showError(age, "Age must be a number between 18 and 99.");
            isValid = false;
        } else {
            age.classList.add("border-green-500");
        }


        if (!/^\S+@\S+\.\S+$/.test(email.value.trim())) {
            showError(email, "Enter a valid email address.");
            isValid = false;
        } else {
            email.classList.add("border-green-500");
        }


        if (!/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(password.value.trim())) {
            showError(password, "Password must be at least 8 characters long and contain at least one letter and one number.");
            isValid = false;
        } else {
            password.classList.add("border-green-500");
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    function showError(input, message) {
        const errorElement = document.createElement("p");
        errorElement.classList.add("error", "text-red-500", "text-sm", "mt-1");
        errorElement.innerText = message;
        input.parentElement.appendChild(errorElement);
        input.classList.add("border-red-500");
    }
});

// Login
document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        let isValid = true;
        const email = document.getElementById("email");
        const password = document.getElementById("password");

        document.querySelectorAll(".error").forEach(el => el.remove());

        [email, password].forEach(input => {
            input.classList.remove("border-green-500", "border-red-500");
        });

        if (!/^\S+@\S+\.\S+$/.test(email.value.trim())) {
            showError(email, "Enter a valid email address.");
            isValid = false;
        } else {
            email.classList.add("border-green-500");
        }

        if (password.value.trim().length < 8) {
            showError(password, "Password must be at least 8 characters long.");
            isValid = false;
        } else {
            password.classList.add("border-green-500");
        }

        if (!isValid) event.preventDefault();
    });

    function showError(input, message) {
        const errorElement = document.createElement("p");
        errorElement.classList.add("error", "text-red-500", "text-sm", "mt-1");
        errorElement.innerText = message;
        input.parentElement.appendChild(errorElement);
        input.classList.add("border-red-500");
    }
});

