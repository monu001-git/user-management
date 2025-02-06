<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error - Something Went Wrong</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f8f9fa;
      color: #495057;
    }
    .error-container {
      text-align: center;
      padding: 20px;
    }
    .error-code {
      font-size: 6rem;
      font-weight: bold;
      color: #dc3545;
    }
    .error-message {
      font-size: 1.5rem;
      margin: 20px 0;
    }
    .home-link {
      text-decoration: none;
      color: #fff;
      background-color: #007bff;
      padding: 10px 20px;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }
    .home-link:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <div class="error-container">
    <div class="error-code">404</div>
    <div class="error-message">Oops! The page you are looking for cannot be found.</div>
    <a href="{{ url('/') }}" class="home-link">Go Back to Home</a>
  </div>
</body>
</html>
