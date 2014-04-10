<?

namespace MP;

class Powiadomienia extends Application
{

    protected $requests_prefix = '/powiadomienia/';
	private $lastSearchResponse = array();
	
	
	// PHRASES
	
    public function getPhrases()
    {
        $ret = @$this->request('phrases');
        return $ret['phrases'];
    }

    public function addPhrase($phrase)
    {	
        return $this->request('phrases', array(
        	'q' => $phrase
        ), 'POST');
    }

    public function removePhrase($phrase_id)
    {
        return $this->request('phrases/' . $phrase_id, array(), 'DELETE');
    }
    
    
    // GROUPS
    
    public function getGroups()
    {
        return @$this->request('groups');
    }

    public function addGroup($params)
    {	
        return $this->request('groups', array(
        	'params' => $params
        ), 'POST');
    }

    public function removeGroup($group_id)
    {
        return $this->request('groups/' . $group_id, array(), 'DELETE');
    }
    

    public function search($queryData = array())
    {
        if (!is_null($this->user_id)) {
            $this->lastSearchResponse = $this->request('objects', $queryData, 'POST');
            return $this->lastSearchResponse;
        } else {
            return false;
        }
    }
    
    public function _search($queryData = array())
    {
        if (!is_null($this->user_id)) {
            $this->lastSearchResponse = $this->request('_objects', $queryData, 'POST');
            return $this->lastSearchResponse;
        } else {
            return false;
        }
    }
    
    public function getObjects()
    {
    	$output = array();

        if (isset($this->lastSearchResponse['search']['objects']))
            foreach ($this->lastSearchResponse['search']['objects'] as $object)
            {
            	$obj = $this->interpretateObject($object);
                $output[] = $obj;
            }
			
        return $output;
    }
    
    public function getPagination()
    {
        return @$this->lastSearchResponse['search']['pagination'];
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
        
        return $obj;

    }
	
    public function flagObject($object_id)
    {
        return $this->request('objects/' . $object_id . '/flag');
    }

	public function _flagObject($object_id, $action)
    {
        return $this->request('_objects/' . $object_id . '/flag', array(
        	'action' => $action,
        ));
    }
    
    public function _flagGroup($group_id, $action)
    {
        return $this->request('groups/' . $group_id . '/flag', array(
        	'action' => $action,
        ));
    }
    
    public function _flagObjects($action)
    {
        return $this->request('_objects/flag', array(
        	'action' => $action,
        ));
    }
    
    public function getAlertsQueries($object_id)
    {
	    if( $object_id )
	    	return $this->request('alertsQueries/' . $object_id);
		return false;  
    }

}