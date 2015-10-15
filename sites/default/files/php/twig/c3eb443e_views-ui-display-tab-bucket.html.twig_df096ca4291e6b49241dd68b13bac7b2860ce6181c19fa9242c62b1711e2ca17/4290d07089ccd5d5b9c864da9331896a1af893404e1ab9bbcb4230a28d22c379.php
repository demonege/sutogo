<?php

/* core/modules/views_ui/templates/views-ui-display-tab-bucket.html.twig */
class __TwigTemplate_f7d3daa3cf6594d4f1044fe03e40d67d8f850aaa2d55bd11787d67d2190456ad extends Twig_Template
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
        $context["classes"] = array(0 => "views-ui-display-tab-bucket", 1 => ((        // line 23
(isset($context["name"]) ? $context["name"] : null)) ? (\Drupal\Component\Utility\Html::getClass((isset($context["name"]) ? $context["name"] : null))) : ("")), 2 => ((        // line 24
(isset($context["overridden"]) ? $context["overridden"] : null)) ? ("overridden") : ("")));
        // line 27
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true);
        echo ">
  ";
        // line 28
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 29
            echo "<h3 class=\"views-ui-display-tab-bucket__title\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
            echo "</h3>";
        }
        // line 31
        echo "  ";
        if ((isset($context["actions"]) ? $context["actions"] : null)) {
            // line 32
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["actions"]) ? $context["actions"] : null), "html", null, true);
        }
        // line 34
        echo "  ";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/views_ui/templates/views-ui-display-tab-bucket.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 34,  38 => 32,  35 => 31,  30 => 29,  28 => 28,  23 => 27,  21 => 24,  20 => 23,  19 => 21,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for each "box" on the display query edit screen.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes to apply to the container element.*/
/*  * - actions: Action links such as "Add", "And/Or, Rearrange" for the content.*/
/*  * - title: The title of the bucket, e.g. "Fields", "Filter Criteria", etc.*/
/*  * - content: Content items such as fields or settings in this container.*/
/*  * - name: The name of the bucket, e.g. "Fields", "Filter Criteria", etc.*/
/*  * - overridden: A boolean indicating the setting has been overridden from the*/
/*  *   default.*/
/*  **/
/*  * @see template_preprocess_views_ui_display_tab_bucket()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* {%*/
/*   set classes = [*/
/*     'views-ui-display-tab-bucket',*/
/*     name ? name|clean_class,*/
/*     overridden ? 'overridden',*/
/*   ]*/
/* %}*/
/* <div{{ attributes.addClass(classes) }}>*/
/*   {% if title -%}*/
/*     <h3 class="views-ui-display-tab-bucket__title">{{ title }}</h3>*/
/*   {%- endif %}*/
/*   {% if actions -%}*/
/*     {{ actions }}*/
/*   {%- endif %}*/
/*   {{ content }}*/
/* </div>*/
/* */
