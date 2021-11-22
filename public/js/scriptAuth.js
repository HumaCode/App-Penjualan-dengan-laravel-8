const flashLogin = $('.flash-data').data('flashdata');
const loginError = $('#flash-data').data('flashdata');

if(flashLogin) {
    Swal.fire(
        'Berhasil',
        flashLogin,
        'success'
    )
} 

if (loginError) {
    Swal.fire(
        'Upss..',
        loginError,
        'warning'
    )
}
