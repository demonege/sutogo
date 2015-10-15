<?php

/* core/modules/views_ui/templates/views-ui-view-preview-section.html.twig */
class __TwigTemplate_4360365394afa683bed67f54ddb8bc9acacb367c074153fbf7d58495271b96ae extends Twig_Template
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
        echo "<h1 class=\"section-title\">";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</h1>
";
        // line 17
        if ((isset($context["links"]) ? $context["links"] : null)) {
            // line 18
            echo "  <div class=\"contextual\">";
            echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["links"]) ? $context["links"] : null), "html", null, true);
            echo "</div>
";
        }
        // line 20
        echo "<div class=\"preview-section\">";
        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["content"]) ? $context["content"] : null), "html", null, true);
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/modules/views_ui/templates/views-ui-view-preview-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  32 => 20,  26 => 18,  24 => 17,  19 => 16,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation for a views UI preview section.*/
/*  **/
/*  * Available variables:*/
/*  * - title: The human readable section title.*/
/*  * - links: A list of contextual links.*/
/*  * - content: The content for this section preview.*/
/*  **/
/*  * @see template_preprocess_views_ui_view_preview_section()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* <h1 class="section-title">{{ title }}</h1>*/
/* {% if links %}*/
/*   <div class="contextual">{{ links }}</div>*/
/* {% endif %}*/
/* <div class="preview-section">{{ content }}</div>*/
/* */
