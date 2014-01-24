<?

namespace MP\Dane;

class Radni_gmin extends DataObject
{

    protected $_fields = array(
        'title' => 'nazwa',
        'shortTitle' => 'nazwa',
    );

    public function getLabel()
    {
        $output = ($this->getData('plec') == 'K') ? 'Radna' : 'Radny';
        $output .= ' gminy <a href="/dane/gminy/' . $this->getData('gmina_id') . '">' . $this->getData('gminy.nazwa') . '</a>';
        return $output;
    }

}