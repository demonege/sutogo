<?php

/* core/themes/classy/templates/content-edit/file-upload-help.html.twig */
class __TwigTemplate_88c6552f4ffc02e501084d8280d8e9fb79ce7384860bd34e37ae589f8a1dcd8f extends Twig_Template
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
        // line 12
        echo $this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->safeJoin($this->env, (isset($context["descriptions"]) ? $context["descriptions"] : null), "<br />"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/content-edit/file-upload-help.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 12,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override to display help text for file fields.*/
/*  **/
/*  * Available variables:*/
/*  * - descriptions: Lines of help text for uploading a file.*/
/*  **/
/*  * @see template_preprocess_file_upload_help()*/
/*  *//* */
/* #}*/
/* {{ descriptions|safe_join('<br />') }}*/
/* */
