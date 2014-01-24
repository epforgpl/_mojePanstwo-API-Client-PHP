<?

namespace MP\Dane;

class Rcl_etapy extends DocDataObject
{

    protected $_fields = array(
        'shortTitle' => 'rcl_etapy_typy.tytul',
        'date' => 'data',
    );

    public function getLabel()
    {
        return 'Etap w pracach legislacyjnych rządu';
    }

    public function getTitle()
    {
        return $this->getData('rcl_etapy_typy.tytul') . ' - ' . $this->getData('tytul_projektu');
    }

}