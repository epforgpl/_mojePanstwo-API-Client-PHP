<?

namespace MP\Dane;

class Krs_osoby extends DataObject
{
	
	protected $schema = array(
		array('powiazania', 'Związany z'),
	);
	
	protected $hl_fields = array(
		'powiazania',
	);
	
    public function getTitle()
    {
        return $this->getData('nazwisko') . ' ' . $this->getData('imiona');
    }

    public function getShortTitle()
    {
        return $this->getTitle();
    }

    public function getLabel()
    {
        return '<strong>Osoba</strong> w Krajowym Rejestrze Sądowym';
    }
    
    public function getTitleAddon()
    {
	    return $this->pl_dopelniacz($this->pl_wiek( $this->data('data_urodzenia') ), 'rok', 'lata', 'lat');
    }
	
	public function getData($field = '*')
    {
    	if( ($field=='powiazania') && (preg_match_all('/\<a(.*?)\/a\>/i', $this->getData('str'), $matches)) )	
    	{    
    		$items = array();
    		for( $i=0; $i<count($matches[0]); $i++ )
    			if( !in_array($matches[0][$i], $items) )
    				$items[] = $matches[0][$i];
    		return '<ul class="hl_ul normalizeText"><li>' . implode('</li><li>', $items) . '</li></ul>';
	    }
	    	
    	return parent::getData( $field );        
    }
}