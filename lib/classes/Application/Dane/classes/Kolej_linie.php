<?

namespace MP\Dane;

class Kolej_linie extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Linia kolejowa';
    }

}