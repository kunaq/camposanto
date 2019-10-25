<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
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
				<div class="card card-transparent flex-row">
					<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst ulListaConfigPeriodo col-sm-2 col-md-5" id="tab-2" style="border-radius: 3px;margin-bottom: 0; height: 79rem;">
						<li class="spanTextoActiveKq">
							<div class="row">
								<div class="text-center col-md-3">Código</div>
								<div class="text-center col-md-9">Apellidos y nombre</div>
							</div>
						</li>
						<li class="nav-item liListaKqPstImpar">
							<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
								<div class="row">
									<div class="col-md-3">TRA00012</div>
									<div class="col-md-9">RAMOS ARAUCO, NATALI GUADALUPE</div>
								</div>
							</a>	
						</li>
						<li class="nav-item liListaKqPstPar">
							<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
								<div class="row">
									<div class="col-md-3">TRA00012</div>
									<div class="col-md-9">RAMOS ARAUCO, NATALI GUADALUPE</div>
								</div>
							</a>	
						</li>
						<li class="nav-item liListaKqPstImpar">
							<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
								<div class="row">
									<div class="col-md-3">TRA00012</div>
									<div class="col-md-9">RAMOS ARAUCO, NATALI GUADALUPE</div>
								</div>
							</a>	
						</li>
						<?php
						// $respuesta = ControladorAnio::ctrMostrarAnioPeriodo();
						// foreach ($respuesta as $key => $value) {
						// 	if($key == 0){
						// 		$classRespuesta = ' liListaKqPstImpar';
						// 	}else if($key%2 == 0){
						// 		$classRespuesta = 'liListaKqPstImpar';
						// 	}else{
						// 		$classRespuesta = 'liListaKqPstPar';
						// 	}
						// 	$periodo = nombrePeriodo($value['cod_periodo']);
							// echo '<li class="nav-item '.$classRespuesta.'">
							// 	<a href="#" id='.$value["cod_anno"].'|'.$value["cod_periodo"].'|'.$value["cod_estado"].' data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
							// 		<div class="row">
							// 			<div class="col-md-3">'.$value["cod_anno"].'</div>
							// 			<div class="col-md-3">'.$periodo.'</div>
							//			<div class="col-md-3">'.$value["fch_inicio"].'</div>
							//			<div class="col-md-3">'.$value["fch_fin"].'</div>
							// 		</div>
							// 	</a>
							// 	</li>';
						// }//foreach
						?>
					</ul>							
					<div class="tab-content-active bg-white divFormularioKqPst col-sm-10 col-md-7" style="align-self: auto;padding-top: 1rem;">
						<div class="tab-pane slide-left" id="tabConfigPeriodo">
							<form enctype="multipart/form-data" id="formConfigPeriodo" role="form" method="POST">
								<div class="row">
									<div class="col-md-12">
										<p class="pull-right">
											<button type="button" class="btn btn-sm btn-primary btnGuardarKqPst" title="Nuevo" id=""  style="margin-right:6px;"><i class="fa fa-plus"></i></button>	
											<button type="button" class="btn btn-sm btn-primary btnEditarKqPst2" title="Modificar" id="" style="margin-right:6px;"><i class="fa fa-pencil"></i></button>
											<button type="button" class="btn btn-sm btn-primary btnEliminarKqPst" title="Eliminar" id=""><i class="fa fa-trash"></i></button>
										</p>										
									</div>
								</div>
								<div class="row">
									<fieldset class="col-md-10 offset-md-1 fieldFormHorizontal">
										<legend class="col-md-6">Historial de conformación</legend>
										<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst col-md-12" id="tab-2" style="border-radius: 3px;margin-bottom: 0; height: 15rem;">
											<li class="nav-item liListaKqPstImpar">
												<a href=<li class="spanTextoActiveKq">
													<div class="row">
														<div class="text-center col-md-2">N°</div>
														<div class="text-center col-md-2">Año</div>
														<div class="text-center col-md-2">Tipo</div>
														<div class="text-center col-md-2">Período</div>
														<div class="text-center col-md-4">Tipo de comisionista</div>
													</div>
												</a>
											</li>
											<li class="nav-item liListaKqPstPar">
												<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
												<div class="row">
													<div class="text-center col-md-2">1</div>
													<div class="text-center col-md-2">2019</div>
													<div class="text-center col-md-2">15D</div>
													<div class="text-center col-md-2">Q11</div>
													<div class="text-center col-md-4">JUNIOR</div>
												</div>
												</a>	
											</li>
											<li class="nav-item liListaKqPstPar">
												<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
													<div class="row">
														<div class="text-center col-md-2">2</div>
														<div class="text-center col-md-2">2019</div>
														<div class="text-center col-md-2">15D</div>
														<div class="text-center col-md-2">Q11</div>
														<div class="text-center col-md-4">JUNIOR</div>
													</div>
												</a>	
											</li>
											<li class="nav-item liListaKqPstImpar">
												<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
													<div class="row">
														<div class="text-center col-md-2">3</div>
														<div class="text-center col-md-2">2019</div>
														<div class="text-center col-md-2">15D</div>
														<div class="text-center col-md-2">Q11</div>
														<div class="text-center col-md-4">JUNIOR</div>
													</div>
												</a>	
											</li>
										</ul>
										<br>
									</fieldset>
								</div>
								<br>
								<div class="row">
									<fieldset class="col-md-10 offset-md-1 fieldFormHorizontal">
										<legend class="col-md-3">General</legend>
										<div class="form-group row">
											<div class="col-lg-2">
												<label>Año:</label>
											</div>
											<div class="col-lg-2">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
											<div class="col-lg-2" style="padding-right: 0">
												<label>T. Período:</label>
											</div>
											<div class="col-lg-2">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
											<div class="col-lg-2">
												<label>Período:</label>
											</div>
											<div class="col-lg-2">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
										</div>
										<hr>
										<div class="form-group row">
											<div class="col-lg-2">
												<label>Grupo:</label>
											</div>
											<div class="col-lg-2">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
											<div class="col-lg-8">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-2">
												<label>Comisionista:</label>
											</div>
											<div class="col-lg-2">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
											<div class="col-lg-8">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-2">
												<label>Supervisor:</label>
											</div>
											<div class="col-lg-2">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
											<div class="col-lg-8">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-2">
												<label>Jefe Ventas:</label>
											</div>
											<div class="col-lg-2">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
											<div class="col-lg-8">
												<input type="text" disabled class="form-control m-input" name="" id="">
											</div>
										</div>
									</fieldset>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-3">
										<label class="m-checkbox">
											Supervisor:
										</label>
									</div>
									<div class="col-lg-3">
										<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
											<label>
												<input type="checkbox" disabled name="" id="">
												<span></span>
											</label>
										</span>
									</div>
									<div class="col-lg-3">
										<label class="m-checkbox">
											Jefe Ventas:
										</label>
									</div>
									<div class="col-lg-3">
										<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
											<label>
												<input type="checkbox" disabled name="" id="">
												<span></span>
											</label>
										</span>
									</div>
								</div>
								<br>
								<div class="row">
									<fieldset class="col-md-10 offset-md-1 fieldFormHorizontal">
										<legend class="col-md-4">Contratos</legend>
										<div class="row">
											<div class="col-md-12">
												<p class="pull-right">
													<button type="button" class="btn btn-sm btn-primary btnGuardarKqPst" title="Contratos Emitidos" id="cttoEmiArbVen" style="margin-right:6px;"><i class="fa fa-copy"> Emitidos</i></button>	
													<button type="button" class="btn btn-sm btn-primary btnEditarKqPst2" title="Contratos Activados" id="cttoActArbVen" style="margin-right:6px;"><i class="fa fa-check"> Activados</i></button>
													<button type="button" class="btn btn-sm btn-primary btnEliminarKqPst" title="Eliminar" id="cttoResArbVen"><i class="fa fa-close"> Resueltos</i></button>
												</p>
											</div>
										</div>
										<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst col-md-12" id="tab-2" style="border-radius: 3px;margin-bottom: 0; height: 15rem;">
											<li class="nav-item liListaKqPstImpar">
												<a href=<li class="spanTextoActiveKq">
													<div class="row">
														<div class="text-center col-md-4">Localidad</div>
														<div class="text-center col-md-4">Contrato</div>
														<div class="text-center col-md-1" style="padding: 0">T. N.</div>
														<div class="text-center col-md-3">F. <span id="tituloCttArbVen"></span></div>
													</div>
												</a>
											</li>
											<li class="nav-item liListaKqPstPar">
												<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
													<div class="row">
														<div class="text-center col-md-4">SEDE SAN ANTONIO</div>
														<div class="text-center col-md-4">0000000001-0</div>
														<div class="text-center col-md-1" style="padding: 0">NF</div>
														<div class="text-center col-md-3">12-10-2019</div>
												</div>
												</a>	
											</li>
											<li class="nav-item liListaKqPstPar">
												<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
													<div class="row">
														<div class="text-center col-md-4">SEDE SAN ANTONIO</div>
														<div class="text-center col-md-4">0000000001-0</div>
														<div class="text-center col-md-1" style="padding: 0">NF</div>
														<div class="text-center col-md-3">12-10-2019</div>
													</div>
												</a>	
											</li>
											<li class="nav-item liListaKqPstImpar">
												<a href="#" id= data-toggle="tab" data-target="#tabConfigPeriodo" class="spanTextoActiveKq">
													<div class="row">
														<div class="text-center col-md-4">SEDE SAN ANTONIO</div>
														<div class="text-center col-md-4">0000000001-0</div>
														<div class="text-center col-md-1" style="padding: 0">NF</div>
														<div class="text-center col-md-3">12-10-2019</div>
													</div>
												</a>	
											</li>
										</ul>
										<br>
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