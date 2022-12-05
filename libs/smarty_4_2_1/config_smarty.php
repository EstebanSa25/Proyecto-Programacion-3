<?php
/*
@autor:Royner Luna
@date:10/10/2022
@descrip: Es la clase de control
*/
require_once "libs/smarty_4_2_1/Smarty.class.php";

class config_smarty{
  private $insSmarty;

  function __construct(){

        $this->insSmarty = new Smarty();
        $this->setRutas();
  }

  public function setRutas(){
    $this->insSmarty->template_dir  = "view/templates";
    $this->insSmarty->compile_dir   = "view/templates_c";
    $this->insSmarty->cache_dir     = "control/cache";
    $this->insSmarty->config_dir    = "control/config";
  }

  public function setDisplay($nombre_tpl){
      $this->insSmarty->display($nombre_tpl);
  }

  public function setAssign($variable, $valor){
      $this->insSmarty->assign($variable, $valor);
  }


}
?>
