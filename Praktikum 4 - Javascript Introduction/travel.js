document.getElementById("hitung").addEventListener("click", function() {
    
    
    // Mendapatkan nilai dari elemen input jumlah tiket
    var jumlahTiket = parseInt(document.getElementById("jumlah-tiket").value);
  
    // Mendapatkan nilai dari elemen checkbox
    var isMember = document.getElementById("check-member").checked;
  
    // Mendapatkan nilai harga tiket
    var hargaTiket = 0;
    var tujuan = document.getElementById("tujuan").value;
    
    console.log(jumlahTiket, isMember, tujuan)

    if (tujuan === "Jakarta") {
        hargaTiket = 100000;
    } else if (tujuan === "Cirebon") {
        hargaTiket = 150000;
    } else if (tujuan === "Tasikmalaya") {
        hargaTiket = 200000;
    } else {
        alert("MASUKKAN TUJUAN YANG VALID !!")
        return
    }
  
    // Menghitung sub total
    var subTotal = hargaTiket * jumlahTiket;
  
    // Menghitung diskon
    var diskon = isMember ? subTotal * 0.1 : 0;
  
    // Menghitung total bayar
    var totalBayar = subTotal - diskon;
  
    // Menampilkan hasil perhitungan pada elemen input
    document.getElementById("hitung-harga-tiket").value = hargaTiket;
    document.getElementById("sub-total").value = subTotal;
    document.getElementById("diskon").value = diskon;
    document.getElementById("total-bayar").value = totalBayar;
});

document.getElementById("ulang").addEventListener("click", function() {
    document.getElementById("hitung-harga-tiket").value = "";
    document.getElementById("sub-total").value = "";
    document.getElementById("diskon").value = "";
    document.getElementById("total-bayar").value = "";

    document.getElementById("nama").value = ""
    document.getElementById("check-member").checked = false;
    document.getElementById("tujuan").selectedIndex = 0
    document.getElementById("jumlah-tiket").value = ""
})