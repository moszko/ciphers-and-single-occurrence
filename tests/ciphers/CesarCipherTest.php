<?php

class CesarCipherTest extends \PHPUnit\Framework\TestCase
{
    public function testImplementsCiphersContract(): void
    {
        $cipher = new App\Cipher\CesarCipher;
        $this->assertTrue($cipher instanceof App\Cipher\CiphersContract);
    }

    /**
     * @dataProvider encryptionDecryptionProvider
     */
    public function testEncryptionIsWorking($input, $output): void
    {
        $cipher = new App\Cipher\CesarCipher;
        $this->assertEquals($cipher->encrypt($input), $output);
    }

     /**
     * @dataProvider encryptionDecryptionProvider
     */
    public function testDecryptionIsWorking($input, $output): void
    {
        $cipher = new App\Cipher\CesarCipher;
        $this->assertEquals($cipher->decrypt($input), $output);
    }

    public function encryptionDecryptionProvider(): array
    {
        return [
            ["",""],
            ["m","z"],
            ["A","N"],
            ["Ł", "Ł"],
            ["ж", "ж"],
            ["3&.<>6%","3&.<>6%"],
            ["Zażółć gęślą jaźń.", "Mnżółć tęśyą wnźń."]
        ];
    }
}