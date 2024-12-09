<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Profile</title>
  <style>
    /* Style the profile container */
    .profile-container {
      background-color: #f5f5f5; /* Light gray background */
      border-radius: 5px;
      padding: 30px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
      margin: 0 auto; /* Center the container horizontally */
      max-width: 500px; /* Adjust container width as needed */
    }

    /* Style the edit profile form */
    .profile-form {
      display: flex;
      flex-wrap: wrap; /* Allow form elements to wrap to next line */
      margin-bottom: 20px;
    }

    .profile-form label {
      width: 150px; /* Adjust label width for longer labels */
      margin-right: 10px; /* Spacing between label and input */
      font-weight: bold; /* Bold labels for clarity */
    }

    .profile-form input[type="text"],
    .profile-form input[type="email"] {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      width: calc(100% - 160px); /* Fill remaining space after label */
    }

    .profile-form select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      width: calc(100% - 160px); /* Same width as input fields */
    }

    /* Style the action buttons */
    .action-buttons {
      display: flex;
      justify-content: space-between; /* Distribute buttons evenly */
      margin-top: 15px; /* Add space between form and buttons */
    }

    .action-buttons button {
      padding: 10px 20px;
      background-color: #4CAF50; /* Green button color */
      color: white;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    .action-buttons button:hover {
      background-color: #3e8e41; /* Darker green on hover */
    }

    .action-buttons a {
      color: #333; /* Dark gray link color */
      text-decoration: none; /* Remove underline from link */
      padding: 10px 20px;
      border: 1px solid #ccc;
      border-radius: 3px;
      cursor: pointer;
    }

    .action-buttons a:hover {
      background-color: #f1f1f1; /* Light gray background on hover */
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <h2>Edit Profile</h2>
    <form class="profile-form">
      <label for="name">Full Name:</label>
      <input type="text" id="name" value="John Doe">
      <label for="email">Email:</label>
      <input type="email" id="email" value="johndoe@example.com">
      <label for="phone">Phone Number:</label>
      <input type="text" id="phone" value="123-456-7890">
      <label for="address">Address:</label>
      <input type="text" id="address" value="123 Main St, Anytown, CA 12345">
      <label for="gender">Gender:</label>
      <select id="gender">
        <option value="">-- Select Gender --</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        </select>
    </form>
    <div class="action-buttons">
      <button>Save Changes</button>
      <a href="profile.html">Cancel</a>  </div>
  </div>
</body>
</html>