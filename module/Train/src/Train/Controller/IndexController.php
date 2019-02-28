<?php 

namespace Train\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

/**
 * summary
 */
class IndexController extends AbstractActionController
{

    protected $table;

    public function __construct($table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        $albums = $this->table->fetchAll();
        foreach ($albums as $album) {
            var_dump($album);
        }
        exit; 
    	//disable view 	
    	//method 1 : //return false;
    	//method 2	: //return '';
    	
    	//disable layout   	
    	//$viewModel = new ViewModel();
    	//$viewModel->setTerminal(true);
    	//return $viewModel;
    	
    	//disalbe layout and view
    	//var_dump(__METHOD__);
    	//$resp = $this->getResponse();
    	//return $resp;

    }
}

?>