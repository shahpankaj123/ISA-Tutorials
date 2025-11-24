function sumArray(numbers) {
  let total = 0;
  for (let n of numbers) total += n;
  return total;
}

var arr = [1, 2, 3, 4, 5];

const total = sumArray(arr);
console.log(total);
