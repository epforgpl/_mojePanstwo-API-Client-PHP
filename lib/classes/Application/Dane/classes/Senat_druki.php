<?

namespace MP\Dane;

class Senat_druki extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data',
    );

    public function getLabel()
    {
        return '<strong>Druk senacki</strong> nr ' . $this->getData('numer');
    }

}