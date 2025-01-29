<?php
require "../Database/db.php"; // Database verbinding
session_start() 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoloSounds</title>
    <link rel="stylesheet" href="../Css/Homepage.css">
</head>
<body>
    <?php
        require "../Nav_Bar/navbar.php"; // navbar aanroepen
    ?>
    <main>
    
    <section class="content">
        <div class="info">
        <h1>Welkom bij SoloSounds!</h1>
        <br/>
            <h2>
            <strong> OVER ONS:</strong>
            SoloSounds is hét platform voor zzp'ers in de muziekwereld. Hier kunnen muzikanten eenvoudig andere 
            freelancers vinden voor samenwerkingen, opdrachten of projecten. 
            Of je nu een zanger, producer of muzikant bent, 
            SoloSounds helpt je om je netwerk uit te breiden en je muziekcarrière te laten groeien. 
            Vind vandaag nog jouw volgende freelance kans!
            </h2>
        </div>
    </section>
</main>
    <?php 
        require "../Footer_Page/footer.php"; // footer aanroepen
    ?>
</body>
</html>