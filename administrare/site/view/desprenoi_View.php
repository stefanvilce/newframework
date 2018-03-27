<div class="main">
		<div class="about-top">
			 <div class="cont1 span_2_of_a about_desc">
				       <h2><?=trans('About Us')?></h2>
					<h4> &nbsp; </h4>
		    			
					<img class="imgstg_desprenoi" src='../images/new/dinte_tooth.jpg' alt="<?=trans("Cabinet stomatologic, dentist")?>" />   
					   <div id="desprenoi" contenteditable="true">
                                            <?=$desprenoi->continut?>
                                           </div>
                                           <div id="salveaza_desprenoi" style="display: block;"><button onclick="salveazaContent('desprenoi',99);">Salveaza</button></div>
					   
					   
					   
				      </div>	
				<div class="lsidebar1 span_1_of_a offers_list">
				     <div class="appointment">
						
					     <?=formularRezervare()?>
					     
					</div><!-- appointment -->
					<div class="clear"></div> 
		   		</div>
				<div class="clear"></div> 
			
	</div>