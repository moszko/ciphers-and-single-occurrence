<?php
/* W drugim przykładzie kolejność elementów
 * w tablicy wynikowej jest dość enigmatyczna,
 * nie jest to pierwotny porządek.
 * Stąd zakładam, że nie ma ona znaczenia i istotne jest tylko
 * zresetowanie kluczy. Przedstawiłem dwa rozwiązania, które
 * obecne są w tym samym katalogu.
 */


/**
 * Znajduje liczby, które się nie powtarzają
 *
 * @param $input array Tablica liczb
 * @return array
 */
public function findSingle(array $input): array
{
	return [];
}

print_r(findSingle([1, 2, 3, 4, 1, 2, 3]));
// Array
// (
//     [0] => 4
// )


print_r(findSingle([11, 21, 33.4, 18, 21, 33.39999, 33.4]));
// Array
// (
//     [0] => 11
//     [1] => 33.39999
//     [2] => 18
// )