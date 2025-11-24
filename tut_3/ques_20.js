function charCount(str) {
  let count = {};

  for (let char of str) {
    if (count[char]) count[char]++;
    else count[char] = 1;
  }

  return count;
}

const arr = ["a", "a", "a"];

console.log(charCount(arr));
