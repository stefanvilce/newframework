<?php
/************************************************************
 *
 *   Clasa pentru afisarea produselor
 *
 *
 ************************************************************/


class Products{
    
    
        
    function afisare($idProd, $camp){
        $idProd = (integer)$idProd;
        $sql = "SELECT products.*, products_descr.products_id, products_descr.title, products_descr.subtitle, products_descr.descriere
                    FROM products, products_descr
                    WHERE
                        products.id = products_descr.products_id
                        AND products.id=".$idProd."
                        AND products_descr.lang='".$_SESSION['lang']."'";
        //echo $sql."<br>";
        $rez = mysql_query($sql) OR die(mysql_error()."<br>".$sql);
        $nr = mysql_numrows($rez);
        if($nr == 0){
            return 0;
        } else {
            $rnd = mysql_fetch_array($rez);
            if(isset($camp)){
                $v = $rnd[$camp];
                return $v;
            } else {
                return $rnd;
            }
        }
    } //function afisare()
    
    
    
    /*****************************************************
     *  Scot prima imagine din acest spectacol
     *
     ****************************************************/
    function imagine($idProd){
        $idProd = (integer)$idProd;
        $sql = "SELECT * FROM products_img WHERE products_id=".$idProd." LIMIT 0,1";
        $rez = mysql_query($sql);
        $rnd = mysql_fetch_array($rez);
        
        $imaginea = $rnd['filename'];
        return $imaginea;
    } // function imagine()
    
    
    
    
    /*****************************************************
     *  Pagina unei CATEGORII
     *
     ****************************************************/
    function categorie($idCat){
        $idCat = (integer)$idCat;
        $sql = "SELECT * FROM products WHERE cat_id=".$idCat."";
        
        $rez = mysql_query($sql) OR die(mysql_error()."<br />".$sql);
       
        while($rnd = mysql_fetch_array($rez)){
            $id = $rnd['id'];
            
            $imagine = Products::imagine($id); 
            
            $titlu = stripslashes(Products::afisare($id, 'title'));
            $subtitlu = Products::afisare($id, 'subtitle');
            $subtitlu = nl2br($subtitlu);
            /*$subtl = explode("<br", $subtitlu);
            $subtitlu = strip_tags($subtl[0]);*/
            $subtitlu = substr(strip_tags($subtitlu), 0, 35);
	    if(strlen($subtitlu)<2) $subtitlu = " &nbsp; ";
            ?>
            <!-- caseta 1 -->
				<div class='caseta' onclick="document.location.href='?p=spectacol&id=<?=$id?>'">
					<div class='imagine'><img src='upload/produse/<?=$imagine?>' /></div>
					<h3><?=$titlu?></h3>
					<?=$subtitlu?>
					<a href='?p=spectacol&id=<?=$id?>' class='sageata'>Go</a>
				</div><!-- div.caseta -->
            <?php
        } //while
       
    } // function categorie()
    
    
    /**********************************************************************
     *	Pagina unui spectacol
     **********************************************************************/
    function spectacol($idSpec) {
	$id = (integer)$idSpec;
	$imagine = Products::imagine($id);
	$titlu = stripslashes(Products::afisare($id, 'title'));
	$subtitlu = stripslashes(Products::afisare($id, 'subtitle'));
        $subtitlu = nl2br($subtitlu);
	
	$continut = stripslashes(Products::afisare($id, 'descriere'));
	if(strlen($continut)>600){
	    $continut_mic = substr(strip_tags($continut), 0, 550);
	    $c = "<div id='cMic'>".$continut_mic." <br /> <br />
                                    <a href='javascript:arata(\"cMare\"); ascunde(\"cMic\");' class='mehr'>".trans('mehr')."</a> </div>";
	    $c .= "<div id='cMare' style='display: none; visibility: hidden;'>".$continut."</div>";
	} else {
	    $c = nl2br($continut);
	} //if $continut
	
	?>
			    <div class='prima-concert'><img src='upload/produse/<?=$imagine?>' class='prima-concert' /></div>
                                
                                <div class='concert-dreapta'>
                                    <h1 class='titlu'><?=$titlu?></h1>
                                    <h2 class='subtitlu'>
                                        <?=$subtitlu?>
                                    </h2>
                                    <?=$c?>
                            </div><!-- /.concert-dreapta -->
	<?php
	
    } //function spectacol()
    
    
    /************************************************************************
     *	Butonul din josul paginii unui spectacol
     ************************************************************************/
    function butonJos($idSpec){
	$id = (integer)$idSpec;
	$idCat = Products::afisare($id, 'cat_id');
	$numeCat = Products::afisare($id, 'cat_name');
	
	$sql = "";
	
	echo "<div class='butonJos'><a href='?p=cat&idCat=".$idCat."' class='back2list' title='Go to ... '>".trans($numeCat)."</a></div>";
    } //function butonJos()
    
    
    
