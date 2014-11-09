<?

namespace MP\Dane;

class Krakow_komisje_posiedzenia extends DocDataObject
{
	
	protected $tiny_label = 'Samorząd';
	
	protected $schema = array(
		array('krakow_komisje.nazwa', '', 'string', array(
			'link' => array(
				'dataset' => 'krakow_komisje',
				'object_id' => '$krakow_komisje.id',
			),
		)),
	);
   
    protected $hl_fields = array(
    	'krakow_komisje.nazwa'
    );
        
    protected $routes = array(
        'title' => 'data',
        'shortTitle' => 'data',
        'date' => 'data',
    );

    public function getLabel()
    {
        return 'Druk w pracach rady gminy <a href="/dane/gminy/903">Kraków</a>';
    }
    
    public function getShortTitle() {
	    
	    return 'Posiedzenie ' . $this->dataSlownie( $this->getData('data') );
	    
    }
    
    public function getTitle() {
	    
	    return 'Posiedzenie ' . $this->dataSlownie( $this->getData('data') );
	    
    }
    
    public function getUrl()
    {
	    return '/dane/gminy/903/komisje_posiedzenia/' . $this->getId();
    }

}