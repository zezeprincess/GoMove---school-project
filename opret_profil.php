
<?php 

require 'dbcon.php';

$message = '';

session_start();

if( isset($_SESSION['user_id'])){
    header("location: index.php");
}
    
    // Hvis input-felterne ikke er tomme, kør følgende: 
    if(!empty($_POST['email']) && !empty($_POST['password'])):

    // Enter the new user in the database med sql statement INSERT INTO.

    $sql = "INSERT INTO user (name, email, password, address, zipcode_zipcode) VALUES (:name, :email, :password, :address, :zipcode_zipcode)";
        $stmt = $conn->prepare($sql);
    
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
    $stmt->bindParam(':email', $_POST['email']);
    
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':zipcode_zipcode', $_POST['zipcode']);
    
        if($stmt->execute() ):
            //die('Succes');
            $message = 'Tak - du kan nu logge ind.';
        else:
            //die('Fail');
            $message = 'Hov, der skete en fejl. Prøv venligst igen.';
        endif;

    endif;
    

?>

<!DOCTYPE html>
<html lang="da">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <meta name="description" content="Er dine venner også træt af at bære kasser ned for 4. sal, mangler du penge til weekendens bytur - Hos GoMove hjælper vi hinanden nemt og billigt">
        <meta name="keywords" content="move, nemt, billigt, hjælp">
        <title>GoMove - din flytteportal</title>
        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
        <!--  Scripts-->
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="js/materialize.js"></script>
        <script src="js/init.js"></script>  
        <script>
            $(document).ready(function() {
            $('select').material_select();
            });
            
        </script> 
    </head>
    <body>
        <?php include 'nav.php';?>
              
        <div class="section" id="login">
            <div class="container">
                <h1 class="header center"><span style="color:#404040">Opret bruger</span></h1>
                <div class="row">
                    <form action="opret_profil.php" method="POST" class="col s12">
                        <div class="row">
                            <div class="col s2"></div>
                            <div class="input-field col s3">
                                <input id="username" type="text" name="name" class="validate">
                                <label for="username">Navn</label>
                            </div>
                            <div class="col s2"></div>
                            <div class="input-field col s3">
                                <input id="email" type="email" name="email" class="validate">
                                <label for="email" data-error="wrong" data-success="right">Email</label>    
                            </div>
                            <div class="col s2"></div>
                        </div>
                        <div class="row">
                            <div class="col s2"></div>
                            <div class="input-field col s3">
                                <input id="gade" type="text" name="address" class="validate">
                                <label for="gade">Adresse</label>   
                                
                            </div>
                            <div class="col s2"></div>
                            <div class="input-field col s3">
                                <input id="postnr" type="text" name="zipcode" class="validate">
                                <label for="postnr">Postnummer</label>
                            </div>
                            <div class="col s2"></div>
                        </div>
                        <div class="row">
                            <div class="col s2"></div>
                            <div class="input-field col s3">
                                <input id="password" type="password" name="password" class="validate">
                                <label for="password">Password</label>
                            </div>
                            <div class="col s2"></div>
                            <div class="input-field col s3">
                                <input name="password_confirm" required="required" type="password" id="password_confirm" oninput="check(this)" />
                                <script language='javascript' type='text/javascript'>
                                    function check(input) {
                                        if (input.value != document.getElementById('password').value) {
                                            input.setCustomValidity('Hovsa, dine passwords er ikke ens.');
                                        } else {
                                            // input is valid -- reset the error message
                                            input.setCustomValidity('');
                                        }
                                    }
                                </script>
                                <label for="password">Bekræft password</label>
                            </div>
                            <div class="col s2"></div>
                        </div>
                        <!-- Billede upload er udkommenteret, da det ville ville virke
                        <div class="row">
                            <div class="col s2"></div>
                            <div class="input-field col s3">
                                
                            </div>
                            <div class="col s2"></div>
                            <div class="col s3">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Vælg</span>
                                        <input name="fileToUpload" id="fileToUpload" type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" placeholder="Profilbillede" type="text">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="row center">
                            <div id="button">
                                <button class="btn waves-effect waves-light" type="submit" name="action">Opret</button>
                                <a class="waves-effect waves-light btn" style="background-color:#3b5998">Facebook</a>
                                <a class="waves-effect waves-light btn" style="background-color:#d34836">Google+</a>
                            </div>
                            <!-- Når bruger har trykket på opret-knappen udskrives $message, som er defineret i forbindelse med php'en og sql'en i starten af dokumentet -->
                            <?php if(!empty($message)): ?>
                                <h5 class="row center"><?= $message ?></h5>
                            <?php endif; ?>
                        </div>        
                    </form>
                </div>
            </div>
        </div> 
    </body>
</html>