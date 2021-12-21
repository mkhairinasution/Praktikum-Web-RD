<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nasution Kopi!</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/8f37dd1c37.js" crossorigin="anonymous"></script>
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900;1000;&display=swap');
      *{
        font-family: "Poppins" , sans-serif;
      	color: #06203d;
      	scroll-behavior: smooth;
      }
	</style>
</head>
<body>
	<div class="jumbotron jumbotron-fluid" style="background-image: url('assets/hahaha.png'); background-position:left ; background-repeat: no-repeat ; min-height: 10px;">
	  <div class="container">
	    <h1 class="display-5 text-white">Selamat datang di Nasution Kopi</h1>
	    <p class="lead" style="font-size: 15px; color: white;">Kami menyediakan pemesanan biji kopi khas sumatera utara secara praktis dalam satu halaman.</p>
	    <a class="btn btn-primary btn-lg" href="#tabel" role="button">Daftar belanjaanmu</a>
	  </div>
	</div>

	<div class="container-fluid">
		<?php if(isset($_SESSION['user'])):?>
			<h4 class="col-8 offset-2">Selamat datang <span id="sessionUser"><?= $_SESSION['user'];?></span>!</h4>
			<p class="col-8 offset-2">Logout klik <a href="logout.php">disini</a>!</p>
		<?php endif;?>
		<div class="col-8 offset-2 p-3 mb-5" style="background-color: #c3defa; border-radius: 10px; min-height: 300px;">
			<h2 class="text-center my-4">Pilih Biji Kopi mu!</h2>
			<p class="text-center"><strong>Kopi Mandailing : 50000/Kg <span style="font-size: 12px;">(Baru menyediakan Biji Kopi Ini)</span></strong></p>
			  <div class="form-group col-5">
			    <label for="Kopi">Mau beli berapa kg biji Kopi ?</label>
			    <input type="text" class="form-control col-6" id="Kopi" name="Kopi" onkeyup="getTotal()">
			    <small id="KopiTotal" class="form-text text-muted"></small><br>
			  <button type="submit" class="btn btn-primary" id="keranjang" name="keranjang">Keranjang <i class="fas fa-fw fa-cart-plus text-white"></i></button>
			  </div>
		</div>

		<script type="text/javascript">
	        function getTotal(){
	          var x = document.getElementById('Kopi').value * 50000;
	          var result = 0;
	          result = x;
	          document.getElementById('KopiTotal').innerHTML='Harga total belanjaanmu adalah Rp.'+result;
	        }
	        document.getElementById("Kopi").addEventListener("keypress", function (evt) {
			    if (evt.which < 48 || evt.which > 57)
			    {
			        evt.preventDefault();
			    }
			});
	    </script>

		<div class="col-8 offset-2 p-3 mb-5" id="tabel" style="background-color: #fffb75; border-radius: 10px; min-height: 300px;">
			<h2 class="text-center my-5">Daftar Belanjaanmu</h2>
			<div id="table_content">
				
			</div>
		</div>

	</div>

<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login disini!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="login.php">
      <div class="modal-body">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
		    <small id="emailHelp" class="form-text text-muted">Apabila belum memiliki akun, silahkan masukkan disini juga. <br>Email akan terdaftar secara otomatis.</small>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="login" name="login">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalUbah">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Belanjaanmu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group col-10 offset-1">
			<label for="Kopi">Mau beli berapa Kopi?</label>
			<input type="text" class="form-control col-6" id="KopiEdit" name="KopiEdit" onkeyup="getTotalEdit()">
			<small id="KopiTotalEdit" class="form-text text-muted"></small><br>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btnSimpanEdit btn btn-primary" id="buttonSimpan" data-dismiss="modal">Simpan</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	function getTotalEdit(){
	    var x = document.getElementById('KopiEdit').value * 25000;
	    var result = 0;
	    result = x;
	    document.getElementById('KopiTotalEdit').innerHTML='Harga total belanjaanmu adalah Rp.'+result;
	}
		document.getElementById("KopiEdit").addEventListener("keypress", function (evt) {
			if (evt.which < 48 || evt.which > 57)
			    {
			        evt.preventDefault();
			    }
			});
</script>

<script src="jquery-3.5.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    <?php if (!isset($_SESSION['user'])):?>
	        $('#exampleModal').modal('show');
	    <?php endif;?>
});
</script>

<script>
	$(document).ready(function() {

	    $.get("viewTable.php", function(data) {
	        $("#table_content").html(data);
	    });
	});
</script>
<?php if (isset($_SESSION['user'])):?>
<script>
    $(document).ready(function() {
        $('#keranjang').click(function() {
        var id_cart = null;
        var email = document.getElementById('sessionUser').innerHTML;
        var jumlah = $('#Kopi').val();
        var total = jumlah * 25000;

        $.ajax({
            method: "POST",
            url: "add.php",
            data: {id_cart:id_cart, email:email, jumlah:jumlah, total:total},
            success: function(data, status, xhr) {
            	email;
                jumlah;
                total;
                $.get("viewTable.php", function(html) {
                    $("#table_content").html(html);
                });
            }
        });
    });
});
</script>
<?php endif;?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>