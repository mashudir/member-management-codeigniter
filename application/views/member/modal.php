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
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <form id="form-add" onSubmit="return false">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-title">Add member</h5>
        <a href="#" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
        </a>
      </div>
      <div class="modal-body">
        <div id="alert-modal"></div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="hidden" name="id">
                <input class="form-control" type="text" name="name" placeholder="Full name">
                <small id="alert_name" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Gender</label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="l">
                  <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" value="p">
                  <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <small id="alert_gender" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Phone number</label>
                <input class="form-control" type="text" name="phone" placeholder="ex: +62xxxxxxxxxxx">
                <small id="alert_phone" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Birth day</label>
              <div class='input-group date' id='datetimepicker'>
                <input type='text' name="born_date" id="born_date" class="form-control" data-date-format="YYYY-MM-DD" placeholder="Birth day" />
                <span class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </span>
              </div>
                <small id="alert_borndate" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Origin</label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="origin" value="1">
                  <label class="form-check-label" for="inlineRadio1">Native inhabitants</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="origin" value="0">
                  <label class="form-check-label" for="inlineRadio2">Comer</label>
                </div>
                <small id="alert_origin" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="address"></textarea>
                <small id="alert_address" class="text-danger"></small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Group</label>
                <select class="form-control group" name="group">
                  <option value="" disabled selected>Select group</option>
                  <?php foreach ($this->data['groups'] as $k => $v): ?>
                    <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
                <small id="alert_group" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Category</label>
                <select class="form-control category" name="category">
                  <option value="" disabled selected>Select category</option>
                  <?php foreach ($this->data['categories'] as $k => $v): ?>
                    <option value="<?php echo $v['id'] ?>"><?php echo $v['name'] ?></option>
                  <?php endforeach ?>
                </select>
                <small id="alert_category" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Active status</label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="is_active" checked value="1">
                  <label class="form-check-label" for="inlineRadio1">Active</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="is_active" value="0">
                  <label class="form-check-label" for="inlineRadio2">Inactive</label>
                </div>
                <small id="alert_active" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Existance status</label><br>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="is_leave" checked value="0">
                  <label class="form-check-label" for="inlineRadio1">Stay</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="is_leave" value="1">
                  <label class="form-check-label" for="inlineRadio2">Leave</label>
                </div>
                <small id="alert_leave" class="text-danger"></small>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" name="description"></textarea>
                <small id="alert_desc" class="text-danger"></small>
              </div>
            </div>
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

<!-- MODAL DETAIL -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-titles">Detail information</h5>
        <a href="#" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times-circle"></i></span>
        </a>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <h2 class="text-center" id="d_name"></h2>
          <h6 class="text-muted" id="d_gender"></h6>
        </div>
        <br>
        <div class="row">
          <div class="col-md-4 text-left">
            <span><i class="fa fa-users"></i>&nbsp;&nbsp;Group</span>
            <h5 id="d_grup" class="text-muted"></h5>
            <br>
            <span><i class="fa fa-home"></i>&nbsp;&nbsp;Address</span>
            <address id="d_address" class="text-muted"></address>
          </div>
          <div class="col-md-4 text-left">
            <span><i class="fa fa-phone"></i>&nbsp;&nbsp;Phone</span>
            <p class="text-success" id="d_phone"></p>
            <br>
            <span><i class="fa fa-info"></i>&nbsp;&nbsp;Status</span>
            <div class="text-center">
              <div class="badge badge-lg badge-danger" id="d_is_local">leave</div>
              <div class="badge badge-lg badge-info" id="d_is_leave">leave</div>
              <div class="badge badge-lg badge-success" id="d_is_active">leave</div>
            </div>
          </div>
          <div class="col-md-4 text-right">
            <span><i class="fa fa-calendar"></i>&nbsp;&nbsp;Birth day</span>
            <h5 id="d_born_date" class="text-muted"></h5>
            <br>
            <span><i class="fa fa-book"></i>&nbsp;&nbsp;Description</span>
            <div id="d_description" class="text-muted"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END OF MODAL DETAIL -->