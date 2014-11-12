<?

namespace MP\Dane;

class Sn_orzeczenia extends DocDataObject
{
	
	protected $tiny_label = 'Orzeczenie sądu';
	
    protected $routes = array(
        'shortTitle' => 'sygnatura',
        'date' => 'data',
    );
	
	protected $schema = array(
		array('izby_str', 'Izby'),
		array('przewodniczacy', 'Przewodniczący składu'),
		array('sprawozdawcy_str', 'Sprawozdawcy'),
		array('wspolsprawozdawcy_str', 'Współsprawozdawcy'),
	);
	
	protected $hl_fields = array(
    	'izby_str', 'przewodniczacy', 'sprawozdawcy_str', 'wspolsprawozdawcy_str'
    );
	
    public function getLabel()
    {

        return '<strong>Orzeczenie</strong> Sądu Najwyższego z dnia ' . $this->dataSlownie($this->getDate());

    }

    public function getTitle()
    {

        return $this->getShortTitle() . ' - orzeczenie Sądu Najwyższego z dnia ' . $this->dataSlownie($this->getDate());

    }
}