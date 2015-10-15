<?php

/* core/themes/classy/templates/content-edit/image-widget.html.twig */
class __TwigTemplate_cc402f39a0498840f4425d317519309116c6b25819a80dbd1a55daaa54df8581 extends Twig_Template
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
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("classy/image-widget"), "html", null, true);
        echo "
<div";
        // line 14
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["attributes"]) ? $context["attributes"] : null), "html", null, true);
        echo ">
  ";
        // line 15
        if ($this->getAttribute((isset($context["data"]) ? $context["data"] : null), "preview", array())) {
            // line 16
            echo "    <div class=\"image-preview\">
      ";
            // line 17
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["data"]) ? $context["data"] : null), "preview", array()), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 20
        echo "  <div class=\"image-widget-data\">
    ";
        // line 22
        echo "    ";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without((isset($context["data"]) ? $context["data"] : null), "preview"), "html", null, true);
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/content-edit/image-widget.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 22,  38 => 20,  32 => 17,  29 => 16,  27 => 15,  23 => 14,  19 => 13,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for an image field widget.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes for the containing element.*/
/*  * - data: Render elements of the image widget.*/
/*  **/
/*  * @see template_preprocess_image_widget()*/
/*  *//* */
/* #}*/
/* {{ attach_library('classy/image-widget') }}*/
/* <div{{ attributes }}>*/
/*   {% if data.preview %}*/
/*     <div class="image-preview">*/
/*       {{ data.preview }}*/
/*     </div>*/
/*   {% endif %}*/
/*   <div class="image-widget-data">*/
/*     {# Render widget data without the image preview that was output already. #}*/
/*     {{ data|without('preview') }}*/
/*   </div>*/
/* </div>*/
/* */
