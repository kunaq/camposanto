<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Listado de Prospectos
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
		<!--begin: Portlet Body-->	
			<!-- <div class="col-xl-12"> -->
					<div class="row">
						<fieldset class="col-md-12 fieldFormHorizontal">
							<legend class="col-md-3">Filtros</legend>
							<div class="form-group row">
								<div class="col-lg-1">
									<label>De la fecha:</label>
								</div>
								<div class="col-lg-2">
									<div class="input-group date">
										<input type="text" class="form-control m-input"  id="fchIniLisPro" name="fchIniLisPro" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-lg-1" style="text-align: center;">
									<label>a:</label>
								</div>
								<div class="col-lg-2">
									<div class="input-group date">
										<input type="text" class="form-control m-input"  id="fchFinLisPro" name="fchFinLisPro" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
										<div class="input-group-append">
											<span class="input-group-text">
												<i class="la la-calendar-check-o"></i>
											</span>
										</div>
									</div>
								</div>
								<div class="col-lg-1">
									<label>Estado:</label>
								</div>
								<div class="col-lg-2">
									<select class="form-control m-select2 m-select2-general" >
										<option>
											TODOS
										</option>
										<option>
											ACTIVO
										</option>
										<option>
											CIERRE
										</option>
										<option>
											CADUCO
										</option>
										<option>
											TRUNCO
										</option>
									</select>
								</div>	
								<div class="col-lg-1">
									<label>Calificación:</label>
								</div>
								<div class="col-lg-2">
									<select class="form-control m-select2 m-select2-general" >
										<option>
											SIN CALIFICACIÓN
										</option>
										<option>
											A
										</option>
										<option>
											B
										</option>
										<option>
											C
										</option>
									</select>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-lg-1">
									<label>Doc. de Identidad</label>
								</div>
								<div class="col-lg-2">
									<select class="form-control m-select2 m-select2-general" id="tipoDocLisPro" name="tipoDocLisPro" onchange="DocLenghtBusq(this.value);" >
										<option value="vacio">
											Seleccione
										</option>
										<?php
											$prueba = controladorEmpresa::ctrtipoDoc();
										?>
									</select>
								</div>
								<div class="col-lg-3">
									<input type="text"  class="form-control m-input" name="numDocLisPro" id="numDocLisPro">
								</div>
								<div class="col-lg-1">
									<label>Supervisor:</label>
								</div>
								<div class="col-lg-2">
									<select class="form-control m-select2 m-select2-general" >
										<option>
											Seleccione 
										</option>
										<option>
											A
										</option>
										<option>
											B
										</option>
										<option>
											C
										</option>
									</select>
								</div>
								<div class="col-lg-1">
									<label>Consejero:</label>
								</div>
								<div class="col-lg-2">
									<select class="form-control m-select2 m-select2-general" >
										<option>
											Seleccione
										</option>
										<option>
											A
										</option>
										<option>
											B
										</option>
										<option>
											C
										</option>
									</select>
								</div>
							</div>

							<br>
						</fieldset>
					
				</div>
		<!--End: Portlet Body-->
		</div>
	<!--End::Main Portlet-->
	</div>
</div>
</div>