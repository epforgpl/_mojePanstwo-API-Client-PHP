<?

namespace MP\Dane;

class Sejm_posiedzenia_punkty extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'data',
    );

    public function getLabel()
    {
        return '<strong>Punkt</strong> porządku dziennego na Posiedzeniu Sejmu nr ' . $this->getData('sejm_posiedzenia.tytul');
    }


}