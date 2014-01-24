<?

namespace MP\Dane;

class Poslowie_rejestr_korzysci extends DocDataObject
{

    protected $_fields = array(
        'date' => 'data',
        'shortTitle' => 'label',
    );

    public function getTitle()
    {

        return 'Wpis w rejestrze korzyści posła ' . $this->getData('poslowie.dopelniacz') . ' z dnia ' . $this->dataSlownie($this->getDate());

    }

    public function getLabel()
    {

        return 'Wpis w rejestrze korzyści posła';

    }

}