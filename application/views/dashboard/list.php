<br>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<div class="row">
									<div class="col-xl-12">
										<div class="row">
											<div class="col-xl-3">
												<!--begin::Tiles Widget 2-->
												<div class="card card-custom bg-info gutter-b" style="height: 130px">
													<!--begin::Body-->
													<div class="card-body d-flex flex-column p-0">
														<!--begin::Stats-->
														<div class="flex-grow-1 card-spacer-x pt-6">
															<div class="text-inverse-info font-weight-bold">Total</div>
															<div class="text-inverse-info font-weight-bolder font-size-h3"><?php echo $this->data['total_member'] ?> &nbsp; members</div>
														</div>
														<!--end::Stats-->
														<!--begin::Chart-->
														<div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>
														<!--end::Chart-->
													</div>
													<!--end::Body-->
												</div>
											</div>
											<div class="col-xl-3">
												<!--begin::Tiles Widget 2-->
												<div class="card card-custom bg-danger gutter-b" style="height: 130px">
													<!--begin::Body-->
													<div class="card-body d-flex flex-column p-0">
														<!--begin::Stats-->
														<div class="flex-grow-1 card-spacer-x pt-4">
															<div class="text-inverse-danger font-weight-bold">Male</div>
															<div class="text-inverse-danger font-weight-bolder font-size-h3"><?php echo $this->data['member_by_gender']->male ?>&nbsp; members</div>
														</div>
														<div class="flex-grow-1 card-spacer-x pt-4">
															<div class="text-inverse-danger font-weight-bold">Female</div>
															<div class="text-inverse-danger font-weight-bolder font-size-h3"><?php echo $this->data['member_by_gender']->female ?>&nbsp; members</div>
														</div>
														<!--end::Stats-->
														<!--begin::Chart-->
														<div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>
														<!--end::Chart-->
													</div>
													<!--end::Body-->
												</div>
											</div>
											<div class="col-xl-3">
												<!--begin::Tiles Widget 2-->
												<div class="card card-custom bg-success gutter-b" style="height: 130px">
													<!--begin::Body-->
													<div class="card-body d-flex flex-column p-0">
														<!--begin::Stats-->
														<div class="flex-grow-1 card-spacer-x pt-4">
															<div class="text-inverse-success font-weight-bold">Remaja</div>
															<div class="text-inverse-success font-weight-bolder font-size-h3"><?php echo $this->data['member_by_category']->remaja ?>&nbsp; members</div>
														</div>
														<div class="flex-grow-1 card-spacer-x pt-4">
															<div class="text-inverse-success font-weight-bold">Pra remaja</div>
															<div class="text-inverse-success font-weight-bolder font-size-h3"><?php echo $this->data['member_by_category']->pra_remaja ?>&nbsp; members</div>
														</div>
														<!--end::Stats-->
														<!--begin::Chart-->
														<div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>
														<!--end::Chart-->
													</div>
													<!--end::Body-->
												</div>
											</div>
											<div class="col-xl-3">
												<!--begin::Tiles Widget 2-->
												<div class="card card-custom bg-warning gutter-b" style="height: 130px">
													<!--begin::Body-->
													<div class="card-body d-flex flex-column p-0">
														<!--begin::Stats-->
														<div class="flex-grow-1 card-spacer-x pt-4">
															<div class="text-inverse-warning font-weight-bold">Pribumi</div>
															<div class="text-inverse-warning font-weight-bolder font-size-h3"><?php echo $this->data['member_by_origin']->local ?>&nbsp; members</div>
														</div>
														<div class="flex-grow-1 card-spacer-x pt-4">
															<div class="text-inverse-warning font-weight-bold">Pendatang</div>
															<div class="text-inverse-warning font-weight-bolder font-size-h3"><?php echo $this->data['member_by_origin']->pendatang ?>&nbsp; members</div>
														</div>
														<!--end::Stats-->
														<!--begin::Chart-->
														<div id="kt_tiles_widget_2_chart" class="card-rounded-bottom" style="height: 50px"></div>
														<!--end::Chart-->
													</div>
													<!--end::Body-->
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--begin::Row-->
								<div class="row">
									<div class="col-lg-6 col-xxl-12">
										<!--begin::Advance Table Widget 1-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">Summary</span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body py-0">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_1">
														<thead>
															<tr class="text-left">
																<th style="min-width: 150px">Groups</th>
																<th style="min-width: 150px">gender</th>
																<th style="min-width: 150px">categories</th>
																<th class="pr-0 text-right" style="min-width: 150px">native</th>
															</tr>
														</thead>
														<tbody>
															<?php foreach ($this->data['groups_summary'] as $k => $v) :?>
															<tr>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?php echo $v->name ?></span>
																	<span class="text-muted font-weight-bold">Total : <?php echo $v->total ?></span>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Male : <?php echo $v->male ?></span>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Female : <?php echo $v->female ?></span>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Remaja : <?php echo $v->remaja ?></span>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Pra remaja : <?php echo $v->pre_remaja ?></span>
																</td>
																<td class="pr-0 text-right">
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Pribumi : <?php echo $v->local ?></span>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Pendatang : <?php echo $v->pendatang ?></span>
																</td>
															</tr>
															<?php endforeach; ?>
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
										<!--end::Advance Table Widget 1-->
									</div>
								</div>
								<!--end::Row-->
							</div>
</div>