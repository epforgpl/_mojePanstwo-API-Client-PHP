<?

namespace MP\Dane;

class Wojewodztwa extends DataObject
{

    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Województwo';
    }
    
    public function hasHighlights()
    {
        return false;
    }

}