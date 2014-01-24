<?

namespace MP\Dane;

class Wojewodztwa extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        return 'Województwo';
    }

}