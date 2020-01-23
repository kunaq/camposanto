<div class="modal fade" id="m_modal_observacion_cliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" style="	padding-right: 17px;">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">
					Observaciones del Cliente
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						×
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-lg-7">
							<label>Cliente</label>
							<input type="text" class="form-control form-control-sm m-input" id="nombreCliObservacion" disabled>
						</div>
						<div class="col-lg-5">
							<label>Clasificación</label>
							<input type="text" class="form-control form-control-sm m-input" id="clasificacionCliObservacion" disabled>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-lg-12">
							<div class="m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="200">
								<div class="table-responsive">
									<table class="table">
										<thead>
											<th>N°</th>
											<th>F. Registro</th>
											<th>Usuario</th>
											<th>Observación</th>
										</thead>
										<tbody id="tbodyObservacion">
											<tr>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Aceptar
				</button>
			</div>
		</div>
	</div>
</div>