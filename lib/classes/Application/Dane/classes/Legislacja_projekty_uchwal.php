<?

namespace MP\Dane;

class Legislacja_projekty_uchwal extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data',
        'label' => 'label'
    );

    public function getLabel()
    {
        return '<strong>Projekt uchwały</strong> z dnia ' . $this->dataSlownie($this->getDate());
    }

}