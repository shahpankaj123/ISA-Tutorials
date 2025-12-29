document.getElementById("btn").addEventListener("click", () => {
  let input_value = document.getElementById("inputData").value;
  if (input_value === "") {
    alert("Please enter the movie name");
    return;
  }
  window.location.href = `http://localhost/work_space/ISA/tut_8/part_2/index.php?s=${input_value}`;
});
