<?php 
    include("connection.php");

    $errormessage = "";
    $successmessage = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["name"]) || empty($_POST["address"]) || empty($_POST["phone"]) || empty($_POST["email"]) || empty($_POST["message"])){
            $errormessage = "Verifier les champ Vides";
        }
        else{
            $name = $_POST["name"];
            $address = $_POST["address"];
            $phone = $_POST["phone"];
            $id = $_POST["email"];
            $message = $_POST["message"];

            $sql = "INSERT INTO clients (nom, address, phone, email, message) VALUES ('$name', '$address', '$phone', '$id', '$message');";

            try{
                $result = $connection->query($sql);
            }
            catch(Exception $e){
                die("invalid query: " . $connection->error);
            }
            $successmessage = "Message Envoyée avec Succée";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
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
                <li><a href="http://localhost/projet_voiture/">Acceuil</a></li>
                <li><a href="">Modèles</a></li>
                <li><a href="avis.php">Avis</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
        <a href="list.php" class="link-light text-white">List Des Clients</a>
    </header>

    <section class="contact-section">
        <div class="container">
            <h1 class="section-title">Contactez Nous</h1>
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone">Numero Telephone</label>
                    <input type="tel" id="phone" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" class="form-control" rows="5"></textarea>
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
                        if(!empty($successmessage)){
                        echo"
                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>$successmessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                        ";
                        } 
                    }
                ?>
                <button type="submit" class="btn btn-primary">Envoyer Message</button>
            </form>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
