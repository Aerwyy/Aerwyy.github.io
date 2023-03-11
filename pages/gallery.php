<?php
include '../connect.php';
$query = mysqli_query($connect, "SELECT * FROM gallery ");
                  while ($row = mysqli_fetch_array($query)) {
                    $caption = $row['judul_gambar'];
?>
<?php } ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mikazuki Wedding</title>
    <link rel="stylesheet" href="../css/style-page.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .pic::before {
    content: attr(data-caption);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 22px;
    font-weight: bold;
    width: 100%;
    margin-top: -100px;
    opacity: 0;
    transition: .3s;
    transition-delay: .2s;
    z-index: 1;
}
.pic:after {
    content: '';
    position: absolute;
    width: 100%;
    bottom: 0;
    left: 0;
    border-radius: 10px;
    height: 0;
    background-color: rgba(0,0,0,0.4);
    transition: .3s;
}
.pic:hover:after {
    height: 100%;
}
.pic:hover::before {
    margin-top: 0;
    opacity: 1;
}
    </style>
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

    <div class="gallery">
        <div class="photo-gallery">
        <?php 
                  $query = mysqli_query($connect, "SELECT * FROM gallery ");
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
            <div class="pic" data-caption="<?php echo $caption; ?>">
                <img src="../images/<?php echo $row['gambar']?>" alt="">
            </div>
            <?php } ?>
        </div>
    </div>

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