define([], function(){
	var runJs = function(config,node)
	{
		alert("you are using myjs.js");
		console.log(config.a);
		console.log(config.b);
		console.log(jQuery(node).text());

	}
	
	return runJs;
}); 