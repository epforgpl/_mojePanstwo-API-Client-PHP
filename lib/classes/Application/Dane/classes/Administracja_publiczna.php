<?

namespace MP\Dane;

class Administracja_publiczna extends DataObject
{

    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Administracja publiczna';
    }
	
	public function hasHighlights()
    {
        return false;
    }
}