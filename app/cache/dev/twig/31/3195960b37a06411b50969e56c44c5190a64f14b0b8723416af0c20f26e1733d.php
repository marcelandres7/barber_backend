<?php

/* AppBundle:Backend:loading_css.html.twig */
class __TwigTemplate_a1c46ee09797dae7cc44de8b0ccb80805b28698387908e0ac126cb11dec13b4c extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend:loading_css.html.twig"));

        // line 1
        echo "<div id=\"";
        echo twig_escape_filter($this->env, (((isset($context["id"]) || array_key_exists("id", $context))) ? (_twig_default_filter((isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")), "ajax-loader")) : ("ajax-loader")), "html", null, true);
        echo "\" class=\"loading-animation-panel\">
    <div class=\"sk-circle\">
        <div class=\"sk-circle1 sk-child\"></div>
        <div class=\"sk-circle2 sk-child\"></div>
        <div class=\"sk-circle3 sk-child\"></div>
        <div class=\"sk-circle4 sk-child\"></div>
        <div class=\"sk-circle5 sk-child\"></div>
        <div class=\"sk-circle6 sk-child\"></div>
        <div class=\"sk-circle7 sk-child\"></div>
        <div class=\"sk-circle8 sk-child\"></div>
        <div class=\"sk-circle9 sk-child\"></div>
        <div class=\"sk-circle10 sk-child\"></div>
        <div class=\"sk-circle11 sk-child\"></div>
        <div class=\"sk-circle12 sk-child\"></div>
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend:loading_css.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"{{ id|default('ajax-loader') }}\" class=\"loading-animation-panel\">
    <div class=\"sk-circle\">
        <div class=\"sk-circle1 sk-child\"></div>
        <div class=\"sk-circle2 sk-child\"></div>
        <div class=\"sk-circle3 sk-child\"></div>
        <div class=\"sk-circle4 sk-child\"></div>
        <div class=\"sk-circle5 sk-child\"></div>
        <div class=\"sk-circle6 sk-child\"></div>
        <div class=\"sk-circle7 sk-child\"></div>
        <div class=\"sk-circle8 sk-child\"></div>
        <div class=\"sk-circle9 sk-child\"></div>
        <div class=\"sk-circle10 sk-child\"></div>
        <div class=\"sk-circle11 sk-child\"></div>
        <div class=\"sk-circle12 sk-child\"></div>
    </div>
</div>", "AppBundle:Backend:loading_css.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/loading_css.html.twig");
    }
}
