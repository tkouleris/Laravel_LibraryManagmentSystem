
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" >
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

<div class="modal" tabindex="-1" role="dialog" id="borrower_form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Borrower Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger" style="display:none"></div>
      <form action="" method="post">
       <div class="modal-body">
            <!-- First Name -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width:120px;" id="inputGroup-sizing-default">First Name</span>
              </div>
              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="borrower_firstname" id="borrower_firstname">
            </div>

            <!-- Last Name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:120px;" id="inputGroup-sizing-default">Last Name</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="borrower_lastname" id="borrower_lastname">
            </div>

            <!-- Date of Birth  -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="width:120px;" id="inputGroup-sizing-default">Date of Birth</span>
              </div>
              <input type="text" class="form-control" aria-label="Default" data-date-format="yyyy-mm-dd" aria-describedby="inputGroup-sizing-default" data-provide="datepicker" name="borrower_dob" id="borrower_dob" readonly>
            </div>

            <!-- Address -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:120px;" id="inputGroup-sizing-default">Address</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="borrower_address" id="borrower_address">
            </div>

            <!-- Phone -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:120px;" id="inputGroup-sizing-default">Phone</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="borrower_phone" id="borrower_phone">
            </div>

        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="btn_save_borrower" id="btn_save_borrower">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="form_borrowerid" value="0">
      </div>
    </div>
    </div>
  </div>
</div>

<script>

jQuery(document).ready(function(){
  // start Document ready

  jQuery('#btn_save_borrower').click(function(e){
    e.preventDefault();

    var borrowerid = $('input[name=form_borrowerid]').val();

    var ajaxURI = "{{ route('newborrower') }}"
    if( borrowerid > 0)
      ajaxURI = "{{ route('updateborrower') }}";

    $.ajaxSetup({
      headers:
      {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    jQuery.ajax({
      url: ajaxURI,
      method: 'post',
      data: {
        borrowerid: borrowerid,
        firstname: jQuery('#borrower_firstname').val(),
        lastname: jQuery('#borrower_lastname').val(),
        dob: jQuery('#borrower_dob').val(),
        address: jQuery('#borrower_address').val(),
        phone: jQuery('#borrower_phone').val(),
      },
      success: function(result)
      {
        location.reload();
      },
      error: function (data)
      {
        var response = $.parseJSON(data.responseText);
        jQuery('.alert-danger').html('');
        jQuery.each(response.errors, function(key, value)
        {
          jQuery('.alert-danger').show();
          jQuery('.alert-danger').append('<li>'+value+'</li>');
        });
      }
    });
  });


//end document ready
});




</script>

