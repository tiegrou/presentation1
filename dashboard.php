<?php
//variable de session
include ('session.php');

//si aucune variable de session redirection
 if (!($_SESSION["auth"]) or isset($_SESSION["auth"]) == false ){
    header("Location: connexion.php");
    exit();
 }

?>

<html>

<head>

        <meta charset="UTF-8">
        <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.css'>
        <link rel="stylesheet" href="style\dashboard.css">
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>

</head>

<body>
    <div id="loader">
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
        <!-- <script>
                window.onload = function()
                {
                setTimeout(function(loader,3000)
                {
                    document.getElementById("loader").style.display = "none";
                }, 5000);
                }
        </script> -->
        <script type="text/javascript">
            $(window).load(function() {
                setTimeout(function(){
            $("#loader").fadeOut("5000"); 
                })
        })
        </script>

    </div>
    <div id="marge">

        <div class="parent">

            <!-- menu -->
            <div class="div1">
                
                <button class='btn' onclick="window.location.href = 'index.html';"><img src="img\logo.png"></button>
                <button class='btn' onclick="window.location.href = 'alertes.php';"><img class='icac' src="img\megaphone.png"></button>
                <button class='btn' onclick="window.location.href = 'statistiques.php';"><img class='icac' src="img\statistique.png"></button>
                <button class='btn' onclick="window.location.href = 'sites.php';"><img class='icac' src="img\agence.png"></button>
                <button class='btn' onclick="window.location.href = 'contact.php';"><img class='icac' src="img\enveloppe.png"></button>
                <button class='btn' onclick="window.location.href = 'deconnexion.php';"><img class='icac' src="img\se-deconnecter.png"></button> 
                
            </div>

            <!-- titre | barre de recherche -->
            <div class="div2"> 
                    <span id='message'>
                        <img class='icac' id='ic' src="img\utilisateur (1).png" style="vertical-align: middle;">
                        <?php echo $_SESSION['username'];?> 
                    </Span>    
                <input type="text" class="css-input" placeholder="Recherche..." />
            </div>

            <!-- carte -->
            <div class="div3"> 
                    <div id="map"></div>
                    <script src='https://api.mapbox.com/mapbox-gl-js/v2.10.0/mapbox-gl.js'></script><script  src="./script.js"></script>
                    <script  src="./script.js"></script>
            </div>

            <!-- alertes -->
            <div class="div4">

                <div id='haut'>
                    <a href="alertes.php">
                        <p id='talerte'>Alertes <img id='alerte'src="img\megaphone.png"></p>
                    </a>    
                </div>

                <div id='cpopup'>

                    <a href="consomation.php"> 
                        <div class='popup' id='popup1'>
                            <span id='tpop'><img id='icon' class='icac' src="img\exclamation (1).png"><span class="vertical-line"></span>Variation de température importante. Il se pourrait que les ocuppant ne respecte pas les préconisations d'utilisations.</span>
                        </div>
                    </a>

                    <a href="consomation.php">     
                        <div class='popup' id='popup2'>
                            <span id='tpop'><img id='icon' class='icac' src="img\exclamation.png"><span class="vertical-line"></span>Connexion perdu avec le site. Probléme en cours de traitement...</span>
                        </div>
                    </a>  

                    <a href="consomation.php">     
                        <div class='popup' id='popup3'>
                            <span id='tpop'><img id='icon' class='icac' src="img\info.png"><span class="vertical-line"></span>Maintenance de l'application du 28/12/22 au 29/12/2022 entre 22H et 6H. </span>
                        </div>
                    </a>

                    <a href="consomation.php">     
                        <div class='popup' id='popup4'>
                            <span id='tpop'><img id='icon' class='icac' src="img\exclamation (1).png"><span class="vertical-line"></span>Variation de température importante. Il se pourrait que les ocuppant ne respecte pas les préconisations d'utilisations.</span>
                        </div>
                    </a> 

                </div> 

            </div>

            <!--  -->
            <div class="div5"> 
                
                
            </div>

            <!-- consomation -->
            <div class="div6">

                <a id='conso' href="consomation.php">
                    <div id='centre'>
                        <span id='info'>38Kwh</span> 
                        <hr id='separateur'>
                        <span id='nom'>Consomation 
                        <br>
                         moyennes par Agence.</span>
                    </div>
                </a>  

            </div>

            <!--  -->
            <div class="div7"> 

                
               
            </div>
            
        </div>

    <div>


</body>

</html>