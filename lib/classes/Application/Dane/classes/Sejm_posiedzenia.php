<?

namespace MP\Dane;

class Sejm_posiedzenia extends DocDataObject
{

    protected $_fields = array(
        'shortTitle' => 'numer',
        'date' => 'data_start',
        'label' => 'label'
    );

    public function getLabel()
    {
        return '<strong>Posiedzenie Sejmu</strong> nr ' . $this->getData('numer');
    }

    public function getTitle()
    {
        return 'Posiedzenie Sejmu nr ' . $this->getData('numer');
    }

    public function getThumbnailUrl($size = false)
    {
        return ($this->getData('img') == '1') ?
            'http://resources.sejmometr.pl/sejm_komunikaty/img/' . $this->getData('komunikat_id') . '-1.jpg' : false;
    }

}