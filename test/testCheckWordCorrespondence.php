<?php

use BO\GameMotus;
    require_once(__DIR__."/../src/model/BO/gameMotus.php");
    
    $motus = new GameMotus("test");
    echo "functional test for checkWordCorrespondence\r\n\r\n";
    
    echo "hiding word before function checkWordCorrespondence\r\n\r\n";
    var_dump($motus->getHidingWord());
    $motus->checkWordCorrespondence("TTTT");
    echo"hiding word after function checkWordCorrespondence\r\n\r\n";
    var_dump($motus->getHidingWord());
