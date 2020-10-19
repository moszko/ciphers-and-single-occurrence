<?php

namespace App\SingleOccurrence;

use App\SingleOccurrence\Exceptions\NonNumericElementInArrayException;

/**
 * To rozwiązanie jest mniej czytelne i przez przez quicksort
 * jego złożoność obliczeniowa może być nawet rzędu n^2, ale przeciętnie jest to n*logn.
 */
class FindSingleQuicksortLoop {
    public function findSingle(array $input): array
    {
        $this->checkFindSingleInput($input);
        sort($input);
        $length = count($input);
        for ($i = 1; $i < $length; $i++) {
            $temp_index = $i-1;
            $hasValueOccuredMoreThanOnce = false;
    
            while(is_numeric($input[$i]) && $input[$i] == $input[$temp_index]) {
                $hasValueOccuredMoreThanOnce = true;
                unset($input[$i]);
                $i++;
                if($i >= $length){
                    unset($input[$temp_index]);
                    break;
                }
            }
            if($hasValueOccuredMoreThanOnce){
                unset($input[$temp_index]);
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