<?php
/* Page: contact.php */
//mettez ici votre adresse mail
$VotreAdresseMail="maxdufour82@gmail.com";
// si le bouton "Envoyer" est cliqué
if(isset($_POST['envoie'])) {
    //on vérifie que le champ mail est correctement rempli
    if(empty($_POST['mail'])) {
        echo "<p style='color:red'>Le champ mail est vide</p>";
    } else {
        //on vérifie que l'adresse est correcte
        if(!preg_match("#^[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?@[a-z0-9_-]+((\.[a-z0-9_-]+){1,})?\.[a-z]{2,}$#i",$_POST['mail'])){
            echo "<p style='color:red'>L'adresse mail entrée est incorrecte</p>";
        }else{
            //on vérifie que le champ sujet est correctement rempli
            if(empty($_POST['societe'])) {
                echo "<p style='color:red'>Selectioner un sujet</p>";
            }else{
                //on vérifie que le champ message n'est pas vide
                if(empty($_POST['message'])) {
                    echo "<p style='color:red'>Le champ message est vide</p>";
                }else{
                    //tout est correctement renseigné, on envoi le mail
                    //on renseigne les entêtes de la fonction mail de PHP
                    $Entetes = "MIME-Version: 1.0\r\n";
                    $Entetes .= "Content-type: text/html; charset=UTF-8\r\n";
                    $Entetes .= "From: cle energie GTC <".$_POST['mail'].">\r\n";//de préférence une adresse avec le même domaine de là où, vous utilisez ce code, cela permet un envoie quasi certain jusqu'au destinataire
                    $Entetes .= "Reply-To: Nom de votre site <".$_POST['mail'].">\r\n";
                    //on prépare les champs:
                    $Mail=$_POST['mail']; 
                    $Sujet='=?UTF-8?B?'.base64_encode($_POST['sujet']).'?=';//Cet encodage (base64_encode) est fait pour permettre aux informations binaires d'être manipulées par les systèmes qui ne gèrent pas correctement les 8 bits (=?UTF-8?B? est une norme afin de transmettre correctement les caractères de la chaine)
                    $Message=htmlentities($_POST['message'],ENT_QUOTES,"UTF-8");//htmlentities() converti tous les accents en entités HTML, ENT_QUOTES Convertit en + les guillemets doubles et les guillemets simples, en entités HTML
                    //en fin, on envoi le mail
                    if(mail($VotreAdresseMail,$Sujet,nl2br($Message),$Entetes)){//la fonction nl2br permet de conserver les sauts de ligne et la fonction base64_encode de conserver les accents dans le titre
                        echo "Le mail à été envoyé avec succès!";
                    } else {
                        echo "Une erreur est survenue, le mail n'a pas été envoyé";
                    }
                }
            }
        }
    }
}

?>

<html>

    <head>

        <meta charset="utf-8">
        <link rel="stylesheet" href="style\contact.css" >
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    </head>

<body>

    <div id='gauche'>

        <div id="menu">

            <nav class="menu">
                <ul>
                    <img src="img\logo.png" alt="" id="logo">
                    <li><a class='menu' href="index.html">Accueil</a></li>
                    <li><a class='menu' href="#Apropos">Support</a></li>
                    <li><a class='menu' href="contact.php">Contact</a></li>
                    <li><a class='menu' href="dashboard.php">Dashboard</a></li>
                </ul>
            </nav>

        </div>
                
        <div id='tg'>
            <span id='titre'>Contactez-nous.</span>
            </br></br>
                <span id="sep"></span>
            </br>
            <span class='icontact' id='mail'><img class='icc' src="img\mail.png">clrenergie@gmail.com</span>
            <br>
            <span class='icontact' id='supporttechnique'><img class='icc' src="img\cle.png">Support technique : 0652829957</span>
            <br>
            <span class='icontact' id='supportinformatique'><img class='icc' src="img\ecran.png">Support Informatique : 0652576567</span>
        </div>

        <div id='deg'>  
        </div>                
    </div>

    <div id='droite'>

        <form id='form'action="contact.php" method="post">

            <div class="parent">

                <div class="div1">

                    <input class='mail'type="text" placeholder="email" name="mail" value="" />

                </div>

                <div class="div2"> 

                    <input class='soc' type="text" placeholder="Nom de l'entreprise" name="societe" value="" />  

                </div>

                <div class="div3"> 

                    <br>
                    <label>Objet : </label>
                    <select name="objett" id="sujet-select">
                        <option value="Demande commercial">Demande commercial</option>
                        <option value="Proléme technique">Proléme technique</option>
                        <option value="Renseignement">Renseignement</option>
                        <option value="lostmdp">Mot de passe perdu</option>
                        <option value="lostid">Identifiant perdu</option>
                    </select>

                </div>

                <div class="div4">

                    <br>
                    <textarea id='message' name="message" placeholder='message' cols="" rows=""></textarea>
                    
                </div>

                <input type="submit" id='submit' name="envoi" value='ENVOIE' >

            </div>

        </form>

    </div>

</body>

<?php

