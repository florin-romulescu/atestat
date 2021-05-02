
<?php

    function create_table($conexiune,$search){
        $rez = mysqli_query(
            $conexiune,
            "select count(*) from Contacte where nume like '$search%'"
        );
        $nr = (int) mysqli_fetch_assoc($rez)['count(*)'];

        $rez = mysqli_query(
            $conexiune,
            "select nume from Contacte where nume like '$search%' order by nume"
        );

        $last_letter = '';

        if($nr==0)
                echo "<tr><td id='nocontacts'>Nu exista contacte!</td></tr>";

        while($linie = mysqli_fetch_assoc($rez)['nume']){
            if($last_letter != $linie[0]){
                echo "<tr class='Left'>";
                $last_letter = $linie[0];
                echo "<td id='$last_letter'> $last_letter";
                echo "<hr>";
                echo "<tr>";
            }
            echo "<tr><td>";
                echo "<form action='PHP/profile.php' method='post' id='tabform'>".
                    "<input type='hidden' name='nume' value='$linie'>".
                    "<input type='submit' value='$linie' class='Bold Button'>"
                ."</form>";
            echo "</tr>";
        }
    }

?>