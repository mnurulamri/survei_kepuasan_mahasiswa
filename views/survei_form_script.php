    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();

        // input survei
        $("form#input-survei").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            
            $.ajax({
                type: "POST",
                url: "<?=base_url()?>" + "survei/form_simpan",
                data: formData,
                success: function(res) {
                    console.log(res)
                },            
                cache: false,
                contentType: false,
                processData: false
            });
        });
    });

    </script>