var data = {};

document.getElementById("hitung").addEventListener("click", function() {
    var quiz = document.getElementById("quiz").value;
    var tugas = document.getElementById("tugas").value;
    var uts = document.getElementById("uts").value;
    var uas = document.getElementById("uas").value;

    var ip = "";
    var keterangan = "";

    total = (quiz*0.1) + (tugas*0.2) + (uts*0.3) + (uas*0.4)


    if(total>80) {
        ip = "A"
        keterangan = "Lulus dengan sangat baik"
    }else if(total >= 69 && total <= 80){
        ip = "B"
        keterangan = "Lulus dengan baik"
    }else if(total >= 56 && total <= 68){
        ip = "C"
        keterangan = "Lulus dengan cukup"
    }else if(total >= 39 && total <= 55) {
        ip = "D"
        keterangan = "Lulus dengan kurang"
    }else if(total < 38) {
        ip = "E"
        keterangan = "Tidak Lulus"
    }


    alert(ip, keterangan)
    // Menampilkan hasil perhitungan pada elemen input
    document.getElementById("hasil-ip").value = ip;
    document.getElementById("keterangan").value = keterangan;
});

document.getElementById("ulang").addEventListener("click", function() {
    document.getElementById("quiz").value = "";
    document.getElementById("tugas").value = "";
    document.getElementById("uts").value = "";
    document.getElementById("uas").value = "";

    document.getElementById("hasil-ip").value = "";
    document.getElementById("keterangan").value = "";
});
