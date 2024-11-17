<?php

use BO\GameMotus;
require_once(__DIR__."/../src/model/BO/gameMotus.php");

$word = "troubadour";


$motus = new GameMotus($word);

$motus->displayWord();//affiche le mot cacher au début du jeux 

$motus->checkWordCorrespondence("RRRRRRRRRRRRRRRRR"); //regarde lettre par lettre le mots écrit avec le mot à trouver et l'ajoute au mot cacher a la même position que la lettre corespondant  

$motus->displayWord(); // affiche le mot cacher après modification