<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/utils.css">
    <link rel="stylesheet" href="../CSS/animation.css">
    <title>Delete</title>

    <?php
        include "Functions/contacts.php";
        $conexiune = get_conexion();
        $exista = true;

        if(isset($_POST["deleteContactBtn"])){
            $contact = $_POST['contact'];
            if(get_contact($contact,$conexiune)==false){
                $exista = false;
            }else{
                delete_contact(get_contact($contact,$conexiune),$conexiune);
                header("Location: ../index.php");
            }
        }
        
    ?>
</head>
<body class="Background">
    <head>
        <h1>Șterge contact</h1>
    </head>

    <main>
        <div class="Box">
            <p>
                Introdu numele contactului pe care vrei sa îl introduci! <br>
                Vor fi șterse toate numerele de telefon și adresele de email asociate
                contactului respectiv!
            </p>
            <form action="delete.php" method="post" id="modform">
                <input type="text" name="contact" id="contact"  placeholder="Nume">
                <input type="submit" value="Șterge Contact" name="deleteContactBtn" id="submit">
            </form>
            <p class="Warning">
            <?php
                if(!$exista){
                    echo "Nu exista contactul cu numele $contact";
                }
            ?>
            </p>
        </div>
    </main>
</body>
</html>