<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Periodo de venta  
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
		<!--begin: Portlet Body-->	
			<!-- <div class="col-xl-12"> -->
				<div class="card card-transparent flex-row">
					<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst ulListaConfigPeriodo col-sm-2 col-md-5" id="tab-2" style="border-radius: 3px;margin-bottom: 0;">
						<li class="spanTextoActiveKq">
							<div class="row">
								<div class="text-center col-md-3">Año</div>
								<div class="text-center col-md-3">Periodo</div>
								<div class="text-center col-md-3">Fecha Inicio</div>
								<div class="text-center col-md-3">Fecha Fin</div>
							</div>
						</li>
						<li class="nav-item liListaKqPstImpar">
							<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
								<div class="row">
									<div class="col-md-3">2019</div>
									<div class="col-md-3">Enero</div>
									<div class="col-md-3">10/10/2000</div>
									<div class="col-md-3">10/10/2000</div>
								</div>
							</a>	
						</li>
						<li class="nav-item liListaKqPstPar">
							<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
								<div class="row">
									<div class="col-md-3">2019</div>
									<div class="col-md-3">Febrero</div>
									<div class="col-md-3">10/10/2000</div>
									<div class="col-md-3">10/10/2000</div>
								</div>
							</a>	
						</li>
						<li class="nav-item liListaKqPstImpar">
							<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
								<div class="row">
									<div class="col-md-3">2019</div>
									<div class="col-md-3">Marzo</div>
									<div class="col-md-3">10/10/2000</div>
									<div class="col-md-3">10/10/2000</div>
								</div>
							</a>	
						</li>
					</ul>							
					<div class="tab-content-active bg-white divFormularioKqPst col-sm-10 col-md-7" style="align-self: auto;padding-top: 1rem;">
						<div class="tab-pane slide-left" id="tabConfigPeriodo">
							<form enctype="multipart/form-data" id="formConfigPeriodo" role="form" method="POST">
								<div class="row">
									<div class="col-md-12">
										<p class="pull-right">
											<button type="button" class="btn btn-sm btn-primary btnGuardarKqPst" title="Crear año" id="btnAgregarGestor"  style="margin-right:6px;"><i class="fa fa-plus"></i></button>	
											<button type="button" class="btn btn-sm btn-primary btnEditarKqPst2" title="Copiar año siguiente" id="btnGuardarCambios"><i class="fa fa-copy"></i></button>
										</p>										
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2">
										<label>Periodo:</label>
									</div>
									<div class="col-lg-4">
										<input type="text" disabled class="form-control m-input" name="" id="">
									</div>
									<div class="col-lg-2">
										<label>Mes:</label>
									</div>
									<div class="col-lg-4">
										<input type="text" disabled class="form-control m-input" name="" id="">
									</div>	
								</div>
								<br>
								<div class="row">
									<div class="col-lg-2">
										<label>Descripción:</label>
									</div>
									<div class="col-lg-10">
										<input type="text" disabled class="form-control m-input" name="" id="">
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-2">
										<label>Fecha Inicio:</label>
									</div>
									<div class="col-lg-4">
										<div class="input-group date">
											<input type="text" class="form-control m-input"  id="fchIniPerVen" name="fchIniPerVen" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
											<div class="input-group-append">
												<span class="input-group-text">
													<i class="la la-calendar-check-o"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="col-lg-2">
										<label>Fecha Fin:</label>
									</div>
									<div class="col-lg-4">
										<div class="input-group date">
											<input type="text" class="form-control m-input"  id="fchFinPerVen" name="fchFinPerVen" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
											<div class="input-group-append">
												<span class="input-group-text">
													<i class="la la-calendar-check-o"></i>
												</span>
											</div>
										</div>
									</div>	
								</div>
								<br>
								<div class="row">
									<div class="col-lg-2">
										<label>Periodo anterior:</label>
									</div>
									<div class="col-lg-4">
										<input type="text" disabled class="form-control m-input" name="" id="">
									</div>
									<div class="col-lg-2">
										<label>Estado:</label>
									</div>
									<div class="col-lg-4">
										<select class="form-control m-input m-select2 m-select2-general" name="edoPerVen" id="edoPerVen">
											<option value="ABI">ABIERTO</option>
											<option value="CER">CERRADO</option>
										</select>
									</div>	
								</div>
								<br>
								<div class="row">
									<fieldset class="col-md-10 offset-md-1 fieldFormHorizontal">
										<legend class="col-md-3">Cierre</legend>
										<div class="form-group row">
											<div class="col-lg-2">
												<label>Fecha Cierre:</label>
											</div>
											<div class="col-lg-4">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-6">
														<label class="m-checkbox">
															Cierre manual:
														</label>
													</div>
													<div class="col-lg-6">
														<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
															<label>
																<input type="checkbox" disabled name="" id="">
																<span></span>
															</label>
														</span>
													</div>
												</div>
											</div>	
										</div>
										<div class="form-group row">
											<div class="col-lg-2">
												<label>Usuario:</label>
											</div>
											<div class="col-lg-4">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
										</div>
									</fieldset>
								</div>
								<br>
								<div class="row">
									<fieldset class="col-md-10 offset-md-1 fieldFormHorizontal">
										<legend class="col-md-3">Procesos</legend>
										<div class="form-group row">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-6">
														<label class="m-checkbox">
															Árbol vendedor:
														</label>
													</div>
													<div class="col-lg-6">
														<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
															<label>
																<input type="checkbox" disabled name="" id="">
																<span></span>
															</label>
														</span>
													</div>
												</div>
											</div>
											<div class="col-lg-2">
												<label>Fecha:</label>
											</div>
											<div class="col-lg-4">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>	
										</div>
										<div class="form-group row">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-6">
														<label class="m-checkbox">
															Parámetros comisiones:
														</label>
													</div>
													<div class="col-lg-6">
														<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
															<label>
																<input type="checkbox" disabled name="" id="">
																<span></span>
															</label>
														</span>
													</div>
												</div>
											</div>
											<div class="col-lg-2">
												<label>Fecha:</label>
											</div>
											<div class="col-lg-4">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>	
										</div>
										<div class="form-group row">
											<div class="col-lg-6">
												<div class="row">
													<div class="col-lg-6">
														<label class="m-checkbox">
															Procesos comisiones:
														</label>
													</div>
													<div class="col-lg-6">
														<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
															<label>
																<input type="checkbox" name="chkProComPerVen" id="chkProComPerVen">
																<span></span>
															</label>
														</span>
													</div>
												</div>
											</div>
											<div class="col-lg-2">
												<label>Fecha:</label>
											</div>
											<div class="col-lg-4">
												<input type="text" class="form-control m-input" name="fchProComPerVen" id="fchProComPerVen">
											</div>	
										</div>
									</fieldset>
								</div>
							</form>
						</div>
					</div>
				</div>
			<!-- </div> -->
		</div>
		<!--End: Portlet Body-->
	</div>
	<!--End::Main Portlet-->
</div>
</div>