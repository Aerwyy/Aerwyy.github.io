<?php
include '../connect.php';

// Create Gallery
function create_data($data) {
    global $connect;

  $gambar = $_FILES['image']['name'];
  $source = $_FILES['image']['tmp_name'];
  $folder = '../images/';
  $judul_gambar = $_POST['title'];
  $keterangan_gambar = $_POST['description'];

  move_uploaded_file($source, $folder.$gambar);
  $insert = mysqli_query($connect, "INSERT INTO gallery VALUES(NULL, '$gambar', '$judul_gambar', '$keterangan_gambar')");
}

// Create Service
function create_service($data) {
    global $connect;

  $gambar = $_FILES['image']['name'];
  $source = $_FILES['image']['tmp_name'];
  $folder = '../images/';
  $judul_gambar = $_POST['title'];
  $keterangan_gambar = $_POST['description'];

  move_uploaded_file($source, $folder.$gambar);
  $insert = mysqli_query($connect, "INSERT INTO service VALUES(NULL, '$gambar', '$judul_gambar', '$keterangan_gambar')");
}

// Create Testi
function create_testi($data) {
    global $connect;

  $gambar = $_FILES['image']['name'];
  $source = $_FILES['image']['tmp_name'];
  $folder = '../images/';
  $name = $_POST['name'];
  $job = $_POST['job'];
  $testi = $_POST['testi'];

  move_uploaded_file($source, $folder.$gambar);
  $insert = mysqli_query($connect, "INSERT INTO testimonial VALUES(NULL, '$gambar', '$name', '$job', '$testi')");
}

// Create Message
function create_message($data) {
    global $connect;

  $full_name = $_POST['name'];
  $email_address = $_POST['email'];
  $message = $_POST['message'];

  $insert = mysqli_query($connect, "INSERT INTO message VALUES(NULL, '$full_name', '$email_address', '$message')");
}


// Edit Gallery
function edit_data($data) {
    global $connect;

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

// Edit Service
function edit_service($data) {
    global $connect;

    $gambar = $_FILES['image']['name'];
  $source = $_FILES['image']['tmp_name'];
  $folder = '../images/';
  $judul_gambar = $_POST['title'];
  $keterangan_gambar = $_POST['description'];

  if($gambar != '') {
    move_uploaded_file($source, $folder.$gambar);
    $update = mysqli_query($connect, "UPDATE service SET gambar = '".$gambar."' , judul_service = '".$judul_gambar."', keterangan_service = '".$keterangan_gambar."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:service-admin.php");
    } else {
      header("location:edit-service.php");
    }
  } else if($judul_gambar != '') {
    $update = mysqli_query($connect, "UPDATE service SET judul_service = '".$judul_gambar."', keterangan_service = '".$keterangan_gambar."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:service-admin.php");
    } else {
      header("location:edit-service.php");
    }
  } else if($keterangan_gambar != '') {
    $update = mysqli_query($connect, "UPDATE service SET keterangan_service = '".$keterangan_gambar."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:service-admin.php");
    } else {
      header("location:edit-service.php");
    }
  }
}

// Edit Testimonial
function edit_testi($data) {
    global $connect;

    $gambar = $_FILES['image']['name'];
  $source = $_FILES['image']['tmp_name'];
  $folder = '../images/';
  $name = $_POST['name'];
  $job = $_POST['job'];
  $testi = $_POST['testi'];

  if($gambar != '') {
    move_uploaded_file($source, $folder.$gambar);
    $update = mysqli_query($connect, "UPDATE testimonial SET gambar = '".$gambar."' , name = '".$name."', job = '".$job."', testi = '".$testi."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:testimonial-admin.php");
    } else {
      header("location:edit-testimonial.php");
    }
  } else if($name != '') {
    $update = mysqli_query($connect, "UPDATE testimonial SET name = '".$name."', job = '".$job."', testi = '".$testi."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:testimonial-admin.php");
    } else {
      header("location:edit-testimonial.php");
    }
  } else if($job != '') {
    $update = mysqli_query($connect, "UPDATE testimonial SET job = '".$job."', testi = '".$testi."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:testimonial-admin.php");
    } else {
      header("location:edit-testimonial.php");
    }
  }
  else if($testi != '') {
    $update = mysqli_query($connect, "UPDATE testimonial SET testi = '".$testi."'WHERE id_gambar = '".$_GET['id']."'");
    if($update) {
      header("location:testimonial-admin.php");
    } else {
      header("location:edit-testimonial.php");
    }
  }
}
?>