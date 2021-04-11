<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/utils.css">
    <link rel="stylesheet" href="CSS/animation.css">
    <title>Document</title>

    <?php
    include "PHP/Functions/contacts.php";

    //Credentiale
    $conexiune = get_conexion();

    ?>

</head>
<body class="Background-Alpha">
    <head>
        <h1>Agenda</h1>
    </head>
    <?php
        if(get_number_of_contacts($conexiune) == 0){
    ?>

            <div class="Box">
                <h2>Nu exista contacte!</h2>
                <p>
                    OOPS... Nu exista contacte in baza de date!
                </p>
                <form action="PHP/add.php" method="post">
                    <input type="submit" value="Adauga contact" name="addBtn">
                </form>
            </div>

    <?php
        }else{
    ?>
    
    <div class="Slider Fixed">
        <ul>
            <li><a href="#A">A</a></li>
            <li><a href="#B">B</a></li>
            <li><a href="#C">C</a></li>
            <li><a href="#D">D</a></li>
            <li><a href="#E">E</a></li>
            <li><a href="#F">F</a></li>
            <li><a href="#G">G</a></li>
            <li><a href="#H">H</a></li>
            <li><a href="#I">I</a></li>
            <li><a href="#J">J</a></li>
            <li><a href="#K">K</a></li>
            <li><a href="#L">L</a></li>
            <li><a href="#M">M</a></li>
            <li><a href="#N">N</a></li>
            <li><a href="#O">O</a></li>
            <li><a href="#P">P</a></li>
            <li><a href="#Q">Q</a></li>
            <li><a href="#R">R</a></li>
            <li><a href="#S">S</a></li>
            <li><a href="#T">T</a></li>
            <li><a href="#U">U</a></li>
            <li><a href="#V">V</a></li>
            <li><a href="#W">W</a></li>
            <li><a href="#X">X</a></li>
            <li><a href="#Y">Y</a></li>
            <li><a href="#Z">Z</a></li>
    </ul>
    </div>

    <main>
        <table class="Centered Shadow">
            <tr><td>Contacte</td></tr>
            <?php
                include "PHP/Functions/table.php";
                if(isset($_POST['search']))
                    create_table($conexiune,$_POST['search']);
                else create_table($conexiune,'');
            ?>
        </table>

        </div>

        <div class="Options Fixed Shadow">
            <h2>Optiuni</h2>
            <form action="index.php" method="post">
                <input type="text" name="search" id="search" placeholder="Cauta" value="<?php echo $_POST['search']; ?>">
                <input type="image" src="img/search.png" alt="" name="searchimg" id="searchimg" width="30" height="30">
            </form>
            <form action="PHP/add.php" method="post" id="Add" name="Add">
                <input type="submit" value="Adauga contact" name="addBtn" class="Button Btn">
            </form>
            <form action="PHP/delete.php" method="post">
                <input type="submit" value="Sterge contact" name="deleteBtn" class="Button Btn">
            </form>
        </div>

    </main>
    <?php
        }
    ?>
</body>
</html>