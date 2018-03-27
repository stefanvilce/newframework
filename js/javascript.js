/*
    Aici sunt functiile javascript obisnuite
    Deocamdata, nimik
*/


function Bla(){
	return "Acesta este textul care vreau sa fie returnat!";
}


function trimiteProgramarea2() {
    
    
    var apo_name = document.getElementById('apo_name').value;
    var apo_phone = document.getElementById('apo_phone').value;
    var apo_email = document.getElementById('apo_email').value;
    var apo_date = document.getElementById('apo_date').value;
    var mesaj = document.getElementById('mesaj').value;
    
    
    var test = 1;
    
    if (apo_date.length < 3) {
        test = 0; // ia valoarea 0 si astfel nu mergem mai departe
    }
    
    if (apo_phone.length < 7 && apo_email.length < 6) {
        test = 0; // ia valoarea 0 si astfel nu mergem mai departe
    }
/*    
    if (test == 0) {
        alert("Nu am putut merge mai departe! " + apo_name + " siii \r\n" + apo_phone);
    } else {
        alert("Uraaaa! Gata!");
    }
    
  */  
    document.getElementById("divul").innerHTML = '<div align="center"><img src="js/loaderB64.gif" border="0" style="padding: 12px;" /></div>';
	$.ajax({
	      type: "POST", url: "site/ajax_email.php", 
	      data: "nume="+apo_name, 
	    success: function(){
		      $("#" + "divul").load("site/ajax_email.php", { 'nume': apo_nume, 'apo_phone': apo_phone } );
		     }
	});
}