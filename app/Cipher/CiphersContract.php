<?php

namespace App\Cipher;

interface CiphersContract {
	public function encrypt(string $input): string;
	public function decrypt(string $input): string;
}