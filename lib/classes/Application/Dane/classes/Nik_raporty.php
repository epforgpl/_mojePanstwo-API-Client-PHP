<?

namespace MP\Dane;

class Nik_raporty extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data_publikacji',
    );

    public function getLabel()
    {
        return 'Raport Najwyższej Izby Kontroli';
    }

}