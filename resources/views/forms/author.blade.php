
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" >
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
<div class="modal" tabindex="-1" role="dialog" id="author_form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Author Form</h5>
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
                <span class="input-group-text" id="inputGroup-sizing-default">First Name</span>
              </div>
              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="firstname" id="firstname">
            </div>

            <!-- Last Name -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Last Name</span>
                </div>
                <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="lastname" id="lastname">
            </div>

            <!-- Date of Birth  -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Date of Birth</span>
              </div>
              <input type="text" class="form-control" aria-label="Default" data-date-format="yyyy-mm-dd" aria-describedby="inputGroup-sizing-default" data-provide="datepicker" name="dob" id="dob" readonly>
            </div>

            <!-- Bio -->
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Bio</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="bio" id="bio" ></textarea>
            </div>

        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="btn_save_author" id="btn_save_author">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
      </div>
    </div>
    </div>
  </div>
</div>

<script>

jQuery(document).ready(function(){
            jQuery('#btn_save_author').click(function(e){
               e.preventDefault();
               $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
               jQuery.ajax({
                  url: "{{ route('newauthor') }}",
                  method: 'post',
                  data: {
                    firstname: jQuery('#firstname').val(),
                    lastname: jQuery('#lastname').val(),
                    dob: jQuery('#dob').val(),
                    bio: jQuery('#bio').text(),
                  },
                  success: function(result){
                  	if(result.errors)
                  	{
                  		jQuery('.alert-danger').html('');

                  		jQuery.each(result.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  	}
                  	else
                  	{
                  		jQuery('.alert-danger').hide();
                  		$('#author_form').modal('hide');
                      //location.reload();
                  	}
                  },
                  error: function (data) {
                      var response = $.parseJSON(data.responseText);
                  		jQuery('.alert-danger').html('');
                  		jQuery.each(response.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<li>'+value+'</li>');
                  		});
                  }
                  });
               });
            });




</script>

