$(document).ready(function() {
    $("#button-submit").click(function(event) {
        event.preventDefault();

        var nama = $("#nama").val();
        $("#hasil-nama").text("Nama: " + nama);

        var lakiChecked = $("#laki").is(":checked");
        var perempuanChecked = $("#wanita").is(":checked");

        if (lakiChecked && perempuanChecked) {
            alert("JENIS KELAMIN 1 AJA BOS")
        } else if (lakiChecked) {
            $("#hasil-jk").text("Jenis Kelamin: Laki-Laki");
        } else if (perempuanChecked) {
            $("#hasil-jk").text("Jenis Kelamin: Perempuan");
        } else {
            $("#hasil-jk").text("Jenis Kelamin:");
        }

        var hobi = $("#floatingSelect option:selected").text();
        $("#hasil-hobi").text("Hobi: " + hobi);
    });

    $("#button-reset").click(function(event) {
        $("#hasil-nama").text("")
        $("#hasil-jk").text("")
        $("#hasil-hobi").text("")

        // Mengosongkan input
        $("#nama").val("");

        // Mengosongkan checkbox
        $("#laki").prop("checked", false);
        $("#wanita").prop("checked", false);

        // Mengosongkan select
        $("#floatingSelect").val("");  
    })
})