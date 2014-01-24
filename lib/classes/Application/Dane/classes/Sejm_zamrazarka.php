<?

namespace MP\Dane;

class Sejm_zamrazarka extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data',
        'label' => 'label'
    );

    public function getLabel()
    {
        return '<strong>Projekt</strong> w "zamrażarce Marszałka"';
    }

}