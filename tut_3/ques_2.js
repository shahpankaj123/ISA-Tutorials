// var – function-scoped, can be redeclared, can be updated
// block-scoped, cannot be redeclared, can be updated
// const – block-scoped, cannot be redeclared or updated

if (true) {
  var x = 10;
}
console.log(x); // 10 (leaked outside the block)

if (true) {
  let y = 5;
}
console.log(y); // ❌ Error: y is not defined

const PI = 3.14;
// PI = 3.14159; // ❌ NOT allowed (update)
// const PI = 3.14159; // ❌ NOT allowed (re-declare)
