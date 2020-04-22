const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        icon : 'success',
        title : 'Informasi',
        text : 'Data Berhasil ' + flashdata,
        type : 'success'

    })
}

// //hapus

// $('.tombol-hapus').on('click', function (e) {
//     e.preventDefault();
//     const href = $(this).attr('href');

//     Swal.fire({
//         icon: 'warning',
//         title: 'Anda Yakin Hapus?',
//         text: "Anda tidak akan dapat mengembalikan ini!",
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//         cancelButtonColor: '#d33',
//         confirmButtonText: 'Ya, Hapus Ini!',
//         cancelButtonText: 'Batal'
//       }).then((result) => {
//         if (result.value) {
//           document.location.href = href;
//         }
//       });
// })

// const flashdata = $('.flash-data').data('flashdata');

// if (flashdata) {
//     Swal.fire({
//         icon : 'success',
//         title : 'Informasi',
//         text : 'Data Berhasil ' + flashdata,
//         type : 'success'

//     })
// }

//hapus

$('.member-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin Hapus Member?',
        text: "Anda tidak akan dapat mengembalikan ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Ini!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      });
})

$('.transaksi-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin Hapus Transaksi?',
        text: "Pastikan Buku Sudah Kembali!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Ini!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      });
})

$('.buku-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin Hapus Buku?',
        text: "Anda Tidak Dapat Mengembalikan Ini!!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Ini!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      });
})

$('.pegawai-hapus').on('click', function (e) {
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda Yakin Hapus Pegawai?',
        text: "Pastikan Anda Tidak Login Dengan Akun Ini!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Hapus Ini!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      });
})