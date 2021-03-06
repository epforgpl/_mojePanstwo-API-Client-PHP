<?

namespace MP\Dane;

class DataObject extends \MP\API
{

    protected $constants = array(
        'url_protocol' => URL_PROTOCOL,
        'url_host' => URL_HOST,
    );
	
	protected $schema = array();
    protected $_routes = array(
        'date' => 'data',
        'title' => 'title',
        'shortTitle' => 'title',
        'description' => 'opis',
        'label' => 'label',
        'titleAddon' => false,
        'position' => false,
    );
    
    protected $routes = array();
	protected $hl_fields = array();
	protected $tiny_label = '';
    public $force_hl_fields = false;
    
    public $data;
    public $static;
    public $layers = array();
    public $contexts = array();
    public $id;
    public $dataset;
    public $object_id;
    public $global_id;
    public $slug;
    public $hl = null;
    

    public function __construct($params = array())
    {

        $this->data = $params['data'];
        $this->dataset = $params['dataset'];
        $this->id = $params['id'];
        $this->object_id = $params['global_id'];
        $this->global_id = $params['global_id'];
        $this->slug = $params['slug'];
		
		if (isset($params['static']))
            $this->static = $params['static'];
		
        if (isset($params['score']))
            $this->layers['score'] = $params['score'];

        if (isset($params['hl'])) {
            $this->hl = $params['hl'];
        }
        
        $temp = array();
        foreach( $this->data as $key => $val ) {
        
        	$p = strpos($key, $this->dataset.'.');
        
        	if( $p===0 )
        		$temp[] = substr($key, strlen($this->dataset)+1);
        		
        }
        
        foreach( $temp as $t )
        	$this->data[ $t ] = $this->data[ $this->dataset . '.' . $t ];
        
        $this->routes = array_merge($this->_routes, $this->routes);

    }

    public function loadLayer($layer, $params = array())
    {
        $this->layers[$layer] = $this->request('dane/dataset/' . $this->getDataset() . '/' . $this->getId() . '/layers/' . $layer, $params, 'POST');
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
    
    public function interpretateRelated()
    {

        if( $data = $this->getLayer('related') )
	        if (!empty($data['groups']))
	            foreach ($data['groups'] as &$group)
	                foreach ($group['objects'] as &$object)
	                    $object = \MP\Dane::interpretateObject($object);

        $this->layers['related'] = $data;

    }

    public function hasRelated()
    {
        return @!empty($this->layers['related']['groups']);
    }
    
    public function getRelatedGroup($id)
    {
	    if( $this->hasRelated() )
	    {
		    
		    foreach( $this->layers['related']['groups'] as $group )
			    if( $group['id'] == $id )
			    	return $group;
			    	
	    } else return false;
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
    
    public function getStatic($field = '*')
    {
	    if( isset($this->static) && !empty($this->static) )
	        return $field == '*' ? $this->static : @$this->static[$field];
	    else
	    	return false;
    }

    public function getId()
    {
        return $this->getData('id');
    }
    
    public function getGlobalId()
    {
        return $this->global_id;
    }

    public function getDate()
    {
        return @substr($this->getData($this->routes['date']), 0, 10);
    }

    public function getTime()
    {
        return @$this->getData($this->routes['time']);
    }
    
    public function getSlug()
    {
        return $this->slug;
    }

    public function getTitle()
    {
        return $this->getData($this->routes['title']);
    }

    public function getShortTitle()
    {
        return $this->getData($this->routes['shortTitle']);
    }

    public function getDescription()
    {
        return $this->getData($this->routes['description']);
    }
    
    public function getPosition()
    {
	    return $this->getData($this->routes['position']);
    }
    
    public function getTitleAddon()
    {
        return $this->getData($this->routes['titleAddon']);
    }

    public function getLabel()
    {
        return $this->getData($this->routes['label']);
    }
    
    public function getShortLabel()
    {
        return $this->getData($this->routes['label']);
    }
    
    public function getFullLabel()
    {
        return $this->getLabel();
    }

    public function getHlText()
    {
        return str_replace("\r", "<br/>", $this->hl);
    }

    public function getUrl($options = array())
    {
    	/*
        $output = $this->constants['url_protocol'] .
            $this->constants['url_host'];

        if (defined('URL_PORT'))
            $output .= ':' . URL_PORT;
		*/
        $output = '/dane/' .
            $this->getDataset() . '/' .
            $this->getId();
            
        if( $slug = $this->getSlug() )
        	$output .= ',' . $slug;

        return $output;

    }
    
    public function getSentence() {
	    
	    return @$this->contexts[0]['sentence'];
	    
    }
    
    public function getAction() {
	    
	    return @$this->contexts[0]['action'];
	    
    }
    
    public function getCreator($field = '*') {
	    
	    $creator = @$this->contexts[0]['creator'];
	    
	    if( $field=='*' )
	    	return $creator;
	    else
	    	return @$creator[ $field ];
	    	    
    }

    public function getThumbnailUrl($size = 'default')
    {
        return false;
    }

    public function hasHighlights()
    {
        return true;
    }
    
    public function forceHighlightsFields()
    {
	    return false;
    }
    
    public function getHighlightsFields()
    {
	    return array();
    }
    
    public function getTinyLabel() {
	    return $this->tiny_label;
    }
	
	public function getSchemaForFieldname( $fieldname )
	{
		$output = false;
		
		if( $fieldname && !empty($this->schema) )
		{
			foreach( $this->schema as $s )
			{
				if( $s[0] == $fieldname )
				{
					$output = $s;
					break;
				}
			}
		}
		
		return $output;
	}
	
	public function getHiglightedFields( $fields = false, $fieldsPush = false )
	{
		$output = array();
		
		if( is_array($fieldsPush) )
			$fieldsPush = $fieldsPush[0];
		
		$fields = ($fields===false) ? $this->hl_fields : $fields;
		if(
			$fieldsPush && 
			!in_array($fieldsPush, $fields) && 
			( $schema = $this->getSchemaForFieldname( $fieldsPush ) ) && 
			!( isset($schema[3]) && isset($schema[3]['noHl']) && $schema[3]['noHl'] )
		)
			array_unshift($fields, $fieldsPush);

		
		if( !empty($fields) )
			foreach( $fields as $fieldname )
				if( $schema = $this->getSchemaForFieldname( $fieldname ) )
					$output[ $fieldname ] = array(
						'label' => $schema[1],
						'type' => isset($schema[2]) ? $schema[2] : 'string',
						'value' => $this->getData($fieldname),
						'options' => isset($schema[3]) ? $schema[3] : 'string',
					);

		return $output;
	}
	
	public function addRoutes( $routes = array() )
	{
		$this->routes = array_merge($this->routes, $routes);
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