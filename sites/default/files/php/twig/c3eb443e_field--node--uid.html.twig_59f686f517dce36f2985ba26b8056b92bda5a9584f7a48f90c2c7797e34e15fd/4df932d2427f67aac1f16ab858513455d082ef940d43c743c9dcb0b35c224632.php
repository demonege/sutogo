<?php

/* core/themes/classy/templates/field/field--node--uid.html.twig */
class __TwigTemplate_1e77ad7f59060f67b042ad360527a2a389aaa9f9d82111c2eac8cd2c5ac02bfa extends Twig_Template
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
        // line 23
        $context["classes"] = array(0 => "field", 1 => ("field--name-" . \Drupal\Component\Utility\Html::getClass(        // line 25
(isset($context["field_name"]) ? $context["field_name"] : null))), 2 => ("field--type-" . \Drupal\Component\Utility\Html::getClass(        // line 26
(isset($context["field_type"]) ? $context["field_type"] : null))), 3 => ("field--label-" .         // line 27
(isset($context["label_display"]) ? $context["label_display"] : null)));
        // line 30
        echo "<span";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true);
        echo ">";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 32
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "content", array()), "html", null, true);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "</span>
";
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/field/field--node--uid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 34,  32 => 32,  28 => 31,  24 => 30,  22 => 27,  21 => 26,  20 => 25,  19 => 23,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for the node user field.*/
/*  **/
/*  * This is an override of field.html.twig for the node user field. See that*/
/*  * template for documentation about its details and overrides.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes for the containing span element.*/
/*  * - items: List of all the field items. Each item contains:*/
/*  *   - attributes: List of HTML attributes for each item.*/
/*  *   - content: The field item content.*/
/*  * - entity_type: The entity type to which the field belongs.*/
/*  * - field_name: The name of the field.*/
/*  * - field_type: The type of the field.*/
/*  * - label_display: The display settings for the label.*/
/*  **/
/*  * @see field.html.twig*/
/*  *//* */
/* #}*/
/* {%*/
/*   set classes = [*/
/*     'field',*/
/*     'field--name-' ~ field_name|clean_class,*/
/*     'field--type-' ~ field_type|clean_class,*/
/*     'field--label-' ~ label_display,*/
/*   ]*/
/* %}*/
/* <span{{ attributes.addClass(classes) }}>*/
/*   {%- for item in items -%}*/
/*     {{ item.content }}*/
/*   {%- endfor -%}*/
/* </span>*/
/* */
