<?php include 'header.php'; ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center"><?=$title?></h1>
			<a href="#form" class="btn btn-primary" data-toggle="modal" onclick="submit('tambah')">Tambah Barang</a>
			<a href="<?=base_url('index.php/kategori')?>" class="btn btn-primary">Kategori</a>
			<a href="<?=base_url('index.php/login/logout')?>" class="btn btn-primary">Logout</a>
			<h3 class="text-center">hallo <?php echo $this->session->userdata('username')?></h3>
			<table class="table table-bordered">
				<thead>
					<tr>
						<td>NO</td>
						<td>Nama Barang</td>
						<td>Harga Barang / Satuan Barang</td>
						<td>Stok Barang</td>
						<td>Tanggal Input Barang</td>
						<td>Jenis Barang</td>
						<td>Aksi</td>
					</tr>
				</thead>
				<tbody id="data_barang"></tbody>
			</table>
			<div class="modal fade" id="form" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="text-center"><?=$title?></h3>
						</div>
						<div class="modal-body">
						<p class="text-center" id="pesan" style="color:red!important;font-weight:600;"></p>
							<div class="form-group">
								<label>Jenis Barang</label>
								<select name="id_kategori" class="form-control" id="id_kategori">
									<option value="">MISAL</option>
								</select>
							</div>
							<div class="form-group">
								<div class="col-md-12">
								<label>nama Barang</label>
								<input type="text" name="nama_barang" id="nama_barang" class="form-control">
								<input type="hidden" name="id_barang" id="id_barang" value="">
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6">
									<label>harga Barang</label>
									<input type="number" name="harga_barang" id="harga_barang" class="form-control">
								</div>
								<div class="col-md-6">
									<label>Satuan Barang</label>
									<select name="satuan_barang" id="satuan_barang" class="form-control" placeholder="pilih">
										<option value="Bal">Bal</option>
										<option value="Pak">Pak</option>
										<option value="Pcs">Pcs</option>
										<option value="Kodi">Kodi</option>
										<option value="Kg">Kg</option>
										<option value="Bungkus">Bungkus</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-12">
									<label>stok Barang</label>
									<input type="number" name="stok_barang" id="stok_barang" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<button type="button" class="btn btn-primary" name="btn-tambah" id="btn-tambah" onclick="tambah_data_barang()">Tambah</button>
								<button type="button" class="btn btn-primary" name="btn-edit" id="btn-edit" onclick="edit_data_barang()">Edit</button>
								<button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	ambil_data_barang();
	moment.locale('id');


	function ambil_data_barang(){
		$.ajax({
			url : "<?=base_url('index.php/barang/ambil_data_barang')?>",
			type : "POST",
			dataType : 'JSON',
			success : function(barang){
				// console.log(barang);
				var html = "";
				var no = 1;
				var i = 0;
				for (i=0;i<barang.length;i++) {
					html +=
						"<tr>"+
							"<td>"+no+"</td>"+
							"<td>"+barang[i].nama_barang+"</td>"+
							"<td>"+'Rp.'+barang[i].harga_barang+' / '+barang[i].satuan_barang+"</td>"+
							"<td>"+barang[i].stok_barang+"</td>"+
							"<td>"+moment(barang[i].tanggal_input_barang).fromNow()+"</td>"+
							"<td>"+barang[i].nama_kategori+"</td>"+
							"<td>"+
								"<a href='#form' data-toggle='modal' class='btn btn-primary' onClick='submit("+barang[i].id_barang+")'>Update</a>" + " " +
								"<a class='btn btn-danger' onClick='hapus_data_barang("+barang[i].id_barang+")'>Hapus</a>"+
							"</td>"+
						"</tr>";
					no ++;
				}
				$("#data_barang").html(html);
			}
		});
	}
	
	function tambah_data_barang(){
		var data_barang ={
			"nama_barang" : $("#nama_barang").val(),
			"harga_barang" : $("#harga_barang").val(),
			"stok_barang" : $("#stok_barang").val(),
			"satuan_barang" : $("#satuan_barang").val(),
			"id_kategori" : $("#id_kategori").val()
			
		}
		$.ajax({
			url : "<?=base_url('index.php/barang/tambah_data_barang')?>",
			type : "POST",
			dataType : "JSON",
			data : data_barang,
			success:function(hasil){
				// console.log(hasil);
				$("#pesan").html(hasil.pesan);
				if(hasil.pesan == ""){
					$("#form").modal("hide");
					$("#nama_barang").val("");
					$("#harga_barang").val("");
					$("#stok_barang").val("");
					$("#satuan_barang").val("");
					$("#id_kategori").val("");
					alert('Data Berhasil Diinputkan');
					// location.reload();
					ambil_data_barang();
				}
			}
		});
	}
	function edit_data_barang(){
		var data_barang ={
			"id_barang" : $("#id_barang").val(),
			"nama_barang" : $("#nama_barang").val(),
			"harga_barang" : $("#harga_barang").val(),
			"stok_barang" : $("#stok_barang").val(),
			"satuan_barang" : $("#satuan_barang").val(),
			"id_kategori" : $("#id_kategori").val()
		}
		$.ajax({
			url:"<?=base_url('index.php/barang/edit_data_barang')?>",
			type:"POST",
			dataType:"JSON",
			data:data_barang,
			success:function(hasil){
				// console.log(hasil);
				$("#pesan").html(hasil.pesan);
				if(hasil.pesan == ""){
					$("#form").modal("hide");
					ambil_data_barang();
					$("#id_barang").val("");
					$("#id_kategori").val("");
					$("#nama_barang").val("");
					$("#harga_barang").val("");
					$("#stok_barang").val("");
					$("#satuan_barang").val("");
					location.reload();
				}
			}
		});
	}
	function submit(param){
		if(param == "tambah"){
			$("#btn-tambah").show();
			$("#btn-edit").hide();
			get_kategori();
		}else{
			$("#btn-tambah").hide();
			$("#btn-edit").show();
			get_kategori();
		}
		$.ajax({
			url : "<?=base_url('index.php/barang/ambil_id')?>",
			type : "POST",
			dataType: "JSON",
			data: "id_barang="+param,
			success:function(barang){
				// console.log(barang);
				if(param != "tambah"){
					$("#id_barang").val(barang[0].id_barang);
					$("#id_kategori").val(barang[0].id_kategori);
					$("#nama_barang").val(barang[0].nama_barang);
					$("#harga_barang").val(barang[0].harga_barang);
					$("#stok_barang").val(barang[0].stok_barang);
					$("#satuan_barang").val(barang[0].satuan_barang);
				}else if(param == ""){
					$("#nama_barang").val(barang[0].nama_barang);
					$("#harga_barang").val(barang[0].harga_barang);
					$("#stok_barang").val(barang[0].stok_barang);
					$("#satuan_barang").val(barang[0].satuan_barang);
				}
			}
		});
	}

	function hapus_data_barang(id_barang){
		var nanya = confirm("Anda Yakin Akan Hapus Data Ini ??");
		if(nanya){
			$.ajax({
				url:"<?=base_url('index.php/barang/hapus_data_barang')?>",
				type:"POST",
				dataType:"JSON",
				data:"id_barang="+id_barang,
				success:function(){
					ambil_data_barang();
				}
			});
		}
	}

	function get_kategori(){
		$.ajax({
			url:"<?=base_url('index.php/barang/kategori_by_barang')?>",
			type:"GET",
			dataType:"JSON",
			success:function(hasil){
				var html="";
				for(var i=0; i<hasil.length;i++){
					html += 
						"<option value='"+hasil[i].id_kategori+"'>"+hasil[i].nama_kategori+"</option>"
				}
				$("#id_kategori").html(html);
			}
		});
	}
</script>
<?php include 'footer.php'; ?>