<?php

/* AppBundle:Backend:dashboard.html.twig */
class __TwigTemplate_35e595f2576eae03c99121bd4549b822dbd82bb7bd0ca141e4e0e64c7ba43a8d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "AppBundle:Backend:dashboard.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'extra_scripts' => array($this, 'block_extra_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@App/Backend/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend:dashboard.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
        <!--<h1>
            Dashboard <small>Version 1.0</small>
        </h1>-->                
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
            <li class=\"active\">Dashboard</li>
        </ol>
    </section>
\t<br>
    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
        \t<div class=\"col-lg-12 col-xs-12\">
\t\t\t<div class=\"box\">
\t\t\t<div class=\"box-header with-border\">
\t\t\t<h3 class=\"box-title\">Noticias</h3>
\t\t\t<div class=\"box-tools pull-right\">
\t\t\t<button class=\"btn btn-box-tool\" type=\"button\" data-widget=\"collapse\" data-toggle=\"tooltip\" title=\"Collapse\">
\t\t\t<i class=\"fa fa-minus\"></i>
\t\t\t</button>
\t\t\t<button class=\"btn btn-box-tool\" type=\"button\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
\t\t\t<i class=\"fa fa-times\"></i>
\t\t\t</button>
\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"box-body\"> Contenido de noticias </div>
\t\t\t<div class=\"box-footer\"> Footer </div>
\t\t\t</div>
\t\t\t</div>
        </div>\t
        <!-- /.row -->
    </section>
    <!-- /.content -->
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 41
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 42
        echo "

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend:dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 42,  83 => 41,  41 => 4,  35 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@App/Backend/base.html.twig' %}

{% block body %}
    <!-- Content Header (Page header) -->
    <section class=\"content-header\">
        <!--<h1>
            Dashboard <small>Version 1.0</small>
        </h1>-->                
        <ol class=\"breadcrumb\">
            <li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
            <li class=\"active\">Dashboard</li>
        </ol>
    </section>
\t<br>
    <!-- Main content -->
    <section class=\"content\">
        <div class=\"row\">
        \t<div class=\"col-lg-12 col-xs-12\">
\t\t\t<div class=\"box\">
\t\t\t<div class=\"box-header with-border\">
\t\t\t<h3 class=\"box-title\">Noticias</h3>
\t\t\t<div class=\"box-tools pull-right\">
\t\t\t<button class=\"btn btn-box-tool\" type=\"button\" data-widget=\"collapse\" data-toggle=\"tooltip\" title=\"Collapse\">
\t\t\t<i class=\"fa fa-minus\"></i>
\t\t\t</button>
\t\t\t<button class=\"btn btn-box-tool\" type=\"button\" data-widget=\"remove\" data-toggle=\"tooltip\" title=\"Remove\">
\t\t\t<i class=\"fa fa-times\"></i>
\t\t\t</button>
\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"box-body\"> Contenido de noticias </div>
\t\t\t<div class=\"box-footer\"> Footer </div>
\t\t\t</div>
\t\t\t</div>
        </div>\t
        <!-- /.row -->
    </section>
    <!-- /.content -->
{% endblock %}

{% block extra_scripts %}


{% endblock %}", "AppBundle:Backend:dashboard.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/dashboard.html.twig");
    }
}
