<?

namespace MP\Dane;

class Bdl_wskazniki extends DataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => false,
    );

    public function getLabel()
    {
        return 'Wskaźniki Banku Danych Lokalnych';
    }
    
    public function getHighlightsFields()
    {
	    
	    return array(
	    	'kategoria_tytul' => 'Kategoria',
	    	'grupa_tytul' => 'Grupa',
	    	'poziom_str' => 'Szczegółowość',
	    	'data_aktualizacji' => 'Data aktualizacji',
	    );
	    	    
    }

}