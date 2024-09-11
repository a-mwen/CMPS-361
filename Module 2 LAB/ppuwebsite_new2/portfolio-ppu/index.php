<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asha Mweene - Portfolio</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

  <!-- Header -->
  <header>
    <h1>Asha Mweene's Portfolio</h1>
    <nav>
      <ul>
        <li><a href="#about">About Me</a></li>
        <li><a href="#skills">Skills</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

  <!-- About Me Section -->
  <section id="about">
    <h2>About Me</h2>
    <p>Hi! I’m Asha Mweene,a Software Engineer who loves to work on the web and back. I am passionate about
    building simple and elegant solutions to complex problems.</p>
  </section>

  <!-- Skills Section -->
  <section id="skills">
    <h2>Skills & Expertise</h2>
    <ul>
      <li>Full-Stack Web Development (React, Next.js, PHP, Django)</li>
      <li>Mobile Development (Flutter)</li>
      <li>Database Management (PostgreSQL)</li>
      <li>Cybersecurity Fundamentals</li>
      <li>Cloud Computing & DevOps</li>
    </ul>
  </section>

  <!-- Projects Section -->
  <section id="projects">
    <h2>Projects</h2>
    <div class="project">
      <h3>Project 1: Gamified Habit Formation App</h3>
      <p>This app encourages users to build positive habits through a reward-based system. Developed using Flutter for mobile and React for the web.</p>
    </div>
    <div class="project">
      <h3>Project 2: Educational Platform for African Students</h3>
      <p>An online platform designed to provide resources and tools for students in Africa to access quality education remotely.</p>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact">
    <h2>Contact Me</h2>
    <form name="contactForm" onsubmit="return validateForm()" action="form-handler.php" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" placeholder="Enter your name"><br><br>

      <label for="message">Message:</label>
      <textarea id="message" name="message" placeholder="Enter your message"></textarea><br><br>

      <button type="submit">Send Message</button>
    </form>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2024 Asha Mweene. All rights reserved.</p>
  </footer>

  <!-- JavaScript for Form Validation -->
  <script>
    function validateForm() {
      const name = document.forms["contactForm"]["name"].value;
      const message = document.forms["contactForm"]["message"].value;

      if (name === "" || message === "") {
        alert("Name and message must be filled out!");
        return false;
      }
    }
  </script>

<?php


?>
</body>
</html>
