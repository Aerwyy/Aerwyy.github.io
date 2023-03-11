<?php
session_start();
include '../connect.php';
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
    <title>Gallery</title>
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
                <h1 class="h2">Posting Dokumentasi Terbaru</h1>
            </div>
            
            <div class="table-responsive col-lg-8">
              <a href="create-gallery.php" class="btn btn-primary mb-3">Post Dokumentasi</a>
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">Gambar</th>
                      <th scope="col">Judul Gambar</th>
                      <th scope="col">Keterangan Gambar</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $query = mysqli_query($connect, "SELECT * FROM gallery ");
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                    <tr>
                            <td><?php echo $row['id_gambar']?></td>
                            <td><img src="../images/<?php echo $row['gambar']?>" alt="" width="600px" height="300px"></td>
                            <td><?php echo $row['judul_gambar']?></td>
                            <td><?php echo $row['keterangan_gambar']?></td>
                            <td>
                                <a href="edit-gallery.php?id=<?php echo $row['id_gambar']?>" class="badge bg-warning btn btn-warning"><span data-feather="edit"></span>Edit</a>
                                <a href="delete-gallery.php?id=<?php echo $row['id_gambar']?>"><button class="badge bg-danger border-0" onclick="return confirm('Yakin Ingin Dihapus?')"><span data-feather="x-circle"></span>Delete</button></a>
                                </form>
                            </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                </div>
        </main>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="/asset/dashboard.js"></script>
</body>
</html>