    /************************************************************************
     *	Butonul din josul paginii unui spectacol
     ************************************************************************/
    function Photos($idSpec){
	$id = (integer)$idSpec;
	
        $sql = "SELECT * FROM products_img WHERE products_id=$id";
        $rez = mysql_query($sql);
        $nr = mysql_numrows($rez);
        if($nr == 0){
            $v = "";
        } else {
            $v = "";
            while($rnd = mysql_fetch_array($rez)){
                $imag = $rnd['filename'];
                $v .= "<div class='photo'><div><a href='upload/produse/".$imag."' rel='clrbox'><img src='upload/produse/mici/".$imag."' /></a></div></div>";
            }//while
        }
        return $v;
    } //function Photos()
    
    
    
     /************************************************************************
     *	Contact; afisarea datelor de contact
     ************************************************************************/
    function contact(){
	
            $sql = "SELECT * FROM contact WHERE lang='".$_SESSION['lang']."'";
            $rez = mysql_query($sql);
            $nr = mysql_numrows($rez);
            if($nr == 0){
                return  " ";
            } else {
                $rnd = mysql_fetch_array($rez);
                ?>
                    <h1><?=stripslashes($rnd['nume_companie'])?></h1>
                    <h2><?=stripslashes($rnd['manager'])?></h2>
                    <p class='adresa'>
                        <?=stripslashes(nl2br($rnd['adresa']))?><br />
                        Tel: <?=stripslashes($rnd['telefon_1'])?><br />
                        Fax: <?=stripslashes($rnd['fax'])?>
                    </p>
                    E-mail: <?=stripslashes($rnd['email'])?>
                <?php
            }
        
    } //function contact()
    
    function contactTrimite(){
        
        if(strlen($_POST['name'])<2 || strlen($_POST['email'])<4 || strlen($_POST['message'])<4){
            echo "Please complete all fields!";
            ?>
                                                 <!-- FORMULAR de CONTACT -->
                                                    <form name='contact' action='' method='post'>
                                                        <table border='0' class='formular'>
                                                            <tr>
                                                                <td width='48%'>
                                                                    <?=trans('Name')?>:<br />
                                                                    <input type='text' name='name' class='intxt' />
                                                                    <br />
                                                                    <?=trans('E-mail')?>:<br />
                                                                    <input type='text' name='email' class='intxt' />
                                                                    <br />
                                                                    <?=trans('Thema')?>:<br />
                                                                    <input type='text' name='subject' class='intxt' />
                                                                </td>
                                                                <td style="padding-left: 15px;">
                                                                    <?=trans('Nachricht')?>:<br />
                                                                    <textarea name='message'></textarea>
                                                                    <br />
                                                                    <div align='right'>
                                                                    <input type='submit' class='insbmt' value='<?=trans("Senden")?>' />
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                    <!-- END FORMULAR de CONTACT -->
            <?php
        } else {
        
                $headers = 'From: '.stripslashes($_POST['name']).' <'.$_POST['email'].'>'."\n";
                $subiect = stripslashes($_POST['subject']);
                $mesaj = stripslashes($_POST['message']);
                $maildest = "postbox@artsatge-management.de";
                
                $a = @mail($maildest, $subiect, $mesaj, $headers) or die(trans("The message was not sent!"));
                if($a){
                    echo trans("Thank You!");
                }
        }
    } //function
    
    
} //end class Products

$products = new Products();
?>