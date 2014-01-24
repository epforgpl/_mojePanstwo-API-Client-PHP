<?

namespace MP\Dane;

class Krs_podmioty extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa_skrocona',
        'date' => 'data_rejestracji',
    );

    public function getLabel()
    {
        return _ucfirst($this->getData('forma_prawna_str'));
    }

}