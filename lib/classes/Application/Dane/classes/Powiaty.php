<?

namespace MP\Dane;

class Powiaty extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Powiat';
    }

}