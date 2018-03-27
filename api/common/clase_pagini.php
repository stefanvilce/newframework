<?php
/*************************************************************************
 *
 * 		@author... eu
 *              03.02.2012
 *              clasa asta foloseste la gestionarea paginilor din
 *              site
 *
 ***************************************************************************/

class PaginiSite {

		public $userul;
		
		public function scrieUser($us){
				$this->userul = $us;
		}
			

} //class PaginiSite



$paginiSite = new PaginiSite(); //instantierea clasei PaginiSite --