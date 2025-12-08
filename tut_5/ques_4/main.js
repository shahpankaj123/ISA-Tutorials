let items = document.querySelectorAll("#myList li");

// 1. For loop → change background to yellow
for (let i = 0; i < items.length; i++) {
  items[i].style.backgroundColor = "yellow";
}

// 2. forEach → change font weight to bold
items.forEach((li) => {
  li.style.fontWeight = "bold";
});

// 3. map → wrap each item in <span>
items = Array.from(items).map((li) => {
  li.innerHTML = `<span>${li.innerHTML}</span>`;
});
