<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<form action="{{ route('daftarpinjam') }}" class="col" method="POST">
					@csrf
							<div class="form-group">
								<label for="nim">NIM:</label>
								<input type="text" class="form-control" name="nim" id="nim">	
							</div>
							<div class="form-group">
								<label for="nama">Nama:</label>
								<input type="text" class="form-control" name="nama" id="nama">	
							</div>
							<div class="form-group">
								<label for="email">E-mail:</label>
								<input type="email" class="form-control" name="email" id="email">	
							</div>
							<div class="form-group">
								<label for="tanggal">Tanggal:</label>
								<input type="date" class="form-control" name="tanggal" id="tanggal">	
							</div>
							<div class="form-group">
								<label for="jam">Jam:</label>
    							<select name="jam" id="jam" class="form-control">
    								<option>----- Pilih Jam -----</option>
    							</select>	
							</div>
							<div class="form-group">
								<label for="keterangan">Keterangan:</label>
    							<textarea name="keterangan" id="keterangan" class="form-control"></textarea>
							</div>
					<input type="submit" class="btn btn-primary">
				</form>
			</div>           
		</div>
	</body>

	<script type="text/javascript">
		$(document).ready(function() {
			$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			$('#tanggal').change(function() {
				$('#jam').html('<option>----- Pilih Jam -----</option>');
				tanggal = $(this).val();
				console.log(tanggal);
				$.ajax({
					type:'get',
					url: 'http://localhost:8000/cekwaktu/' + tanggal,
					dataType: 'json',
					success: function(result){
						$.each(result, function(i,data){
							$('#jam').append(`
								<option value="` + data.id + `">` + data.waktu + `</option>
								`);
						});
					},
				});
			});
		});
	</script>
</html>