<script>
	$(document).ready( function () {
		$('#example').DataTable();
	} );

	$('.group').selectize({
      sortField: 'text'
    });

  $('.role').selectize({
      sortField: 'text'
    });

	function submit(x){
      if (x=='add') {
        $('#btn-save').show();
        $('#btn-update').hide();
        $('#modal-title').html('<b>Add admin</b>');

        $("[name='name']").val('');
        $('[name="is_active"]').prop('checked',false);
        $("[name='username']").val('');
        $("[name='password']").val('');
        $(".group").data("selectize").setValue("");
        $(".role").data("selectize").setValue("");

      }else{
        $('#btn-save').hide();
        $('#btn-update').show();
        $('#btn-update').attr('disabled',false);
        $('#btn-update').text('Update');
        $('#modal-title').html('<b>Update admin info</b>');

            console.log(x)
        $.ajax({
          type:"GET",
          data:'id='+x,
          url:'<?php echo base_url('users/user') ?>',
          dataType:'JSON',
          success: function(data){
            console.log(data)
            $("[name='id']").val(data[0].id);
            $("[name='name']").val(data[0].name);
            $("[name='username']").val(data[0].username);
            $("[name='password']").val(data[0].password);
            $("[name='old_password']").val(data[0].password);
            $("input[name=is_active][value=" + data[0].is_active + "]").prop('checked',true);
            $(".group").data("selectize").setValue(data[0].group_id);
            $(".role").data("selectize").setValue(data[0].role);
          }
        })
      }
    }

    function add(){
      if ($("[name='name']").val()=='') {
        $('#alert_name').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='username']").val()==''){
        $('#alert_username').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='password']").val()==''){
        $('#alert_password').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='group']").val()==''){
        $('#alert_group').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='role']").val()==''){
        $('#alert_role').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='is_active']:checked").length == 0){
        $('#alert_active').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else{
        $('#btn-save').html("<i class='fa fa-spinner fa-spin'></i> Saving...");
        $('#btn-save').attr('disabled',true);
        var formData = new FormData($('#form-add')[0]);

        $.ajax({
          type:'POST',
          data: formData,
          contentType: false,
          processData: false,
          url:'<?php echo base_url('users/add_user') ?>',
          dataType : 'JSON',
          success : function(data){
              $("#form-add").modal('hide');

              $("[name='name']").val('');
              $('[name="is_active"]').prop('checked',false);
              $("[name='username']").val('');
              $("[name='password']").val('');
              $(".group").data("selectize").setValue("");
              $(".role").data("selectize").setValue("");
              var html = "<div class='alert alert-success'>"+data.message+"</div>";
              $('#alert').html(html).fadeIn().delay(3000).fadeOut();
              window.location.href = data.redirect_url;
          },
          error : function(err) {
            var html = "<div class='alert alert-danger'>Failed to add user!</div>";
              $('#alert-modal').html(html).fadeIn().delay(3000).fadeOut();
              $('#btn-save').text("Save");
              $('#btn-save').attr('disabled',false);
          }
        });
      }
    }

    function update(){
      if ($("[name='name']").val()=='') {
        $('#alert_name').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='username']").val()==''){
        $('#alert_username').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='password']").val()==''){
        $('#alert_password').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='group']").val()==''){
        $('#alert_group').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='role']").val()==''){
        $('#alert_role').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='is_active']:checked").length == 0){
        $('#alert_active').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else{
        $('#btn-update').html("<i class='fa fa-spinner fa-spin'></i> Updating...");
        $('#btn-update').attr('disabled',true);
        var formData = new FormData($('#form-add')[0]);

        $.ajax({
          type:'POST',
          data: formData,
          contentType: false,
          processData: false,
          url:'<?php echo base_url('users/update_user') ?>',
          dataType : 'JSON',
          success : function(data){
              $("#form-add").modal('hide');

              $("[name='id']").val('');
              $("[name='name']").val('');
              $('[name="is_active"]').prop('checked',false);
              $("[name='username']").val('');
              $("[name='password']").val('');
              $(".group").data("selectize").setValue("");
              $(".role").data("selectize").setValue("");

              var html = "<div class='alert alert-success'>"+data.message+"</div>";
              $('#alert').html(html).fadeIn().delay(3000).fadeOut();
              window.location.href = data.redirect_url;
          },
          error : function(err) {
            var html = "<div class='alert alert-danger'>Failed to update user!</div>";
              $('#alert-modal').html(html).fadeIn().delay(3000).fadeOut();
              $('#btn-update').text("Update");
              $('#btn-update').attr('disabled',false);
          }
        });
      }
    }

    function deleteConfirm(url){
      $('#btn-confirm').attr('href', url);
      $('#modal-delete').modal();
    }
</script>