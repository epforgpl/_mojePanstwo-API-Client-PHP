<?

namespace MP\Dane;

class Rady_druki extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data',
    );

    public function getLabel()
    {
        return 'Druk w pracach <strong>' . $this->getData('gminy.rada_nazwa_dopelniacz') . '</strong>';
    }

}