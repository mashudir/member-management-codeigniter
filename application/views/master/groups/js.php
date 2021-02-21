<script>
	$(document).ready( function () {
		$('#example').DataTable();
	} );

	function submit(x){
      if (x=='add') {
        $('#btn-save').show();
        $('#btn-update').hide();
        $('#modal-title').html('<b>Add group</b>');

        $("[name='name']").val('');
        $('[name="is_active"]').prop('checked',false);

      }else{
        $('#btn-save').hide();
        $('#btn-update').show();
        $('#btn-update').attr('disabled',false);
        $('#btn-update').text('Update');
        $('#modal-title').html('<b>Update group</b>');

        $.ajax({
          type:"GET",
          data:'id='+x,
          url:'<?php echo base_url('master/get_grup') ?>',
          dataType:'JSON',
          success: function(data){
            console.log(data[0].id)
            $("[name='id']").val(data[0].id)
            $("[name='name']").val(data[0].name)
            $("input[name=is_active][value=" + data[0].is_active + "]").prop('checked',true);
          }
        })
      }
    }

    function add(){
      if ($("[name='name']").val()=='') {
        $('#alert_name').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
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
          url:'<?php echo base_url('master/add_group') ?>',
          dataType : 'JSON',
          success : function(data){
              $("#form-add").modal('hide');

              $("[name='name']").val('');
              $('[name="is_active"]').prop('checked',false);
              var html = "<div class='alert alert-success'>"+data.message+"</div>";
              $('#alert').html(html).fadeIn().delay(3000).fadeOut();
              window.location.href = data.redirect_url;
          },
          error : function(err) {
            var html = "<div class='alert alert-danger'>Failed to add group!</div>";
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
          url:'<?php echo base_url('master/update_group') ?>',
          dataType : 'JSON',
          success : function(data){
              $("#form-add").modal('hide');

              $("[name='name']").val('');
              $('[name="is_active"]').prop('checked',false);

              var html = "<div class='alert alert-success'>"+data.message+"</div>";
              $('#alert').html(html).fadeIn().delay(3000).fadeOut();
              window.location.href = data.redirect_url;
          },
          error : function(err) {
            var html = "<div class='alert alert-danger'>Failed to update group!</div>";
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