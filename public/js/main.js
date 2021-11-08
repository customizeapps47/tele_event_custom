$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
    }
  });
  
  $(document).on('click', '.icons-choose-ggfonts', function(e) {
    $('input[name=selected_googlefonts]').val($(this).data('infor'));
    $('#modal-success').modal('hide');
  });
  
  /* submit google font */
  $(document).on('submit', '#reg_notification', function(e) {
    e.preventDefault();
    btnSm = $('#btn-reg-notifi');
    btnSm.text('Processing...');
    btnSm.prop('disabled', true);

    let data = $(this).serialize(),
        url = $(this).attr('action');
    $.ajax({
        url: url+'/tele',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(data) {
            location.reload();
            toastr[data.type](data.content)
        },
        error: function(data) {
            data = data.responseJSON;
            toastr[data.type](data.content);
        },
        complete: function() {
            btnStorefonts.text('Save');
            btnStorefonts.prop('disabled', false);
        }
    });
  });

  $(document).on('click', '#btn-edit', function (e) {
        let data = $(this).data('id');
        $('#update_notification textarea[name=tele_id]').val(data.tele_id);
        $('#update_notification input[name=id]').val(data.id);
        $('#update_notification select[name=registration_for] option[value="' + data.registration_for + '"]').prop('selected', true);
        $('#update_notification select[name=status] option[value="' + data.status + '"]').prop('selected', true);
        $('#modal-edit-form').modal('show');
    });

    $(document).on('submit', '#update_notification', function (e) {
        e.preventDefault();
        btnSm = $('#btn-update-notifi');
        btnSm.text('Waiting for update...');
        btnSm.prop('disabled', true);
    
        let data = $(this).serialize(),
            url = $(this).attr('action');
            id = $('#update_notification input[name=id]').val();
        $.ajax({
            url: url + '/tele/'+id,
            type: 'PUT',
            dataType: 'json',
            data: data,
            success: function (data) {
                location.reload();
                toastr[data.type](data.content)
            },
            error: function (data) {
                data = data.responseJSON;
                toastr[data.type](data.content);
            },
            complete: function () {
                btnSm.text('Update');
                btnSm.prop('disabled', false);
            }
        });
    });
  
  
 /* delete webhook*/
  $(document).on('click', '#btn-destroy', function (e) {
    let id = $(this).data('id');
    let url = $(this).data('url');
    $.ajax({
        url: url +'/tele/'+ id,
        type: 'DELETE',
        dataType: 'json',
        success: function (data) {
            location.reload();
            toastr[data.type](data.content)
        },
        error: function (data) {
            data = data.responseJSON;
            toastr[data.type](data.content);
        }
    });
});

function resetFormStore() {
    $('#reg_notification').trigger('reset');
}