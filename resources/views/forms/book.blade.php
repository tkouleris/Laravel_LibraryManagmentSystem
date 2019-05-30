
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" >
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>


<div class="modal" tabindex="-1" role="dialog" id="book_form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Book Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger" style="display:none"></div>
      <form action="" method="post">
       <div class="modal-body">
            <!-- Title -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="min-width: 100px;" id="inputGroup-sizing-default">Title</span>
              </div>
              <input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="title" id="title">
            </div>

            <!-- ISBN10 -->
            <div class="input-group mb-3">
                <div class="input-group-prepend" >
                  <span class="input-group-text" style="min-width: 100px;" id="inputGroup-sizing-default">ISBN10</span>
                </div>
                <input type="text" class="form-control"  maxlength="10" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="isbn10" id="isbn10">
            </div>

            <!-- ISBN13  -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="min-width: 100px;" id="inputGroup-sizing-default">ISBN13</span>
                </div>
                <input type="text" class="form-control"  maxlength="13" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="isbn13" id="isbn13">
            </div>

            <!-- Year -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="min-width: 100px;" id="inputGroup-sizing-default">Year</span>
                </div>
                <input type="number" class="form-control"  maxlength="13" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="year" id="year">
            </div>

            <div class="form-group mb-3">
                <label for="sel1">Author No1:</label>
                <select class="form-control" id="sel1">
                    <option>-</option>
                    @foreach( $authors as $author )
                        <option>{{ $author->lastname.' '.$author->firstname}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="sel1">Author No2:</label>
                <select class="form-control" id="sel1">
                    <option>-</option>
                    @foreach( $authors as $author )
                        <option>{{ $author->lastname.' '.$author->firstname}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="sel1">Author No3:</label>
                <select class="form-control" id="sel1">
                    <option>-</option>
                    @foreach( $authors as $author )
                        <option>{{ $author->lastname.' '.$author->firstname}}</option>
                    @endforeach
                </select>
            </div>

        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="btn_save_author" id="btn_save_author">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="form_authorid" value="0">
      </div>
    </div>
    </div>
  </div>
</div>

<script>

jQuery(document).ready(function(){
  // start Document ready

  jQuery('#btn_save_author').click(function(e){
    e.preventDefault();

    var authorid = $('input[name=form_authorid]').val();

    var ajaxURI = "{{ route('newauthor') }}"
    if( authorid > 0)
      ajaxURI = "{{ route('updateauthor') }}";

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
        authorid: authorid,
        firstname: jQuery('#firstname').val(),
        lastname: jQuery('#lastname').val(),
        dob: jQuery('#dob').val(),
        bio: jQuery('textarea[name=bio]').val(),
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

