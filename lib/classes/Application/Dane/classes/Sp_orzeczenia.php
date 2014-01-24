<?

namespace MP\Dane;

class Sp_orzeczenia extends DataObject
{

    protected $_fields = array(
        'shortTitle' => 'sygnatura',
        'date' => 'data',
    );

    public function getLabel()
    {

        return '<strong>Orzeczenie</strong> ' . $this->getData('dopelniacz') . ' z dnia ' . $this->dataSlownie($this->getDate());

    }

    public function getTitle()
    {

        return $this->getShortTitle() . ' - orzeczenie ' . $this->getData('dopelniacz') . ' z dnia ' . $this->dataSlownie($this->getDate());

    }
}