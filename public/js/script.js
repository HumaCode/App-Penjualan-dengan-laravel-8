const flashData = $('.flash-data').data('flashdata');

// jika ada flashDatanya maka jalankan sweetalertnya
if(flashData) {
    Swal.fire(
        'Data',
        'Berhasil ' + flashData,
        'success'
    )
}



