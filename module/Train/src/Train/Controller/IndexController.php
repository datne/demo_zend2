<?php 

namespace Train\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use MongoDB\Driver\Manager;
use MongoDB\Driver\Query;
use MongoDB\Driver\BulkWrite;
use Album\Model\Album;          
use Album\Form\AlbumForm;
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
        //mongo

        $manager = new Manager("mongodb://localhost:27017");

        $bulk = new BulkWrite();
        /*insert data to collection*/
        // $document1 = ['title' => 'attention','artist' => 'abc'];
        // $document2 = ['title' => 'low','artist' => 'abc 2'];
        // $document3 = ['title' => 'despacito','artist' => 'abc 3'];
        // $bulk->insert($document1);
        // $bulk->insert($document2);
        // $bulk->insert($document3);
        // $manager->executeBulkWrite('test.album', $bulk);

        /*update data in collection*/
        /*$bulk->update(
            ['title' => 'low'],
            ['$set' => [
                'year' => '12345',
            ]],
            ['multi' => false, 'upsert' => false]);
            $manager->executeBulkWrite('test.album', $bulk);*/

            $query = new Query([], []);

            $rows = $manager->executeQuery('test.album', $query);

        //mysql
            $albums = $this->table->fetchAll();
            return new ViewModel(array(
             'albums' => $albums,
             'testMongo' => $rows
         ));
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


        public function addAction()
        {
           $form = new AlbumForm();
           $form->get('submit')->setValue('Add');

           $request = $this->getRequest();
           if ($request->isPost()) {
               $album = new Album();
               $form->setInputFilter($album->getInputFilter());
               $form->setData($request->getPost());

               if ($form->isValid()) {
                   $album->exchangeArray($form->getData());
                   $this->getAlbumTable()->saveAlbum($album);

                 // Redirect to list of albums
                   return $this->redirect()->toRoute('album');
               }
           }
           return array('form' => $form);
       }
   }
   ?>