<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?></title>
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css')?>">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>">
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
		<style type="text/css">
			p#pesan{color: red!important;}
		</style>
	</head>
	<body>
		<div class="container">
			<h1 class="text-center">List Katagori Barang</h1>
			<a href="#form" class="btn btn-primary" data-toggle="modal" onclick="submit('tambah')">Tambah</a>
			<a href="<?=base_url('index.php/barang')?>" class="btn btn-primary">Barang</a>

			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<td>NO</td>
						<td>Nama Kategori Berita</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody id="dataTarget"></tbody>
			</table>
			<div class="modal fade" id="form" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h1 class="text-center">Kategori Berita</h1>
						</div>
						<center><h3 id="pesan"></h3></center>
						<div class="modal-body">
							<div class="form-group">
								<label>Nama Kategori Berita</label>
								<input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
								<input type="hidden" name="id_kategori" value="">
							</div>
							<div class="form-group">
								<button class="btn btn-primary" type="button" id="btn-tambah" onclick="tambahData()">Tambah</button>
								<button class="btn btn-primary" type="button" id="btn-ubah" onclick="ubahData()">Ubah</button>
								<button class="btn btn-default" data-dismiss="modal" type="button">Kembali</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	ambilData();
	function ambilData(){
		$.ajax({
			type 		: 'POST',
			url 		: '<?=base_url("index.php/kategori/ambilData")?>',
			dataType 	: 'json',
			success 	: function(data){
				// console.log(data);
				var tampung = "";
				var i = 0;
				var no = 1;
				for(i=0;i<data.length;i++){
					tampung+=
						'<tr>'+
							'<td>'+no+'</td>'+
							'<td>'+data[i].nama_kategori+'</td>'+
							'<td>'+
								'<a href="#form" data-toggle="modal" class="btn btn-info" onClick="submit('+data[i].id_kategori+')">Ubah</a>' + " " +
								'<a class="btn btn-danger" onClick="hapusData('+data[i].id_kategori+')">Hapus</a>'+
							'</td>'+
						'</tr>';
					no++;
				}
				$('#dataTarget').html(tampung);
			}
		});
	}//end ambilData

	function tambahData(){
		// var nama_kategori =$('[name="nama_kategori"]').val();
		var row = {
			'nama_kategori' : $('#nama_kategori').val()
		}
		$.ajax({
			type:'POST',
			url:'<?=base_url('index.php/kategori/tambahData')?>',
			dataType:'JSON',
			data:row,
			success:function(hasil){
				$("#pesan").html(hasil.pesan).fadeIn('slow');
				if(hasil.pesan == ""){
					$("#form").modal('hide');
					ambilData();
					// location.reload();
					$("#nama_kategori").val("");
				}
			}
		});
	}

	function submit(param){
		if(param == 'tambah'){
			$('#btn-tambah').show();
			$('#btn-ubah').hide();
		}else{
			$('#btn-tambah').hide();
			$('#btn-ubah').show();

			$.ajax({
				type:'POST',
				data:'id_kategori='+param,
				dataType:'JSON',
				url:'<?=base_url('index.php/kategori/ambilId')?>',
				success:function(hasil){
					// console.log(hasil);
					$('#id_kategori').val(hasil[0].id_kategori);
					$('#nama_kategori').val(hasil[0].nama_kategori);
				}
			});
		}
	}

	function ubahData(){
		var id_kategori=$("[name='id_kategori']").val();
		var nama_kategori=$("[name='nama_kategori']").val();
		$.ajax({
			type 			: 'POST',
			data 			: 'id_kategori='+id_kategori+'&nama_kategori='+nama_kategori,
			url 			: '<?=base_url("index.php/kategori/updateData")?>',
			dataType 	: 'JSON',
			success 	: function(hasil){
				$("#pesan").html(hasil.pesan);
				if(hasil.pesan == ""){
					$('#form').modal('hide');
					ambilData();
					// $("#nama_kategori").val("");
				}
			}
		});
	}
	function hapusData($id_kategori){
		var tanya = confirm('Anda Yakin Akan Menghapus Data Ini ??');
		if(tanya){
			$.ajax({
				type:'POST',
				data : 'id_kategori='+id_kategori,
				url:'<?=base_url('index.php/kategori/hapusData')?>',
				success:function(){
					ambilData();
				}
			});
		}
	}
</script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>