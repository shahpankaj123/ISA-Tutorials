const operator = prompt("Enter operator (+, -, * or /): ");
const num1 = parseFloat(prompt("Enter first number: "));
const num2 = parseFloat(prompt("Enter second number: "));
let result;

switch (operator) {
  case "+":
    result = num1 + num2;
    break;

  case "-":
    result = num1 - num2;
    break;

  case "*":
    result = num1 * num2;
    break;

  case "/":
    if (num2 === 0) {
      result = "Cannot divide by zero!";
    } else {
      result = num1 / num2;
    }
    break;

  default:
    result = "Invalid operator!";
}

console.log("Result: " + result);
