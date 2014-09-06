<?

namespace MP\Dane;

class Powiaty extends DataObject
{

    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Powiat';
    }
    
    public function hasHighlights()
    {
        return false;
    }

}