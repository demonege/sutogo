<?php

/* core/themes/classy/templates/form/datetime-form.html.twig */
class __TwigTemplate_6cf46437a9ef489729aa79846407275ab4d97dfd768b5d2bcf165f75cd44480a extends Twig_Template
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
        // line 13
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => "container-inline"), "method"), "html", null, true);
        echo ">
  ";
        // line 14
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/form/datetime-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 14,  19 => 13,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override of a datetime form element.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes for the datetime form element.*/
/*  * - content: The datelist form element to be output.*/
/*  **/
/*  * @see template_preprocess_datetime_form()*/
/*  *//* */
/* #}*/
/* <div{{ attributes.addClass('container-inline') }}>*/
/*   {{ content }}*/
/* </div>*/
/* */
