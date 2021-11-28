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

$('#formDanaMasukModal').on('shown.bs.modal', function (event) {
  $(this).find('form input:visible:first').focus()
})


// Auto Numbering

new AutoNumeric('#jumlah', {
  decimalPlaces: '0',
  decimalCharacter: ',',
  digitGroupSeparator: '.',
  unformatOnSubmit: true
})



