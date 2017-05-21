<?php

class Page
{

  private $twig;
  private $Template;
  private $variables;

  function __construct()
  {

    $this->twig = new Twig_Environment(new Twig_Loader_Filesystem('Page/'), array(
        'cache' => 'cache/',
    ));

  }

  public function LoadBlock($BlockName, $Content)
  {
    //$this->$twig->();
  }

  public function addGlobal($key,$value)
  {
    $this->twig->addGlobal($key,$value);
  }

  public function LoadTemplate($Template)
  {
    $this->Template = $this->twig->load($Template);
  }

  public function Render()
  {
    echo $this->Template->render();
  }

}

?>
