<?php

class BaconCipherTest extends \PHPUnit\Framework\TestCase
{
    public function testImplementsCiphersContract(): void
    {
        $cipher = new App\Cipher\BaconCipher;
        $this->assertTrue($cipher instanceof App\Cipher\CiphersContract);
    }

    /**
     * @dataProvider encryptionProvider
     */
    public function testEncryptionIsWorking($input, $output): void
    {
        $cipher = new App\Cipher\BaconCipher;
        $this->assertEquals($cipher->encrypt($input), $output);
    }

     /**
     * @dataProvider decryptionProvider
     */
    public function testDecryptionIsWorking($input, $output): void
    {
        $cipher = new App\Cipher\BaconCipher;
        $this->assertEquals($cipher->decrypt($input), $output);
    }

    /**
     * @dataProvider wronglyEncryptedStringExceptionProvider
     */
    public function testThrowsExceptionOnWronglyEncryptedInput($input) {
        $this->expectException(App\Cipher\Exceptions\WronglyEncryptedStringException::class);
        $cipher = new App\Cipher\BaconCipher;
        $cipher->decrypt($input);
    }

    public function encryptionProvider(): array
    {
        return [
            ["",""],
            ["m","ababb"],
            ["c","aaaba"],
            ["Ł", "Ł"],
            ["ж", "ж"],
            ["3&.<>6%","3&.<>6%"],
            ["Zażółć gęślą jaźń.", "babbbaaaaażółć aabbaęśababaą abaaaaaaaaźń."],
            ["VuEiJa", "baabbbaabbaabaaabaaaabaaaaaaaa"]
        ];
    }

    public function decryptionProvider(): array {
        return [
            ["",""],
            ["ababb","m"],
            ["aaaba","c"],
            ["Ł", "Ł"],
            ["ж", "ж"],
            ["3&.<>6%","3&.<>6%"],
            ["babbbaaaaażółć aabbaęśababaą abaaaaaaaaźń.", "zażółć gęślą iaźń."],
            ["baabbbaabbaabaaabaaaabaaaaaaaa", "uueiia"]
        ];
    }

    public function wronglyEncryptedStringExceptionProvider(): array
    {
        return [
            ["abba"],
            ["abbac"],
            ["abbaac"],
            ["babababa"],
            ["aaaabźbcabb"]
        ];
    }
}