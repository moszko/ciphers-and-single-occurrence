<?php

class FindSingleHashTableTest extends \PHPUnit\Framework\TestCase {
    /**
     * @dataProvider findsSingleProvider
     */
    public function testFindsSingle($input, $output): void
    {
        $findSingleHashTable = new App\SingleOccurrence\FindSingleHashTable;
        $this->assertEquals($findSingleHashTable->findSingle($input), $output);
    }

    /**
     * @dataProvider throwsExceptionOnNonNumericElementInArrayProvider
     */
    public function testThrowsExceptionOnNonNumericElementInArray($input): void
    {
        $this->expectException(\App\SingleOccurrence\Exceptions\NonNumericElementInArrayException::class);
        $findSingleHashTable = new App\SingleOccurrence\FindSingleHashTable;
        $findSingleHashTable->findSingle($input);
    }

    public function findsSingleProvider(): array
    {
        return [
            [[],[]],
            [[1, 2, 3, 4, 1, 2, 3], [4]],
            [[11, 21, 33.4, 18, 21, 33.39999, 33.4], [11, 18, 33.39999]],
            [[11, 21, 33.4, 18, 21, 33.39999, 33.4, 35], [11, 18, 33.39999, 35]],
            [[11, 21, 33.4, 18, 21, 33.39999, 33.4, 33, 35, 36], [11, 18, 33.39999, 33, 35, 36]],
            [[1, 1, 1, 1, 1, 1], []],
            [[0, 1, 1], [0]],
            [[2, 1, 1, 1, 1, 1, 1], [2]],
            [[-1.5e3, -1500, 1500, 4E-5, 0.00004], [1500]],
        ];
    }

    public function throwsExceptionOnNonNumericElementInArrayProvider(): array
    {
        return [
            [[1, 2, "asd"]],
            [[2, -6.5, [], 34]],
            [[3,-4.44, NULL, NULL]]
        ];
    }
}