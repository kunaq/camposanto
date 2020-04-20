<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="sidebar-wrapper stickButtons" id="container-button">
			<ul>
				<li style="list-style: none;">
					<a href="#container" class="btn btnGuardarKqPst m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" style="border-top-left-radius: .25rem !important; border-bottom-left-radius: .25rem !important;"" data-toggle="m-tooltip" data-container="body" disabled data-placement="left" title="" data-original-title="Grabar cambios" id="guardarbtn">
						<i class="fa fa-save"></i>
					</a>
				</li>
			</ul> 					
		</div> 
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Creación de espacios
					</h3>
				</div>
			</div>
		</div>
		<!--end: Portlet Head-->
		<div class="m-portlet__body" style="padding-top: 0">

			<fieldset class="fieldFormHorizontal">
			<legend class="tittle-box">Parámetros</legend>
				<div class="col-lg-12">
					<div class="row form-group">
						<div class="col-lg-3">
							<label>Camposanto</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="camposantoCreaEsp" required id="camposantoCreaEsp" disabled="disabled">
								<?php
								  $tabla = "vtama_camposanto";
								  $item1 = "cod_camposanto";
								  $item2 = "dsc_camposanto";
						           $prueba = controladorEmpresa::ctrCamposanto();
								  ?>
							</select>
						</div>
						<div class="col-lg-3">
							<label> Tipo plataforma:</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="tipoPlatCreaEsp"  id="tipoPlatCreaEsp" onchange="buscaPlataforma(this.value);">
								<option value="">Tipo de plataforma</option>
								<?php
						           $prueba = controladorEmpresa::ctrTipoPlataforma();
								  ?>
							</select>
						</div>
						<div class="col-lg-4">
							<label>Plataforma: </label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="plataformaCreaEsp" id="plataformaCreaEsp"  onchange="buscaArea(this.value);">
								<option disabled value="">Plataforma</option>
							</select>
						</div>
						<div class="col-lg-2">
							<label>Área: </label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="areaCreaEsp" id="areaCreaEsp" >
								<option value="">Área</option>
							</select>			
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-4">
							<label>Eje Horiz (X):</label>
							<div class="row">
								<div class="col-lg-3">
									<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
										<label>
											<input type="checkbox" name="ejexCheck" id="ejexCheck">
											<span></span>
										</label>
									</span>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control form-control-sm m-input mayuscula" name="desdeEjeX" id="desdeEjeX" disabled data-toggle="m-tooltip" data-container="body" disabled data-placement="top" title="" data-original-title="Solo letras">
								</div>
								<div class="col-lg-1">
									<label>a</label>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control form-control-sm m-input mayuscula" name="hastaEjeX" id="hastaEjeX" disabled data-toggle="m-tooltip" data-container="body" disabled data-placement="top" title="" data-original-title="Solo letras">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<label>Eje Vert (Y):</label>
							<div class="row">
								<div class="col-lg-3">
									<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
										<label>
											<input type="checkbox" name="ejeyCheck" id="ejeyCheck">
											<span></span>
										</label>
									</span>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control form-control-sm m-input" name="desdeEjeY" id="desdeEjeY" disabled data-toggle="m-tooltip" data-container="body" disabled data-placement="top" title="" data-original-title="Solo números">
								</div>
								<div class="col-lg-1">
									<label>a</label>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control form-control-sm m-input" name="hastaEjeY" id="hastaEjeY" disabled data-toggle="m-tooltip" data-container="body" disabled data-placement="top" title="" data-original-title="Solo números">
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<label>Espacio:</label>
							<div class="row">
								<div class="col-lg-3">
									<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--yellow">
										<label>
											<input type="checkbox" name="espacioCheck" id="espacioCheck">
											<span></span>
										</label>
									</span>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control form-control-sm m-input" name="desdeEspacio" id="desdeEspacio" disabled data-toggle="m-tooltip" data-container="body" disabled data-placement="top" title="" data-original-title="Solo números">
								</div>
								<div class="col-lg-1">
									<label>a</label>
								</div>
								<div class="col-lg-3">
									<input type="text" class="form-control form-control-sm m-input" name="hastaEspacio" id="hastaEspacio" disabled data-toggle="m-tooltip" data-container="body" disabled data-placement="top" title="" data-original-title="Solo números">
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset class="fieldFormHorizontal">
			<legend class="tittle-box">Datos</legend>
				<div class="col-lg-12">
					<div class="row form-group">
						<div class="col-lg-1">
							<label>Tipo de espacio</label>
						</div>
						<div class="col-lg-3">
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="tipoEspacioCreaEsp" required id="tipoEspacioCreaEsp">
							</select>
						</div>
						<div class="col-lg-1">
							<label>Estado:</label>
						</div>
						<div class="col-lg-3">
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="edoEspacioCreaEsp" required id="edoEspacioCreaEsp">
								<?php
									$tabla = "vtama_estadoespacio";
									$item1 = "cod_estado";
									$item2 = "dsc_estado";
						            $prueba = controladorEmpresa::ctrSelects($tabla,$item1,$item2);
								?>
							</select>
						</div>
						<div class="col-lg-3 offset-lg-1">
							<button type="button" onclick="" class="btn m-btn--pill btnGuardarKqPst" id="btnGeneraEspacio">
								&nbsp;&nbsp;&nbsp;Generación de Espacios&nbsp;&nbsp;&nbsp;
							</button>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset class="fieldFormHorizontal">
			<legend class="tittle-box">Espacio generado</legend>
				<div class="col-lg-12">
					<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
						<div class="table-responsive">
							<table class="table m-table">
								<thead>
									<th>Camposanto</th>
									<th>Plataforma</th>
									<th>Area</th>
									<th>Eje Horiz.</th>
									<th>Eje Vert.</th>
									<th>Espacio</th>
									<th>Tipo</th>
									<th>Estado</th>
									<th>Fila</th>
									<th>Columna</th>
								</thead>
								<tbody id="bodyCreaEsp">
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</fieldset>

		</div>
		<!--End::Portlet Body-->
	</div> 
	<!--End::Main Portlet-->
</div>
</div>