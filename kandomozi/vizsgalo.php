<?php

function try_to_login()
{
	// Behozzünk a másik fájlban létrehozott változót, hogy tudjuk megváltoztatni az értékét
	global $is_logged_in;
	
    // Ha bejelentkezhetünk
    if( can_try_login() == FALSE )
    {
        return;
    }

    // Ha a felhasználó név vagy a jelszó nem talál , hiba üzenet mutatása
    if( check_login() == FALSE )
    {
        echo "<div class='row justify-content-center'><h1>Helytelen adatok</h1></div>";
        return;
    }

    // Ha minden tökéletes, akkor bejelentkezés, és üzenet mutatása
    echo "<div class='row justify-content-center'><h1>Sikeres bejelentkezés</h1></div>";
	
	$is_logged_in = TRUE;
}

function can_try_login()
{
    // Ha üres a $_POST akkor nincs mit csinálni
    if( empty( $_POST ) )
    {
        return FALSE;
    }

    // Ha nem érkezett username akkor nincs mit csinálni
    if( ! isset( $_POST["username"] ) )
    {
        return FALSE;
    }

    // Ha nem érkezett jelszó akkor nincs mit csinálni
    if( ! isset( $_POST["password"] ) )
    {
        return FALSE;
    }

    // Ha minden OK
    return TRUE;
}

function check_login()
{
    $username = "Lukdan16a";
    $password = "Lukdan16a";

    // Ha nem talál a felhasználó név, hiba
    if( $_POST["username"] != $username )
    {
        return FALSE;
    }

    // Ha nem talál a jelszó, hiba
    if( $_POST["password"] != $password )
    {
        return FALSE;
    }

    // Minden ok, bejelentkezhet
    return TRUE;
}

?>