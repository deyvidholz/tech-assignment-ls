<?php
// Test it online: https://onlinephp.io/c/d9048

/**
 * Recursively fills the area of a certain color in the image
 *
 * @param array $image - An array of strings that represents an image
 * @param int $rowIndex - Row index of the start pixel
 * @param int $colIndex - Column index of the start pixel
 * @param string $originalColor - The color that will be replaced
 * @param string $newColor - The color that will be used to paint
 * 
 * @return array - Array representing the image with the filled area
 */
function fill($image, $rowIndex, $colIndex, $originalColor, $newColor) {
    // Check if current pixel is out of bounds or not the original color
    $isOutOfBoundsOrNotOriginalColor = $rowIndex < 0 || 
        $colIndex < 0 || 
        $rowIndex >= count($image) || 
        $colIndex >= strlen($image[$rowIndex]) || 
        $image[$rowIndex][$colIndex] != $originalColor;
    
    // If out of bounds or not original color, stops the recursion
    if ($isOutOfBoundsOrNotOriginalColor) {
        return $image;
    }
    
    // Set the new color at the current position.
    $image[$rowIndex][$colIndex] = $newColor;

    // Call fill function for remaining pixels in all four directions (UP, DOWN, LEFT, RIGHT).
    $image = fill($image, $rowIndex - 1, $colIndex, $originalColor, $newColor); // represents up
    $image = fill($image, $rowIndex + 1, $colIndex, $originalColor, $newColor); // represents down
    $image = fill($image, $rowIndex, $colIndex - 1, $originalColor, $newColor); // represents left
    $image = fill($image, $rowIndex, $colIndex + 1, $originalColor, $newColor); // represents right

    // Return the new painted image
    return $image;
}

/**
 * The main function that initiates the fill operation.
 *
 * @param array $image - An array of strings that represents an image
 * @param int $rowIndex - Row index of the start pixel
 * @param int $colIndex - Column index of the start pixel
 * @param string $newColor - The color that will be used to paint
 * 
 * @return array - Array representing the image with the filled area
 */
function paintBucket($image, $rowIndex, $colIndex, $newColor) {
    // Get the original color of the pixel at the start position
    $originalColor = $image[$rowIndex][$colIndex];

    // If original color is equal to the new color, returns the image without changing it.
    if ($originalColor == $newColor) {
        return $image;
    }

    // Use the fill function to paint the image
    return fill($image, $rowIndex, $colIndex, $originalColor, $newColor);
}

// To run:
$image = [
  '###..',
  '.#..#.',
  '.###..',
  '.#....'
];

$image = paintBucket($image, 2, 1, '0');

foreach ($image as $line) {
    echo $line . PHP_EOL;
}

/**
 * 000..
 * .0..#.
 * .000..
 * .0....
 */
