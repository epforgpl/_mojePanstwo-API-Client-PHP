<?

namespace MP\Dane;

class Krs_osoby extends DataObject
{

    public function getTitle()
    {
        return $this->getData('nazwisko') . ' ' . $this->getData('imiona');
    }

    public function getShortTitle()
    {
        return $this->getTitle();
    }

    public function getLabel()
    {
        return '<strong>Osoba</strong> w Krajowym Rejestrze Sądowym';
    }

}