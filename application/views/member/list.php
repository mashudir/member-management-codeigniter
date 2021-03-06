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
							<span class="card-label font-weight-bolder text-dark">Member of <?php echo $this->session->userdata('groups') ?></span>
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
								</span>Add New Member</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body">
							<table id="example" class="display" style="width:100%">
								<thead class="text-center">
									<tr>
										<th width="5%">No</th>
										<th width="15%">Name</th>
										<th width="15%">Phone</th>
										<th width="10%">Category</th>
										<th width="25%">Address</th>
										<th width="10%">Existensi</th>
										<th width="20%">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1; 
									foreach ($this->data['members'] as $k => $v): ?>
										<tr>
											<textarea style="display: none;" id="<?php echo $v->id ?>">
												<?php 
												echo $v->id."|".$v->name."|".$v->gender."|".
												 	$v->phone."|".$v->category."|".$v->address."|".
												 	$v->grup."|".$v->born_date."|".$v->description."|".
												 	$v->is_active."|".$v->is_local."|".$v->is_leave."|".$v->age ?>
											</textarea>
											<td><?php echo $i ?></td>
											<td>
												<?php if ($v->gender == 'l'): ?>
													<?php $gender = 'Male'; ?>
													<a href="#" class="text-info-75 font-weight-bold"><?php echo $v->name ?></a><br>
													<span class="text-muted font-weight-bold"><?php echo $gender ?></span>
													<?php else: ?>
														<?php $gender = 'Female' ?>
														<a href="#" class="text-dark-75 font-weight-bold"><?php echo $v->name ?></a><br>
														<span class="text-muted font-weight-bold"><?php echo $gender ?></span>
													<?php endif; ?>
												</td>
												<td><?php echo $v->phone ?>&nbsp;&nbsp;&nbsp;
													<a href="https://api.whatsapp.com/send?phone=<?php echo $v->phone; ?>&text=*Assalamualaikum <?php echo $v->name ?>*%20Kami%20dari%20PPD%20Kalasan%20"><i class="fa fa-phone" aria-hidden="true"></i></a>
												</td>
												<td><?php echo $v->category ?></td>
												<td>
													<?php if ($v->is_local == '1'): ?>
														<span class="text-info"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;&nbsp;Lokal</span><br>
														<span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;
															<?php echo $v->address ?>
														</span>
														<?php else: ?>
															<span class="text-warning"><i class="fa fa-arrow-right"></i>&nbsp;&nbsp;&nbsp;Pendatang</span><br>
															<span><i class="fa fa-map-marker"></i>&nbsp;&nbsp;&nbsp;
																<?php echo $v->address ?>
															</span>
														<?php endif; ?>
													</td>
													<td>
														<?php if ($v->is_leave == '0') : ?>
															<span class="text-info"><i class="fa fa-circle"></i>&nbsp;Di Jogja</span>
															<?php else: ?>
																<span class="text-warning"><i class="fa fa-square"></i>&nbsp;Pulang</span>
															<?php endif; ?>
														</td>
														<td class="text-center">
															<a href="#modal-detail" data-toggle="modal" title="View detail" class="detail" data-id="<?php echo $v->id ?>">
																<span class="text-info"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>
															</a>
															<a href="#modal-add" data-toggle="modal" title="Update member info" onclick="submit(<?php echo $v->id; ?>)">
																<span class="text-warning"><i class="fa fa-pen"></i>&nbsp;&nbsp;&nbsp;&nbsp;</span>
															</a>
															<a href="#!" title="Delete member" onclick="deleteConfirm('<?php echo base_url('member/delete/'.$v->id) ?>')">
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