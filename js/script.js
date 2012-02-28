$(document).ready(function() {
	
	//===================================================================================================================== Progressive Enhancements
	
	function elementSupportsAttribute(element,attribute){
		var test = document.createElement(element);
		if( attribute in test){
			return true;
			}else{
				return false;
				}
		};//end function elementSupportsAttribute
	
});//end document.ready()