<script>
    $("#btnPlus").click(function (e){
        let curQty =   $("#qty").val()
        let qtyNow = Number(curQty) + 1
        let qtyS = qtyNow.toString()
        $("#qty").val('')
        $("#qty").val(qtyS)
    })
</script>