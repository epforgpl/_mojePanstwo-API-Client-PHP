<?

namespace MP\Dane;

class Prawo_lokalne extends DocDataObject
{

    protected $routes = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data_wydania',
        'label' => 'label'
    );

    public function getLabel()
    {
        return 'Uchwała <strong>' . $this->getData('jednostka_dopelniacz') . '</strong>, numer <strong>' . $this->getData('akt_numer') . '</strong> z dnia <strong>' . $this->dataSlownie($this->getDate()) . '</strong>';
    }
	
	public $force_hl_fields = true;
	
}