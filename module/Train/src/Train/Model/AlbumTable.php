<?php 

namespace Train\Model;

use Zend\Db\TableGateway\TableGatewayInterface;

/**
 * summary
 */
class AlbumTable 
{
    /**
     * summary
     */
    
    protected $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll()
    {
    	return $this->tableGateway->select();
    }
}

 ?>