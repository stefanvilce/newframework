


<?//=Home::text()?>

<?php
 //pregatesc elementele din pagina
 /*
 $pagini = new ClasePagini();
 $pagina = $pagini->pagina(95);
 $cCol1 = $pagini->content; 
 $pagina_ = $pagini->pagina(96);
 $cCol2 = $pagini->content;
 $pagina_ = $pagini->pagina(97);
 $cCol3 = $pagini->content;
 $pagina_ = $pagini->pagina(98);
 $cColImportant = $pagini->content;
 //
 $pagini->inchideConexiune();*/


$view = new Template();
$view->title="Hello World app";
//$view->properties['name'] = "Jude";
echo $view->render('TEMPLATE_HOMEPAGE.htm');       
      