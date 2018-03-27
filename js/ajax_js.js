function trimiteemail(divul, nume, ml, telefon, mesaj)
{
	document.getElementById(divul).innerHTML = '<div align="center"><img src="js/loaderB64.gif" border="0" style="padding: 12px;" /></div>';
	$.ajax({
	      type: "POST", url: "site/ajax_email.php", 
	      data: "nume="+nume, 
	    success: function(){
		      $("#" + divul).load("site/ajax_email.php", { 'nume': nume, 'ml': ml,'telefon': telefon, 'mesaj': mesaj } );
		     }
	});
}



function trimiteProgramarea(divul)
{
	//divul, nume, ml, telefon, mesaj
	//declar variabilele pentru asta
	var nume = '';
	nume = $("#apo_name").val();
	var ml = $("#apo_email").val();
	var telefon = $("#apo_phone").val();
	var datar = $("#apo_date").val();
	var mesaj = $("#mesaj").val();
	
	document.getElementById(divul).innerHTML = '<div align="center"><img src="js/loaderB64.gif" border="0" style="padding: 12px;" /></div>';
	
	$.ajax({
		type: "POST",  url: "site/ajax_email.php", 
	        data: "nume="+nume+"&ml="+ml+"", 
		success: function(){
		      $("#" + divul).load("site/ajax_email.php", { 'nume': nume, 'ml': ml,'telefon': telefon, 'mesaj': mesaj , 'datar': datar } );
		}
	});
}

function salveazaCol(c, idPagina) {
	//code
	var divul = "home_col"+c;
	var txtul = $("#"+divul).html();
	
	//alert(txtul);
	document.getElementById(divul).innerHTML = '<div align="center"><img src="js/loaderB64.gif" border="0" style="padding: 12px;" /></div>';
	$.ajax({
		type: "POST",  url: "ajax.php?p=ajax_home", 
	        data: "actiune="+"modifica"+"&txtul="+txtul+"&idPagina="+idPagina, 
		success: function(){
		      $("#" + divul).load("ajax.php?p=ajax_home", { 'actiune': 'afiseaza', 'idPagina': idPagina } );
		}
	});	
}

function salveazaContent(div, idPagina) {
	//code
	var divul = div;
	var txtul = $("#"+divul).html();
	
	//alert(txtul);
	document.getElementById(divul).innerHTML = '<div align="center"><img src="js/loaderB64.gif" border="0" style="padding: 12px;" /></div>';
	$.ajax({
		type: "POST",  url: "ajax.php?p=ajax_home", 
	        data: "actiune="+"modifica"+"&txtul="+txtul+"&idPagina="+idPagina, 
		success: function(){
		      $("#" + divul).load("ajax.php?p=ajax_home", { 'actiune': 'afiseaza', 'idPagina': idPagina } );
		}
	});	
}

