<div class="top-header">
    <div id = "header-left">
        <a href="home.php">
            <img src = "pics/logo_white.png" height="50">
        </a>
        <h1 id="home-link">UP Xchange</h1>
    </div>
    <?php include "searchBar.php"  ; ?>
    <div id = "header-right">
        <a href="addQuestion.php"><img src="pics/plus.png" height="25"></a>
        <a href="index.php"><img src="pics/categories.png" height="25"></a>
        <a href="#"><img src="pics/bell.png" height="25"></a>
        <a href="editProfile.php"><img src="pics/user.png" height="25"></a>
    </div>
</div>
<script>
    document.getElementById("home-link").addEventListener("click", function() {
        window.location.href = "home.php"; // Replace with the actual URL of your home page
    });
</script>