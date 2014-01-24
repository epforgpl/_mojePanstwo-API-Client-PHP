<?

namespace MP\Dane;

class Wybory_darczyncy extends DocDataObject
{

    public function getUrl()
    {

        return false;

    }

    public function getTitle()
    {
        return 'Darowizna ' . $this->getData('imie') . ' ' . $this->getData('nazwisko') . ' na rzecz ' . $this->getData('rady_gmin_komitety.nazwa');

    }

    public function getShortTitle()
    {
        return $this->getData('imie') . ' ' . $this->getData('nazwisko') . ' - ' . number_format($this->getData('wartosc_kwota'), 2, ',', ' ') . ' PLN';

    }

    public function getLabel()
    {

        return 'Darowizna na rzecz komitetu wyborczego';

    }

}