// JavaScript for form validation goes here!

// Hook up submit button to a validate function
$(document).ready(function(){
	$('input[type="submit"]').on("click", validate);
});

//Perform validation logic on form inputs
function validate(event)
{
	// Prevent form from submitting
	event.preventDefault();
	removeErrors();
	
	var isError = false;
	
	// Employee ID needs to be 10 characters
	var id = $("#emp-id").val();
	if(id.length != 10)
	{
		report("emp-id-error", "Employee ID must be 10 characters");
		isError = true;
	}
	
	// Validate that hours are between 1-100 and are numeric
	var hours = parseInt($("#hours").val());
	
	if(!Number.isInteger(hours))
	{
		report("hours-error", "Hours must be entered as a number");
		isError = true;
	}
	
	else if(hours > 100 || hours < 1)
	{
		report("hours-error", "Hours must be between 1 and 100");
		isError = true;
	}
	
	// Validate that payrate is positive and a number
	var rate = parseInt($("#payrate").val());
	if(!Number.isInteger(rate))
	{
		report("payrate-error", "Payrate must be entered as a number");
		isError = true;
	}
	else if(rate < 0)
	{
		report("payrate-error", "Payrate must be positive.");
		isError = true;
	}
	
	
	// If all data is valid, submit form
	if(!isError){
		$("#payroll-form").submit();
	}
}

// Update form.php to display error message
function report(id, message)
{
	var errID = $("#" + id);
	
	errID.html(message);
	errID.parent().show();
	
}

// Clear any previous errors
function removeErrors()
{
	$("#emp-id-error").parent().hide();
	$("#hours-error").parent().hide();
	$("#payrate-error").parent().hide();
}