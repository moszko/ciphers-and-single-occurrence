<?php

namespace App\Cipher;

class AtBashCipher implements CiphersContract {
    public const ATBASH_CIPHER = [
        "a" => "z",
        "b" => "y",
        "c" => "x",
        "d" => "w",
        "e" => "v",
        "f" => "u",
        "g" => "t",
        "h" => "s",
        "i" => "r",
        "j" => "q",
        "k" => "p",
        "l" => "o",
        "m" => "n",
        "n" => "m",
        "o" => "l",
        "p" => "k",
        "q" => "j",
        "r" => "i",
        "s" => "h",
        "t" => "g",
        "u" => "f",
        "v" => "e",
        "w" => "d",
        "x" => "c",
        "y" => "b",
        "z" => "a",
        "A" => "Z",
        "B" => "Y",
        "C" => "X",
        "D" => "W",
        "E" => "V",
        "F" => "U",
        "G" => "T",
        "H" => "S",
        "I" => "R",
        "J" => "Q",
        "K" => "P",
        "L" => "O",
        "M" => "N",
        "N" => "M",
        "O" => "L",
        "P" => "K",
        "Q" => "J",
        "R" => "I",
        "S" => "H",
        "T" => "G",
        "U" => "F",
        "V" => "E",
        "W" => "D",
        "X" => "C",
        "Y" => "B",
        "Z" => "A"
    ];

    public function encrypt(string $input): string
    {
        $inputLength = strlen($input);
        $output = "";
        for ($i = 0; $i < $inputLength; $i++) {
            $output .= self::ATBASH_CIPHER[$temporaryCharacter = mb_substr($input, $i, 1)] ?? $temporaryCharacter;
        }
        return $output;
    }
    
    public function decrypt(string $input): string
    {
        return $this->encrypt($input);
    }
}