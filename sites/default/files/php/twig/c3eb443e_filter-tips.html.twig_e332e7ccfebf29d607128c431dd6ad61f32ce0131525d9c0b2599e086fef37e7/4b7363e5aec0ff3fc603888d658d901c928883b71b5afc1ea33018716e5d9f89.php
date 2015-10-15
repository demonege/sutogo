<?php

/* core/themes/classy/templates/content-edit/filter-tips.html.twig */
class __TwigTemplate_99183a57ed6adb36da937929c7623cb8f245acbf9ce4846af2b5fc29567cf36d extends Twig_Template
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
        // line 19
        if ((isset($context["multiple"]) ? $context["multiple"] : null)) {
            // line 20
            echo "  <h2>";
            echo $this->env->getExtension('drupal_core')->renderVar(t("Text Formats"));
            echo "</h2>
";
        }
        // line 22
        echo "
";
        // line 23
        if (twig_length_filter($this->env, (isset($context["tips"]) ? $context["tips"] : null))) {
            // line 24
            echo "  ";
            if ((isset($context["multiple"]) ? $context["multiple"] : null)) {
                // line 25
                echo "    <div class=\"compose-tips\">
  ";
            }
            // line 27
            echo "
  ";
            // line 28
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["tips"]) ? $context["tips"] : null));
            foreach ($context['_seq'] as $context["name"] => $context["tip"]) {
                // line 29
                echo "    ";
                if ((isset($context["multiple"]) ? $context["multiple"] : null)) {
                    // line 30
                    echo "      ";
                    // line 31
                    $context["tip_classes"] = array(0 => "filter-type", 1 => ("filter-" . \Drupal\Component\Utility\Html::getClass(                    // line 33
$context["name"])));
                    // line 36
                    echo "      <div";
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["tip"], "attributes", array()), "addClass", array(0 => (isset($context["tip_classes"]) ? $context["tip_classes"] : null)), "method"), "html", null, true);
                    echo ">
      <h3>";
                    // line 37
                    echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["tip"], "name", array()), "html", null, true);
                    echo "</h3>
    ";
                }
                // line 39
                echo "
    ";
                // line 40
                if (twig_length_filter($this->env, $this->getAttribute($context["tip"], "list", array()))) {
                    // line 41
                    echo "      <ul class=\"tips\">
      ";
                    // line 42
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["tip"], "list", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                        // line 43
                        echo "        ";
                        // line 44
                        $context["item_classes"] = array(0 => ((                        // line 45
(isset($context["long"]) ? $context["long"] : null)) ? (("filter-" . twig_replace_filter($this->getAttribute($context["item"], "id", array()), array("/" => "-")))) : ("")));
                        // line 48
                        echo "        <li";
                        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["item"], "attributes", array()), "addClass", array(0 => (isset($context["item_classes"]) ? $context["item_classes"] : null)), "method"), "html", null, true);
                        echo ">";
                        echo $this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["item"], "tip", array()), "html", null, true);
                        echo "</li>
      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 50
                    echo "      </ul>
    ";
                }
                // line 52
                echo "
    ";
                // line 53
                if ((isset($context["multiple"]) ? $context["multiple"] : null)) {
                    // line 54
                    echo "      </div>
    ";
                }
                // line 56
                echo "  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['name'], $context['tip'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "
  ";
            // line 58
            if ((isset($context["multiple"]) ? $context["multiple"] : null)) {
                // line 59
                echo "    </div>
  ";
            }
        }
    }

    public function getTemplateName()
    {
        return "core/themes/classy/templates/content-edit/filter-tips.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 59,  114 => 58,  111 => 57,  105 => 56,  101 => 54,  99 => 53,  96 => 52,  92 => 50,  81 => 48,  79 => 45,  78 => 44,  76 => 43,  72 => 42,  69 => 41,  67 => 40,  64 => 39,  59 => 37,  54 => 36,  52 => 33,  51 => 31,  49 => 30,  46 => 29,  42 => 28,  39 => 27,  35 => 25,  32 => 24,  30 => 23,  27 => 22,  21 => 20,  19 => 19,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Theme override for a set of filter tips.*/
/*  **/
/*  * Available variables:*/
/*  * - tips: Descriptions and a CSS ID in the form of 'module-name/filter-id'*/
/*  *   (only used when 'long' is TRUE) for each filter in one or more text*/
/*  *   formats.*/
/*  * - long: A flag indicating whether the passed-in filter tips contain extended*/
/*  *   explanations, i.e. intended to be output on the path 'filter/tips'*/
/*  *   (TRUE), or are in a short format, i.e. suitable to be displayed below a*/
/*  *   form element. Defaults to FALSE.*/
/*  * - multiple: A flag indicating there is more than one filter tip.*/
/*  **/
/*  * @see template_preprocess_filter_tips()*/
/*  *//* */
/* #}*/
/* {% if multiple %}*/
/*   <h2>{{ 'Text Formats'|t }}</h2>*/
/* {% endif %}*/
/* */
/* {% if tips|length %}*/
/*   {% if multiple %}*/
/*     <div class="compose-tips">*/
/*   {% endif %}*/
/* */
/*   {% for name, tip in tips %}*/
/*     {% if multiple %}*/
/*       {%*/
/*         set tip_classes = [*/
/*           'filter-type',*/
/*           'filter-' ~ name|clean_class,*/
/*         ]*/
/*       %}*/
/*       <div{{ tip.attributes.addClass(tip_classes) }}>*/
/*       <h3>{{ tip.name }}</h3>*/
/*     {% endif %}*/
/* */
/*     {% if tip.list|length %}*/
/*       <ul class="tips">*/
/*       {% for item in tip.list %}*/
/*         {%*/
/*           set item_classes = [*/
/*             long ? 'filter-' ~ item.id|replace({'/': '-'}),*/
/*           ]*/
/*         %}*/
/*         <li{{ item.attributes.addClass(item_classes) }}>{{ item.tip }}</li>*/
/*       {% endfor %}*/
/*       </ul>*/
/*     {% endif %}*/
/* */
/*     {% if multiple %}*/
/*       </div>*/
/*     {% endif %}*/
/*   {% endfor %}*/
/* */
/*   {% if multiple %}*/
/*     </div>*/
/*   {% endif %}*/
/* {% endif %}*/
/* */
