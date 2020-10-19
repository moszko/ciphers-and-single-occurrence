<?php

class AtBashCipherTest extends \PHPUnit\Framework\TestCase
{
    public function testImplementsCiphersContract() {
        $cipher = new App\Cipher\AtBashCipher;
        $this->assertTrue($cipher instanceof App\Cipher\CiphersContract);
    }

    /**
     * @dataProvider encryptionDecryptionProvider
     */
    public function testEncryptionIsWorking($input, $output) {
        $cipher = new App\Cipher\AtBashCipher;
        $this->assertEquals($cipher->encrypt($input), $output);
    }

     /**
     * @dataProvider encryptionDecryptionProvider
     */
    public function testDecryptionIsWorking($input, $output) {
        $cipher = new App\Cipher\AtBashCipher;
        $this->assertEquals($cipher->decrypt($input), $output);
    }

    public function encryptionDecryptionProvider(): array {
        return [
            ["",""],
            ["a","z"],
            ["M","N"],
            ["Ł", "Ł"],
            ["ж", "ж"],
            ["3&.<>6%","3&.<>6%"],
            ["Zażółć gęślą jaźń.", "Azżółć tęśoą qzźń."]
        ];
    }
}