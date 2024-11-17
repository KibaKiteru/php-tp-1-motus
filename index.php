<?php

use BO\GameMotus;
require __DIR__ . "/vendor/autoload.php";

require __DIR__ ."/src/model/BO/gameMotus.php";

$listWord = json_decode(file_get_contents(__DIR__ ."/src/model/words.json"), true);
$word = $listWord[array_rand($listWord)];


$motus = new  GameMotus($word);

$try = 1;

while (true) {
    $motus->clear();
    if($try >10)
    {
        echo"You lose this Game !!!\r\n\r\n";
        echo "The word is ".$motus->getWord()."\r\n\r\n";

        exit;
    }



    echo "MOTUS GAME \r\n   ". "try :".$try."/10\r\n\r\n\r\n";
    echo"letters : ".strlen($word)."\r\n\r\n\r\n";
    
    $motus->displayWord();


	$line = strtoupper(str_replace(" ", "", trim(fgets( STDIN))));

    if (strlen($line) !== count($motus->getHidingWord()))
    {
        $try ++;
        continue;
    }

    
    $isFinish = $motus->gameFinish($line);
    
    if ($isFinish) {
        echo "You win the game !!!!";
        exit;
    }

    if ($line == "") {
        continue;
    }

    $motus->checkWordCorrespondence($line);






 $try ++;
}




