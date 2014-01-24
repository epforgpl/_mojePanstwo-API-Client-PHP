<?

namespace MP\Dane;

class Bdl_wskazniki_kategorie extends DataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
    );

    public function getLabel()
    {
        return 'Kategoria wskaźników Banku Danych Lokalnych';
    }

}