<?

namespace config;

class BuildPage {
    // protected headers = array();
    public $assetsHead = [];
    public $titlePage = '';

    public function setAssetsHead(array $assets) {
        $this->assetsHead = $assets;
    }

    public function setTitlePage(string $title) {
        $this->titlePage = $title;
    }

    // public function addHeader($header) {
    //     $this->headers[] = $header;
    // }

    // public function drawPage($page) {

    //     $this->$assetsHead

    //     $headers = $this->headers;
    //     include 'top.php';
    //     include $page . '.php';
    //     include 'bottom.php';
    // }
}