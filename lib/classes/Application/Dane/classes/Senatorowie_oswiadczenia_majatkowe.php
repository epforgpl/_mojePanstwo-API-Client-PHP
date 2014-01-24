<?

namespace MP\Dane;

class Senatorowie_oswiadczenia_majatkowe extends DocDataObject
{

    public function getTitle()
    {
        return 'Oświadczenie majątkowe senatora ' . $this->getData('senatorowie.nazwa');
    }

    public function getShortTitle()
    {
        return ucfirst($this->getData('nazwa'));
    }

    public function getLabel()
    {
        return 'Oświadczenie majątkowe senatora';
    }

}