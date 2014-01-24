<?

namespace MP\Dane;

class Kody_pocztowe extends DataObject
{

    protected $_fields = array(
        'title' => 'kod',
        'shortTitle' => 'kod',
    );

    public function getLabel()
    {
        return 'Kod pocztowy';
    }

}