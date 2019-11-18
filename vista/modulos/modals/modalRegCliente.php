									<!-- Modal containt-->
										<div class="modal fade" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg" role="document">
										<div class="modal-content">
											<div id="m_modal_1_loader" class="loader"></div>
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">
													Registro de cliente
												</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">
														&times;
													</span>
												</button>
											</div>
											<div class="modal-body">
												<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="480">
													<form id="formNvoCliWiz">
														<div class="row">
															<div class="col-lg-2">
																<label class="">
																	Tipo de doc.:
																</label>
															</div>
															<div class="col-lg-2">
																<select class="form-control m-input custom-select custom-select-danger selectTipoDoc" id="tipoDocNvoCliWiz" name="tipoDocNvoCliWiz" onchange="DocLenghtCliente(this.value);">
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
																<input type="text" class="form-control m-input nvoRegistroUser input2Decimales" id="nvoClienteWiz" name="nvoClienteWiz" >
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
																					<input type="checkbox"  name="" id="personaCheck" onclick="esJuridica();">
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
																<input type="text" id="razonSocNvoCliWiz" class="form-control m-input" disabled placeholder="">
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
																<input type="text" class="form-control m-input" id="apelPatNvoCliWiz">
															</div>
															<div class="col-lg-2">
																<label class="">
																	Apellido materno:
																</label>
															</div>
															<div class="col-lg-4">
																<input type="text" class="form-control m-input" id="apelMatNvoCliWiz">
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
																<input type="text" class="form-control m-input" id="nombresNvoCliWiz">
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
																<select class="form-control m-input custom-select custom-select-danger validaDNI" id="sexoNvoCliWiz" name="option">
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
																	<input type="text" class="form-control m-input validaDNI" placeholder="Seleccionar fecha" id="m_datepicker_2_modal"/>
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
																<select class="form-control m-input custom-select custom-select-danger" id="ecivilNvoCliWiz" name="option">
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
																<input type="text" id="celNvoCliWiz" class="form-control m-input" placeholder="">
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
																<input type="text" id="tarjetaNvoCliWiz" class="form-control m-input" placeholder="">
															</div>
															<div class="col-lg-2">
																<label class="">
																	Email (trabajo):
																</label>
															</div>
															<div class="col-lg-4">
																<input type="text" class="form-control m-input" id="emailNvoCliWiz" onchange="pasaCorreo();">
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
																<input type="text" class="form-control m-input" id="emailfeNvoCliWiz">
															</div>
															<div class="col-lg-2">
																<label class="">
																	Como se contactó:
																</label>
															</div>
															<div class="col-lg-4">
																<select class="form-control m-input custom-select custom-select-danger" id="contactoNvoCliWiz" name="option">
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
																<select class="form-control m-input custom-select custom-select-danger" id="categoriaNvoCliWiz" name="option">
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
																<select class="form-control m-input custom-select custom-select-danger" id="calificacionNvoCliWiz" name="option">
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
																<input type="text" id="dirNvoCliWiz" class="form-control m-input" placeholder="Dirección">
															</div>
															<div class="col-lg-2">
																<input type="text" id="ndirNvoCliWiz" class="form-control m-input" placeholder="N°">
															</div>
															<div class="col-lg-2">
																<input type="text" id="intNvoCliWiz" class="form-control m-input" placeholder="Int">
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
																<input type="text" id="urbNvoCliWiz" class="form-control m-input" placeholder="Urbanización">
															</div>
															<div class="col-lg-2">
																<input type="text" id="mzaNvoCliWiz" class="form-control m-input" placeholder="Mza">
															</div>
															<div class="col-lg-2">
																<input type="text" id="ltNvoCliWiz" class="form-control m-input" placeholder="Lt">
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
																<select class="form-control m-input custom-select custom-select-danger" id="paisNvoCliWiz" name="pais" onchange="buscaDepartamento(this.value);">
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
																<select class="form-control m-input custom-select custom-select-danger" name="departamento" id="depaNvoCliWiz" onchange="buscaProvincia(this.value);">
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
																<select class="form-control m-input custom-select custom-select-danger" name="provincia" id="provNvoCliWiz" onchange="buscaDistrito(this.value);">
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
																<select class="form-control m-input custom-select custom-select-danger" name="distrito" id="distNvoCliWiz">
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
																<input type="text" class="form-control m-input" id="telNvoCliWiz" placeholder="">
															</div>
															<div class="col-lg-2">
																<label class="">
																	Teléfono fijo 2:
																</label>
															</div>
															<div class="col-lg-4">
																<input type="text" class="form-control m-input" id="tel2NvoCliWiz" placeholder="">
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
																<textarea class="form-control m-input" id="refNvoCliWiz" rows="3"></textarea>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">
													Cerrar
												</button>
												<button type="button" class="btn btn-danger" onclick="registrarcliente();">
													Guardar
												</button>
											</div>
										</div>
									</div>
								</div>