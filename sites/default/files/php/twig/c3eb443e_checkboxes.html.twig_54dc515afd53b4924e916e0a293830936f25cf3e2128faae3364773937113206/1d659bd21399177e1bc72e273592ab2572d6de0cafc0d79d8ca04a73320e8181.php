<?php

/* core/themes/classy/templates/form/checkboxes.html.twig */
class __TwigTemplate_e081b25bcc1623458bd6fa9a78738b3a3ae0f7c2ff07c974ca67a1db8cbffc1c extends Twig_Template
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
        // line 15
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => "form-checkboxes"), "method"), "html", null, true);
        echo ">";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["children"]) ? $context["children"] : null), "html", null, true);
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/form/checkboxes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  19 => 15,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a 'checkboxes' #type form element.*/
/*  **/
/*  * Available variables*/
/*  * - attributes: A list of HTML attributes for the wrapper element.*/
/*  * - children: The rendered checkboxes.*/
/*  **/
/*  * @see template_preprocess_checkboxes()*/
/*  *//* */
/*  @todo: remove this file once https://www.drupal.org/node/1819284 is resolved.*/
/*  This is identical to core/modules/system/templates/container.html.twig*/
/* #}*/
/* <div{{ attributes.addClass('form-checkboxes') }}>{{ children }}</div>*/
/* */
