// Mobile Navigation
const menuToggle = document.getElementById("menuToggle");
const mainNav = document.getElementById("mainNav");

if (menuToggle && mainNav) {
    menuToggle.addEventListener("click", function () {
        mainNav.classList.toggle("open");
    });

    const navLinks = mainNav.querySelectorAll("a");

    navLinks.forEach(function (link) {
        link.addEventListener("click", function () {
            mainNav.classList.remove("open");
        });
    });
}

// Set Minimum Pickup Date
const today = new Date();
const localToday = new Date(
    today.getTime() - today.getTimezoneOffset() * 60000
).toISOString().split("T")[0];

const tripDate = document.getElementById("tripDate");

if (tripDate) {
    tripDate.min = localToday;
}

// Automatically Select Car
const carSelect = document.getElementById("carSelect");

if (carSelect) {
    const urlParams = new URLSearchParams(window.location.search);
    const selectedCar = urlParams.get("car");

    if (selectedCar) {
        carSelect.value = selectedCar;
    }
}

// Contact Form Demo
const contactForm = document.getElementById("contactForm");

if (contactForm) {
    contactForm.addEventListener("submit", function (event) {
        event.preventDefault();

        if (!contactForm.reportValidity()) {
            return;
        }

        const formData = new FormData(contactForm);
        const name = formData.get("name").trim();

        const contactMessage = document.getElementById("contactMessage");

        if (contactMessage) {
            contactMessage.textContent =
                "Thank you, " + name + "! Your demo message has been received.";
        }

        contactForm.reset();
    });
}