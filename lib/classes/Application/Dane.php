<?

namespace MP;


class Dane extends Application
{

    private $lastSearchResponse = array();

    protected $requests_prefix = '/dane/';


    // DATACHANNELS
    public function getDatachannels()
    {
        $ret = $this->request('datachannels/index');
        return $ret['datachannels'];
    }


    // DATASETS
    public function getDatasets()
    {
        return $this->request('datasets/index');
    }

    public function getDataset($alias)
    {
        if ($alias) {
            $ret = @$this->request('dataset/' . $alias);
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

    public function getDatachannel($alias)
    {
        if ($alias) {
            $ret = @$this->request('datachannel/' . $alias);
            return $ret['datachannel'];
        } else {
            return false;
        }
    }


    // SEARCH
    public function search($queryData = array())
    {
        $this->lastSearchResponse = $this->request('datasets/search', $queryData);
        return $this->lastSearchResponse;
    }

    public function searchDatachannel($channel, $queryData = array())
    {
        $this->lastSearchResponse = $this->request('datachannel/' . $channel . '/search', $queryData);
        return isset($this->lastSearchResponse['search']) ? $this->lastSearchResponse['search'] : false;
    }

    public function searchDataset($alias, $queryData = array())
    {
        $this->lastSearchResponse = $this->request('dataset/' . $alias . '/search', $queryData);
        return $this->lastSearchResponse['search'];
    }

    public function getObject($dataset, $id)
    {

        $object = $this->searchDataset($dataset, array(
            'conditions' => array(
                'object_id' => $id,
            ),
            'limit' => 1,
        ));

        if ($object['dataobjects'])
            return $this->interpretateObject($object['dataobjects'][0]);

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
        return new $classname($object);

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