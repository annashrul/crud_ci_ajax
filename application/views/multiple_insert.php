<html>
	<head>
		<title>Multiple Insert</title>
	</head>
	<body>
		<?php echo form_open('multiple_insert/tambah'); ?>
		<label>barang 1</label>
		<input type="text" name="nama_barang[0]">
		<label>stok 1</label>
		<input type="text" name="stok[0]"></br>
		<label>barang 2</label>
		<input type="text" name="nama_barang[1]">
		<label>stok 2</label>
		<input type="text" name="stok[1]"></br>
		<label>barang 3</label>
		<input type="text" name="nama_barang[2]">
		<label>stok 3</label>
		<input type="text" name="stok[2]"></br>
		<input type="submit" name="submit" value="submit">
		<?php echo form_close(); ?>
	</body>
</html>