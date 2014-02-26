<?

namespace MP\Dane;

class Msig extends DocDataObject
{

    protected $routes = array(
        'date' => 'data',
    );

    public function getLabel()
    {
        return 'Monitor Sądowy i Gospodarczy';
    }

    public function getShortTitle()
    {
        return $this->getData('nr') . ' / ' . $this->getData('rocznik');
    }

    public function getTitle()
    {
        return $this->getLabel() . ' ' . $this->getShortTitle();
    }
    
    public function getFullLabel()
    {
        return 'Monitor Sądowy i Gospodarczy z dnia ' . dataSlownie( $this->getDate() );
    }

}