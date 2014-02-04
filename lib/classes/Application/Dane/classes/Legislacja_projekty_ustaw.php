<?

namespace MP\Dane;

class Legislacja_projekty_ustaw extends DocDataObject
{

    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data',
        'label' => 'label'
    );

    public function getLabel()
    {
        return '<strong>Projekt ustawy</strong> z dnia ' . $this->dataSlownie($this->getDate());
    }

}