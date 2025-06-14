const form = document.getElementById('userForm');
const userList = document.getElementById('userList');

// API URLs
const apiURL = 'http://localhost/goqii/api/user_api.php'; 

// Fetch and display users
function fetchUsers() {
  fetch(apiURL)
    .then(res => res.json())
    .then(data => {
      userList.innerHTML = '';
      data.forEach(user => {
        const li = document.createElement('li');
        li.textContent = `${user.name} - ${user.email} - ${user.dob}`;
        userList.appendChild(li);
      });
    });
}

// Add new user
form.addEventListener('submit', function (e) {
  e.preventDefault();
  const newUser = {
    name: document.getElementById('name').value,
    email: document.getElementById('email').value,
    password: document.getElementById('password').value,
    dob: document.getElementById('dob').value
  };

  fetch(apiURL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(newUser)
  })
    .then(res => res.json())
    .then(response => {
      alert(response.message || 'User added!');
      form.reset();
      fetchUsers();
    });
});

// Initial load
fetchUsers();

