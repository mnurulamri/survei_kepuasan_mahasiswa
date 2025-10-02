<script>
function openTab(evt, cityName) {
var i, x, tablinks;
x = document.getElementsByClassName("city");
for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
}
tablinks = document.getElementsByClassName("tablink");
for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
    tablinks[i].className = tablinks[i].className.replace(" aktif", "");
}
document.getElementById(cityName).style.display = "block";
evt.currentTarget.firstElementChild.className += " w3-border-red";
}

function displayFormKategoriPertanyaan() {
  var x = document.getElementById("form-kategori-pertanyaan");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

$(document).ready(function(){

	        $.ajax({
	            type: "POST",
	            url: "<?=base_url()?>" + "pertanyaan/view_kategori",
	            success: function(res) {
	                console.log(res);
					$("#data-kategori").html(res);
	            }
	        });	

	$("form#form-kategori").submit(function(e){
		
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        
        $.ajax({
            type: "POST",
            url: "<?=base_url()?>" + "pertanyaan/store_kategori",
            data: formData,
            success: function(res) {
                console.log(res)
				$("#data-kategori").html(res);
            },            
            cache: false,
            contentType: false,
            processData: false
        });
	});

	$(document).on("click", ".delete-kategori", function(){
		if (confirm("Yakin akan menghapus data?") == true) {
			var id = $(this).attr("id");

	        $.ajax({
	            type: "POST",
	            url: "<?=base_url()?>" + "pertanyaan/delete_kategori",
	            data: {id:id},
	            success: function(res) {
	                console.log(res);
					$("#data-kategori").html(res);
	            }
	        });
		}
	});

	
	$(document).on("click", ".edit-pertanyaan-tertutup", function(){
		var id = $(this).attr("id");

		// set combo box kategori
		$.ajax({
			type: "POST",
			url: "<?=base_url()?>" + "pertanyaan/array_kategori",
			dataType: 'json',
			success: function(kategori) {

				var select_kategori = document.createElement("SELECT");
				
				$.each(kategori, function(index, element) {
					console.log(index+element.id+element.nama_kategori)
					select_kategori.innerHTML += '<option value="'+element.id+'">'+element.nama_kategori+'</option>';
				});
				$("#kategori-"+id).html(select_kategori);
				//console.log(opt)
			}
		});

		var pertanyaan = $("#pertanyaan-tertutup-"+id).text();
		$("#pertanyaan-tertutup-"+id).html('<input type="text" value="'+pertanyaan+'">');
		$("#tombol-simpan-pertanyaan-tertutup-"+id).html('<button data-id="'+id+'">simpan</button>')
	})
});
</script>