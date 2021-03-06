<?php 

session_start();

require 'dbcon.php';
if( isset($_SESSION['user_id']) ){
    $records = $conn->prepare('SELECT user_id, email, password FROM user WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $user = NULL; 
    
    if( count($results) > 0){
        $user = $results;
    }
}

?>


<!DOCTYPE html>
<html lang="da">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <meta name="description" content="Er dine venner også træt af at bære kasser ned for 4. sal, mangler du penge til weekendens bytur - Hos GoMove hjælper vi hinanden nemt og billigt">
        <meta name="keywords" content="move, nemt, billigt, hjælp, tjen penge">
        <title>GoMove - din flytteportal</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    </head>
    <body>
        <?php include 'nav_logged_in.php'; ?>
        
        
        
        <div class="section no-pad-bot" id="home">
            <div class="container">
                <h1 class="header center">GoMove</h1>
                <div class="row center">
                    <!-- <h5 class="header col s12 light">Flyt dig Kaj - jeg vil gerne hjælpe</h5> -->
                </div>
                <div class="row center">
                    <img class="responsive-img" src="img/forside_cirkel.png" width="40%">
                </div>
                <div class="row center">
                    <div id="button">
                    <a href="#" class="waves-effect waves-light btn-large" >Jeg hjælper!</a>
                    <a href="#" class="waves-effect waves-light btn-large" >Jeg flytter!</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="info">
            <div class="container">
                <h1 class="header center orange-text"></h1>
          <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <img class="responsive-img" src="img/info_hvad.png" alt="GoMove er en tjeneste hvor du har mulighed for at søge hjælp til flytning eller tilbyde hjælp">
                            <h5 class="center">Hvad</h5>
                            <p class="light">GoMove er en tjeneste, hvor du kan oprette dig som bruger. Som bruger har du mulighed for enten at søge hjælp til flytning, eller tilbyde andre hjælp. Har du en bil? Er du stærk? Har du kørekort? Har du en støvet trailer stående i garagen? Du kan tilbyde de kompetencer, du besidder, og dermed matche med den bruger, der søger dét du har.
                            </p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <img class="responsive-img" src="img/info_hvorfor.png" alt="Er dine venner også træt af at bære kasser ned for 4. sal, mangler du penge til weekendens bytur - Hos GoMove hjælper vi hinanden nemt og billigt">
                            <h5 class="center">Hvorfor</h5>
                            <p class="light">GoMove er et nyt tiltag for unge og studerende i København, som flytter meget rundt i deres studietid. 3 måneder fremleje her, 6 måneder på et værelse dér, bliver hurtigt til mange flytninger på et år. Som ung på SU er det dyrt at benytte sig af flyttefirmaer, og er derfor ikke altid en mulighed. Her kommer GoMove ind i billedet!
                            </p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <img class="responsive-img" src="img/info_hvordan.png" alt="Opret dig som bruger og flyt elelr hjælp allerede i dag">
                            <h5 class="center">Hvordan</h5>
                            <p class="light">>For at kunne bruge GoMove skal du oprette dig som bruger. Du kan når som helst oprette en hjælpende hånd eller en flyting, bare indtast hvad du har brug for eller hvad du tilbyder og du er i gang. Se flytinger  i dit nabolag og kom dine nærmeste til undsætning eller se om der er en nabo der lige kan hjælpe med at få din nye sofa op i lejligheden. Lige meget hvad er GoMove løsningen.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section" id="lokation">
            <div class="container">
                <h1 class="header center orange-text">Lokation</h1>
                <div class="row center">
                    <h5 class="header col s12 light">Find flytninger og hjælp nær dig</h5>
                </div>
                <div class="row center">
                    <img class="responsive-img" src="img/map.png">
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>
    </body>
</html>
