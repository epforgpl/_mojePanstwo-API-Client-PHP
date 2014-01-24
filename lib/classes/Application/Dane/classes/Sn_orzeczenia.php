<?

namespace MP\Dane;

class Sn_orzeczenia extends DocDataObject
{

    protected $_fields = array(
        'shortTitle' => 'sygnatura',
        'date' => 'data',
    );

    public function getLabel()
    {

        return '<strong>Orzeczenie</strong> Sądu Najwyższego z dnia ' . $this->dataSlownie($this->getDate());

    }

    public function getTitle()
    {

        return $this->getShortTitle() . ' - orzeczenie Sądu Najwyższego z dnia ' . $this->dataSlownie($this->getDate());

    }
}