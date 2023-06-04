<div class="top-header">
    <div id = "header-left">
        <a href="home.php">
            <img src = "pics/logo_white.png" height="50">
        </a>
        <h1 id="home-link" onclick="toHome()">UP Xchange</h1>
    </div>
    <div id = "header-right">
        <a href="addQuestion.php"><img src="pics/plus.png" height="25"></a>
        <a href="index.php"><img src="pics/categories.png" height="25"></a>
        <div class="profile-menu">
            <img src="pics/user.png" onclick="showProfileMenu()" height="25">
            <div id="profile-options">
                <p onclick="toViewProfile()">View Profile</p>
                <p onclick="toEditProfile()">Edit Profile</p>
                <p onclick="toLogOut()">Log Out</p>
            </div>
        </div>
    </div>
</div>
<script src="scripts/headerJS.js" type="text/javascript"></script>