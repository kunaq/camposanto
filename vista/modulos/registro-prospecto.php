<div class="m-content"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--full-height">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Registro de Prospectos
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
		<!--begin: Portlet Body-->	
			<!-- <div class="col-xl-12"> -->
			<div class="row">
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
						<fieldset class="col-md-7 fieldFormHorizontal" style="margin: 0 2rem 0 2rem;">
							<legend class="col-md-3">Prospecto</legend>							
								<div class="form-group row">
									<div class="col-lg-3">
										<label>Codigo:</label>
									</div>
									<div class="col-lg-3">
										<input type="text" class="form-control m-input" disabled id="" name=""/>
									</div>
									<div class="col-lg-3" style="text-align: center;">
										<label>Importe:</label>
									</div>
									<div class="col-lg-3">
										<input type="text" class="form-control m-input" disabled id="" name=""/>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-2">
										<label class="">
											Tipo de doc.:
										</label>
									</div>
									<div class="col-lg-2">
										<select class="form-control m-input custom-select custom-select-danger " onchange="DocLenghtBusq(this.value);" id="" name="">
											<option value="vacio">
												Seleccione
											</option>
											<?php
												$prueba = controladorEmpresa::
												ctrtipoDoc();
											  ?> 		
										</select>
									</div>
									<div class="col-lg-2">
										<label class="">
											N° de doc.:
										</label>
									</div>
									<div class="col-lg-3">
										<input type="text" class="form-control m-input" id="numDocRegPro" name="numDocRegPro">
									</div>
									<div class="col-lg-3">
										<div class="row">
											<div class="col-md-6">
												<label class="m-checkbox">
													Jurídico
												</label>
											</div>
											<div class="col-md-6">
												<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
													<label>
														<input type="checkbox"  name="">
														<span></span>
													</label>
												</span>
											</div>
										</div>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-2">
										<label>Apellido Paterno</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control m-input" id="" name=""/>
									</div>
									<div class="col-md-2">
										<label>Apellido Materno</label>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control m-input" id="" name=""/>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-2">
										<label id="dscCliRegPro">Nombres</label>
									</div>
									<div class="col-md-10">
										<input type="text" class="form-control m-input" id="" name=""/>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-2">
										<label>Dirección</label>
									</div>
									<div class="col-md-10">
										<input type="text" class="form-control m-input" id="" name=""/>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-2">
										<label class="">
											País:
										</label>
									</div>
									<div class="col-lg-4">
										<select class="form-control m-input custom-select custom-select-danger" id="pais" name="pais" onchange="buscaDepartamento(this.value);">
											<option value="0">
												Seleccione el país
											</option>
											<?php
												$prueba = controladorEmpresa::
												ctrPais();
											  ?> 
										</select>
									</div>
									<div class="col-lg-2">
										<label class="">
											Departamento:
										</label>
									</div>
									<div class="col-lg-4">
										<select class="form-control m-input custom-select custom-select-danger" name="departamento" id="departamento" onchange="buscaProvincia(this.value);">
											<option value="">
												Seleccione
											</option>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-2">
										<label class="">
											Provincia:
										</label>
									</div>
									<div class="col-lg-4">
										<select class="form-control m-input custom-select custom-select-danger" name="provincia" id="provincia" onchange="buscaDistrito(this.value);">
											<option value="">
												Seleccione
											</option>
										</select>
									</div>
									<div class="col-lg-2">
										<label class="">
											Distrito:
										</label>
									</div>
									<div class="col-lg-4">
										<select class="form-control m-input custom-select custom-select-danger" name="distrito" id="distrito">
											<option value="">
												Seleccione
											</option>
										</select>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-lg-2">
										<label class="">
											Teléfono fijo 1:
										</label>
									</div>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" placeholder="">
									</div>
									<div class="col-lg-2">
										<label class="">
											Teléfono fijo 2:
										</label>
									</div>
									<div class="col-lg-4">
										<input type="text" class="form-control m-input" placeholder="">
									</div>
								</div>
								<br>
							</fieldset>
							<div class="col-md-4">
								<fieldset class=" fieldFormHorizontal" style="margin-bottom: 0.53rem; padding: 1rem;">
								<legend class="col-md-3">Registro</legend>
									<div class="form-group row">
										<div class="col-lg-12">
											<label>Fecha / Días transcurridos:</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-9">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
									</div>	
									<br>
									<div class="form-group row">
										<div class="col-lg-12">
											<label>Usuario:</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
									</div>								
								</fieldset>
								<br>
								<fieldset class="fieldFormHorizontal" style=" padding: 1rem;">
								<legend class="col-md-3">Prospección</legend>
									<div class="form-group row">
										<div class="col-lg-12">
											<label>Canal venta</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<select class="form-control m-select2 m-select2-general" >
												<option>
													SELECCIONE
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
									<div class="form-group row">
										<div class="col-lg-12">
											<label>Calificación:</label>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
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
								</fieldset>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-6">
								<fieldset class="fieldFormHorizontal" style=" padding: 1rem; margin: 0 2rem 0 .6rem;">
								<legend class="col-md-3">Prospecto de</legend>
									<div class="row">
										<div class="col-lg-3">
											<label>Vendedor</label>
										</div>
										<div class="col-lg-3">
											<select class="form-control m-select2 m-select2-general" id="codVendedorRegPro" name="codVendedorRegPro">
												<option>
													Código
												</option>
												<?php
													$prueba = controladorEmpresa::
													ctrcodVendedor();
												  ?>
											</select>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
									</div>	
									<br>								
									<div class="row">
										<div class="col-lg-3">
											<label>Grupo</label>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
										<div class="col-lg-6">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
									</div>	
									<br>	
									<div class="row">
										<div class="col-lg-3">
											<label>Supervisor</label>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
										<div class="col-lg-6">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
									</div>	
									<br>
									<div class="row">
										<div class="col-lg-3">
											<label>Jefe ventas</label>
										</div>
										<div class="col-lg-3">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
										<div class="col-lg-6">
											<input type="text" class="form-control m-input" disabled id="" name=""/>
										</div>
									</div>			
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="fieldFormHorizontal" style=" padding: 1rem; margin-right: 4.2rem;">
								<legend class="col-md-3">Observaciones</legend>
									<div class="row">
										<div class="col-lg-12">
											<textarea class="form-control m-input" id="" rows="10"></textarea>
										</div>
									</div>	
									<br>									
								</fieldset>
							</div>
						</div>
						<br>
						<div class="row">
							<fieldset class="col-md-12 fieldFormHorizontal" style=" padding: 1rem; margin-left: 1.8rem;">
								<legend class="col-md-3">Estado de gestión</legend>
								<div class="row">
									<div class="col-lg-3">
										<select class="form-control m-select2 m-select2-general" id="edoGesRegPro">
											<option value="ACT">
												ACTIVO
											</option>
											<option value="CIE">
												CIERRE
											</option>
											<option value="CAD">
												CADUCO
											</option>
											<option value="TRU">
												TRUNCO
											</option>
										</select>
									</div>
									<div class="col-lg-">
										
									</div>
								</div>	
								<br>									
							</fieldset>
						</div>
						<br>
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
							<div class="table-responsive col-lg-12">
							<table class="table" id="tabRegConRegPro">
								<thead>
									<tr>
										<th>#</th>
										<th>Fch. contacto</th>
										<th width="80">Calificación</th>
										<th>Cierre</th>
										<th>Consejero</th>
										<th>Prim. o Seg.</th>
										<th>Observaciones</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="text-align: center;">1</td>
										<td>20/10/2019</td>
										<td>
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
										</td>
										<td>
											<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
												<label>
													<input type="checkbox"  name="">
													<span></span>
												</label>
											</span>
										</td>
										<td>A. CERRON</td>
										<td>Primera</td>
										<td>ibservaciones lorem ipsun......</td>
									</tr>
									<tr>
										<td style="text-align: center;">1</td>
										<td>20/10/2019</td>
										<td>
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
										</td>
										<td>
											<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
												<label>
													<input type="checkbox"  name="">
													<span></span>
												</label>
											</span>
										</td>
										<td>A. CERRON</td>
										<td>Primera</td>
										<td>ibservaciones lorem ipsun......</td>
									</tr>
								</tbody>
							</table>
							</div>
						</div>
					</form>				
				</div>
		<!--End: Portlet Body-->
		</div>
	<!--End::Main Portlet-->
	</div>
</div>
</div>
