const transaction = $('.transaction').data('transaction');
const redirect = $('.transaction').data('redirect');
if (transaction) {
  Swal.fire({
    type: 'success',
    title: 'Berhasil!',
    text: 'Transaksi berhasil '+transaction,
    showConfirmButton: false,
    timer: 2000
  }).then(()=>{
    window.open(redirect);
  });
}
const cantdelete = $('.cantdelete').data('cantdelete');
if (cantdelete) {
  Swal.fire({
      type: 'error',
      title: 'Gagal!',
      text: cantdelete,
      showConfirmButton: false,
      timer: 2000
    });
}
const flashdata = $('.flashdata').data('flashdata');
if (flashdata) {
	Swal.fire({
      type: 'success',
      title: 'Berhasil!',
      text: 'Data '+ flashdata,
      showConfirmButton: false,
      timer: 2000
    });
}

const hapus = $('.hapus').on('click', function(e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
    type: 'warning',
    title: 'Apakah anda yakin?',
    text: 'Data akan dihapus',
    showCancelButton: true,
    cancelButtonColor: '#d33',
    confirmButtonColor: '#2dc389',
    confirmButtonText: 'Yakin'
  }).then((result)=>{
      if (result.value) {
      	location.href = href
      }
  });

})
const logout = $('.logout').on('click', function(e) {
	e.preventDefault();
	const href = $(this).attr('href');
	Swal.fire({
          type: 'warning',
          title: 'Apakah anda yakin?',
          text: 'anda akan logout',
          showCancelButton: true,
          cancelButtonColor: '#d33',
          confirmButtonColor: '#2dc389',
          confirmButtonText: 'Yakin'
        }).then((result)=>{
            if (result.value) {
            	location.href = href
            }
        });

})

const flashdatawarning = $('.flashdatawarning').data('flashdata');
if (flashdatawarning) {
	Swal.fire({
      type: 'warning',
      title: 'Warning!',
      text: flashdatawarning,
      showConfirmButton: false,
      timer: 2000
    });
}

const warningpass = $('.warningpass').data('flashdata');
if (warningpass) {
	Swal.fire({
      type: 'error',
      title: 'Gagal !',
      text: warningpass,
      showConfirmButton: false,
      timer: 2000
    });
}


const userfail = $('.userfail').data('flashdata');
if (userfail) {
	Swal.fire({
      type: 'error',
      title: 'Gagal!',
      text: userfail,
      showConfirmButton: false,
      timer: 2000
    });
}
const loginsuccess = $('.loginsuccess').data('flashdata');
if (loginsuccess) {
	Swal.fire({
      type: 'success',
      title: 'Berhasil!',
      text: loginsuccess,
      showConfirmButton: false,
      timer: 2000
    });
}
const loginfail = $('.loginfail').data('flashdata');
if (loginfail) {
	Swal.fire({
      type: 'error',
      title: 'Gagal!',
      text: loginfail,
      showConfirmButton: false,
      timer: 2000
    });
}