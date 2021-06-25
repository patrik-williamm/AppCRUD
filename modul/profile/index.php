<?php $my = view("SELECT * FROM users WHERE email='$_SESSION[email]'")[0] ?>
<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <div class="row">
          <div class="col-md-4 offset-md-4">
              <img src="<?= BASEURL ?>/file/<?= $my['img'] ?>" class="rounded-circle" width="210" height="210" alt="images">
          </div>
          <div class="col-md-8 offset-md-3">
            <p class="mt-4 fw-bold">
              <?= $my['nama'] ?> |
              <?= $my['email'] ?> |
              <?= $my['status'] ?> 
            </p>
          </div>
        </div>  
	    </div>
    </div>
    <a href="?page=upProfile&id=<?= $my['id'] ?>" class="mx-2">Update Profile</a>
    <a href="logout.php" class="mx-2 btn  btn-outline-danger">Logout</a>
  </div>
</main>




