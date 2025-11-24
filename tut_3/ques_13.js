let person = { name: "John", age: 30 };

for (let key in person) {
  console.log(key + ": " + person[key]);
}

// 14 ques solution

person.country = "USA";
console.log(person);

// 15 ques solution

delete person.age;
console.log(person);
