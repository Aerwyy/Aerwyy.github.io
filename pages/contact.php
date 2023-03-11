<?php
include '../connect.php';
include 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/style-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <div class="navbar">
            <div class="logo"><a href="#">MIKAZUKI WEDDING</a></div>
            <ul class="links">
                <li><a href="../index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="service.php">Service</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="testimonial.php">Testimonial</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
            <a href="login.php" class="action_btn">Log In</a>
            <div class="toggle-btn">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
        <div class="dropdown-menu">
            <li><a href="../index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="service.php">Service</a></li>
            <li><a href="gallery.php">Gallery</a></li>
            <li><a href="testimonial.php">Testimonial</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="login.php" class="action_btn">Log In</a></li>
        </div>
    </header>

    <section id="contact">
    <div class="contact-in">
        <div class="contact-map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1662934.3496472167!2d138.64849808935364!3d35.50628967309163!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x605d1b87f02e57e7%3A0x2e01618b22571b89!2sTokyo%2C%20Jepang!5e0!3m2!1sid!2sid!4v1678267361141!5m2!1sid!2sid" width="100%" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="contact-form">
          <h1>Contact Us</h1>
          <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Name" class="contact-form-txt" />
            <input type="email" name="email" id="email" placeholder="Email" class="contact-form-txt" />
            <textarea name="message" id="message" placeholder="Message" class="contact-form-txtarea"></textarea>
            <input type="submit" name="create" id="create" class="contact-form-btn" />
          </form>
<?php
if(isset($_POST['create'])) {
  create_message($_POST);
}
?>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="footer-row">
          <div class="row">
              <div class="footer-col">
                  <h4>Company</h4>
                  <ul>
                      <li><a href="#">About Us</a></li>
                      <li><a href="#">Our Services</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                      <li><a href="#">Affiliate Program</a></li>
                  </ul>
              </div>
              <div class="footer-col">
                  <h4>Get Help</h4>
                  <ul>
                      <li><a href="#">FAQ</a></li>
                      <li><a href="#">Shipping</a></li>
                      <li><a href="#">Returns</a></li>
                      <li><a href="#">Order Status</a></li>
                      <li><a href="#">Payment Options</a></li>
                  </ul>
              </div>
              <div class="footer-col">
                  <h4>Online Shop</h4>
                  <ul>
                      <li><a href="#">Watch</a></li>
                      <li><a href="#">Bag</a></li>
                      <li><a href="#">Shoes</a></li>
                      <li><a href="#">Dress</a></li>
                  </ul>
              </div>
              <div class="footer-col">
                  <h4>Follow Us</h4>
                  <div class="social-links">
                      <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-twitter"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a>
                      <a href="#"><i class="fab fa-linkedin-in"></i></a>
                  </div>
              </div>
          </div>
      </div>
  </footer>

  <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>