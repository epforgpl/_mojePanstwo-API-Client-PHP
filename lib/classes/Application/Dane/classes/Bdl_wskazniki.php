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
	    	'kategoria_tytul' => array(
	    		'label' => 'Kategoria',
	    		'href' => '/dane/bdl_wskazniki_kategorie/' . $this->getData('kategoria_id'),
	    		'normalizeText' => true,
	    	),
	    	'grupa_tytul' => array(
	    		'label' => 'Grupa',
	    		'href' => '/dane/bdl_wskazniki_grupy/' . $this->getData('grupa_id'),
	    	),
	    	'poziom_str' => 'Szczegółowość',
	    	'data_aktualizacji' => 'Data aktualizacji',
	    );
	    	    
    }

}