<?

namespace MP\Dane;

class Urzednicy extends DataObject
{
	
	protected $tiny_label = 'Urzędnicy';
	
    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Urzędnik';
    }
    
    public function hasHighlights()
    {
        return false;
    }

}