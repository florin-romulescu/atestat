

<?php

    function get_conexion(){
        $server = "localhost";
        $user = "contacte";
        $password = "contacte";
        $bd = "CONTACTE";

        return mysqli_connect(
            $server,
            $user,
            $password,
            $bd
        );
    }

    function get_number_of_contacts($conexiune){
        $rez = mysqli_query(
            $conexiune,
            "select count(*) from Contacte"
        );

        return (int) mysqli_fetch_assoc($rez)['count(*)'];
    }

    function get_contact($nume,$conexiune){
        $contact = (int) mysqli_fetch_assoc(
            mysqli_query(
                $conexiune,
                "select count(*) from Contacte where nume='$nume'"
            )
        )['count(*)'];

        if($contact == 0) return false;
        return (int) mysqli_fetch_assoc(
            mysqli_query(
                $conexiune,
                "select id from Contacte where nume='$nume'"
            )
        )['id'];
    }

    function add_contact($id,$nume,$conexiune){
        mysqli_query(
            $conexiune,
            "insert into Contacte value ($id,'$nume')"
        );
    }

    function delete_contact($id,$conexiune){
        mysqli_query(
            $conexiune,
            "delete from Contacte where id=$id"
        );
        mysqli_query(
            $conexiune,
            "delete from Numere where id=$id"
        );
        mysqli_query(
            $conexiune,
            "delete from Adrese where id=$id"
        );

        mysqli_query(
            $conexiune,
            "update Contacte set id=id-1 where id>$id"
        );
        mysqli_query(
            $conexiune,
            "update Numere set id=id-1 where id>$id"
        );
        mysqli_query(
            $conexiune,
            "update Adrese set id=id-1 where id>$id"
        );
    }

    function add_phone($idcontact,$nume,$conexiune){
        mysqli_query(
            $conexiune,
            "insert into Numere value($idcontact,'$nume')"
        );
    }

    function delete_phone($nume, $conexiune){
        mysqli_query(
            $conexiune,
            "delete from Numere where nume='$nume'"
        );
    }

    function add_email($idcontact,$nume,$conexiune){
        mysqli_query(
            $conexiune,
            "insert into Adrese value($idcontact,'$nume')"
        );
    }

    function delete_email($nume, $conexiune){
        mysqli_query(
            $conexiune,
            "delete from Adrese where adresa='$nume'"
        );
    }

    function check_contact($id, $conexiune){
        $rez = mysqli_query(
            $conexiune,
            "select count(*) from Numere where id=$id"
        );
        $nrphone = (int) mysqli_fetch_assoc($rez)['count(*)'];

        $rez = mysqli_query(
            $conexiune,
            "select count(*) from Adrese where id=$id"
        );
        $nremail = (int) mysqli_fetch_assoc($rez)['count(*)'];

        if($nremail==0 && $nrphone==0) return false;
        return true;

    }

    function get_aspect($conexiune){
        $rez =  mysqli_query(
            $conexiune,
            "select * from Aspect"
        );
        while($linie = @mysqli_fetch_assoc($rez)){
            if($linie['folosit']==1)
                return $linie['nume'];
        }
        return 'Default';
    }


    function change_aspect($conexiune){
        $aspect = get_aspect($conexiune);
        if($aspect == 'Intunecat')
            echo '<link rel="stylesheet" href="CSS/dark.css">';
    }
?>