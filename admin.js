// JavaScript code
const dataForm = document.getElementById("dataForm");
const infoTableBody = document.getElementById("infoTableBody");

// Retrieve saved data from localStorage on page load
const savedData = JSON.parse(localStorage.getItem("adminData")) || [];

// Load saved data into the table
savedData.forEach(function(data) {
  addRowToTable(data.name, data.email, data.date, data.time);
});

dataForm.addEventListener("submit", function(event) {
  event.preventDefault();

  // Get the submitted form data
  const name = document.getElementById("name").value;
  const email = document.getElementById("email").value;
  const currentDate = getCurrentDate();
  const currentTime = getCurrentTime();

  // Create a new table row and add it to the table
  addRowToTable(name, email, currentDate, currentTime);

  // Save the data to localStorage
  const newData = { name: name, email: email, date: currentDate, time: currentTime };
  savedData.push(newData);
  localStorage.setItem("adminData", JSON.stringify(savedData));

  // Reset the form inputs
  dataForm.reset();
});

// Function to create and append a new table row
function addRowToTable(name, email, date, time) {
  const newRow = document.createElement("tr");
  const nameCell = document.createElement("td");
  const emailCell = document.createElement("td");
  const dateCell = document.createElement("td");
  const timeCell = document.createElement("td");

  nameCell.textContent = name;
  emailCell.textContent = email;
  dateCell.textContent = date;
  timeCell.textContent = time;

  newRow.appendChild(nameCell);
  newRow.appendChild(emailCell);
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
