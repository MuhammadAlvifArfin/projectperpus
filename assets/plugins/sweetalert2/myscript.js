//universal
const flashdata = $('.flash-data').data('flashdata');

if (flashdata){
    Swal.fire({
        title : 'Informasi',
        text : 'Data Berhasil ' + flashdata,
        type : 'success'
    });
}

// hapus buku
$('.hapus-buku').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin ?',
        text: "Anda tidak akan dapat mengembalikan ini !",
        icon: 'warning',
        type : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })      

});

// hapus member
$('.hapus-member').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin ?',
        text: "Anda tidak akan dapat mengembalikan ini !",
        icon: 'warning',
        type : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })      

});

// hapus pegawai
$('.hapus-pegawai').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin ?',
        text: "Anda tidak akan dapat mengembalikan ini !",
        icon: 'warning',
        type : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })      

});

// hapus transaksi
$('.hapus-transaksi').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin ?',
        text: "Anda tidak akan dapat mengembalikan ini !",
        icon: 'warning',
        type : 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus Data!'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })      

});