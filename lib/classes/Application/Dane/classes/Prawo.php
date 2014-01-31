<?

namespace MP\Dane;

class Prawo extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data_publikacji',
        'label' => 'label'
    );
    
    public function getHighlightsFields()
    {
	    
	    return array(
	    	'sygnatura' => 'Sygnatura',
	    	'data_publikacji' => 'Data publikacji',
	    	'data_wejscia_w_zycie' => 'Data wejścia w życie',
	    );
	    	    
    }
    
    public function forceHighlightsFields()
    {
	    return true;
    }

}