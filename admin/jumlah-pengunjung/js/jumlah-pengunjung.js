$(document).ready(function(){
	$.ajax({
		url: 'jumlah-pengunjung/grafik.php',
		method: 'get',
		data:{
			tahun: $('#tahun').val()
		},
		success:function(response){
			$('#render-container').html(response);
		}
	});
	$('#tahun').change(function(){
		$.ajax({
			url: 'jumlah-pengunjung/grafik.php',
			method: 'get',
			data:{
				tahun: $('#tahun').val()
			},
			success:function(response){
				$('#render-container').html(response);
			}
		});
	});
});