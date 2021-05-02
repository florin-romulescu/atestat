<?php
    include "Functions/contacts.php";
    $conexiune = get_conexion();

    $aspect = get_aspect($conexiune);
    if($aspect == 'Default'){
        mysqli_query(
            $conexiune,
            "update Aspect set folosit=0 where nume='Default'"
        );
        mysqli_query(
            $conexiune,
            "update Aspect set folosit=1 where nume<>'Default'"
        );
    }
    else{
        mysqli_query(
            $conexiune,
            "update Aspect set folosit=0 where nume='Intunecat'"
        );
        mysqli_query(
            $conexiune,
            "update Aspect set folosit=1 where nume<>'Intunecat'"
        );
    }
    header("Location: ../index.php");
?>