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
                $output[] = $this->interpretateObject($object);

        return $output;
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
        return new $classname($object);

    }
	
    public function markObject($object_id, $flag)
    {
        return $this->request('objects/' . $object_id . '/flag', $flag, 'POST');
    }

    public function markObjects($conditions, $flag)
    {
        return $this->request('objects/flag', array(
            'conditions' => $conditions,
            'flag' => $flag,
        ), 'POST');

    }

}