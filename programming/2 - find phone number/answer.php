<?php
// Test it online: https://onlinephp.io/c/44e626
// Binary Search vs Linear Search: https://www.geeksforgeeks.org/linear-search-vs-binary-search/

/**
 * Linear search checks each element in a list sequentially until it finds the target or reaches the end, 
 * working well with unsorted data. 
 * 
 * Binary search, on the other hand, repeatedly divides a sorted list in half to efficiently locate the target, 
 * significantly reducing the number of comparisons needed.
 * 
 * Binary Search is faster than Linear Search. The bult-in PHP filter methods, such as array_search and in_array use Linear Search.
 * So usually, you want to implement a Binary Search when you care about performance.
 */

/**
 * Performs a binary search on a sorted array of objects
 *
 * @param string $phoneArray - Array of objects with "name" and "phone" properties. Both strings
 * @param string $targetName - Name of the person to lookup
 * 
 * @return string | null
 */
function binarySearch($phoneArray, $targetName) {
    $leftIndex = 0; // start of array
    $rightIndex = count($phoneArray) - 1; // start as the last index in the array

    // loop until leftIndex is greater than rightIndex
    while ($leftIndex <= $rightIndex) {
        // calculate $midIndex as the middle index of $leftIndex and $rightIndex
        $midIndex = floor(($leftIndex + $rightIndex) / 2); ;

        if ($phoneArray[$midIndex]['name'] < $targetName) {
            // adjust leftIndex to be one more than midIndex to search in the right half
            $leftIndex = $midIndex + 1;
        } elseif ($phoneArray[$midIndex]['name'] > $targetName) {
            // adjust rightIndex to be one less than midIndex to search in the left half
            $rightIndex = $midIndex - 1;
        } else {
            // return the associated phone number
            return $phoneArray[$midIndex]['phone'];
        }
    }

    // after looping, if no phone is found, returns null
    return null; 
}

/**
 * Functions used:
 * count: Counts all elements in an array. Source: https://www.php.net/manual/en/function.count
 * floor: Rounds down numbers. Source: https://www.php.net/manual/en/function.floor.php
 */

// To run:
$phones = [
    ['name' => 'William', 'phone' => '11 98445-1234'],
    ['name' => 'Gregory', 'phone' => '33 99999-9999'],
    ['name' => 'Deyvid', 'phone' => '19 98445-0592'],
    ['name' => 'Vincent', 'phone' => '41 12345-0592'],
    ['name' => 'Tyler', 'phone' => '27 95543-3322']
];

echo binarySearch($phones, 'Deyvid');  // Output: 19 98445-0592
echo binarySearch($phones, 'Jorge');  // Return: null
