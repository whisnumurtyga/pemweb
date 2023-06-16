/*

    todo  1. Penumpang bisa naik dan turun
    todo  2. Pada Metode tambah dan Kurang terdapat 2 parameter yaitu nama penumpang dan array penumpang
    
    todo  Rules
        1. Jika Kereta kosong, penumpang naik duduk di kursi pertama
        2. Penumpang berikutnya duduk dikursi selanjutnya secara berurutan.
        3. Jika ada kursi kosong

    Step Penyelesaian 
    1. Buat Object dan Declare Function
    

    Testcase
        1. Joko Turun
        2. Joko Naik
        3. Anonim Naik
        4. Amel Turun
        5. Peter Naik
        6. Inem Turun
        7. 

    Kita Butuh Apa
        1. Array 
            - Array Penumpang, value : nama penumpang ex: ['Budi', 'Dono']
        2. Fungsi Naik 
            - Parameter (Nama Penumpang, Array Penumpang)
            - Ada sing kosong gak, undefined dditengah? 
                - ada ? tempatin itu pakai splice
                - kalo gak ada ? pakai push
        3. Fungsi Turun
            - Splice sama fungsi find
            - 
*/ 

var kereta = []

function naik(nama, arr_penumpang) {
    if(arr_penumpang.length > 0){
        for(i in arr_penumpang){
            if(arr_penumpang[i] == undefined && arr_penumpang[i] == nama){
                arr_penumpang.splice(index, 0, nama)
                return arr_penumpang
            }
            else{
                arr_penumpang.push(nama)
                return arr_penumpang
            }
        }
    }else{
        return arr_penumpang.push(nama)
    }
}


function turun(nama, arr_penumpang) {
    if (arr_penumpang.length <= 0){
        alert("Tidak ada penumpang")    
    } else {
        for(i in arr_penumpang) {
            if (arr_penumpang[i] == nama){
                arr_penumpang.splice(i, 1, undefined)
                return arr_penumpang
            }
        }
        alert("Bukan Penumpang")
    }

}

console.log(kereta)
kereta = naik("joko", kereta)
kereta = naik("nana", kereta)


console.table(kereta)



// function ganti(nama, arr_penumpang) {
//     arr_penumpang.push(index)
// }


// console.log(naik('joko',arr_penumpang));
// kereta = [];
/** 
kereta.penumpang.push("")

var arr_penumpang = penumpang.findIndex((penumpang) => penumpang === arr_penumpang)

//cari nama penumpang yang sesuai

var arr_penumpang = penumpang.findIndex((penumpang) => penumpang === undefined);

var naik_kereta = naik('joko',kereta.penumpang['joko']);
    arr_penumpang = penumpang.pushPenumpang()

console.log(naik_kereta);

*/
