<?

namespace MP\Dane;

class Dzielnice extends DataObject
{
	
	protected $schema = array(
		array('gminy.nazwa', 'Gmina', 'string', array(
			'link' => array(
				'dataset' => 'gminy',
				'object_id' => '$gminy.id',
			),
		)),
	);
    
    protected $hl_fields = array(
    	'gminy.nazwa'
    );
    
    
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );	
		
	public function hasHighlights()
    {
        return false;
    }
}