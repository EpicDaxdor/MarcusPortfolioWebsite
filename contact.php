<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title> Contact Me</title>
</head>
<body>

  <header>
    <h1>Marcus Lee Thomson</h1>
    <p>Digital Artist | Painter | Illustrator</p>
  </header>

  <nav>
    <ul>
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">About Me</a></li>
      <li><a href="contact.php">Contact Me</a></li>
    </ul>
  </nav>

  <h2>Any Questions or comments, Message Me</h2>

  <section class="contact-form">
    <form action="contact.php" method="post">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="4" required></textarea>

      <button type="submit">Submit</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2024 Marcus Lee Thomson. All rights reserved.
      <div class="social-button">
          <a href="https://www.facebook.com" target="_blank">
              <img src="Images/linkedIn_PNG8.png" alt="Linkedin Icon">
          </a>
      </div>
      <div class="social-button">
          <a href="https://www.facebook.com" target="_blank">
              <img src="Images/maxresdefault.png" alt="Instagram Icon">
          </a>
      </div>
    </p>
  </footer>

</body>
</html>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Collect form data
      $name = htmlspecialchars($_POST["name"]);
      $email = htmlspecialchars($_POST["email"]);
      $message = htmlspecialchars($_POST["message"]);

      // Simple validation
      if (empty($name) || empty($email) || empty($message)) {
          header("Location: contact.php?error=emptyfields");
          exit();
      }

      // Additional validation (email format)
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          header("Location: contact.php?error=invalidemail");
          exit();
      }

      // Send email (this is just a simple example, and you should use a proper email library in production)
      $to = "marcuslee.thomson@gmail.com"; // Replace with your email address
      $subject = "New Contact Form Submission";
      $headers = "From: $email\r\n";
      $messageBody = "Name: $name\nEmail: $email\n\n$message";

      mail($to, $subject, $messageBody, $headers);

      // Redirect after successful submission
      header("Location: contact.php?success=true");
      exit();
  } else {
      // If the form is not submitted through POST, redirect to the contact page
      header("Location: contact.php");
      exit();
  }
  ?>
