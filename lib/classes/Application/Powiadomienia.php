<?

namespace MP;

class Powiadomienia extends Application
{

    protected $requests_prefix = '/powiadomienia/';
	private $lastSearchResponse = array();
	
    public function getPhrases()
    {
        $ret = @$this->request('phrases');
        return $ret['phrases'];
    }

    public function addPhrase($phrase)
    {
        return $this->request('phrases', $phrase, 'POST');
    }

    public function removePhrase($phrase_id)
    {
        return $this->request('phrases/' . $phrase_id, array(), 'DELETE');
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

    public function flagObjects($conditions, $flag)
    {
        return $this->request('objects/flag', array(
            'conditions' => $conditions,
            'flag' => $flag,
        ), 'POST');

    }

}