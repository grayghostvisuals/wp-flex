$(document).ready(function() {
	
	$('.nav li').addClass('dropdown')
	
	//===================================================================================================================== Progressive Enhancements
	
	function elementSupportsAttribute(element,attribute){
		var test = document.createElement(element);
		if( attribute in test){
			return true;
			}else{
				return false;
				}
		};//end function elementSupportsAttribute
	
	
	//=====================================================================================================================jQuery Form Validator w/Ajax
	
		
	//==== jQuery validator default settings
	//jQuery.validator.setDefaults({
		//debug: false,
		//handler for form submissions
		//submitHandler: function(form){ 
		
			//==== ajax options object
			//var options = {
				//clearForm: true,
				//resetForm: true,
				//clearFields: true,
				//success : function(){ 
					//alert('Thanks for your submission friend! No need to hit the submit button again. We have your message and we will be in touch'); 
					//}//end success function
				//};//end options for ajax form submission
				
			//==== submit the form via ajax
			//$(form).ajaxSubmit(options); 
			
			//}//end submitHandler
			
	//});
		
	//$().validate({});
	
});//end document.ready()