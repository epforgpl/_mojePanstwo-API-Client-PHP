<?

namespace MP\Dane;

class Zamowienia_publiczne extends DocDataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
        'date' => 'data_publikacji',
    );

    public function getLabel()
    {

        return 'Zamówienie publiczne nr <strong>' . $this->getData('ogloszenie_nr') . '</strong>';

    }

}