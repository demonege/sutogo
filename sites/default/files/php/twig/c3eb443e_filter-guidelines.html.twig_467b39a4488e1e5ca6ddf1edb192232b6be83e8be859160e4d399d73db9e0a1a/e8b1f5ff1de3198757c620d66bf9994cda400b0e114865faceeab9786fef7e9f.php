<?php

/* core/themes/classy/templates/content-edit/filter-guidelines.html.twig */
class __TwigTemplate_1254e88c83166a4e59f472cbacfc6bdb285eb0088fc42cf08eeccf5076ca001f extends Twig_Template
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
        // line 21
        $context["classes"] = array(0 => "filter-guidelines-item", 1 => ("filter-guidelines-" . $this->getAttribute(        // line 23
(isset($context["format"]) ? $context["format"] : null), "id", array())));
        // line 26
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true);
        echo ">
  <h4 class=\"label\">";
        // line 27
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["format"]) ? $context["format"] : null), "label", array()), "html", null, true);
        echo "</h4>
  ";
        // line 28
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["tips"]) ? $context["tips"] : null), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/content-edit/filter-guidelines.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 28,  27 => 27,  22 => 26,  20 => 23,  19 => 21,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for guidelines for a text format.*/
/*  **/
/*  * Available variables:*/
/*  * - format: Contains information about the current text format, including the*/
/*  *   following:*/
/*  *   - name: The name of the text format, potentially unsafe and needs to be*/
/*  *     escaped.*/
/*  *   - format: The machine name of the text format, e.g. 'basic_html'.*/
/*  * - attributes: HTML attributes for the containing element.*/
/*  * - tips: Descriptions and a CSS ID in the form of 'module-name/filter-id'*/
/*  *   (only used when 'long' is TRUE) for each filter in one or more text*/
/*  *   formats.*/
/*  **/
/*  * @see template_preprocess_filter_tips()*/
/*  *//* */
/* #}*/
/* {%*/
/*   set classes = [*/
/*     'filter-guidelines-item',*/
/*     'filter-guidelines-' ~ format.id,*/
/*   ]*/
/* %}*/
/* <div{{ attributes.addClass(classes) }}>*/
/*   <h4 class="label">{{ format.label }}</h4>*/
/*   {{ tips }}*/
/* </div>*/
/* */
