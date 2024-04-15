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
 * @param {String} phoneArray - Array of objects with "name" and "phone" properties. Both strings
 * @param {String} personName - Name of the person to lookup
 * @returns String or null
 */
function binarySearch(phoneArray, personName) {
  let leftIndex = 0;
  let rightIndex = phoneArray.length - 1;

  while (leftIndex <= rightIndex) {
    let midIndex = Math.floor((leftIndex + rightIndex) / 2);

    if (phoneArray[midIndex].name < personName) {
      leftIndex = midIndex + 1;
    } else if (phoneArray[midIndex].name > personName) {
      rightIndex = midIndex - 1;
    } else {
      return phoneArray[midIndex].phone;
    }
  }

  return null;
}

/**
 * Functions used:
 * Math.floor: Rounds down numbers. Source: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/floor
 */

// To run:
const phones = [
  { name: "William", phone: "11 98445-1234" },
  { name: "Gregory", phone: "33 99999-9999" },
  { name: "Deyvid", phone: "19 98445-0592" },
  { name: "Vincent", phone: "41 12345-0592" },
  { name: "Tyler", phone: "27 95543-3322" },
];

console.log(binarySearch(phones, "Deyvid")); // Output: 19 98445-0592
console.log(binarySearch(phones, "Jorge")); // Return: null
