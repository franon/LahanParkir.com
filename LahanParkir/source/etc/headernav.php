<?php
if (isset($_SESSION['username'])) {
  if(!isset($uap)) {
    include 'source/etc/UserAndPelapak.php';
  }
  $username = $_SESSION['username'];
  $validasi = $uap->{'validasiUsername'}($username);
  $dp = $uap->{'selectDP'}($username, $validasi[1], $validasi[2]);
}
 ?>
<div id="first">

</div>
  <nav class="nav navbar navbar-expand-lg">
    <a href="../LahanParkir/" class="logo navbar-brand text-center">
      <span>LahanParkir.com</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navtoggle" aria-controls="navtoggle" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon fas fa-bars"></span>
   </button>
    <div class="nav-menu text-center collapse navbar-collapse" id="navtoggle">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link" href="<?php if(!isset($inIndex)) echo "index.php" ?>#first"><span>Home</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cari_lahan_parkir.php"><span>Cari Lahan Parkir</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php if(!isset($inIndex)) echo "index.php" ?>#cara-penggunaan"><span>Cara Penggunaan</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php if(!isset($inIndex)) echo "index.php" ?>#tentang"><span>Tentang Kami</span></a>
        </li>
        <li>
          <a class="nav-link" href="<?php if(!isset($inIndex)) echo "index.php" ?>#kontak"><span>Kontak</span></a>
        </li>
        <?php if (!isset($_SESSION['username'])): ?>
          <li>
            <a class="nav-link" href="sign.php?r=login"><span>Login</span></a>
          </li>
          <li>
            <a class="nav-link" href="sign.php?r=daftar"><span>Daftar</span></a>
          </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['username'])): ?>
          <?php
            if($validasi[2] == "username_pemilik") {
              ?>
             <li>
               <a class="nav-link" id="klik-lahan-saya" href="#"><span>Lahan Saya</span></a>
               <div class="lahan-saya">
                 <p>
                   <a href="lahan.php?r=<?php echo $username ?>&page=tambah-lahan"><span>Tambah Lahan</span></a>
                 </p>
                 <p>
                   <a href="lahan.php?r=<?php echo $username ?>&page=atur-lahan"><span>Atur Lahan</span></a>
                 </p>
                 <p>
                   <a href="lahan.phpr=<?php echo $username ?>&page=info-lahan"><span>Info Lahan</span></a>
                 </p>
               </div>
             </li>
             <?php
            }
           ?>
          <li>
            <a class="nav-link" href="#"><span class="notif"><i class="fas fa-comments"></i></span></a>
          </li>
          <li>
            <a class="nav-link nav-dp">
              <span class="dp" id="dp-di-klik">
                <img src="<?php echo $dp ?>" alt="<?php echo $username ?>" class="img-fluid dp-user">
                <div class="profile-settings-logout">
                  <p>
                    <a href="profil.php?r=<?php echo $username ?>"><span>Profil</span></a>
                  </p>
                  <p>
                    <a href="profil.php?r=<?php echo $username ?>&p=pengaturan"><span>Pengaturan</span></a>
                  </p>
                  <p>
                    <a href="source/etc/logout.php"><span>Keluar</span></a>
                  </p>
                </div>
              </span>
            </a>
          </li>
        <?php endif; ?>
      </ul>
    </div>

  </nav>
<div class="after-margin">

</div>
