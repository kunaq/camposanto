<!-- Modal containt-->
<div class="modal fade" id="m_modal_registro_uso_servicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div id="m_modal_1_loader" class="loader"></div>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Registro de Uso de Servicio
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
					<div class="col-lg-12">
						<fieldset class="fieldFormHorizontal">
							<legend>&nbsp;</legend>
							<div class="col-lg-12">
								<div class="row form-group">
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-4">
												<label>Localidad</label>
												<select type="text" class="form-control form-control-sm m-input" id=""></select>
											</div>
											<div class="col-lg-4">
												<label>Tipo Autorización</label>
												<select type="text" class="form-control form-control-sm m-input" id=""></select>
											</div>
											<div class="col-lg-4">
												<label>N° Uso Servicio</label>
												<input type="text" class="form-control form-control-sm m-input" id="">
											</div>
										</div>
									</div>
									<div class="col-lg-12">
										<div class="row">
											<div class="col-lg-4">
												<label>Estado</label>
												<select class="form-control form-control-sm m-input" id=""></select>
											</div>
											<div class="col-lg-4">
												<label>Usuario</label>
												<input type="text" class="form-control form-control-sm m-input" id="">
											</div>
											<div class="col-lg-4">
												<label>Fecha Registro</label>
												<div class="input-group date">
												<input type="text" class="form-control form-control-sm m-input"  id="m_datepicker_1" data-date-format="mm/dd/yyyy" value="<?php echo date('m/d/Y', strtotime(date('m/d/Y').'+ 1 month')); ?>"/>
												<div class="input-group-append">
													<span class="input-group-text">
														<i class="la la-calendar-check-o"></i>
													</span>
												</div>
											</div>
											</div>
										</div>
									</div>

								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" onclick="">
					Guardar
				</button>
			</div>
		</div>
	</div>
</div>