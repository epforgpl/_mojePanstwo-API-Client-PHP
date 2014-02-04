<?

namespace MP\Dane;

class Kolej_stacje extends DataObject
{

    protected $routes = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Stacja kolejowa';
    }

}