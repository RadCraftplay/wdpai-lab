<nav id="navbar">
    <a href="/" id="logo">Dinny</a>
    <a href="/submit_server">Submit</a>
    <a href="/browse">Browse</a>
    <a href="/about">About</a>
    <div class="break"></div>
    <div class="search-block<?php
    $path = trim($_SERVER['REQUEST_URI'], '/');
    if ($path != '') {
        echo " hidden";
    }
    ?>">
        <div id="search-container">
            <input placeholder="Search..."/>
            <button id="search-button" class="hilighted">
                <img src="public/img/svg/search.svg" />
            </button>
        </div>
    </div>
    <?php
    if (!array_key_exists("logged_user", $_SESSION)) {
        echo "<a href=\"/login\">Log in</a>";
    } else {
        echo "<a href=\"/logout\">Log out</a>";
    }
    ?>
</nav>