<?

namespace MP\Dane;

class MSiG extends DocDataObject
{

    protected $_fields = array(
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

}