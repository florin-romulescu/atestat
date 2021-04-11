<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/utils.css">
    <link rel="stylesheet" href="../CSS/animation.css">
    <title>Add</title>

    <?php
    
    include "Functions/contacts.php";
    $conexiune = get_conexion();

    if(isset($_POST["addContactBtn"])){
        $contact = $_POST["contact"];
        $telefon = $_POST["telefon"];
        $email = $_POST["email"];

        if(get_contact($contact,$conexiune)==false){
            echo "works";
            $new_contact = get_number_of_contacts($conexiune)+1;
            add_contact($new_contact,$contact,$conexiune);
        }else {
            echo "works";
            $new_contact = get_contact($contact,$conexiune);
        }
       	if ($telefon != '') 
        	add_phone($new_contact,$telefon,$conexiune);
	if ($email != '')
		add_email($new_contact,$email,$conexiune);
        header("Location: ../index.php");
    }

    ?>

</head>
<body class="Background">
    <head>
        <h1 class="Centered">Adauga Contact</h1>
    </head>

    <main>
        <div class="Box">
            <p>
                Daca acest contact exista numarul de telefon si adresa de email 
                vor fi adaugate contactului respectiv!
            </p>

            <form action="add.php" method="post" id="modform">
                <input type="text" name="contact" id="contact" placeholder="Nume">
                <input type="tel" name="telefon" id="telefon" pattern="07[0-9]{8}" placeholder="Telefon">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="submit" value="Adauga contact" name="addContactBtn" id="submit">
            </form>
        </div>
    </main>
</body>
</html>
