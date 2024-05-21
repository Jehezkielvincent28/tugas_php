<?php
include 'config.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeheskiel Kasenda</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Navigasi halaman smooth scroll
        function navigateTo(sectionId) {
            document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
        }

        // Validasi formulir kontak
        function validateForm() {
            var name = document.forms["contactForm"]["name"].value;
            var email = document.forms["contactForm"]["email"].value;
            var message = document.forms["contactForm"]["message"].value;
            if (name == "" || email == "" || message == "") {
                alert("Please fill out all fields");
                return false;
            }
        }

        // Tampilkan waktu pengiriman formulir
        function displaySubmissionTime() {
            var submissionTime = new Date().toLocaleString();
            document.getElementById("submissionTime").innerText = "Form submitted on: " + submissionTime;
        }
    </script>
</head>
<body>

<header>
    <h1>Welcome to My Website</h1>
    <nav>
        <ul>
            <li><a href="#home" onclick="navigateTo('home')">Home</a></li>
            <li><a href="#gallery" onclick="navigateTo('gallery')">Gallery</a></li>
            <li><a href="#blog" onclick="navigateTo('blog')">Blog</a></li>
            <li><a href="#contact" onclick="navigateTo('contact')">Contact</a></li>
        </ul>
    </nav>
</header>

<main>

    <section id="home">
        <h2>Home</h2>
        <?php
            $query = "SELECT * FROM home";
            $result = mysqli_query($conn, $query);

            $no = 1;

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($no >=0) {
            ?>
        <h3><?= $row["nama"] ?></h3>
        <p><?= $row["keterangan"] ?></p>
        <?php } 
            $no++;
            }
            } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);}
            ?>
    </section>

    <section id="gallery">
        <h2>Gallery</h2>
        <div class="gallery">
            <img src="IT.jpeg" alt="Image 1"  width="200">
            <img src="IT2.jpeg" alt="Image 2" width="200">
            <img src="Web-Programming-2.jpg"  alt="Image 3" width="200">
            <img src="Web.webp" alt="Image 4" width="200">
        </div>
    </section>

    <section id="blog">
        <h2>Blog</h2>
        <article>
            <!-- Konten blog -->
        </article>
    </section>

    <section id="contact">
        <h2>Contact</h2>
        <form name="contactForm" onsubmit="return validateForm()">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea><br><br>
            <input type="submit" value="Submit">
        </form>
        <p id="submissionTime"></p> <!-- Placeholder untuk menampilkan waktu pengiriman -->
    </section>

</main>

<footer>
    <p>&copy; 2024 Jeheskiel Kasenda</p>
</footer>

</body>
</html>
