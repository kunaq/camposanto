<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="sidebar-wrapper stickButtons" id="container-button">
			<ul>
				<li style="list-style: none;">
					<a href="#container" class="btn btnGuardarKqPst m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" style="border-top-left-radius: .25rem !important; border-bottom-left-radius: .25rem !important;"" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Grabar cambios" id="new-button" onclick="grabar()">
						<i class="fa fa-save"></i>
					</a>
				</li>
			</ul> 					
		</div> 

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
					<div class="col-md-5">
						<div class="row">
							<div class="col-md-1">
								<label>Año</label>
							</div>
							<div class="col-md-3">
								<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="anioPerVen" id="anioPerVen" onchange="buscaPeriodo();">
								</select>
							</div>
							<div class="col-md-3">
								<button type="button" class="btn btn-sm btnGuardarKqPst" title="Crear año" id="btnNvoAnno"  style="margin-right:6px;" onclick="creaNvoAnio();"><i class="fa fa-plus"></i></button>	
								<button type="button" class="btn btn-sm btnEditarKqPst2" title="Copiar año siguiente" id="btnCopiaAnno" onclick="copiaAnio();"><i class="fa fa-copy"></i></button>
							</div>
							<div class="col-md-2">
								<label>Periodo:</label>
							</div>
							<div class="col-md-3">
								<select class="form-control form-control-sm m-input m-select2 m-select2-general" style="width: 100%" name="periodoPerVen" id="periodoPerVen" onchange="buscaPeriodo();">
									<option selected="selected" value="todos">TODOS</option>
									<option value="15D">15D</option>
									<option value="30D">30D</option>
								</select>
							</div>
						</div>
						<div class="row">
							<ul class="nav nav-tabs nav-tabs-simple nav-tabs-left bg-white ulListaKqPst ulListaConfigPeriodo col-sm-2 col-md-12" id="listaPeriodoVenta" style="border-radius: 3px;margin-bottom: 0; padding-right: 0; overflow-x:hidden; ">
								<li class="spanTextoActiveKq liListaKqPstTitulo">
									<div class="row">
										<div class="col-md-4" style="padding: 0 0 0 1.6rem;"><b>Período</b></div>
										<div class="col-md-3"><b>Mes</b></div>
										<div class="col-md-5"><b>Estado</b></div>
									</div>
								</li>
							</ul>
						</div>		
					</div>					
					<div class="tab-content-active bg-white divFormularioKqPst col-sm-10 col-md-7" style="align-self: auto;padding-top: 1rem;">
						<div class="tab-pane slide-left" id="tabConfigPeriodo">
							<form enctype="multipart/form-data" id="formConfigPeriodo" role="form" method="POST">
								<div class="form-group row">
									<div class="col-lg-2">
										<label>Periodo:</label>
									</div>
									<div class="col-lg-2">
										<input type="text" disabled class="form-control form-control-sm m-input" name="nombrePeriodo" id="nombrePeriodo">
									</div>
									<div class="col-lg-2">
										<input type="text" disabled class="form-control form-control-sm m-input" name="tipoPeriodo" id="tipoPeriodo">
									</div>
									<div class="col-lg-2">
										<input type="text" disabled class="form-control form-control-sm m-input" name="codPeriodo" id="codPeriodo">
									</div>
									<div class="col-lg-2">
										<label>Mes:</label>
									</div>
									<div class="col-lg-2">
										<input type="text" disabled class="form-control form-control-sm m-input" name="numMes" id="numMes">
									</div>	
								</div>
								<div class="row form-group">
									<div class="col-lg-2">
										<label>Descripción:</label>
									</div>
									<div class="col-lg-10">
										<input type="text" disabled class="form-control form-control-sm m-input" name="dscPeriodo" id="dscPeriodo">
									</div>
								</div>
								<div class="row form-group">
									<div class="col-lg-2">
										<label>Fecha Inicio:</label>
									</div>
									<div class="col-lg-4">
										<div class="input-group date">
											<input type="text" class="form-control form-control-sm m-input"  id="fchIniPerVen" name="fchIniPerVen" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
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
											<input type="text" class="form-control form-control-sm m-input"  id="fchFinPerVen" name="fchFinPerVen" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
											<div class="input-group-append">
												<span class="input-group-text">
													<i class="la la-calendar-check-o"></i>
												</span>
											</div>
										</div>
									</div>	
								</div>
								<div class="row form-group">
									<div class="col-lg-2">
										<label>Periodo anterior:</label>
									</div>
									<div class="col-lg-4">
										<input type="text" disabled class="form-control form-control-sm m-input" name="nombrePeriodoAnt" id="nombrePeriodoAnt">
									</div>
									<div class="col-lg-2">
										<label>Estado:</label>
									</div>
									<div class="col-lg-4">
										<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="edoPerVen" id="edoPerVen">
											<option value="AB">ABIERTO</option>
											<option value="CE">CERRADO</option>
										</select>
									</div>	
								</div>
								<div class="row form-group">
									<div class="col-lg-2">
										<label>Procesos comisiones:</label>
									</div>
									<div class="col-lg-4">
										<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
											<label>
												<input type="checkbox" name="chkProComPerVen" id="chkProComPerVen">
												<span></span>
											</label>
										</span>
									</div>
									<div class="col-lg-2">
										<label>Fecha:</label>
									</div>
									<div class="col-lg-4">
										<input type="text" class="form-control form-control-sm m-input" name="fchProComPerVen" id="fchProComPerVen">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-12" id="detCierre" hidden style="text-align: center;">
										<p>Fecha Cierre: <span id="fechCierre"></span>&nbsp;<span id="motivoCierre"></span></p>
									</div>
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