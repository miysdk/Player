<link rel="stylesheet" href="css/header.css">
<html>
    <header>
        <div class="header__logo"><a href="index.php">Player</a></div>
        <nav class="header__nav">
            <a id="home" class="header__navelem" href="index.php">Home</a>
            <a id="library" class="header__navelem" href="#">Library</a>
            <a id="search" class="header__navelem" href="#">Search</a>
        </nav>
    </header>

    <script>
        console.log(document.title);
        switch (document.title) {
            case "Home":
                    document.getElementById("home").classList.add("active");
                break;
        
            default:
                break;
        }
        
    </script>
</html>