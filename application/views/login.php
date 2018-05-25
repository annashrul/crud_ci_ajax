<?php include 'header.php'; ?>

<?php echo form_open('login');?>

<div class="col-md-6 col-md-offset-3">
	<?php 
            echo validation_errors("<div class='alert alert-danger'></div>");
            if($this->session->flashdata('sukses')){
              echo "<div class='alert alert-success'>";
              echo $this->session->flashdata('sukses');
              echo "</div>";
            }
          ?>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password">
	</div>
	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-primary">Login</button>
		<a href="<?=base_url('index.php/login/registrasi')?>" class="btn btn-primary">Registrasi</a>
	</div>
</div>
<?php echo form_close();?>

<?php include 'footer.php'; ?>