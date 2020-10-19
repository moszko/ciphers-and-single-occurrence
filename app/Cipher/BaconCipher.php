<?php

namespace App\Cipher;

use App\Cipher\Exceptions\WronglyEncryptedStringException;

class BaconCipher implements CiphersContract {
    public const BACON_ENCRYPT = [
        "a" => "aaaaa",
        "b" => "aaaab",
        "c" => "aaaba",
        "d" => "aaabb",
        "e" => "aabaa",
        "f" => "aabab",
        "g" => "aabba",
        "h" => "aabbb",
        "i" => "abaaa",
        "j" => "abaaa",
        "k" => "abaab",
        "l" => "ababa",
        "m" => "ababb",
        "n" => "abbaa",
        "o" => "abbab",
        "p" => "abbba",
        "q" => "abbbb",
        "r" => "baaaa",
        "s" => "baaab",
        "t" => "baaba",
        "u" => "baabb",
        "v" => "baabb",
        "w" => "babaa",
        "x" => "babab",
        "y" => "babba",
        "z" => "babbb"
    ];

    public const BACON_DECRYPT = [
        "aaaaa" => "a",
        "aaaab" => "b",
        "aaaba" => "c",
        "aaabb" => "d",
        "aabaa" => "e",
        "aabab" => "f",
        "aabba" => "g",
        "aabbb" => "h",
        "abaaa" => "i",
        "abaab" => "k",
        "ababa" => "l",
        "ababb" => "m",
        "abbaa" => "n",
        "abbab" => "o",
        "abbba" => "p",
        "abbbb" => "q",
        "baaaa" => "r",
        "baaab" => "s",
        "baaba" => "t",
        "baabb" => "u",
        "babaa" => "w",
        "babab" => "x",
        "babba" => "y",
        "babbb" => "z"
    ];

    public function encrypt(string $input): string
    {
        $inputLowercase = strtolower($input);
        $inputLength = strlen($inputLowercase);
        $output = "";
        for ($i = 0; $i < $inputLength; $i++) {
            $output .= self::BACON_ENCRYPT[$temporaryCharacter = mb_substr($inputLowercase, $i, 1)] ?? $temporaryCharacter;
        }
        return $output;
    }
    
    public function decrypt(string $input): string
    {
        $output = "";
        $inputLength = strlen($input);
        for ($i = 0; $i < $inputLength; $i++) {
            if (
                ($temporaryCharacter = mb_substr($input, $i, 1)) !== "a"
                && $temporaryCharacter !== "b"
                && !preg_match("/[a-z]/i", $temporaryCharacter)
            ) {
                $output .= $temporaryCharacter;
                continue;
            } elseif(isset(self::BACON_DECRYPT[$encodedTemporaryCharacter = mb_substr($input, $i, 5)])) {
                $output .= self::BACON_DECRYPT[$encodedTemporaryCharacter];
                $i+=4;
            } else {
                throw new WronglyEncryptedStringException;
            }
        }
        return $output;
    }
}