<?php
        require_once "config.php";
        $sql="select * from filmek;";
        $adatok="";
        $stmt=$db->query($sql);
        while($sor=$stmt->fetch()){
        extract($sor);
        $adatok.="
        <div class='filmekajanlo'>
                <div class='col-md-12 col-12'>
                    <div class='card bg-secondary text-light'>
                        <div class='card-body'>
                            <h1 class='card-title'>{$fCim}</h4>
                            <p class='card-text text-justify'>
                            {$fTartalom}
                            </p>
                            <iframe class='img-fluid w-100' src='{$fLink}' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
                        </div>
                    </div>
                </div></div>
        ";}
?>    
    
    <!--FILMEK-->
    <section>    
    <?=$adatok?>        
    </section>