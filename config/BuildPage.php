<?

namespace config;

class BuildPage {
    // protected headers = array();
    public $assetsHead = [];
    public $assetsFooter = [];
    public $titlePage = '';

    public function setTitlePage(string $title) {
        $this->titlePage = $title;
    }

    public function setAssetsHead(array $assets) {
        $this->assetsHead = $assets;
    }

    public function setAssetsFooter(array $assets) {
        $this->assetsFooter = $assets;
    }
}