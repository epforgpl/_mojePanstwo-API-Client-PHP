<?

namespace MP\Dane;

class Bdl_wskazniki_grupy extends DataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
    );

    public function getLabel()
    {
        return '<strong>Grupa wskaźników</strong> Banku Danych Lokalnych';
    }
    
    public function getHighlightsFields()
    {
	    
	    return array(
	    	'kategoria_tytul' => 'Kategoria',
	    );
	    	    
    }

}