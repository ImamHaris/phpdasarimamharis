$(document).ready(function(){
    //hilangkan tombol cari
    $('#tombol-cari').hide();

    //event kentika keyword ditulis
    $('#keyword').on('keyup', function(){
        //munculkan icon loading
        $('.loader').show();

        //ajax menggunakan load
        //$('#container').load('ajax/mahasiswa.php?keyword='+$('#keyword').val());
    
        //ajax menngunakan $.get()
        $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data){
            $('#container').html(data);
            $('.loader').hide();
        });
    });
});