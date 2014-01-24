<?

namespace MP\Dane;

class Rady_posiedzenia extends DocDataObject
{

    protected $_fields = array(
        'title' => 'numer',
        'shortTitle' => 'numer',
        'date' => 'data',
    );

    public function getLabel()
    {
        return 'Posiedzenie <strong>numer ' . $this->getData('numer') . '</strong> ' . $this->getData('gminy.rada_nazwa_dopelniacz');
    }

    public function getTitle()
    {
        return 'Posiedzenie numer <strong>' . $this->getData('numer') . '</strong> <strong>' . $this->getData('gminy.rada_nazwa_dopelniacz') . '</strong>';
    }

    public function getShortTitle()
    {
        return $this->dataSlownie($this->getDate());
    }

    public function getThumbnailUrl($size = '3')
    {
        return 'http://img.youtube.com/vi/' . $this->getData('preview_yt_id') . '/mqdefault.jpg';
    }

}