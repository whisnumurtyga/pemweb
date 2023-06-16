$(document).ready(function() {
    // Latihan 1
    // Todo Ready Event
    $('.button-click-me').click(function() {
        $(this).after('<p>Sedang Belajar jQuery</p>')
    });

    // Latihan 2
    // Todo Object, Selector, Action
    $('#tombol_hide').click(function() {
        $("h1").hide();
    });

    // Todo Object, Selector, Action
    $('#tombol_show').click(function() {
        $("h1").show();
    });

    // Todo Object, Selector, Action
    $('#tombol_small').click(function() {
        $("h1").css("font-size", "20px");
    });

    // Todo Object, Selector, Action
    $('#tombol_red').click(function() {
        $("h1").css("color", "red");
    });

    // Todo Object, Selector, Action
    $('#tombol_reset').click(function() {
        $("h1").removeAttr('style');
    });


    // Latihan 3
    $("#tombol").click(function() {
        $("p").css("color", "red")
        $("#belajar").css("color", "green")
        $(".warna").css("color", "blue")
        $("#test.saja").css("color", "yellow")
        $("div p.warna").css("color", 'pink')
    })

    $('#tombol-reset').click(function() {
        $("p").removeAttr('style')
        $("#belajar").removeAttr('style')
        $(".warna").removeAttr('style')
        $("#test.saja").removeAttr('style')
        $("div p.warna").removeAttr('style')
    });


    // Latihan 4
    $("#get-value").click(function() {
        var nilai1 = $("p#paragraf").text()
        var nilai2 = $("p#paragraf").html()
        alert("nilai dari .text : " + nilai1)
        alert("nilai dari .html : " + nilai2)
    })

    // Latihan 5
    $("#tombhol").click(function() {
        var nilai = $("#nama").val()
        alert(nilai)
    })
})