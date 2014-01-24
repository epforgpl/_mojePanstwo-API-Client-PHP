<?

namespace MP\Dane;

class Ustawy extends DataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul_skrocony',
        'date' => 'data_wydania',
    );

    public function getLabel()
    {

        $output = '<b>';
        if ($this->getData('status_id') == '1')
            $output .= 'Obowiązująca ';
        elseif ($this->getData('status_id') == '2')
            $output .= 'Nieobowiązująca ';
        $output .= 'ustawa</b> z dnia ' . $this->dataSlownie($this->getData('data_wydania'));

        return $output;
    }

}