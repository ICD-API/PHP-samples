
var loading = '<i class="fa fa-refresh fa-spin fa-fw"></i> Loading...';


/**
* @function submit URI
*/
$('#request-uri').on('submit', function(event) {
	
	$('#request-search input').val('');
	var uri = $('#request-uri input').val();	
	if(uri != '') {
		var sent = { 	
			'uri': uri 
		};	
		make_request(sent);
	}
	return false; //  WebKit fix to prevent default return on form submit jQuery
});


/**
* @function submit search
*/
$('#request-search').on('submit', function(event) {
	
	$('#request-uri input').val('');
	var search = $('#request-search input').val();	
	if(search != '') {
		var sent = { 	
			'search': search 
		};	
		make_request(sent);
	}
	return false; //  WebKit fix to prevent default return on form submit jQuery
});


/**
* @function make request
*/
function make_request(sent) {
	
	$('#response').html(loading);
	$.ajax({
      	type: 'GET',
      	url: 'php/ajax/api_request.php',
      	data: sent,
      	dataType: 'JSON',
      	success: function(response){     		
	      	if(response.status == 1) {	      		
	      		var code = JSON.stringify(response.data, undefined, 2);
	      		var html = Prism.highlight(code, Prism.languages.json);
		      	$('#response').html('<pre><code class="language-json">'+ html +'</code></pre>');
	      	}
	      	else {
	      		$('#response').empty();
	      		alert(response.data.error);
	      	} 
       	},
      	error: function(error){
      		$('#response').empty();
      		alert('Error');
      	}
    });		
}


