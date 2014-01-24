<?

namespace MP\Dane;

class DataObject extends \MP\API
{

    protected $constants = array(
        'url_protocol' => URL_PROTOCOL,
        'url_host' => URL_HOST,
    );

    protected $fields_routes = array(
        'date' => 'data',
        'title' => 'title',
        'shortTitle' => 'title',
        'description' => 'opis',
        'label' => 'label',
    );
    protected $_fields = array();

    public $data;
    public $layers = array();
    public $id;
    public $dataset;
    public $object_id;
    public $hl = null;

    public function __construct($params = array())
    {

        $this->data = $params['data'];
        $this->dataset = $params['dataset'];
        $this->id = $params['id'];
        $this->object_id = $params['object_id'];

        if (isset($params['score']))
            $this->layers['score'] = $params['score'];

        if (isset($params['hl'])) {
            $this->hl = $params['hl'];
        }

        if (!empty($this->_fields))
            $this->fields_routes = array_merge($this->fields_routes, $this->_fields);

    }

    public function loadLayer($layer, $params = array())
    {
        $this->layers[$layer] = $this->request('dane/dataset/' . $this->dataset . '/' . $this->object_id . '/layers/' . $layer, $params, 'POST');
        return $this->getLayer($layer);

    }

    public function getLayer($layer)
    {

        return array_key_exists($layer, $this->layers) ? $this->layers[$layer] : false;

    }

    public function getScore()
    {
        if ($score = $this->getLayer('score'))
            return (float)@$score['value'];
        return 0;
    }

    public function loadRelated($params = array())
    {

        $data = $this->loadLayer('related', $params);
        if (!empty($data['groups']))
            foreach ($data['groups'] as &$group)
                foreach ($group['objects'] as &$object)
                    $object = \MP\Dane::interpretateObject($object);

        $this->layers['related'] = $data;
        return $this->getLayer('related');

    }

    public function hasRelated()
    {
        return @!empty($this->layers['related']['groups']);
    }

    public function getObject()
    {
        return array(
            'id' => $this->id,
            'dataset' => $this->dataset,
            'layers' => $this->layers,
            'data' => $this->data,
            'object_id' => $this->object_id,
        );
    }

    public function getData($field = '*')
    {
        return $field == '*' ? $this->data : @$this->data[$field];
    }

    public function getId()
    {
        return $this->getData('id');
    }

    public function getDate()
    {
        return @substr($this->getData($this->fields_routes['date']), 0, 10);
    }

    public function getTime()
    {
        return @$this->getData($this->fields_routes['time']);
    }

    public function getTitle()
    {
        return $this->getData($this->fields_routes['title']);
    }

    public function getShortTitle()
    {
        return $this->getData($this->fields_routes['shortTitle']);
    }

    public function getDescription()
    {
        return $this->getData($this->fields_routes['description']);
    }

    public function getLabel()
    {
        return $this->getData($this->fields_routes['label']);
    }

    public function getHlText()
    {
        return $this->hl;
    }

    public function getUrl($options = array())
    {
        $output = $this->constants['url_protocol'] .
            $this->constants['url_host'];

        if (defined('URL_PORT'))
            $output .= ':' . URL_PORT;

        $output .= '/dane/' .
            $this->getDataset() . '/' .
            $this->getId();

        return $output;

    }

    public function getThumbnailUrl($size = 'default')
    {
        return false;
    }

    public function hasHighlights()
    {
        return true;
    }

    public function __call($func, $arg)
    {
        $func = str_replace('get', '', $func);
        $func = lcfirst($func);
        if (!empty($arg)) {
            $arg = array_pop($arg);
            return (isset($this->{$func}[$arg])) ? $this->{$func}[$arg] : false;
        }
        return $this->$func;
    }

}