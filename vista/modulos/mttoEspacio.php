<div class="m-content" style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<!------------------------------- botones --------------------------------->
		<div class="sidebar-wrapper stickButtons" id="container-button">
			<ul>
				<li style="list-style: none;">
					<a href="#container" class="btn btn-metal m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" style="border-top-left-radius: .25rem !important;" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Buscar" id="btnBuscarMttoEsp">
						<i class="fa fa-search"></i>
					</a>
				</li>
				<li style="list-style: none;">
					<a href="#container" class="btn btnGuardarKqPst m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Guardar cambios" onclick="guardarMttoEsp();" id="btnGuardaMttoEsp">
						<i class="fa fa-save"></i>
					</a>
				</li>
				<li style="list-style: none;" >
					<a href="#container" class="btn btnEditarKqPst2 m-btn--square m-btn m-btn--icon btn-lg m-btn--icon-only" style="border-bottom-left-radius: .25rem !important;" data-toggle="m-tooltip" data-container="body" data-placement="left" title="" data-original-title="Nueva busqueda" id="btnReseMttoEsp" onclick="resetBusqueda();">
						<i class="fa fa-sticky-note"></i>
					</a>
				</li>
			</ul> 					
		</div> 
		<!-----------------------------fin botones------------------------------->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Mantenimiento de espacios
					</h3>
				</div>
			</div>
		</div>
		<!--end: Portlet Head-->
		<div class="m-portlet__body" style="padding-top: 0">

			<fieldset class="fieldFormHorizontal">
			<form id="formMttoEsp">
			<legend class="tittle-box">Filtros</legend>
			<div class="row form-group" style="padding-left: 1rem; padding-right: 1rem;">
				<div class="col-lg-4" style="border-right:solid 1px #e4e1e1;">
					<div class="row form-group">
						<div class="col-lg-12">
							<label>Camposanto</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="camposantoMttoEsp" required id="camposantoMttoEsp" disabled="disabled">
								<?php
								  $tabla = "vtama_camposanto";
								  $item1 = "cod_camposanto";
								  $item2 = "dsc_camposanto";
						           $prueba = controladorEmpresa::ctrCamposanto();
								  ?>
							</select>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-12">
							<label> Tipo plataforma:</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="tipoPlatMttoEsp"  id="tipoPlatMttoEsp" onchange="buscaPlataforma(this.value);">
								<option value="">Tipo de plataforma</option>
								<?php
						           $prueba = controladorEmpresa::ctrTipoPlataforma();
								  ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-8">
					<div class="row form-group">
						<div class="col-lg-6">
							<label>Plataforma: </label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="plataformaMttoEsp" id="plataformaMttoEsp"  onchange="buscaArea(this.value);">
								<option disabled value="">Plataforma</option>
							</select>
						</div>
						<div class="col-lg-6">
							<label>Área: </label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="areaMttoEsp" id="areaMttoEsp" onchange="buscaEjex(this.value);">
								<option value="">Área</option>
							</select>			
						</div>
					</div>
					<div class="row form-group">
						<div class="col-lg-4">
							<label>Eje Horiz (X):</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="ejexMttoEsp" id="ejexMttoEsp" onchange="buscaEjey(this.value);">
								<option disabled value="">Eje Hor.</option>
							</select>
						</div>
						<div class="col-lg-4">
							<label>Eje Vert (Y):</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="ejeyMttoEsp" id="ejeyMttoEsp" onchange="buscaEspacio(this.value);">
								<option disabled value="">Eje Hor.</option>
							</select>
						</div>
						<div class="col-lg-4">
							<label>Espacio:</label>
							<select class="form-control form-control-sm m-input m-select2 m-select2-general" name="espacioMttoEsp" id="espacioMttoEsp">
							</select>
						</div>
					</div>
				</div>
			</div>	
			</form>
			</fieldset>
			<fieldset class="fieldFormHorizontal">
			<legend class="tittle-box">Espacio generado</legend>
				<div class="col-lg-12">
					<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="400">
						<div class="table-responsive">
							<table class="table m-table" id="tablaMttoEsp">
								<thead>
									<th style="width: 12rem;">Plataforma</th>
									<th style="width: 9rem;">Area</th>
									<th style="width: 4rem;">Eje Horiz.</th>
									<th style="width: 4rem;">Eje Vert.</th>
									<th style="width: 5rem;">Codigo Espacio</th>
									<th>Tipo</th>
									<th>Espacio</th>
									<th>Estado</th>
								</thead>
								<tbody id="bodyMttoEsp">
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