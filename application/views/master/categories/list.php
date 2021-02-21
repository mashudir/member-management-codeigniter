<br>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="col-lg-6 col-xxl-12">
				<!--begin::Advance Table Widget 1-->
				<div class="card card-custom card-stretch gutter-b">
					<!--begin::Header-->
					<div class="card-header border-0 py-5">
						<h3 class="card-title align-items-start flex-column">
							<span class="card-label font-weight-bolder text-dark">Categories List</span>
						</h3>
						<div class="card-toolbar">
							<a href="#modal-add" data-toggle="modal" onclick="submit('add')" class="btn btn-success font-weight-bolder font-size-sm">
								<span class="svg-icon svg-icon-md svg-icon-white">
									<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
									<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"></polygon>
											<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
											<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
										</g>
									</svg>
									<!--end::Svg Icon-->
								</span>Add New Category</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body">
							<table id="example" class="display" style="width:100%">
								<thead class="text-center">
									<tr>
										<th width="5%">No</th>
										<th width="15%">Code</th>
										<th width="15%">Name</th>
										<th width="20%">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									foreach ($this->data['kategories'] as $k => $v): ?>
										<tr>
											<textarea style="display: none;" id="<?php echo $v->id ?>">
												<?php 
												echo $v->id."|".$v->id."|".$v->name ?>
											</textarea>
											<td class="text-center"><?php echo $i ?></td>
											<td class="text-center"><?php echo $v->id ?></td>
											<td><?php echo $v->name ?></td>
											<td class="text-center">
												<a href="#modal-add" data-toggle="modal" title="Update category info" onclick="submit(<?php echo $v->id; ?>)">
													<span class="text-warning"><i class="fa fa-pen"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>
												</a>
												<a href="#!" title="Delete category" onclick="deleteConfirm('<?php echo base_url('master/delete_category/'.$v->id) ?>')">
													<span class="text-danger"><i class="fa fa-trash"></i></span>
												</a>
											</td>
										</tr>
										<?php $i++; endforeach; ?>
									</tbody>
								</table>
								<!--end::Table-->
							</div>
							<!--end::Body-->
						</div>
						<!--end::Advance Table Widget 1-->
					</div>
				</div>
			</div>