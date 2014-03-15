<?

namespace MP\Dane;

class Miejscowosci extends DataObject
{
	
	protected $schema = array(
		array('gminy.nazwa', 'Gmina', 'string', array(
			'link' => array(
				'dataset' => 'gminy',
				'object_id' => '$gminy.id',
			),
		)),
	);
	
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );
    
    protected $hl_fields = array(
    	'gminy.nazwa'
    );

    public function getLabel()
    {
        return 'Miejscowość';
    }
    
    public function hasHighlights()
    {
        return false;
    }

}