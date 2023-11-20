document.addEventListener("DOMContentLoaded", function () {
    // Simulate content loading delay
    setTimeout(function () {
        document.getElementById("loader-container").style.display = "none";
        document.body.style.overflow = "visible"; // for scrolling
    }, 1000); //for the delay
});
