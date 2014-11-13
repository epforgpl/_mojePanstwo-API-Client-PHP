<?

namespace MP\Dane;

class Krakow_dzielnice_uchwaly extends DataObject
{
	
	protected $tiny_label = 'Uchwała';
	
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Uchwała rady dzielnicy ' . $this->getData('dzielnice.nazwa');
    }
	
	public function hasHighlights()
    {
        return false;
    }
    
    public function getUrl()
    {
	    return '/dane/gminy/903,krakow/dzielnice/' . $this->getData('dzielnica_id') . '/uchwaly/' . $this->getId();
    }
    
    public $force_hl_fields = true;

}