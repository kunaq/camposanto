
<div class="modal fade" id="m_modal_deuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Alerta por Deuda de Clientes
					<i class="fa fa-exclamation-triangle exclamation p-left10"></i>
					<i class="fa fa-exclamation-triangle exclamation"></i>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-2"><h6 class="text-blue">El cliente: </h6></div>
					<div class="col-lg-5"><h6 class="text-red" id="nombreCliDeu" style="float: left;"></h6></div>
				</div>
				<div class="row">
					<div class="col-lg-3"><h6 class="text-blue">Tiene una deuda pendiente de:</h6></div>
					<div class="col-lg-2"><h6 class="text-red" id="deudaTotal"></h6></div>
				</div>
				<div id="tablaDeuda"></div>
			</div>
<!-- 			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</div> -->
		</div>
	</div>
</div>