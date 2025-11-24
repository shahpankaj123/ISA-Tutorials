function secondLargest(arr) {
  let largest = -Infinity;
  let secondLargest = -Infinity;

  for (let num of arr) {
    if (num > largest) {
      secondLargest = largest;
      largest = num;
    } else if (num > secondLargest && num !== largest) {
      secondLargest = num;
    }
  }

  return secondLargest;
}

// Example usage:
console.log(secondLargest([10, 5, 20, 8])); // 10
console.log(secondLargest([3, 1, 4, 4, 2])); // 3
