<?php

 include('session.php');
 if (isset($_SESSION["auth"]) or isset($_SESSION["auth"]) == TRUE ){
    header("Location: dashboard.php");
    exit();
 }

?>

<html>
    <head>
       <meta charset="utf-8">
        <link rel="stylesheet" href="style\connexion.css" >
        <link rel="stylesheet" href="style\connexion.scss" >
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
        <body id="bck">

                <div id="gauche">
                    <div id="menu">
                        <nav class="menu">
                            <ul>
                                <img src="img\logo.png" alt="" id="logo">
                              <li><a class='menu' href="index.html">Accueil</a></li>
                              <li><a class='menu' href="#Apropos">Support</a></li>
                              <li><a class='menu' href="contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div id="deg">
                        <form action="bdd.php" method="POST" id="connexion">

                            <h1 id='lh1'>connexion</h1>
                            

                            <hr id='separateur'>

                            <label><b>Nom d'utilisateur</b></label>
                            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

                            <label><b>Mot de passe</b></label>
                            <input type="password" placeholder="Entrer le mot de passe" name="password" required>

                            <input type="submit" id='submit' value='CONNEXION' >
                            <?php

                                if(isset($_GET['erreur'])){
                                    $err = $_GET['erreur'];
                                    if($err==1 || $err==2)
                                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";

                                }
                            ?>
                        </form>
                        <a href='contact.php' id='mdp'>
                            <span>Mot de passe oublié ?</span>
                        </a>    
                    </div>    
                </div>
                <div id="droite">

                </div>

        </body>
</html>