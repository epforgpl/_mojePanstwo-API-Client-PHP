<?

namespace MP\Dane;

class Sejm_posiedzenia extends DocDataObject
{

    protected $routes = array(
        'shortTitle' => 'numer',
        'date' => 'data_start',
        'label' => 'label'
    );
	
	protected $schema = array(
		array('data_start', ''),
	);

	
    public function getLabel()
    {
        return 'Posiedzenie Sejmu';
    }

    public function getTitle()
    {
    	if( $this->getData('numer') )
	        return 'Posiedzenie Sejmu nr ' . $this->getData('numer');
	    else
	    	return $this->getData('tytul');
    }
    
    public function getShortTitle()
    {
        return $this->getTitle();
    }
    
    public function hasHighlights()
    {
        return false;
    }

}