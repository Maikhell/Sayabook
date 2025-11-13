document.addEventListener("DOMContentLoaded", function () {
    const button = document.getElementById("loginbtn");

    if (button) {
        button.addEventListener("click", askUser);
    }
    function askUser(event) {
        event.preventDefault();
        try {
            window.location.href = "mybooks.php"
        } catch (err) {
            conseol.error("Error Occurred", err);
        }
    }
});