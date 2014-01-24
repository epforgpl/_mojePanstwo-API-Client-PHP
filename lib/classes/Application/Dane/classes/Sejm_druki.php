<?

namespace MP\Dane;

class Sejm_druki extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data_publikacji',
        'label' => 'label'
    );

    public function getLabel()
    {
        return '<strong>Druk sejmowy</strong> nr ' . $this->getData('numer');
    }

}