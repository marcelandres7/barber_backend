<?php

/* @App/Backend/_index.html.twig */
class __TwigTemplate_46a73126b92c7c7e1c0835678b011c219ac13f5d41cc4b088239925b14accc98 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/_index.html.twig"));

        // line 1
        echo "<div class=\"page-header\">
    <div class=\"page-block\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-12\">
                <div class=\"page-header-title\">
                    <h5 class=\"m-b-10\">
                        ";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "
                        ";
        // line 8
        if ((isset($context["staff"]) || array_key_exists("staff", $context))) {
            // line 9
            echo "                            <small> >> ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["staff"]) ? $context["staff"] : $this->getContext($context, "staff")), "name", array()), "html", null, true);
            echo "</small>
                        ";
        }
        // line 11
        echo "                    </h5>
                </div>
                ";
        // line 13
        if ( !(isset($context["staff"]) || array_key_exists("staff", $context))) {
            // line 14
            echo "                    <ul class=\"breadcrumb\">
                        <li class=\"breadcrumb-item\"><a href=\"";
            // line 15
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_main");
            echo "\"><i class=\"feather icon-home\"></i></a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">";
            // line 16
            echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
            echo "</a></li>
                    </ul>
                ";
        }
        // line 19
        echo "            </div>
        </div>
    </div>
</div>

<div class=\"main-body\">
    <div class=\"page-wrapper\">
        <div class=\"row\">
            <div class=\"col-sm-12\">
\t\t\t\t\t
\t\t\t\t";
        // line 29
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

\t\t\t\t";
        // line 32
        echo "\t\t\t
\t\t\t\t\t";
        // line 33
        if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "wp", array(), "array")) {
            // line 34
            echo "                        ";
            if ((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form"))) {
                // line 35
                echo "                            ";
                echo twig_include($this->env, $context, "@App/Backend/create_modal.html.twig", array("title" =>                 // line 39
(isset($context["singleTitle"]) ? $context["singleTitle"] : $this->getContext($context, "singleTitle")), "form" =>                 // line 40
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "formPath" =>                 // line 41
(isset($context["formPath"]) ? $context["formPath"] : $this->getContext($context, "formPath"))));
                // line 44
                echo "
\t\t\t\t\t    ";
            }
            // line 46
            echo "\t\t\t\t\t";
        }
        // line 47
        echo "\t\t
\t\t\t\t\t";
        // line 48
        if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "rp", array(), "array")) {
            // line 49
            echo "\t\t\t\t\t\t";
            echo twig_include($this->env, $context, (isset($context["listPath"]) ? $context["listPath"] : $this->getContext($context, "listPath")), array("entities" => (isset($context["entities"]) ? $context["entities"] : $this->getContext($context, "entities"))));
            echo "
\t\t\t\t\t";
        }
        // line 51
        echo "
                    ";
        // line 52
        if ((isset($context["staff"]) || array_key_exists("staff", $context))) {
            // line 53
            echo "                        <div class=\"col-xs-12\" align=\"right\">
                            <a class=\"upload-link btn btn-primary\" href=\"";
            // line 54
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_staff");
            echo "\"> << Regresar </a>
                        </div>
                    ";
        }
        // line 57
        echo "\t\t
\t\t\t\t\t";
        // line 58
        echo twig_include($this->env, $context, "@App/Backend/confirm_modal.html.twig", array("confirmQuestion" =>         // line 61
(isset($context["deleteQuestion"]) ? $context["deleteQuestion"] : $this->getContext($context, "deleteQuestion"))));
        // line 63
        echo "
\t\t\t\t";
        // line 65
        echo "\t\t\t</div>
\t\t</div>
\t</div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/_index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 65,  130 => 63,  128 => 61,  127 => 58,  124 => 57,  118 => 54,  115 => 53,  113 => 52,  110 => 51,  104 => 49,  102 => 48,  99 => 47,  96 => 46,  92 => 44,  90 => 41,  89 => 40,  88 => 39,  86 => 35,  83 => 34,  81 => 33,  78 => 32,  73 => 29,  61 => 19,  55 => 16,  51 => 15,  48 => 14,  46 => 13,  42 => 11,  36 => 9,  34 => 8,  30 => 7,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"page-header\">
    <div class=\"page-block\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-12\">
                <div class=\"page-header-title\">
                    <h5 class=\"m-b-10\">
                        {{ title }}
                        {% if staff is defined %}
                            <small> >> {{ staff.name }}</small>
                        {% endif %}
                    </h5>
                </div>
                {% if staff is not defined %}
                    <ul class=\"breadcrumb\">
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('backend_main') }}\"><i class=\"feather icon-home\"></i></a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">{{ title }}</a></li>
                    </ul>
                {% endif %}
            </div>
        </div>
    </div>
</div>

<div class=\"main-body\">
    <div class=\"page-wrapper\">
        <div class=\"row\">
            <div class=\"col-sm-12\">
\t\t\t\t\t
\t\t\t\t{{ include('@App/Backend/flash_message.html.twig') }}

\t\t\t\t{#<div class=\"card\">#}
\t\t\t
\t\t\t\t\t{% if permits[\"wp\"] %}
                        {% if form %}
                            {{
                                include(
                                    '@App/Backend/create_modal.html.twig',
                                    {
                                        'title': singleTitle,
                                        'form': form,
                                        'formPath': formPath
                                    }
                                )
                            }}
\t\t\t\t\t    {% endif %}
\t\t\t\t\t{% endif %}
\t\t
\t\t\t\t\t{% if permits[\"rp\"] %}
\t\t\t\t\t\t{{ include(listPath, { 'entities': entities }) }}
\t\t\t\t\t{% endif %}

                    {% if staff is defined %}
                        <div class=\"col-xs-12\" align=\"right\">
                            <a class=\"upload-link btn btn-primary\" href=\"{{ path('backend_staff') }}\"> << Regresar </a>
                        </div>
                    {% endif %}
\t\t
\t\t\t\t\t{{ include(
                        '@App/Backend/confirm_modal.html.twig',
                        {
                            'confirmQuestion': deleteQuestion
                        }
                    ) }}
\t\t\t\t{#</div>#}
\t\t\t</div>
\t\t</div>
\t</div>
</div>", "@App/Backend/_index.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\_index.html.twig");
    }
}
