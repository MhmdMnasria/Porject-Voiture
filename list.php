<?php include("connection.php");?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Clients</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                <li><a href="avis.php">Avis</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="clients">
        <div class="container">
            <h2>Liste des Clients</h2>
            <table class="table table-bordered">
                <thead class="thead">
                    <tr>
                        <th>Nom</th>
                        <th>Adresse</th>
                        <th>Téléphone</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM clients";

                        try{
                            $result = $connection->query($sql);
                        }
                        catch(Exception $e){
                            die("Invalid query: " . $connection->error);
                        }

                        while($row = $result->fetch_assoc()){
                            echo"<tr>
                                    <td>$row[nom]</td>
                                    <td>$row[address]</td>
                                    <td>$row[phone]</td>
                                    <td>$row[email]</td>
                                    <td>$row[message]</td>
                                    <td>$row[date_d]</td>
                                    <td><a type='button' class='btn btn-danger' href='effacer.php?id=$row[id]'>effacer</a></td>
                                </tr>";
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
