<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <style>
    /* Style the profile container */
    .profile-container {
      background-color: #e8edf1; /* Light grayish background */
      border-radius: 10px;
      padding: 30px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
      margin: 0 auto; /* Center the container horizontally */
      max-width: 700px; /* Limit container width for responsiveness */
      display: flex; /* Arrange elements side-by-side */
      flex-direction: column; /* Stack elements vertically */
      align-items: center; /* Center elements horizontally within the container */
    }

    /* Style the profile information */
    .profile-info {
      flex: 1; /* Give profile info most of the container space */
      text-align: left; /* Align text to the left */
    }

    .profile-info h2 {
      font-size: 24px;
      margin-bottom: 10px;
    }

    .profile-info p {
      margin-bottom: 5px;
      font-size: 16px; /* Slightly smaller font size for details */
    }

    /* Style the action buttons */
    .action-buttons {
      margin-top: 20px;
      display: flex;
      justify-content: space-between; /* Distribute buttons evenly */
    }

    .action-buttons button {
      padding: 10px 20px;
      background-color: #3498db; /* Blue button color */
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .action-buttons button:hover {
      background-color: #2980b9; /* Darker blue on hover */
    }
  </style>
</head>
<body>
  <div class="profile-container">
    <div class="profile-info">
      <h2>John Doe</h2>
      <p><strong>Full Name:</strong> John Doe</p>
      <p><strong>Email:</strong> johndoe@example.com</p>
      <p><strong>Phone Number:</strong> 123-456-7890</p>
      <p><strong>Address:</strong> 123 Main St, Anytown, CA 12345</p>
    </div>
    <div class="action-buttons">
      <button class="edit-button">Edit Profile</button>
      <button class="password-button">Change Password</button>
      <button class="delete-button">Delete Account</button>
    </div>
  </div>
</body>
</html>