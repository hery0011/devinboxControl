$(document).ready(function()
{
	$(".resp").dblclick(function (){
		//alert($(this).childNodes);
		let valeur = $(".resp").html();
		let textarea = document.createElement("textarea");
		textarea.name = "responsable";
		textarea.id = "textresp";
		$(this).append(textarea);
		textarea.setAttribute("value", valeur);

		$("#textresp").blur(function(){
			let valeur = $(this).val();
			var myid = $(this).parent().attr("data-id");
			
			$(this).parent().html(valeur);


			$.post("updatePresentiel.php",
 			 {
  				  id: myid,
   				  responsable: $(this).val(),
  			},
  			function(data, status){
   				// alert("Data: " + data + "\nStatus: " + status);
 			 });
			$(this).remove();
		});
	});
})


/*pour notes*/
$(document).ready(function()
{
	$(".notes").dblclick(function (){
		//alert($(this).childNodes);
		let valeur = $(".notes").html();
		let textarea = document.createElement("textarea");
		textarea.name = "notes";
		textarea.id = "textnotes";
		$(this).append(textarea);
		textarea.setAttribute("value", valeur);

		$("#textnotes").blur(function(){
			let valeur = $(this).val();
			let myid = $(this).parent().attr("data-id");
			
			$(this).parent().html(valeur);


			$.post("updatePresentiel.php",
 			 {
  				  id: myid,
   				  notes: $(this).val(),
  			},
  			function(data, status){
   				// alert("Data: " + data + "\nStatus: " + status);
 			 });
			$(this).remove();
		});
	});
})


/*pour status*/
$(document).ready(function(){
	$(".statusCheck").click(function(){
		let value = $(this).attr("checked");
		let valeur = "";
		let myid = $(this).parent().parent().attr("data-id");
		if (value==undefined) {
			$(this).attr("checked", true);
			valeur = "oui";

			$.post("updatePresentiel.php",
 			 {
  				  id: myid,
   				  status: valeur,
  			},
  			function(data, status){
   				//alert("Data: " + data + "\nStatus: " + status);
 			 });
			
		}
		else
		{
			//alert("eny");
			$(this).attr("checked", false);
			valeur = "non";
		
			$.post("updatePresentiel.php",
 			 {
  				  id: myid,
   				  status: valeur,
  			},
  			function(data, status){
   				//alert("Data: " + data + "\nStatus: " + status);
 			 });
		}
		
	})
})


/*pour attestation*/
$(document).ready(function(){
	$(".checkedAttestation").click(function(){
		let value = $(this).attr("checked");
		let valeur = "";
		let myid = $(this).parent().parent().attr("data-id");
		
		if (value==undefined) {
			$(this).attr("checked", true);
			valeur = "oui";
			$(this).parent().parent().parent().remove();

			$.post("updatePresentiel.php",
 			 {
  				  id: myid,
   				  attestation: valeur,
  			},
  			function(data, status){
   				//alert("Data: " + data + "\nStatus: " + status);
 			 });
			
		}
		else
		{
			//alert("eny");
			$(this).attr("checked", false);
			valeur = "non";
		
			$.post("updatePresentiel.php",
 			 {
  				  id: myid,
   				  attestation: valeur,
  			},
  			function(data, status){
   				//alert("Data: " + data + "\nStatus: " + status);
 			 });
		}
		
	})
})