<?

namespace MP;


class Dane extends Application
{

    private $lastSearchResponse = array();

    protected $requests_prefix = '/dane/';


    // DATACHANNELS
    public function getDatachannels($options = array())
    {
    	
    	if( $options===true )
    		$options = array(
    			'includeContent' => true,
    		);
    	
        $ret = $this->request('datachannels/index', $options);
        
        if( isset($ret['datachannels']) && !empty($ret['datachannels']) )
	        foreach( $ret['datachannels'] as &$datachannel )
	        	if( isset($datachannel['dataobjects']) && !empty($datachannel['dataobjects']) )
		        	foreach( $datachannel['dataobjects'] as &$object )
		        		$object = $this->interpretateObject( $object );
		        	        
        return $ret['datachannels'];
    }
	
	public function feed($params)
    {
	    	    	    
	    if(
		    isset($params['dataset']) && 
		    $params['dataset'] && 
		    isset($params['id']) && 
		    $params['id'] 
		) {
			
			$direction = 'desc';
			if(
				isset($params['direction']) && 
				( $params['direction'] == 'asc' )
			)
				$direction = 'asc';
				
				
			$perPage = 20;
			if( isset($params['perPage']) && $params['perPage'] )
				$perPage = $params['perPage'];
				
			$page = 1;
			if( isset($params['page']) && $params['page'] )
				$page = $params['page'];
			
			$query = array(
				'direction' => $direction,
				'perPage' => $perPage,
				'page' => $page,
			);
			
			if( isset($params['channel']) && $params['channel'] )
				$query['channel'] = $params['channel'];
			
			$this->lastSearchResponse = $this->request($params['dataset'] . '/' . $params['id'] . '/feed', $query);
	        return isset($this->lastSearchResponse['search']) ? $this->lastSearchResponse['search'] : false;
			
		} else {
			throw new Excpetion('Feed: missing params');
		}
	    
        return $this->request('datasets/index');
    }
		

    // DATASETS
    public function getDatasets()
    {
        return $this->request('datasets/index');
    }

    public function getDataset($alias, $params = array())
    {
        if ($alias) {
            $ret = @$this->request('dataset/' . $alias, $params);            
            return $ret['dataset'];
        } else {
            return false;
        }
    }

    public function getDatasetFields($alias)
    {
        if ($alias) {
            $ret = @$this->request('dataset/' . $alias . '/fields');
            return $ret['fields'];
        } else {
            return false;
        }
    }

    public function getDatasetFilters($alias, $params = array())
    {
        if ($alias) {
            $ret = @$this->request('dataset/' . $alias . '/filters', $params, 'POST');
            return $ret['filters'];
        } else {
            return false;
        }
    }

    public function getDatasetSortings($alias)
    {
        if ($alias) {
            $ret = @$this->request('dataset/' . $alias . '/sortings');
            return $ret['sortings'];
        } else {
            return false;
        }

    }

    public function getDatasetSwitchers($alias)
    {
        if ($alias) {
            $ret = @$this->request('dataset/' . $alias . '/switchers');
            return $ret['switchers'];
        } else {
            return false;
        }

    }
    
    public function getDatasetMap($alias, $page)
    {
        if ($alias && $page) {
            $ret = @$this->request('dataset/' . $alias . '/map', array(
            	'page' => $page,
            ));
            return $ret['map'];
        } else {
            return false;
        }

    }
    

    public function getDatachannel($alias, $params = array())
    {
        if ($alias) {
            $ret = @$this->request('datachannel/' . $alias, $params);
            return $ret['datachannel'];
        } else {
            return false;
        }
    }

	
	public function suggest( $params = array() ) {
		
		$output = array();
		$data = $this->request('dataobjects/suggest', $params);
				
        if (isset($data['objects']['dataobjects'])) 
            foreach ($data['objects']['dataobjects'] as $object) 
                $output[] = $this->interpretateObject($object);
				
        return $output;
		
	}
	
    // SEARCH
    public function search($queryData = array())
    {
        $this->lastSearchResponse = $this->request('search', $queryData);
        return isset($this->lastSearchResponse['search']) ? $this->lastSearchResponse['search'] : false;
    }

    public function searchDatachannel($channel, $queryData = array())
    {
        $this->lastSearchResponse = $this->request('datachannel/' . $channel . '/search', $queryData);
        return isset($this->lastSearchResponse['search']) ? $this->lastSearchResponse['search'] : false;
    }

    public function searchDataset($alias, $queryData = array())
    {
        $this->lastSearchResponse = $this->request('dataset/' . $alias . '/search', $queryData);
        return isset($this->lastSearchResponse['search']) ? $this->lastSearchResponse['search'] : false;
    }

    public function getObject($dataset, $id, $params = array())
    {
		
		$response = $this->request($dataset . '/' . $id, $params);
		
		if( $response && isset($response['object']) && !empty($response['object']) ) {
			
			return $this->interpretateObject( $response['object']);
		
		} else throw new Exception('Object not found', $response);
		
        return false;

    }

    public function interpretateObject($object)
    {

        $classname = ucfirst($object['dataset']);
        $path = dirname(__FILE__);
        if (file_exists($path . '/Dane/classes/' . $classname . '.php')) {
            require_once($path . '/Dane/classes/' . $classname . '.php');
            if (!class_exists('MP\\Dane\\' . $classname)) {
                $classname = 'DataObject';
            }
        } else {
            $classname = 'DataObject';
        }
        $classname = 'MP\\Dane\\' . $classname;
        $obj = new $classname($object);

        if( isset($object['hl_text']) && $object['hl_text'] )
	        $obj->hl = $object['hl_text'];

        if( isset($object['layers']) && is_array($object['layers']))
            foreach($object['layers'] as $name => $data )
                if ($data !== null)
                    $obj->layers[$name] = $data;
                    
        if( isset($object['contexts']) && is_array($object['contexts']))
		    $obj->contexts = $object['contexts'];
                
        $obj->interpretateRelated();
        
        return $obj;
    }
	
    public function getObjects()
    {

        $output = array();

        if (isset($this->lastSearchResponse['search']['dataobjects']))
            foreach ($this->lastSearchResponse['search']['dataobjects'] as $object)
                $output[] = $this->interpretateObject($object);

        return $output;
    }

    public function getPagination()
    {
        return @$this->lastSearchResponse['search']['pagination'];
    }

    public function getFacets()
    {
        return @$this->lastSearchResponse['search']['facets'];
    }
    
    public function getDidyoumean()
    {
        return @$this->lastSearchResponse['search']['didyoumean'];
    }


    /*
        public function fields($base_alias) {
            return $this->request('fields/index/'.$base_alias);
        }

        public function layers($base_alias) {
            return $this->request('layers/index/'.$base_alias);
        }
    */

//    public function

}