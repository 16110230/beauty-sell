<script>
    $("#add-admin").click(function (e){
        $('#add-admin-modal').modal('show');
    })

    $("#reset-pass").click(function (e){
        console.log($('#reset-pass').data("id"))
        $('#modal-reset').modal('show');
    })  

    $("#modal-reset-close").click(function (e){
        location.reload();
    }) 


</script>
