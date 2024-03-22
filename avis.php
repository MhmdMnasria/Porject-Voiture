<?php 
    include("connection.php");

    $nom = "";
    $avis = "";
    $errormessage = "";
    $successMessage = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if((empty($_POST["name"]) || empty($_POST["message"]))){

            $errormessage = "verifier les champs";

        }
        else{
            $nom = $_POST["name"];
            $avis = $_POST["message"];
            $sql = "INSERT INTO avis (nom, avis) VALUES ('$nom', '$avis');";

            $result = $connection->query($sql);
            if(!$result){
                die("invalid query: ". $connection->error);
            }
            $successMessage = "avis ajouté avec succée";
        }
    }
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <h1>CAR</h1>
        </div>
        <nav>
            <ul>
                <li><a href="http://localhost/projet_voiture/">Accueil</a></li>
                <li><a href="">Modèles</a></li>
                <li><a href="">Avis</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="avis">
        <div class="container">
            
            <h2 style="margin-top: 10px">Ajouter votre avis</h2>
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" class="form-control" name = "name" id="name" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="message">Avis:</label>
                    <textarea class="form-control" name = "message" id="message" rows="3" placeholder="Entrez votre avis"></textarea>
                </div>
                <?php 
                    if(!empty($errormessage)){
                    echo"
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$errormessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                        ";
                    }
                    else{
                        if(!empty($successMessage)){
                        echo"
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        ";
                        } 
                    }
                ?>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
            <h1 class="section-title" style="margin-top:10px">Tous les Avis</h1>
            <table class="table table-bordered">
                <thead class="thead">
                    <tr>
                        <th>Nom</th>
                        <th>Avis</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM avis";

                        $result = $connection->query($sql);

                        if(! $result) {
                            die("invalid query: " . $connection->error);
                        }
                        else{
                            while ($row = $result->fetch_assoc()) {
                            echo"<tr>
                                    <td>$row[nom]</td>
                                    <td>$row[avis]</td>
                                    <td>$row[date_d]</td>
                                </tr>
                                ";
                        }
                        }
                        
                    ?>
                </tbody>
            </table>

            
            
            
        </div>
    </section>
    
    <footer>
        <center><p style="margin: 20px;">&copy; 2024 Car Company. Tous droits réservés.</p></center>
    </footer>
</body>
</html>
