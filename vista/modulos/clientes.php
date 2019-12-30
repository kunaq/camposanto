<div class="m-content" id="bodyArbVend"  style="width: calc(100%);">
	<!--Begin::Main Portlet-->
	<div class="m-portlet m-portlet--space">
		<!--begin: Portlet Head-->
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						Clientes 
					</h3>
				</div>
			</div>
		</div>
		<!--End: Portlet Head-->
		<div class="m-portlet__body">
			<form id="formNvoCliRegCli">
				<div class="row">
					<div class="col-lg-2">
						<label class="">
							Tipo de doc.:
						</label>
					</div>
					<div class="col-lg-2">
						<select class="form-control m-input custom-select custom-select-danger selectTipoDoc" id="tipoDocNvoCliRegCli" name="tipoDocNvoCliRegCli" onchange="DocLenghtCliente(this.value);">
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
						<input type="text" class="form-control m-input nvoRegistroUser input2Decimales" id="nvoClienteRegCli" name="nvoClienteRegCli" >
					</div>
					<div class="col-lg-3">
						<table>
							<tr>
								<td>
									<label class="m-checkbox">
										Jurídico&nbsp;
									</label>
								</td>
								<td>
									<span class="m-switch m-switch--sm m-switch--outline m-switch--icon m-switch--danger">
										<label>
											<input type="checkbox"  name="personaCheck" id="personaCheck" onclick="esJuridica();">
											<span></span>
										</label>
									</span>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-2">
						<label class="">
							Razón social:
						</label>
					</div>
					<div class="col-lg-10">
						<input type="text" id="razonSocNvoCliRegCli" name="razonSocNvoCliRegCli" class="form-control m-input" disabled placeholder="">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-2">
						<label class="">
							Apellido paterno:
						</label>
					</div>
					<div class="col-lg-4">
						<input type="text" class="form-control m-input" id="apelPatNvoCliRegCli" name="apelPatNvoCliRegCli">
					</div>
					<div class="col-lg-2">
						<label class="">
							Apellido materno:
						</label>
					</div>
					<div class="col-lg-4">
						<input type="text" class="form-control m-input" id="apelMatNvoCliRegCli" name="apelMatNvoCliRegCli">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-2">
						<label class="">
							Nombres:
						</label>
					</div>
					<div class="col-lg-10">
						<input type="text" class="form-control m-input" id="nombresNvoCliRegCli" name="nombresNvoCliRegCli">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-2">
						<label class="">
							Sexo:
						</label>
					</div>
					<div class="col-lg-4">
						<select class="form-control m-input custom-select custom-select-danger validaDNI" id="sexoNvoCliRegCli" name="sexoNvoCliRegCli">
							<option value="">
								Seleccione
							</option>
							<option value="M">
								MASCULINO
							</option>
							<option value="F">
								FEMENINO
							</option>
						</select>
					</div>
					<div class="col-lg-2">
						<label class="">
							F. Nacimiento:
						</label>
					</div>
					<div class="col-lg-4">
						<div class="input-group date">
							<input type="text" class="form-control m-input validaDNI" placeholder="Seleccionar fecha" id="m_datepicker_2_modal" name="m_datepicker_2_modal" data-date-format="dd/mm/yyyy"/>
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
						<label class="">
							Estado civil:
						</label>
					</div>
					<div class="col-lg-4">
						<select class="form-control m-input custom-select custom-select-danger" id="ecivilNvoCliRegCli" name="ecivilNvoCliRegCli">
							<option value="">
								Seleccione
							</option>
							<?php
					$prueba=controladorEmpresa::ctrestadocivil();
					  ?> 
						</select>
					</div>
					<div class="col-lg-2">
						<label class="">
							Celular:
						</label>
					</div>
					<div class="col-lg-4">
						<input type="text" id="celNvoCliRegCli" name="celNvoCliRegCli" class="form-control m-input" placeholder="">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-2">
						<label class="">
							Id de Tarjeta:
						</label>
					</div>
					<div class="col-lg-4">
						<input type="text" id="tarjetaNvoCliRegCli" name="tarjetaNvoCliRegCli" class="form-control m-input" placeholder="">
					</div>
					<div class="col-lg-2">
						<label class="">
							Email (trabajo):
						</label>
					</div>
					<div class="col-lg-4">
						<input type="text" class="form-control m-input" id="emailNvoCliRegCli" name="emailNvoCliRegCli" onchange="pasaCorreo();">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-2">
						<label class="">
							Email(FE):
						</label>
					</div>
					<div class="col-lg-4">
						<input type="text" class="form-control m-input" id="emailfeNvoCliRegCli" name="emailfeNvoCliRegCli">
					</div>
					<div class="col-lg-2">
						<label class="">
							Como se contactó:
						</label>
					</div>
					<div class="col-lg-4">
						<select class="form-control m-input custom-select custom-select-danger" id="contactoNvoCliRegCli" name="contactoNvoCliRegCli">
							<option value="">
								Seleccione
							</option>
							<?php
								$tabla="vtama_tipo_contacto";
							    $item1="cod_tipo_contacto";
							    $item2="dsc_tipo_contacto";
							    $prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
							?> 
						</select>
					</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-2">
							<label class="">
								Categoria:
							</label>
						</div>
						<div class="col-lg-4">
							<select class="form-control m-input custom-select custom-select-danger" id="categoriaNvoCliRegCli" name="categoriaNvoCliRegCli">
								<option value="">
									Seleccione
								</option>
								<?php
								  $tabla="vtama_categoria_cliente";
								  $item1="cod_categoria";
								  $item2="dsc_categoria";
                                  $prueba=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
								?> 
							</select>
						</div>
						<div class="col-lg-2">
							<label class="">
								Calificación:
							</label>
						</div>
						<div class="col-lg-4">
							<select class="form-control m-input custom-select custom-select-danger" id="calificacionNvoCliRegCli" name="calificacionNvoCliRegCli">
								<option value="">
									Seleccione
								</option>
								<?php
									$tabla="vtama_tipo_calificacion";
							  		$item1="cod_calificacion";
							  		$item2="dsc_calificacion";
									$clasificacion=controladorEmpresa::ctrSelects($tabla,$item1,$item2);
						        ?> 
							</select>
						</div>
					</div>
					<hr>
					<label>
						<h5>Domicilio</h5>
					</label>
					<div class="row">
						<div class="col-lg-2">
							<label class="">
								Direc-N°-Int:
							</label>
						</div>
						<div class="col-lg-6">
							<input type="text" id="dirNvoCliRegCli" name="dirNvoCliRegCli" class="form-control m-input" placeholder="Dirección">
						</div>
						<div class="col-lg-2">
							<input type="text" id="ndirNvoCliRegCli" name="ndirNvoCliRegCli" class="form-control m-input" placeholder="N°">
						</div>
						<div class="col-lg-2">
							<input type="text" id="intNvoCliRegCli" name="intNvoCliRegCli" class="form-control m-input" placeholder="Int">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-2">
							<label class="">
								Urb-Mza-Lt:
							</label>
						</div>
						<div class="col-lg-6">
							<input type="text" id="urbNvoCliRegCli" name="urbNvoCliRegCli" class="form-control m-input" placeholder="Urbanización">
						</div>
						<div class="col-lg-2">
							<input type="text" id="mzaNvoCliRegCli" name="mzaNvoCliRegCli" class="form-control m-input" placeholder="Mza">
						</div>
						<div class="col-lg-2">
							<input type="text" id="ltNvoCliRegCli" name="ltNvoCliRegCli" class="form-control m-input" placeholder="Lt">
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
							<select class="form-control m-input custom-select custom-select-danger" id="paisNvoCliRegCli" name="pais" onchange="buscaDepartamento(this.value);">
								<option value="0">
									Seleccione el país
								</option>
								<?php
									$prueba = controladorEmpresa::ctrPais();
								?> 
							</select>
						</div>
						<div class="col-lg-2">
							<label class="">
								Departamento:
							</label>
						</div>
						<div class="col-lg-4">
							<select class="form-control m-input custom-select custom-select-danger" name="departamento" id="depaNvoCliRegCli" onchange="buscaProvincia(this.value);">
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
							<select class="form-control m-input custom-select custom-select-danger" name="provincia" id="provNvoCliRegCli" onchange="buscaDistrito(this.value);">
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
							<select class="form-control m-input custom-select custom-select-danger" name="distrito" id="distNvoCliRegCli">
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
							<input type="text" class="form-control m-input" id="telNvoCliRegCli" name="telNvoCliRegCli" placeholder="">
						</div>
						<div class="col-lg-2">
							<label class="">
								Teléfono fijo 2:
							</label>
						</div>
						<div class="col-lg-4">
							<input type="text" class="form-control m-input" id="tel2NvoCliRegCli" name="tel2NvoCliRegCli" placeholder="">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-2">
							<label class="">
								Referencia:
							</label>
						</div>
						<div class="col-lg-10">
							<textarea class="form-control m-input" id="refNvoCliRegCli" name="refNvoCliRegCli" rows="3"></textarea>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 m--align-right">
							<button  class="btn btnGuardarKqPst m-btn m-btn--custom m-btn--icon" data-wizard-action="submit" id="guardaClienteRegCli">
								<span>
									<i class="fa fa-save"></i>
									&nbsp;&nbsp;
									<span>
										Guardar
									</span>
								</span>
							</button>
						</div>
						<div class="col-lg-4 m--align-right">
							<button  class="btn btnGuardarKqPst m-btn m-btn--custom m-btn--icon" data-wizard-action="submit" id="guardaCliGenCttoRegCli">
								<span>
									<i class="fa fa-star"></i>
									&nbsp;&nbsp;
									<span>
										Guardar y generar contrato
									</span>
								</span>
							</button>
						</div>
					</div>
				</form>
		</div>
		<!--End: Portlet Body-->
	</div>
	<!--End::Main Portlet-->
</div>
</div>