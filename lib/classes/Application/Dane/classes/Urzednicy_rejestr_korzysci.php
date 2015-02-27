<?

namespace MP\Dane;

class Urzednicy_rejestr_korzysci extends DataObject
{
	
	protected $tiny_label = 'Rejestr korzyści';
	
	public function getShortTitle() {
		
		return $this->dataSlownie( $this->getData('data_zgloszenia') );
		
	}

	public function getTitle()
	{
		return $this->getShortTitle();
	}
	
    public function getLabel()
    {
        return 'Wpis w rejestrze korzyści';
    }
    
    public function hasHighlights()
    {
        return false;
    }

}