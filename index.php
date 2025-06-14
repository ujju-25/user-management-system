<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Management</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>User Management</h1>

    <form id="userForm">
      <input type="text" id="name" placeholder="Name" required>
      <input type="email" id="email" placeholder="Email" required>
      <input type="password" id="password" placeholder="Password" required>
      <input type="date" id="dob" required>
      <button type="submit">Add User</button>
    </form>

    <h2>Users List</h2>
    <ul id="userList"></ul>
  </div>

  <script src="script.js"></script>
</body>
</html>
