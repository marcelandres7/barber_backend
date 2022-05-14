<?php

/* AppBundle:Backend:create_modal.html.twig */
class __TwigTemplate_781696fa14165e6af2a19db2a11676c1362f38512b5d536edde3bd8f3565cbcb extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend:create_modal.html.twig"));

        // line 1
        echo "<div id=\"exampleModalLive\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLiveLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-lg\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header theme-bg\">
\t\t\t\t<h5 class=\"modal-title text-white\" id=\"exampleModalLiveLabel\">Agregar ";
        // line 5
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h5>
\t\t\t\t<button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t";
        // line 9
        echo twig_include($this->env, $context, (isset($context["formPath"]) ? $context["formPath"] : $this->getContext($context, "formPath")), array("form" => (isset($context["form"]) ? $context["form"] : $this->getContext($context, "form"))));
        echo "
\t\t\t</div>
\t\t</div>
\t</div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend:create_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 9,  28 => 5,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"exampleModalLive\" class=\"modal fade\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLiveLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-lg\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header theme-bg\">
\t\t\t\t<h5 class=\"modal-title text-white\" id=\"exampleModalLiveLabel\">Agregar {{ title }}</h5>
\t\t\t\t<button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t{{ include(formPath, { 'form': form }) }}
\t\t\t</div>
\t\t</div>
\t</div>
</div>", "AppBundle:Backend:create_modal.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/create_modal.html.twig");
    }
}
