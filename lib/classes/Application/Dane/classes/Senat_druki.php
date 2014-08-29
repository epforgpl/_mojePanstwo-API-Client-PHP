<?

namespace MP\Dane;

class Senat_druki extends DocDataObject
{
	
	protected $schema = array(
		array('numer', 'Numer'),
	);
	
    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data',
    );
    
    protected $hl_fields = array();
    
    public function getLabel()
    {
        return 'Druk senacki <strong>nr ' . $this->getData('numer') . '</strong>';
    }
    
    public function getFullLabel()
    {
        return 'Druk senacki nr ' . $this->getData('numer') . ' z dnia' . dataSlownie( $this->getDate() );
    }
    
    public $force_hl_fields = true;

}