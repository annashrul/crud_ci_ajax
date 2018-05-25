<?php include '/../header.php'; ?>
<style type="text/css">
	.container .box-transaksi{border:1px solid black;border-radius:5px 5px 5px 5px;}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="text-center">Toko Online</h1>

			<h3 class="text-left">Keranjang : </h3>
			<div class="col-md-12" id="box_transaksi">
				
				<!-- <h3 class="text-center">Nama Barang</h3>
				<p class="text-center"><a href="" class="btn btn-primary">Buy</a></p> -->
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	get();
	function get(){
		$.ajax({
			url:"<?=base_url('index.php/frontend/home/get')?>",
			type:"POST",
			dataType:"JSON",
			success:function(hasil){
				// console.log(hasil);
				var html="";
				var i = 0;
				for(i=0;i<hasil.length;i++){
				html +=
					"<div class='col-md-4  box-transaksi'>"+
						"<form>"+
						"<input type='hidden' name='id_barang' id='id_barang' value='"+hasil[i].id_barang+"'>"+
						"<h3 class='text-center'>"+hasil[i].nama_barang+"</h3>"+
						"<h3 class='text-center'>"+"Rp"+hasil[i].harga_barang+"</h3>"+
						"<p class='text-center'><a href='' class='btn btn-primary' onClick='submit()'>Buy</a></p>"+
						"</form>"+
					"</div>";
				}
				$("#box_transaksi").html(html);
			}
		});
	}
	function submit(){
		var data_barang={
			"id_barang" : $("#id_barang").val()
		} 
		$.ajax({
			url:"<?=base_url('index.php/home/buy')?>",
			type:"POST",
			dataType:"JSON",
			data:data_barang,
			success:function(hasil){
				console.log(hasil);
			}
		});
	}
</script>