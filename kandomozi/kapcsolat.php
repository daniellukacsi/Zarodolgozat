<?php
require_once "config.php";

   if(isset($_POST['beir'])){
       extract($_POST);
       $sql="insert into visszajelzes values (null,'{$Vnev}','{$Knev}','{$Email}','{$Szov}')";
       $stmt=$db->exec($sql);
   }
?>

<div class="contact-us-container">
        <div class="contact-us-section contact-us-section1">
            <h1>Kapcsolat</h1>
            <p>Adatok</p>
            <form method="POST">
                <input type="text" placeholder="Vezetéknév" name="Vnev"><br>
                <input type="text" placeholder="Keresztnév" name="Knev" ><br>
                <input type="text" placeholder="E-mail cím" name="Email"><br>
                <textarea type="text" placeholder="Üzenet írása..." name="Szov" rows="10" cols="30"></textarea><br>
                <button type="submit" name="beir" value="submit">Küldés</button>
            </form>
        </div>
        <div class="contact-us-section contact-us-section2">
            <h1>Rólunk</h1>
            <h3>Telefon</h3>
            <p><a href="">+36 20 216 2568</a></p>
            <h3>Cím</h3>
            <p>6000 Kecskemét, Bethlen krt. 63</p>
            <h3>E-mail</h3>
            <p><a href="">zarodolgozat@kkando.com</a></p>
        </div>
    </div>
    <div class="gmap_canvas"><iframe id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12963.60370814023!2d19.689910372545842!3d46.91723122728676!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x76e03484e50b2f33!2zS2Vjc2tlbcOpdGkgU1pDIEthbmTDsyBLw6FsbcOhbiBUZWNobmlrdW0!5e0!3m2!1shu!2shu!4v1608203223214!5m2!1shu!2shu" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>