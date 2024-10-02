$( document ).ready(function() {
    $('.edit-modal-button').on('click', function (){
        $('#formModalLabel').html('Ubah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Ubah Data')
        $('.modal-body form').attr('action', 'http://localhost/MVC/public/mahasiswa/ubah')
        
        const id = $(this).data('id')
        $.ajax({
            url: 'http://localhost/MVC/public/mahasiswa/getubah',
            data: {id: id},
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama)
                $('#nim').val(data.nim)
                $('#email').val(data.email)
                $('#jurusan').val(data.jurusan)
                $('#id').val(data.id)
            }
        })
    })
    $('.tambah-modal-button').on('click', () => {
        $('#formModalLabel').html('Tambah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Tambah Data')
        $('.modal-body form').attr('action', 'http://localhost/MVC/public/mahasiswa/tambah')
    })
})