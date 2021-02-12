<script>
	$(document).ready( function () {
		$('#example').DataTable();
	} );

	$('.group').selectize({
      sortField: 'text'
    });

    $('.category').selectize({
      sortField: 'text'
    });

    $(function() {
    	$('#datetimepicker').datetimepicker({locale:'id',format : "mm/yyyy"});
  	});

	function submit(x){
      if (x=='add') {
        $('#btn-save').show();
        $('#btn-update').hide();
        $('#modal-title').html('<b>Add member</b>');

        $("[name='name']").val('');
        $('[name="gender"]').prop('checked',false);
        $("[name='phone']").val('');
        $("[name='born_date']").val('');
        $('[name="origin"]').prop('checked',false);
        $("[name='address']").val('');
        $(".category").data("selectize").setValue("");
        $(".group").data("selectize").setValue("");
        $('[name="is_local"]').prop('checked',false);
        $('[name="is_leave"]').prop('checked',false);
        $("[name='description']").val('');

      }else{
        $('#btn-save').hide();
        $('#btn-update').show();
        $('#btn-update').attr('disabled',false);
        $('#btn-update').text('Update');
        $('#modal-title').html('<b>Update member info</b>');

        $.ajax({
          type:"GET",
          data:'id='+x,
          url:'<?php echo base_url('member/member') ?>',
          dataType:'JSON',
          success: function(data){
            console.log(data)
            $("[name='id']").val(data.id);
            $("[name='name']").val(data.name);
            $("input[name=gender][value=" + data.gender + "]").prop('checked',true);
            $("[name='phone']").val(data.phone);
            $("[name='born_date']").val(data.born_date);
            $("input[name=origin][value=" + data.is_local + "]").prop('checked',true);
            $("[name='address']").val(data.address);
            $(".group").data("selectize").setValue(data.group_id);
            $(".category").data("selectize").setValue(data.category_id);
            $("input[name=is_active][value=" + data.is_active + "]").prop('checked',true);
            $("input[name=is_leave][value=" + data.is_leave + "]").prop('checked',true);
            $("[name='description']").val(data.description);
          }
        })
      }
    }

    function add(){
      if ($("[name='name']").val()=='') {
        $('#alert_name').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='gender']:checked").length == 0){
        $('#alert_gender').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='phone']").val()==''){
        $('#alert_phone').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='born_date']").val()==''){
        $('#alert_borndate').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='origin']:checked").length == 0){
        $('#alert_origin').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='address']").val()==''){
        $('#alert_address').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='group']").val()==''){
        $('#alert_group').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='category']").val()==''){
        $('#alert_category').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='is_active']:checked").length == 0){
        $('#alert_active').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='is_leave']:checked").length == 0){
        $('#alert_leave').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else{
        $('#btn-save').html("<i class='fa fa-spinner fa-spin'></i> Saving...");
        $('#btn-save').attr('disabled',true);
        var formData = new FormData($('#form-add')[0]);

        $.ajax({
          type:'POST',
          data: formData,
          contentType: false,
          processData: false,
          url:'<?php echo base_url('member/add_member') ?>',
          dataType : 'JSON',
          success : function(data){
              $("#form-add").modal('hide');

              $("[name='name']").val('');
              $('[name="gender"]').prop('checked',false);
              $("[name='phone']").val('');
              $("[name='born_date']").val('');
              $('[name="origin"]').prop('checked',false);
              $("[name='address']").val('');
              $(".category").data("selectize").setValue("");
              $(".group").data("selectize").setValue("");
              $('[name="is_local"]').prop('checked',false);
              $('[name="is_leave"]').prop('checked',false);
              $("[name='description']").val('');
              var html = "<div class='alert alert-success'>"+data.message+"</div>";
              $('#alert').html(html).fadeIn().delay(3000).fadeOut();
              window.location.href = data.redirect_url;
          },
          error : function(err) {
            var html = "<div class='alert alert-danger'>Failed to add member!</div>";
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
      }else if($("[name='gender']:checked").length == 0){
        $('#alert_gender').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='phone']").val()==''){
        $('#alert_phone').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='born_date']").val()==''){
        $('#alert_borndate').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='origin']:checked").length == 0){
        $('#alert_origin').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='address']").val()==''){
        $('#alert_address').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='group']").val()==''){
        $('#alert_group').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='category']").val()==''){
        $('#alert_category').text('This field can not be empty!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='is_active']:checked").length == 0){
        $('#alert_active').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else if($("[name='is_leave']:checked").length == 0){
        $('#alert_leave').text('Check one!').fadeIn().delay(3000).fadeOut();
      }else{
        $('#btn-update').html("<i class='fa fa-spinner fa-spin'></i> Updating...");
        $('#btn-update').attr('disabled',true);
        var formData = new FormData($('#form-add')[0]);

        $.ajax({
          type:'POST',
          data: formData,
          contentType: false,
          processData: false,
          url:'<?php echo base_url('member/update_member') ?>',
          dataType : 'JSON',
          success : function(data){
              $("#form-add").modal('hide');

              $("[name='name']").val('');
              $('[name="gender"]').prop('checked',false);
              $("[name='phone']").val('');
              $("[name='born_date']").val('');
              $('[name="origin"]').prop('checked',false);
              $("[name='address']").val('');
              $(".category").data("selectize").setValue("");
              $(".group").data("selectize").setValue("");
              $('[name="is_local"]').prop('checked',false);
              $('[name="is_leave"]').prop('checked',false);
              $("[name='description']").val('');

              var html = "<div class='alert alert-success'>"+data.message+"</div>";
              $('#alert').html(html).fadeIn().delay(3000).fadeOut();
              window.location.href = data.redirect_url;
          },
          error : function(err) {
            var html = "<div class='alert alert-danger'>Failed to update member!</div>";
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

    $('.detail').on('click', function(){
      var id = $(this).attr('data-id')
      var data = $('#'+id).val().split('|');

      id = data[0].trim();
      name = data[1].trim();
      if (data[2].trim() == 'l') {
        gender = "Male"
      }else{
        gender = "Female"
      }
      phone = data[3].trim();
      category = data[4].trim();
      address = data[5].trim();
      grup = data[6].trim();
      born_date = data[7].trim();
      description = data[8].trim();
      if (data[9].trim() == '1') {
        is_active = 'Active'
      }else{
        is_active = 'Inactive'
      }
      if (data[10].trim() == '1') {
        is_local = 'Local'
      }else{
        is_local = 'Comer'
      }
      if (data[11].trim() == '1') {
        is_leave = 'Leave'
      }else{
        is_leave = 'Stay'
      }
      age = data[12].trim();

      $('#d_name').text(name)
      $('#d_gender').text(age+" years - "+gender+" - "+category) 
      $('#d_grup').text(grup) 
      $('#d_is_local').text("or : "+is_local) 
      $('#d_is_leave').text("exi : "+is_leave) 
      $('#d_is_active').text("st : "+is_active) 
      $('#d_phone').text(phone) 
      $('#d_born_date').text(born_date)
      $('#d_address').text(address)
      $('#d_description').text(description)
    })
</script>