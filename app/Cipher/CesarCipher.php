<?php

namespace App\Cipher;

class CesarCipher implements CiphersContract {
    public function encrypt(string $input): string
    {
        return str_rot13($input);
    }
    
    public function decrypt(string $input): string
    {
        return $this->encrypt($input);
    }
}