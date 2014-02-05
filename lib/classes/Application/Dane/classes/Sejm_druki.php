<?

namespace MP\Dane;

class Sejm_druki extends DocDataObject
{
	
	protected $schema = array(
		array('druk_typ_nazwa', 'Typ druku'),
		array('numer', 'Numer')
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data_publikacji',
        'label' => 'label'
    );
    
    protected $hl_fields = array(
    	'numer', 'druk_typ_nazwa'
    );

    public function getLabel()
    {
        return 'Druk sejmowy';
    }

}