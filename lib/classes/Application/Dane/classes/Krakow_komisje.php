<?

namespace MP\Dane;

class Krakow_komisje extends DataObject
{
	
	protected $tiny_label = 'Samorząd';
	
	protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );
	
    public function getLabel()
    {
        return '<strong>Komisja</strong> Rady Miasta Kraków';
    }
    
    public function getUrl()
    {
	    return '/dane/gminy/903/komisje/' . $this->getId();
    }

}