<?php
/************************************************************
 *
 *   Clasa care stabileste headerul etc.
 *
 *
 ************************************************************/


class Page{
    
    function Keywords($pagina){
        echo "Primare, primar, primarule, Mangalia, Constanta, politica, edil, hotz Radu Cristian";
    } //function
    
    function Title($pagina){
        echo "Primare, te toc&#259;m!";
    }
    
    function Description(){
        echo "Primarule, te tocam! Ai furat orasul si nu ai construit nimic.";
    }
    
    function CssJavascript(){
        echo "";
    }
    
    
    /***********************************************
     *  COLORBOX
     ***********************************************/
    function Colorboxul(){
        if($_GET['p'] == 'spectacol'){
            
            ?>
            <link media="screen" rel="stylesheet" href="css/colorbox.css" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
    
            <script src="js/colorbox/jquery.colorbox.js"></script>
            <script>
                    $(document).ready(function(){
                            //Examples of how to assign the ColorBox event to elements
                            $("a[rel='clrbox']").colorbox();
                            
                            //Example of preserving a JavaScript event for inline calls.
                            $("#click").click(function(){ 
                                    $('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
                                    return false;
                            });
                    });
            </script>
            <?php
            
        }
    } //function Colorboxul()
    
    
    
    
    
    
    /***********************************************
     *  Functia care alege meniul
     ***********************************************/
    function SelMeniu($p,$id){
        if($p == 'cat'){
            if($_GET['p'] == 'cat' && $_GET['idCat'] == $id){
                return " class='ales' ";
            }
            
            if($_GET['p'] == 'spectacol'){
                $idCat = Products::afisare($_GET['id'], 'cat_id');
                if($id == $idCat) {
                    return " class='ales' ";
                }
            }
        }
        
        if($p == 'kontakt'){
            if($_GET['p'] == 'kontakt'){
                return " class='ales' ";
            }
        }
        if($p == 'revue'){
            if($_GET['p'] == 'revue'){
                return " class='ales' ";
            }
        }
        
    } //function SelMeniu()
    
    
    
    
    
    
    
    
    
} //end class Page


?>