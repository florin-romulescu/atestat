<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/main.css">
    <link rel="stylesheet" href="../CSS/utils.css">
    <link rel="stylesheet" href="../CSS/animation.css">
    <title>Profile</title>
    <?php
        include "Functions/contacts.php";
        $conexiune = get_conexion();
        $contact = get_contact($_POST["nume"],$conexiune);
        $aspect = get_aspect($conexiune);
        if($aspect == 'Intunecat')
            echo '<link rel="stylesheet" href="../CSS/dark.css">';

        if(isset($_POST['value'])){
            $value = $_POST['value'];
            if($_POST['tip']=='phone'){
                delete_phone($_POST['value'],$conexiune);
            }else if($_POST['tip']=='email'){
                delete_email($_POST['value'],$conexiune);
            }
            if(check_contact($contact,$conexiune) == false){
                delete_contact($contact,$conexiune);
                header("Location: ../index.php");
            }
        }
        
    ?>
    <style>
        main{
            display:flex;
            flex-direction: column;
            align-items:center;
        }
        main>form{
            margin-top: 5%;
            text-align:center;
            width:100%;
        }
        main>form>input#submit{
            <?php
                if($aspect != 'Intunecat'){
                ?>
            background-color: rgb(255,255,255);
            <?php } ?>
            width: 20%;
        }
    </style>
</head>
<body class="Background-Alpha">
    <head>
        <h1>
            <?php echo $_POST["nume"]; ?>
        </h1>
    </head>

    <main>
    <div class="List translucid">
        Numere de telefon:
        <hr>
            <ul>
            <?php
                $nr=0;
                $rez = mysqli_query(
                    $conexiune,
                    "select nume from Numere where id=$contact"
                );
                
                while($linie = mysqli_fetch_assoc($rez)['nume']){
                    echo "<li>$linie";
                    ?>
                        
                        <form action="profile.php" method="post" id='editform'>
                            <input type="hidden" name="tip" value="phone">
                            <input type="hidden" name="nume" value='<?php echo $_POST["nume"]; ?>'>
                            <input type="hidden" name="value" value='<?php echo "$linie"; ?>'>
                            <input type="submit" value="X" class='DeleteBtn'>
                        </form>
                    <?php
                    $nr++;
                }
                mysqli_free_result($rez);
                if($nr==0) echo "<li> Nu exista numere de telefon";
            ?>
            </ul>
        Adrese de email:
        <hr>
            <ul>
            <?php 
                $nr=0;
                $rez = mysqli_query(
                    $conexiune,
                    "select adresa from Adrese where id=$contact"
                );
                while($linie = mysqli_fetch_assoc($rez)['adresa']){
                    $nr++;
                    echo "<li>$linie";
                    ?>
                        
                        <form action="profile.php" method="post" id='editform'>
                        <input type="hidden" name="tip" value="email">
                        <input type="hidden" name="nume" value='<?php echo $_POST["nume"]; ?>'>
                            <input type="hidden" name="value" value='<?php echo "$linie"; ?>'>
                            <input type="submit" value="X" class="DeleteBtn">
                        </form>
                
                    <?php
                }
                mysqli_free_result($rez);
                if($nr==0) echo "<li> Nu exista adrese de email";
            ?>
            </ul>
            </div>

        <form action="delete.php" method="post">
                <input type="hidden" name="contact" value="<?php echo $_POST['nume'];?>">
                <input type="submit" value="Sterge contactul" class="Button Shadow Btn" id="submit" name="deleteContactBtn">
        </form>
    </main>
</body>
</html>
