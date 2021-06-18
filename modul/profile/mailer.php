<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../../library/vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

if (isset($_POST['kirim'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $comments = htmlspecialchars($_POST['comments']);

    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                     
    $mail->isSMTP();                                           
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'patrikwilliam001@gmail.com';                    
    $mail->Password   = 'dipanegara001';                              
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
    $mail->Port       = 587;                         

    //Recipients
    $mail->setFrom('patrikwilliam001@gmail.com', 'patrik william');
    $mail->addAddress('patrikwilliam001@gmail.com', 'patrik william');    
    $mail->addAddress('patrikwilliam001@gmail.com');            
    //Content
    $mail->isHTML(true);                                
    $mail->Subject = 'test PHPMailer';
    $mail->Body    = $comments;

    $mail->send();
    header('location:../../admin.php?page=profile');
} else {
    header('location:../../admin.php?page=profile');
}
?>

<main>
  <div class="container py-4">
    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">
        <form action="mailer.php" method="post">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            <label for="nama">Nama</label>
          </div>
          <div class="form-floating">
            <textarea class="form-control" placeholder="text" name="comments" id="floatingTextarea"></textarea>
            <label for="floatingTextarea">Comments</label>
          </div>
          <div class="modal-footer">
            <button type="submit" name="kirim" class="btn btn-primary">Kirim</button>
            <button type="reset" name="batal" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</main>