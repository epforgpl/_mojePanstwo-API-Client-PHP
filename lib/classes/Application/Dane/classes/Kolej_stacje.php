<?

namespace MP\Dane;

class Kolej_stacje extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Stacja kolejowa';
    }

}