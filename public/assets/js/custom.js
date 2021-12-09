/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// Sweet Alert


const swal = $('.swal').data('swal')
const statusSwal = $('.swal').data('status')


if (swal) {
  Swal.fire({
    title: statusSwal == 'error' ? 'Ooops': 'Success',
    text: swal,
    icon: statusSwal
})

}

// Mini taskbar

$(window).on('load', function() {
  $('.active .dropdown-menu').addClass('d-none')
 });


$('.btn-delete').on('click', function(e) {
    e.preventDefault();
    const form = $(this).parents('form');

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            form.submit()
        }
      })
})

// Number to currency format
function numberWithCommas(x) {
  return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}



// Modal Jenis Transaksi

$('#formJenisModal').on('show.bs.modal', function (event) {
    
  
    var button = $(event.relatedTarget) // Button that triggered the modal
    var title = button.data('title') // Extract info from data-* attributes
    var link = button.data('link')
    var form = button.data('form')


   

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(title)
    modal.find('.modal-footer .btn-form').text(title)
    modal.find('form').attr('action', link)
    modal.find('form input').val('')
    modal.find('form #idJenis').remove()

    if (form == 'jenis') {
        modal.find('form').append('<input type="hidden" name="id" value="'+button.data('id')+'" id="idJenis">')
        modal.find('form #jenis').val(button.data('jenis'))
    }

  })

  $('#formJenisModal').on('shown.bs.modal', function (event) {
    $(this).find('form #jenis').focus()
  })

// Modal Kategori Transaksi

  $('#formKategoriModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var title = button.data('title') // Extract info from data-* attributes
    var link = button.data('link')
    var form = button.data('form')

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text(title)
    modal.find('.modal-footer .btn-form').text(title)
    modal.find('form').attr('action', link)
    modal.find('form #id_jenis option:eq(0)').prop('selected', true)
    modal.find('form input').val('')
    modal.find('form #idKategori').remove()

if (form == 'edit') {
        modal.find('form').append('<input type="hidden" name="id" value="id" id="idKategori">')
        modal.find('form #kategori').val(button.data('kategori'))
        modal.find('form #id_jenis option[value="' + button.data('jenis') + '"]').prop('selected', true)
    } 

  })  

  $('#formKategoriModal').on('shown.bs.modal', function (event) {
    $(this).find('form #kategori').focus()
  })

// Modal SubKategori Transaksi

$('#formSubkategoriModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var title = button.data('title') // Extract info from data-* attributes
  var link = button.data('link')
  var form = button.data('form')

  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text(title)
  modal.find('.modal-footer .btn-form').text(title)
  modal.find('form').attr('action', link)
  modal.find('form #id_kategori option:eq(0)').prop('selected', true)
  modal.find('form input').val('')
  modal.find('form #idSubkategori').remove()

if (form == 'edit') {
      modal.find('form').append('<input type="hidden" name="id" value="id" id="idSubkategori">')
      modal.find('form #subkategori').val(button.data('subkategori'))
      modal.find('form #id_kategori option[value="' + button.data('kategori') + '"]').prop('selected', true)
  } 

})  

$('#formSubkategoriModal').on('shown.bs.modal', function (event) {
  $(this).find('form #subkategori').focus()
})


// Modal Transaksi

$('#formTransaksiModal').on('shown.bs.modal', function (event) {
  $(this).find('form input:visible:first').focus()
})

// Modal Upload
$('#formUploadModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('id')

  var modal = $(this)
  modal.find('#id').val(id)

})

// Modal Detail
$('#detailModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var id = button.data('id') 
  var jenis = button.data('jenis') 
  var kategori = button.data('kategori') 
  var subkategori = button.data('subkategori') 
  var transaksi = button.data('transaksi') 
  var tanggal = button.data('tanggal') 
  var keterangan = button.data('keterangan') 
  var jumlah = 'Rp. ' +  numberWithCommas(button.data('jumlah')) 
  var bukti = button.data('bukti') 
  var url = button.data('url') 
  var user = button.data('user')


 

  var modal = $(this)
  modal.find('#detailTransaksi').text(transaksi)
  modal.find('#detailJenis').text(jenis)
  modal.find('#detailKategori').text(kategori)
  modal.find('#detailSubKategori').text(subkategori)
  modal.find('#detailTanggal').text(tanggal)
  modal.find('#detailKeterangan').text(keterangan)
  modal.find('#detailJumlah').text(jumlah)
  modal.find('#detailUser').text(user)
  
  
  modal.find('.kosong').addClass('d-none')
  modal.find('.ada').addClass('d-none')
  
  if(!bukti) {
    modal.find('.kosong').addClass('d-block')
    modal.find('.ada').removeClass('d-block')
    modal.find('#upload-btn').attr('data-id', id)
  } else {
    modal.find('.bukti-transaksi').attr('src', url + bukti)
    modal.find('.ada').addClass('d-block')
    modal.find('.kosong').removeClass('d-block')

  }


}) 



// Preview Upload

function previewImg(id) {
  const fileUpload = $(id+' input.custom-file-input')
  const fileUploadLabel = $(id+' .custom-file-label')
  const imgPreview = $(id+ ' .img-preview')
  

  fileUploadLabel[0].textContent = fileUpload[0].files[0].name
  
  const filePreview = new FileReader()
  filePreview.readAsDataURL(fileUpload[0].files[0])
  
  filePreview.onload = function(e) {
    imgPreview[0].src = e.target.result
  }

}


// find by date
$('.daterange-cus').daterangepicker({
  autoUpdateInput: 'true',
  autoApply: 'true',
  locale: {format: 'YYYY-MM-DD'},
  drops: 'down',
  opens: 'right',
});

$('.daterange-cus').on('hide.daterangepicker', function(ev, picker) {
  console.log(picker.startDate.format('YYYY-MM-DD'));
  console.log(picker.endDate.format('YYYY-MM-DD'));
  console.log($('input#datepicker').val())
});

$('.daterange-cus').on('apply.daterangepicker', function(ev, picker) {
  $('#findByDate').submit()
});

// Auto Numbering

new AutoNumeric('#jumlah', {
  decimalPlaces: '0',
  decimalCharacter: ',',
  digitGroupSeparator: '.',
  unformatOnSubmit: true
})







