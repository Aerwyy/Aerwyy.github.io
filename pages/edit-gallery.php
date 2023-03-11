<?php
session_start();
include '../connect.php';
$data = mysqli_query($connect, "SELECT * FROM gallery WHERE id_gambar = '".$_GET['id']."'");
$read = mysqli_fetch_array($data);

$gambar = $read['gambar'];
$judul_gambar = $read['judul_gambar'];
$keterangan_gambar = $read['keterangan_gambar'];

if(!isset($_SESSION['session_user'])) {
    header("location:../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/dashboard/">
    <link rel="stylesheet" type="text/css" href="../css/trix.css">
    <script type="text/javascript" src="../js/trix.js"></script>
    <style>
      trix-toolbar [data-trix-button-group="file-tools"] {
        display: none;
      }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="../css/style-dashboard.css" rel="stylesheet">
</head>
<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="../index.php">Dashboard | MKZK</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
          <div class="nav-item text-nowrap">
            <a href="logout.php"><button type="submit" class="nav-link px-3 bg-dark border-0" method="post">Log Out<span data-feather="log-out"></span></button></a>
          </div>
        </div>
      </header>
    
    <div class="container-fluid">
      <div class="row">
    
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="dashboard.php">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
          </ul>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="service-admin.php">
                <span data-feather="file-text"></span>
                Service
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery-admin.php">
                <span data-feather="file-text"></span>
                Gallery
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="testimonial-admin.php">
                  <span data-feather="file-text"></span>
                  Testimonial
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="message-admin.php">
                <span data-feather="file-text"></span>
                Message
              </a>
            </li>
          </ul>
        </div>
      </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Gallery</h1>
</div>

<div class="col-lg-8">
    <form method="post" action="" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="image" class="form-label">Gambar (jpg file 640px x 384px)</label>
          <!-- <img class="img-preview img-fluid mb-3 col-sm-5"> -->
          <input class="form-control" type="hidden" id="image" name="image" value="<?php echo $gambar ?>">
          <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Judul Gambar</label>
          <input type="text" class="form-control" id="title" name="title" value="<?php echo $judul_gambar ?>">
        </div>
        <div class="mb-3">
          <label for="description" class="form-label">Keterangan Gambar</label>
          <input type="text" class="form-control" id="description" name="description" value="<?php echo $keterangan_gambar ?>">
        </div>
        <input type="submit" name="create" id="create" class="btn btn-primary" value="Edit">
    </form>
</div>
        </main>
      </div>
    </div>
    <?php
if(isset($_POST['create'])) {
  $gambar = $_FILES['image']['name'];
  $source = $_FILES['image']['tmp_name'];
  $folder = '../images/';
  $judul_gambar = $_POST['title'];
  $keterangan_gambar = $_POST['description'];

  if($gambar != '') {
    move_uploaded_file($source, $folder.$gambar);
    $update = mysqli_query($connect, "UPDATE gallery SET gambar = '".$gambar."' , judul_gambar = '".$judul_gambar."', keterangan_gambar = '".$keterangan_gambar."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:gallery-admin.php");
    } else {
      header("location:edit-gallery.php");
    }
  } else if($judul_gambar != '') {
    $update = mysqli_query($connect, "UPDATE gallery SET judul_gambar = '".$judul_gambar."', keterangan_gambar = '".$keterangan_gambar."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:gallery-admin.php");
    } else {
      header("location:edit-gallery.php");
    }
  } else if($keterangan_gambar != '') {
    $update = mysqli_query($connect, "UPDATE gallery SET keterangan_gambar = '".$keterangan_gambar."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:gallery-admin.php");
    } else {
      header("location:edit-gallery.php");
    }
  }
}
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="/asset/dashboard.js"></script>
</body>
</html>