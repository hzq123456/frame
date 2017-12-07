<?php

/* index.php */
class __TwigTemplate_a61524c664b111140f9a29957dd304a3dee07cac5be44fce173738c1bd2a8094 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<?php
//
//echo  \$data;
//
//?>

<div>

    this is a view

</div>
";
    }

    public function getTemplateName()
    {
        return "index.php";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<?php
//
//echo  \$data;
//
//?>

<div>

    this is a view

</div>
", "index.php", "/home/vagrant/Code/myframe/app/views/index.php");
    }
}
