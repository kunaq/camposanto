<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Arbol de vendedores 
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
		<!--begin: Portlet Body-->	
			<!-- <div class="col-xl-12"> -->
				<div class="row">
					<div class="col-lg-5">
						<div class="row">
							<div class="col-lg-12">
								<fieldset class="fieldFormHorizontal">
									<div class="col-lg-12">
										<div class="row form-group">
											<div class="col-lg-8">
												<div class="m-input-icon m-input-icon--left px-0">
													<input type="text" class="form-control form-control-sm m-input">
													<span class="m-input-icon__icon m-input-icon__icon--left">
														<span>
															<i class="la la-search"></i>
														</span>
													</span>
												</div>
											</div>
											<div class="col-lg-4">
												<select class="form-control form-control-sm m-input">
													<option>TODOS</option>
													<option>ACTIVO</option>
													<option>DESACTIVO</option>
												</select>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="490" style="border: 1px solid #e4e1e1;">
									<div class="table-responsive">
										<table class="tableVendedores table-striped" id="tablaTarbajadorArbVen">
											<thead>
												<th>Codigo</th>
												<th>Apellidos y Nombres</th>
												<th class="hidden"></th>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="row">
							<div class="col-lg-12">
								<fieldset class="fieldFormHorizontal">
									<legend class="tittle-box">Historial de Conformación</legend>
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-5">
												<div class="row">
													<div class="col-lg-2">
														<label>Año</label>
													</div>
													<div class="col-lg-8">
														<select class="form-control form-control-sm m-input">
															<option>2019</option>
															<option>2018</option>
															<option>2017</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-lg-4"></div>
											<div class="col-lg-3">
												<p class="pull-right">
													<button type="button" class="btn btn-sm btnGuardarKqPst" title="Nuevo" id=""  style="margin-right:6px;"><i class="fa fa-plus"></i></button>	
													<button type="button" class="btn btn-sm btnEditarKqPst2" title="Modificar" id="" style="margin-right:6px;"><i class="fa fa-pencil"></i></button>
													<button type="button" class="btn btn-sm btn-danger" title="Eliminar" id=""><i class="fa fa-trash"></i></button>
												</p>
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
											<div class="table-responsive">
												<table class="tableVendedores" id="">
													<thead>
														<th>N°</th>
														<th>Año</th>
														<th>Tipo</th>
														<th>Periodo</th>
														<th>Tipo de Comisionista</th>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td>2019</td>
															<td>15D</td>
															<td>Q11</td>
															<td>JUNIOR</td>
														</tr>
														<tr>
															<td>2</td>
															<td>2019</td>
															<td>15D</td>
															<td>Q11</td>
															<td>JUNIOR</td>
														</tr>
														<tr>
															<td>3</td>
															<td>2019</td>
															<td>15D</td>
															<td>Q11</td>
															<td>JUNIOR</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<div class="row">
									<div class="col-lg-12">
										<ul class="nav nav-tabs  m-tabs-line m-tabs-line--danger" role="tablist">
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_2_1" role="tab">
													General
												</a>
											</li>
											<li class="nav-item m-tabs__item">
												<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_2_2" role="tab">
													Contratos
												</a>
											</li>
										</ul>
										<div class="tab-content">
											<div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
												<div class="col-lg-12">
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Año:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
														<div class="col-lg-2" style="padding-right: 0">
															<label>T. Período:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
														<div class="col-lg-2">
															<label>Período:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
													</div>
													<hr>
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Grupo:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
														<div class="col-lg-8">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Comisionista:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
														<div class="col-lg-8">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Supervisor:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
														<div class="col-lg-8">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
													</div>
													<div class="form-group row">
														<div class="col-lg-2">
															<label>Jefe Ventas:</label>
														</div>
														<div class="col-lg-2">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
														<div class="col-lg-8">
															<input type="text" disabled class="form-control form-control-sm m-input" name="" id="">
														</div>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
												<div class="row">
													<div class="col-lg-12">
														<p class="pull-right">
															<select class="form-control form-control-sm m-input" width="100%" >
																<option>
																	TODOS
																</option>
																<option>
																	EMITIDOS
																</option>
																<option>
																	ACTIVADOS
																</option>
																<option>
																	RESUELTOS
																</option>
															</select>
														</p>
													</div>
													<div class="col-lg-12">
														<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="180">
															<div class="table-responsive">
																<table class="tableVendedores table-striped">
																	<thead>
																		<th>Localidad</th>
																		<th>Contrato</th>
																		<th>T.N.</th>
																		<th>Estatus</th>
																		<th>Fecha</th>
																	</thead>
																	<tbody>
																		<tr>
																			<td>SEDE SAN ANTONIO</td>
																			<td>0000000001-0</td>
																			<td>NF</td>
																			<td>ACTIVADO</td>
																			<td>12-10-2019</td>
																		</tr>
																		<tr>
																			<td>SEDE SAN ANTONIO</td>
																			<td>0000000001-0</td>
																			<td>NF</td>
																			<td>EMITIDO</td>
																			<td>12-10-2019</td>
																		</tr>
																		<tr>
																			<td>SEDE SAN ANTONIO</td>
																			<td>0000000001-0</td>
																			<td>NF</td>
																			<td>ACTIVADO</td>
																			<td>12-10-2019</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<!--End: Portlet Body-->
	</div>
	<!--End::Main Portlet-->
</div>
</div>