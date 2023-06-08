document.getElementById("hitung").addEventListener("click", function() {
    
    saldo = parseFloat(document.getElementById("saldo").value)
    bunga = parseFloat(document.getElementById("bunga").value)
    bulan = parseFloat(document.getElementById("waktu").value)

    pesan = ""
    for(i = 1; i < (bulan+1); i++) {
        saldo += (saldo * bunga)
        pesan += `Saldo bulan ${i} adalah ${saldo}\n`
    }
    document.getElementById("result").innerHTML = pesan
    alert("hae")
});

document.getElementById("reset").addEventListener("click", function() {
    document.getElementById("saldo").value
    document.getElementById("bunga").value
    document.getElementById("waktu").value
});
