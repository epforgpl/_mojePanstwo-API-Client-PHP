<?

namespace MP\Dane;

class Rady_gmin_debaty extends DocDataObject
{

    protected $_fields = array(
        'title' => 'tytul',
        'shortTitle' => 'tytul',
        'date' => 'rady_gmin_posiedzenia.data',
    );

    public function getThumbnailUrl($size = '3')
    {
        return 'http://img.youtube.com/vi/' . $this->getData('yt_video_id') . '/mqdefault.jpg';
    }

    public function getLabel()
    {
        return 'Debata na posiedzeniu <strong>' . $this->getData('gminy.rada_nazwa_dopelniacz') . '</strong>';
    }

}