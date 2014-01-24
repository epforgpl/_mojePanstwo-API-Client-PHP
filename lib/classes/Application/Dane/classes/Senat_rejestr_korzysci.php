<?

namespace MP\Dane;

class Senat_rejestr_korzysci extends DocDataObject
{

    public function getTitle()
    {
        return 'Wpis w rejestrze korzyści senatora ' . $this->getData('senatorowie.nazwa');
    }

    public function getShortTitle()
    {
        return ucfirst($this->getData('nazwa'));
    }

    public function getLabel()
    {
        return 'Wpis w rejestrze korzyści senatora';
    }

}