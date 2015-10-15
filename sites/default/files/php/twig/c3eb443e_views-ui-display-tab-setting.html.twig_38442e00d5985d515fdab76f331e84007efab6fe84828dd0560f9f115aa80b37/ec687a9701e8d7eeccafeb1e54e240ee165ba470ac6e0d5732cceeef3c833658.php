<?php

/* core/modules/views_ui/templates/views-ui-display-tab-setting.html.twig */
class __TwigTemplate_1727876b8b3f8209d15329cf5b6d09a4455a29732e5103d3830b5bcc178f703f extends Twig_Template
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
        // line 22
        $context["classes"] = array(0 => "views-display-setting", 1 => "clearfix", 2 => "views-ui-display-tab-setting", 3 => ((        // line 26
(isset($context["defaulted"]) ? $context["defaulted"] : null)) ? ("defaulted") : ("")), 4 => ((        // line 27
(isset($context["overridden"]) ? $context["overridden"] : null)) ? ("overridden") : ("")));
        // line 30
        echo "<div";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true);
        echo ">
  ";
        // line 31
        if ((isset($context["description"]) ? $context["description"] : null)) {
            // line 32
            echo "<span class=\"label\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["description"]) ? $context["description"] : null), "html", null, true);
            echo "</span>";
        }
        // line 34
        echo "  ";
        if ((isset($context["settings_links"]) ? $context["settings_links"] : null)) {
            // line 35
            echo "    ";
            echo $this->env->getExtension('drupal_core')->renderVar($this->env->getExtension('drupal_core')->safeJoin($this->env, (isset($context["settings_links"]) ? $context["settings_links"] : null), "<span class=\"label\">&nbsp;|&nbsp;</span>"));
            echo "
  ";
        }
        // line 37
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/views_ui/templates/views-ui-display-tab-setting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 37,  38 => 35,  35 => 34,  30 => 32,  28 => 31,  23 => 30,  21 => 27,  20 => 26,  19 => 22,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for Views UI display tab settings.*/
/*  **/
/*  * Template for each row inside the "boxes" on the display query edit screen.*/
/*  **/
/*  * Available variables:*/
/*  * - attributes: HTML attributes such as class for the container.*/
/*  * - description: The description or label for this setting.*/
/*  * - settings_links: A list of links for this setting.*/
/*  * - defaulted: A boolean indicating the setting is in its default state.*/
/*  * - overridden: A boolean indicating the setting has been overridden from the*/
/*  *   default.*/
/*  **/
/*  * @see template_preprocess_views_ui_display_tab_setting()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* {%*/
/*   set classes = [*/
/*     'views-display-setting',*/
/*     'clearfix',*/
/*     'views-ui-display-tab-setting',*/
/*     defaulted ? 'defaulted',*/
/*     overridden ? 'overridden',*/
/* ]*/
/* %}*/
/* <div{{ attributes.addClass(classes) }}>*/
/*   {% if description -%}*/
/*     <span class="label">{{ description }}</span>*/
/*   {%- endif %}*/
/*   {% if settings_links %}*/
/*     {{ settings_links|safe_join('<span class="label">&nbsp;|&nbsp;</span>') }}*/
/*   {% endif %}*/
/* </div>*/
/* */
