<?

namespace MP\Dane;

class Krakow_urzednicy extends DataObject
{
	
	protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );
	
    public function getLabel()
    {
        return '<strong>Urzędnik</strong> miasta Kraków';
    }
    
    public function getUrl()
    {
	    return '/dane/gminy/903/oswiadczenia?urzednik_id=' . $this->getId();
    }

}