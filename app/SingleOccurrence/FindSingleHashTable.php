<?php

namespace App\SingleOccurrence;

use App\SingleOccurrence\Exceptions\NonNumericElementInArrayException;

/**
 * To rozwiązanie jest bardziej czytelne i jego złożoność obliczeniowa jest rzędu n.
 */
class FindSingleHashTable {
    public function findSingle(array $input): array
    {
        $this->checkFindSingleInput($input);
        $indices = [];
        $inputLength = count($input);

        foreach ($input as $key => $value) {
            $value = (string) $value;
            isset($indices[$value]) ? $indices[$value][] = $key: $indices[$value]= [$key];
        }

        foreach ($indices as $value => $keys) {
            if (count($indices[$value]) !== 1) {
                foreach($indices[$value] as $keyToRemove) {
                    unset($input[$keyToRemove]);
                }
            }
        }
        
        return array_values($input);
    }

    private function checkFindSingleInput(array $input): void
    {
        foreach ($input as $value) {
            if (!is_numeric($value))
                throw new NonNumericElementInArrayException;
        }
    }
}