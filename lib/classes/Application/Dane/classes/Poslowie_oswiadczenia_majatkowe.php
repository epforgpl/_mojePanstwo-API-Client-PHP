<?

namespace MP\Dane;

class Poslowie_oswiadczenia_majatkowe extends DocDataObject
{

    protected $routes = array(
        'date' => 'data',
        'shortTitle' => 'label',
    );

    public function getTitle()
    {

        return 'Oświadczenie majątkowe posła ' . $this->getData('poslowie.dopelniacz') . ' z dnia ' . $this->dataSlownie($this->getDate());

    }

    public function getLabel()
    {

        return 'Oświadczenie majątkowe posła';

    }

}