function afterLogin(nomeUtente){
    document.getElementById("login").innerHTML = nomeUtente;
    document.getElementById("Subscribe").innerHTML = "Logout";

    document.getElementById("login").href  = "./profile.php";
    document.getElementById("Subscribe").addEventListener("click",function(event){

        event.preventDefault();
        delCookie("username")});
}

function delCookie(cookieName) {
    var data = new Date(0);

    document.cookie = cookieName + "=; expires=" + data.toUTCString() + "; path=/";

    location.reload();
}

function interfacciaDefault(){
    document.getElementById("login").innerHTML = "Login";
    document.getElementById("Subscribe").innerHTML = "Subscribe";

    document.getElementById("login").href  = "./login.php";

    document.getElementById("Subscribe").href = "./Subscribe.php";
    document.getElementById("Subscribe").removeEventListener("click", delCookie);
}