function toHome(){
    location.href = "home.php";
}

function showProfileMenu(){
    let menuprofile = document.getElementById("profile-options");
    if(menuprofile.style.display === "none"){
        menuprofile.style.display = "block";
    }else{
        menuprofile.style.display = "none";
    }
}

function toViewProfile(){
    location.href = "viewProfile.php";
}

function toEditProfile(){
    location.href = "editProfile.php";
}

function toLogOut(){
    location.href = "logout.php";
}