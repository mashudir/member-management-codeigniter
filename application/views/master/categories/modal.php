<!-- MODAL HAPUS -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Would you like to delete this record permanently ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data will be deleted permanently, make sure there is no mistake.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Abort</button>
        <a id="btn-confirm" class="btn btn-danger" href="#">Yes, I would</a>
      </div>
    </div>
  </div>
</div>
<!-- END OF MODAL HAPUS -->

<!-- MODAL ADD -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-md modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="form-add" onSubmit="return false">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Add group</h5>
        <a href="#" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
        </a>
      </div>
      <div class="modal-body">
        <div id="alert-modal"></div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="form-group">
                <label>Name</label>
                <input type="hidden" name="id">
                <input class="form-control" type="text" name="name" placeholder="Group name">
                <small id="alert_name" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Status</label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="is_active" value="1">
                  <label class="form-check-label" for="inlineRadio1">Active</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="is_active" value="0">
                  <label class="form-check-label" for="inlineRadio2">Inactive</label>
                </div>
                <small id="alert_active" class="text-danger"></small>
              </div>
            </div>
            <div class="col-md-2"></div>
          </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="reset">Clear</button>
        <a id="btn-save" class="btn btn-success" onclick="add()" href="#">Save</a>
        <a id="btn-update" class="btn btn-success" onclick="update()" href="#">Update</a>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- END OF MODAL ADD -->