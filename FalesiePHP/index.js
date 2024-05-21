const logout = documment.getElementById("Esci");

logout.addEventListener('click', () => {
    let xhr = new XMLHttpRequest();

    xhr.open('POST', 'logout.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function () {
        // Redirect to the login page after logout
        window.location.href = 'index.php';
    };

    login_out.classList.remove('logged');
    xhr.send();
});