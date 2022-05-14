<?php

/* AppBundle:Backend:_edit.html.twig */
class __TwigTemplate_ebf51e74561edb368ad49adf225032be84ca0489011ede605809b5796ff339ec extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend:_edit.html.twig"));

        // line 1
        echo "<div class=\"page-header\">
    <div class=\"page-block\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-12\">
                <div class=\"page-header-title\">
                    <h5 class=\"m-b-10\">";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["editTitle"]) ? $context["editTitle"] : $this->getContext($context, "editTitle")), "html", null, true);
        echo "</h5>
                </div>
                <ul class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"#!\"><i class=\"feather icon-home\"></i></a></li>
                    <li class=\"breadcrumb-item\"><a href=\"";
        // line 10
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath((isset($context["titleRoute"]) ? $context["titleRoute"] : $this->getContext($context, "titleRoute")));
        echo "\">";
        echo twig_escape_filter($this->env, (isset($context["smallTitle"]) ? $context["smallTitle"] : $this->getContext($context, "smallTitle")), "html", null, true);
        echo "</a></li>
                    <li class=\"breadcrumb-item\"><a href=\"#!\">Editar</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class=\"main-body\">
    <div class=\"page-wrapper\">
        <div class=\"row\">
            <div class=\"col-sm-12\">
\t\t\t\t\t
\t\t\t\t";
        // line 23
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-header\">
    \t\t\t\t\t<h5>Editar ";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["smallTitle"]) ? $context["smallTitle"] : $this->getContext($context, "smallTitle")), "html", null, true);
        echo "</h5>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"card-block\">
\t\t\t\t\t\t";
        // line 30
        echo twig_include($this->env, $context, (isset($context["formPath"]) ? $context["formPath"] : $this->getContext($context, "formPath")), array("form" => (isset($context["form"]) ? $context["form"] : $this->getContext($context, "form"))));
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend:_edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 30,  61 => 27,  54 => 23,  36 => 10,  29 => 6,  22 => 1,);
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
                    <h5 class=\"m-b-10\">{{ editTitle }}</h5>
                </div>
                <ul class=\"breadcrumb\">
                    <li class=\"breadcrumb-item\"><a href=\"#!\"><i class=\"feather icon-home\"></i></a></li>
                    <li class=\"breadcrumb-item\"><a href=\"{{ path(titleRoute) }}\">{{ smallTitle }}</a></li>
                    <li class=\"breadcrumb-item\"><a href=\"#!\">Editar</a></li>
                </ul>
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

\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-header\">
    \t\t\t\t\t<h5>Editar {{ smallTitle }}</h5>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"card-block\">
\t\t\t\t\t\t{{ include(formPath, { 'form': form }) }}
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>", "AppBundle:Backend:_edit.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/_edit.html.twig");
    }
}
