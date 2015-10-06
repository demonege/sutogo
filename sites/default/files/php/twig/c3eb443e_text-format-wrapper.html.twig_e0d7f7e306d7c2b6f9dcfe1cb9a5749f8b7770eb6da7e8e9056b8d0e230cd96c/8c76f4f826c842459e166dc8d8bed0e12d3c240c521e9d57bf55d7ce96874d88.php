<?php

/* core/themes/classy/templates/content-edit/text-format-wrapper.html.twig */
class __TwigTemplate_9cd31f2d232d3c1adde0be225739324498362f03cde659e11df722b453088f00 extends Twig_Template
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
        // line 16
        echo "<div class=\"js-text-format-wrapper text-format-wrapper js-form-item form-item\">
  ";
        // line 17
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["children"]) ? $context["children"] : null), "html", null, true);
        echo "
  ";
        // line 18
        if ((isset($context["description"]) ? $context["description"] : null)) {
            // line 19
            echo "    ";
            // line 20
            $context["classes"] = array(0 => ((            // line 21
(isset($context["aria_description"]) ? $context["aria_description"] : null)) ? ("description") : ("")));
            // line 24
            echo "    <div";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true);
            echo ">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["description"]) ? $context["description"] : null), "html", null, true);
            echo "</div>
  ";
        }
        // line 26
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/content-edit/text-format-wrapper.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 26,  33 => 24,  31 => 21,  30 => 20,  28 => 19,  26 => 18,  22 => 17,  19 => 16,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a text format-enabled form element.*/
/*  **/
/*  * Available variables:*/
/*  * - children: Text format element children.*/
/*  * - description: Text format element description.*/
/*  * - attributes: HTML attributes for the containing element.*/
/*  * - aria_description: Flag for whether or not an ARIA description has been*/
/*  *   added to the description container.*/
/*  **/
/*  * @see template_preprocess_text_format_wrapper()*/
/*  *//* */
/* #}*/
/* <div class="js-text-format-wrapper text-format-wrapper js-form-item form-item">*/
/*   {{ children }}*/
/*   {% if description %}*/
/*     {%*/
/*       set classes = [*/
/*         aria_description ? 'description',*/
/*       ]*/
/*     %}*/
/*     <div{{ attributes.addClass(classes) }}>{{ description }}</div>*/
/*   {% endif %}*/
/* </div>*/
/* */
