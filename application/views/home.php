<!DOCTYPE html>
<html>
	<head>
		<title><?=$title?></title>
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.css')?>">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/bootstrap.min.css')?>">
		<script type="text/javascript" src="<?=base_url('assets/js/jquery.js')?>"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>Kategori Barang</h1>
					<a href="#form" class="btn btn-primary" data-toggle="modal" 
					onclick="submit('tambah')">Tambah</a>
					
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<td>No</td>
								<td>Nama Kategori Berita</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody id="dataTarget">
							
						</tbody>
					</table>
					<!--MODAL TAMBAH DAN UPDATE-->
					<div class="modal fade" id="form" role="dialog">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1>Kategori Berita</h1>
								</div>
								<h5 class="text-center" style="color:red;" id="pesan"></h5>
								<div class="modal-body">
									<div class="form-group">
										<label>Nama Kategori Berita</label>
										<input type="text" name="nama_kategori_berita" class="form-control">
										<input type="hidden" name="id_kategori_berita" value="">
									</div>
									<div class="form-group">
										<button type="button" name="submit" id="btn-tambah" onclick="tambahData()" class="btn btn-primary">Tambah</button>
										<button type="button" id="btn-update" onclick="updateData()" class="btn btn-primary">Update</button> 
										<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--END MODAL TAMBAH DAN UPDATE-->
				</div>
			</div>
		</div>

		<!--AJAX-->
		<script type="text/javascript">
			ambilData();
			function ambilData(){
				$.ajax({
					type 			: 'POST',
					url 			: '<?=base_url("index.php/page/ambilData")?>',
					dataType 	: 'json',
					success 	: function(data){
						// console.log(data);
						var html = '';
						var i = 0;
						var no = 1;
						for(i=0;i<data.length;i++){
							html +=
								'<tr>'+
									'<td>'+no+'</td>'+
									'<td>'+data[i].nama_kategori_berita+'</td>'+
									'<td>'+
										'<a href="#form" data-toggle="modal" class="btn btn-info" onClick="submit('+data[i].id_kategori_berita+')">Update</a>'+ " "+
										'<a class="btn btn-danger" onclick="hapusData('+data[i].id_kategori_berita+')">Delete</a>'+
									'</td>'+
								'</tr>';
							no++;
						}
						$('#dataTarget').html(html);
					}
				});
			}//end ambilData

			function tambahData(){
				var nama_kategori_berita=$("[name='nama_kategori_berita']").val();
				$.ajax({
					type : 'POST',
					data: 'nama_kategori_berita='+nama_kategori_berita,
					url 	: '<?=base_url("index.php/page/tambahData")?>',
					dataType : 'JSON',
					success : function(hasil){
						// console.log(hasil);
						$('#pesan').html(hasil.pesan);
						if(hasil.pesan == ""){
							$('#form').modal('hide');
							ambilData();
							$("[name='nama_kategori_berita']").val("");
						}
					}
				});
			}

			function submit(x){
				if(x == 'tambah'){
					$("#btn-tambah").show();
					$("#btn-update").hide();
				}else{
					$("#btn-tambah").hide();
					$("#btn-update").show();
				}
				$.ajax({
					type : 'POST',
					data 	: 'id_kategori_berita='+x,
					url 	: '<?=base_url("index.php/page/ambilId")?>',
					dataType 	: 'JSON',
					success 	: function(hasil){
						//console.log(hasil);
						$('[name="id_kategori_berita"]').val(hasil[0].id_kategori_berita);
						$('[name="nama_kategori_berita"]').val(hasil[0].nama_kategori_berita);
					}
				});
			}

			function updateData(){
				var id_kategori_berita=$("[name='id_kategori_berita']").val();
				var nama_kategori_berita=$("[name='nama_kategori_berita']").val();
				$.ajax({
					type 			: 'POST',
					data 			: 'id_kategori_berita='+id_kategori_berita+'&nama_kategori_berita='+nama_kategori_berita,
					url 			: '<?=base_url("index.php/page/updateData")?>',
					dataType 	: 'JSON',
					success 	: function(hasil){
						$("#pesan").html(hasil.pesan);
						if(hasil.pesan == ""){
							$('#form').modal('hide');
							ambilData();
						}
					}
				});
			}

			function hapusData(id_kategori_berita){
				var tanya = confirm('Apakah Anda Yakin Akan Menghaus Data Ini??');
				if(tanya){
					$.ajax({
						type : 'POST',
						data : 'id_kategori_berita='+id_kategori_berita,
						url : '<?=base_url("index.php/page/deleteData")?>',
						success : function(){
							ambilData();
						}
					});
				}
			}
		</script>
		<!--END AJAX-->
		<script type="text/javascript" src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
	</body>
</html>