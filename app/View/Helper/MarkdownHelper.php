<?php
App::uses('AppHelper', 'View/Helper');
App::import('Vendor', 'Markdown/Markdown');

class MarkdownHelper extends AppHelper {
    function parse($text) {
        echo 'Got here';
        return $this->output(Markdown($text));
    }
}

?>
