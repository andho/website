<?php

class MustacheTemplate {

  private $_templateDirectory;
  private $_extension;

  public function __construct($templateDirectory='', $extension='') {
    $this->_setTemplateDirectory($templateDirectory);
    $this->_extension = $extension;
  }

  private function _getTemplateDirectory() {
    return $this->_templateDirectory;
  }

  private function _setTemplateDirectory($dir) {
    if (empty($dir) || $dir == '') {
      return;
    }

    $this->_templateDirectory = $dir . '/';
  }

  private function _getExtension() {
    return $this->_extension;
  }

  public function getTemplate($template, $view=null, $partials=null) {
    $template = file_get_contents($this->_getTemplateDirectory() . $template . $this->_getExtension());
    return $template;
  }

  public function render($template, $view=null, $partials=null) {
  	$template = $this->getTemplate($template);
    $mustache = new Mustache($template, $view, $partials);
    return $mustache->render();
  }

}