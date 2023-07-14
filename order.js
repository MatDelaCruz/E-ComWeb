// JavaScript code
const orderForm = document.getElementById("orderForm");
const infoTableBody = document.getElementById("infoTableBody");

// Retrieve saved data from localStorage on page load
const savedData = JSON.parse(localStorage.getItem("orderData")) || [];

// Load saved data into the table
savedData.forEach(function(data) {
  addRowToTable(data.name_text, data.address, data.city, data.cord, data.number, data.food_select, data.date, data.time);
});

dataForm.addEventListener("submit", function(event) {
  event.preventDefault();

  // Get the submitted form data
  const name = document.getElementById("name").value;
  const address = document.getElementById("address").value;
  const city = document.getElementById("city").value;
  const cord = document.getElementById("cord").value;
  const number = document.getElementById("number").value;
  const food_select= document.getElementById("food_select").value;
  const currentDate = getCurrentDate();
  const currentTime = getCurrentTime();

  // Create a new table row and add it to the table
  addRowToTable(name, address, city, cord, number, food_select, currentDate, currentTime);

  // Save the data to localStorage
  const newData = { name: name, address: address, city: city, cord: cord, number: number, food_select: food_select, date: currentDate, time: currentTime };
  savedData.push(newData);
  localStorage.setItem("orderData", JSON.stringify(savedData));

  // Reset the form inputs
  dataForm.reset();
});

// Function to create and append a new table row
function addRowToTable(name, address, city, cord, number, food_select, date, time) {
  const newRow = document.createElement("tr");
  const nameCell = document.createElement("td");
  const addressCell = document.createElement("td");
  const cityCell = document.createElement("td");
  const cordCell = document.createElement("td");
  const numberCell = document.createElement("td");
  const food_selectCell = document.createElement("td");
  const dateCell = document.createElement("td");
  const timeCell = document.createElement("td");

  nameCell.textContent = name;
  addressCell.textContent = address;
  cityCell.textContent = city;
  cordCell.textContent = cord;
  numberCell.textContent = number;
  food_selectCell.textContent = food_select;
  dateCell.textContent = date;
  timeCell.textContent = time;

  newRow.appendChild(nameCell);
  newRow.appendChild(addressCell);
  newRow.appendChild(cityCell);
  newRow.appendChild(cordCell);
  newRow.appendChild(numberCell);
  newRow.appendChild(food_selectCell);
  newRow.appendChild(dateCell);
  newRow.appendChild(timeCell);
  infoTableBody.appendChild(newRow);
}

// Function to get the current date in the format yyyy-mm-dd
function getCurrentDate() {
  const now = new Date();
  const year = now.getFullYear();
  const month = String(now.getMonth() + 1).padStart(2, "0");
  const day = String(now.getDate()).padStart(2, "0");

  return `${year}-${month}-${day}`;
}

// Function to get the current time in the format hh:mm:ss
function getCurrentTime() {
  const now = new Date();
  const hours = String(now.getHours()).padStart(2, "0");
  const minutes = String(now.getMinutes()).padStart(2, "0");
  const seconds = String(now.getSeconds()).padStart(2, "0");

  return `${hours}:${minutes}:${seconds}`;
}
