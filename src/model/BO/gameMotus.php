<?php

namespace BO;

class GameMotus {
    private string $word;
    private array $wordSplit;
    private array $hidingWord;
    public array $listeTentative = [];

    public function getWord():string
    {
        return $this->word;
    } 
    public function setWord(string $word): static
    {
        $this->word = $word;
        return $this;
    }

    public function getWordSplit():array
    {
        return $this->wordSplit;
    }


    public function setWordSplit(array $wordSplit): static
    {
        $this->wordSplit = $wordSplit;
        return $this;
    }

    public function getHidingWord():array
    {
        return $this->hidingWord;
    }
    public function setHidingWord(array $hidingWord): static
    {
        $this->hidingWord = $hidingWord;
        return $this;
    }

    public function __construct(string $data) 
    {
        $data = strtoupper($data);
        $this->word = $data;
        $this->wordSplit = str_split($data);
        $this->hidingWord = $this->hiddingWord($data);
    }


    public function hiddingWord(string $data): array
    {
        $result = array();
        array_push($result, mb_substr($data,0,1));
        for($i=1; $i<mb_strlen($data); $i++)
        {
            array_push($result, "0");
        }


        return $result;
    }


    public function checkWordCorrespondence(string $inputWord): void
    {
        $arrayInput = str_split($inputWord);
        for($i = 1; $i < count($this->hidingWord); $i++)
        {
            if($this->wordSplit[$i] == $arrayInput[$i])
            {
                $this->hidingWord[$i] = $arrayInput[$i];

            }
        }
        //array_push($this->listeTentative, $this->hidingWord);
    }


    public function displayWord():void{
        
        for($i= 0; $i<count($this->hidingWord); $i++)
        {
            switch($this->hidingWord[$i])
            {
                case "0":
                    echo "_ ";
                    break;
                case "1":
                    echo "° ";
                    break;
                default: 
                    echo ($this->hidingWord[$i] . " ");
                    break;
            }



            //echo ($this->hidingWord[$i] . " ");
        }
        echo "\r\n\r\n";
    }


    public function clear(): void
    {
        echo chr(27)."[H".chr(27)."[2J";
    }


    public function gameFinish (string $inputWord): bool
    {
        return $this->word === $inputWord;
    }
}