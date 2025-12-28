// 1. Define the function
function fetchUserData(userId, callback) {
  setTimeout(() => {
    const userData = {
      userId: userId,
      name: "Hari",
      email: "hari@gmail.com",
      age: 30,
    };

    callback(userData);
  }, 5000);
}

// 2. Callback function
function displayUserData(data) {
  console.log("User Data Received:");
  console.log(data);
}

// 3. Call the function
fetchUserData(123, displayUserData);
