<?

namespace MP\Dane;

class Sejm_posiedzenia extends DocDataObject
{

    protected $routes = array(
        'shortTitle' => 'numer',
        'date' => 'data_start',
        'label' => 'label'
    );

    public function getLabel()
    {
        return 'Posiedzenie Sejmu';
    }

    public function getTitle()
    {
        return 'Posiedzenie Sejmu nr ' . $this->getData('numer');
    }
    
    public function hasHighlights()
    {
        return false;
    }

}