<?php

spl_autoload_register( function ($classe){
    require $classe . '.php';
});


$t1=new Titulaire("Dupuis","Jean","01/01/2000","Freu");
$c1=new Compte("Compte courant", 100, "€", $t1);
$c2=new Compte("livret A", 4658.05, "€", $t1);
$t2=new Titulaire("Martin", "Micheline", "15/06/1975", "Strasbourg");
$c3=new Compte("Compte courant", 7800, "€", $t2);
// $c4=new Compte("Compte courant", 7800, "€", $t2); gérer le cas de la création de 2 comptes identique pour une même personne
$c5=new Compte("livret A", 56.8, "€", $t2);
$c6=new Compte("LEP", 4000, "€", $t2);
echo $t1->getAffichage();
// echo $c1;
echo "<h3>tests credit et debit :</H3>";
$c1->credit(50);
$c1->debit(20);
echo "<h3>test debit trop important</h3>";
$c1->debit(1000);
echo "<h3>test virement</h3>";
$c1->virement(20,$c3);
echo "<h3>test virement sur le même compte</h3>";
$c1->virement(10,$c1);
echo "<h3>test virement trop important</h3>";
$c2->virement(80000,$c2);
echo $t1->getAffichage();
// echo $t2->getAffichage();



?>