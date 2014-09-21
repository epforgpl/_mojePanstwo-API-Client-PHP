<?

namespace MP\Dane;

class Instytucje extends DataObject
{

    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Instytucja publiczna';
    }
	
	public function hasHighlights()
    {
        return false;
    }
}