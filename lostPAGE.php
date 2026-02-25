<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Amazon - Lost Page</title>
  <style>
    /* Basic Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body Styles */
    body {
      font-family: 'Arial', sans-serif;
      background-image: url('FOURTH7.jpg'); 
      background-size: contain; /* keeps original size */
  background-repeat: no-repeat;
 background-attachment: fixed; /* parallax effect + less blur */
      background-position: center;
      color: #fff;
      text-align: center;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    /* Container */
    .container {
      text-align: center;
      background-color: rgba(0, 0, 0, 0.75);
      padding: 50px;
      border-radius: 12px;
      box-shadow: 0 0 25px rgba(255, 153, 0, 0.7);
    }

    /* Amazon logo */
    .logo {
      position: absolute;
      top: 20px;
      left: 20px;
      width: 140px;
      height: auto;
    }

    /* Heading */
    .content h1 {
      font-size: 3rem;
      margin-bottom: 20px;
      color: #ff9900; /* Amazon orange */
    }

    /* Sub-message */
    .content p {
      font-size: 1.2rem;
      margin-bottom: 30px;
      color: #ddd;
    }

    /* Button */
    .home-button {
      background-color: #ff9900;
      color: black;
      padding: 15px 40px;
      font-size: 1.2rem;
      border: none;
      border-radius: 5px;
      text-decoration: none;
      display: inline-block;
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s;
      font-weight: bold;
    }

    /* Hover effect */
    .home-button:hover {
      background-color: #e68a00;
      transform: scale(1.05);
    }
  </style>
</head>
<body>
  <!-- Amazon Logo -->
  <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" 
       alt="Amazon Logo" class="logo"> 

  <!-- Content -->
  <div class="container">
    <div class="content">
     <h1>Access Denied</h1>
        <p>Your login attempt was unsuccessful. Please double-check your credentials and try again to continue exploring the Amazon Internship portal.</p>


      <!-- Home button -->
      <a href="apply.php" class="home-button">Return to Login.</a>
    </div>
  </div>
</body>
</html>