<?

namespace MP\Dane;

class Sejm_druki extends DocDataObject
{
	
	protected $schema = array(
		array('druk_typ_nazwa', 'Typ druku'),
		array('numer', 'Numer druku')
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data_publikacji',
        'label' => 'label'
    );
    
    protected $hl_fields = array(
    	'druk_typ_nazwa'
    );

    public function getLabel()
    {
        return 'Druk sejmowy <strong>nr ' . $this->getData('numer') . '</strong>';
    }
    
    public function getFullLabel()
    {
        return 'Druk sejmowy nr ' . $this->getData('numer') . ' z dnia' . dataSlownie( $this->getDate() );
    }

    public $force_hl_fields = true;

}