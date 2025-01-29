<?php

?>
<link rel="stylesheet" href="../Css/Navbar.css">
<header>
    <div class="logo">
        <span>SOLOSOUNDS</span>
    </div>
    <nav>
        <a href="../Homepage/index.php" class="active" aria-current="page">Home</a>
        <?php if (isset($_SESSION['user_type'])): ?> 
            <?php if ($_SESSION['user_type'] == 'klanten'): ?>
                <a href="../Customer_page/customer_page.php">Dashboard</a>
                <a href="../Bookingpage/project_login.php">Projecten</a>
                <a href="../Management_page/beheer.php">Overzicht</a>
                <a href="../Insert_page/Insert_page.php">Project toevoegen</a>
                
            <?php endif; ?>
            <a href="../Nav_Bar/logout.php" class="login">Logout</a>
            <?php else: ?>
            <a href="../Login_page/login.php" class="login">Login</a>
            <a href="../Register_page/register_page.php" class="register">Register</a>
        <?php endif; ?>
    </nav>
</header>
