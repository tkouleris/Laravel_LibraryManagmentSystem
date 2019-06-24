
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" >
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>


<div class="modal" tabindex="-1" role="dialog" id="password_form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Change Password Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-danger" style="display:none"></div>
      <form action="" method="post">
       <div class="modal-body">
            <!-- Old Password -->
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" style="min-width: 160px;" id="inputGroup-sizing-default">Old Password</span>
              </div>
              <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="old_password" id="old_password">
            </div>

            <!-- New Password -->
            <div class="input-group mb-3">
                <div class="input-group-prepend" >
                  <span class="input-group-text" style="min-width: 160px;" id="inputGroup-sizing-default">New Password</span>
                </div>
                <input type="password" class="form-control"  maxlength="10" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="new_password" id="new_password">
            </div>

            <!-- Validate New Password  -->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="min-width: 160px;" id="inputGroup-sizing-default">Validate Password</span>
                </div>
                <input type="password" class="form-control"  maxlength="13" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="vld_new_password" id="vld_new_password">
            </div>
        </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="btn_save_password" id="btn_save_password">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="form_bookid" value="0">
      </div>
    </div>
    </div>
  </div>
</div>