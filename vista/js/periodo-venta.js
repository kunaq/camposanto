$("#fchIniPerVen").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchFinPerVen").datepicker({
  format: 'dd-mm-yyyy',
  autoclose: true
});//datepicker

$("#fchProComPerVen").datetimepicker({
  autoclose:!0,
  format:"dd-mm-yyyy hh:ii"
});//datepicker

$("#chkProComPerVen").on('change', function(){
	if($(this).is(':checked')){
		$("#fchProComPerVen").datetimepicker("setDate", new Date());
	}
	else{
		$("#fchProComPerVen").val('');
	}
});