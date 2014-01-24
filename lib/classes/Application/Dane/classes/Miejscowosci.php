<?

namespace MP\Dane;

class Miejscowosci extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Miejscowość';
    }

}