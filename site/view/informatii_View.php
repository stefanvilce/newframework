<div class="main">
		<div class="about-top">
			 <div class="cont1 span_2_of_a about_desc">
				       <h2><?=trans('Informatii pentru pacient')?></h2>
					<h4> &nbsp;  </h4>
		    			   
					   
                                           
                                           <div id="informatii" contenteditable="true">
                                            <?=$informatii->continut?>
                                           </div>
                                           <div id="salveaza_desprenoi" style="display: block;"><button onclick="salveazaContent('informatii',101);">Salveaza</button></div>
					   
					   
					   
					   
				      </div>	
				<div class="lsidebar1 span_1_of_a offers_list">
				     <div class="appointment">
						
					     <?=formularRezervare()?>
					     
					</div><!-- appointment -->
					<div class="clear"></div> 
		   		</div>
				<div class="clear"></div> 
			
	</div>