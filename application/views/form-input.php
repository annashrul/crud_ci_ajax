<?php include 'header.php'; ?>
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">KiosCoding</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav">
     <li><a href="#">Beranda</a></li>
     <li class="active"><a href="#">Masukan Karyawan</a></li>
     <li><a href="#">Lihat Data Karyawan</a></li>
    </ul>
   </div><!--/.nav-collapse -->
  </div>
 </nav>

 <div class="container">
  <div class="col-md-3">
  </div>
  <!-- Main component for a primary marketing message or call to action -->
  <div class="jumbotron col-md-6">
   <form action="<?php echo base_url('index.php/karyawan/proses_input') ?>" method="post">
         <div class="form-group">
             <label for="nama">Nama:</label>
             <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Karyawan" id="nama" required>
         </div>
     <div class="form-group">
       <label for="tgl">Tanggal Lahir:</label>
       <input type="date" name="tgl" class="form-control" id="tgl" placeholder="Masukan Tanggal Lahir Karyawan" required>
     </div>
     <div class="form-group">
        <label><input type="radio" name="jenkel" value="Laki-Laki" id="jenkel" required> Laki-Laki</label>
       <label><input type="radio" name="jenkel" value="Perempuan" id="jenkel" required> Perempuan</label>
     </div>
         <div class="form-group">
             <label for="alamat">Alamat:</label>
             <textarea name="alamat" rows="4" required class="form-control" id="alamat" placeholder="Masukan Alamat Karyawan" required></textarea>
         </div>
     <div class="form-group">
       <label for="username">Username:</label>
       <input type="username" class="form-control" name="username" placeholder="Masukan Username Karyawan" required>
     </div>
     <div class="form-group">
       <label for="password">Password:</label>
       <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password Karyawan" required>
     </div>
     <input type="hidden" name="level" value="karyawan">
     <input type="hidden" name="active" value="1">
         <button type="submit" class="btn btn-info">Submit</button>
     </form>
  </div>

 </div> <!-- /container -->

<?php include 'footer.php'; ?>