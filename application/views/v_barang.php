<html>
	<head>
		<title>barang</title>
		<script type="text/javascript" src="<?php echo base_url(''); ?>assets/js/jquery-1.5.2.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#checkAll").click(function() {
					var checked = $(this).attr("checked");
					$("#myTable tr td input:checkbox").attr("checked", checked);
				});
			});
		</script>
	</head>
	<body>
		<h1>Multiple Delete Dengan CodeIgniter</h1>

		<form action="<?=site_url('multiple_insert/delete_multiple'); ?>" method="post">
			<select name="action">
				<option value="null">Bulk Action</option>
				<option value="delete">Delete</option>
			</select>
			<input type="submit" name="submit" value="Action">
			<a href="<?=site_url('multiple_insert/tambah')?>">tambah</a>
			<p><?php echo $this->session->flashdata('sukses');?></p>
			<table border="1" id="myTable">
				<thead>
					<tr>
						<th><input type="checkbox" id="checkAll" name="checkAll"></th>
						<th>No</th>
						<th>Nama Barang</th>
						<th>Stok</th>
						<th>aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if (count($barang)>0) {
						$no = 1;
						foreach ($barang as $data):
							?>
							<tr>
								<td><input type="checkbox" name="msg[]" value="<?=$data->id_barang; ?>"></td>
								<td><?=$no++?></td>
								<td><?=$data->nama_barang; ?></td>
								<td><?=$data->stok; ?></td>
								<td><a href="<?=site_url('multiple_insert/edit/'.$data->id_barang)?>">edit</a></td>
							</tr>
							<?php
						endforeach;
					}
					else {
						echo "<tr><td colspan=5>DATA KOSONG!!</td></tr>";
					}
					?>
				</tbody>
			</table>
		</form>
	</body>
</html>