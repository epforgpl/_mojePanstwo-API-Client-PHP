<?

namespace MP\Dane;

class Bdl_wskazniki extends DataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data_aktualizacji',
    );

    public function getLabel()
    {
        return 'Wskaźniki Banku Danych Lokalnych';
    }

}