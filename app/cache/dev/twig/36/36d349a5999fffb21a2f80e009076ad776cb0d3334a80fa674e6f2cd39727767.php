<?php

/* @App/Backend/Dashboard/statistics_list_by_result.html.twig */
class __TwigTemplate_f1ba4ad20653aa7a3308f5bda900b42290950af234d4e07a36149e15b63fceac extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "@App/Backend/Dashboard/statistics_list_by_result.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@App/Backend/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/Dashboard/statistics_list_by_result.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "<div class=\"card-header\">
    <h5>Listado de Requisitos Evaluados</h5>
    <div class=\"card-header-right\">
        <div class=\"btn-group card-option\">
            <button type=\"button\" class=\"btn dropdown-toggle btn-icon\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <i class=\"feather icon-more-horizontal\"></i>
            </button>
            <ul class=\"list-unstyled card-option dropdown-menu dropdown-menu-right\">
                <li class=\"dropdown-item full-card\"><a href=\"#!\"><span><i class=\"feather icon-maximize\"></i> Maximize</span><span style=\"display:none\"><i class=\"feather icon-minimize\"></i> Restore</span></a></li>
                <li class=\"dropdown-item minimize-card\"><a href=\"#!\"><span><i class=\"feather icon-minus\"></i> Collapse</span><span style=\"display:none\"><i class=\"feather icon-plus\"></i> Expand</span></a></li>
            </ul>
        </div>
    </div>
</div>

<div class=\"card-block table-border-style\">
    <div class=\"table-responsive\">
         <table class=\"table table-hover dataTable\">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Articulo</th>
                    <th>Tipo Requisito</th>
                    <th>Herramienta</th>     
                </tr>
            </thead>
            <tbody>
                ";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 32
            echo "                    <tr>
                        <td style='white-space:normal !important;'><div style='width:200px;white-space:normal !important;'>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</td>
                        <td style='white-space:normal !important;'><div style='width:200px;white-space:normal !important;'>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "law_reference", array()), "html", null, true);
            echo "</td>
                        <td style='white-space:normal !important;'><div style='width:200px;white-space:normal !important;'>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "type_name", array()), "html", null, true);
            echo "</td>
                         <td> <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
            // line 36
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_statistics_detail_requirement", array("requirement" => $this->getAttribute($context["item"], "requirement_id", array()), "iid" => (isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")))), "html", null, true);
            echo "\" title=\"Ver detalles\" data-toggle=\"tooltip\">
                                <i class=\"fa fa-search\"></i>
                            </a>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "            </tbody>
        </table> 
    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/Dashboard/statistics_list_by_result.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  100 => 42,  88 => 36,  84 => 35,  80 => 34,  76 => 33,  73 => 32,  69 => 31,  40 => 4,  34 => 3,  11 => 1,);
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
<div class=\"card-header\">
    <h5>Listado de Requisitos Evaluados</h5>
    <div class=\"card-header-right\">
        <div class=\"btn-group card-option\">
            <button type=\"button\" class=\"btn dropdown-toggle btn-icon\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                <i class=\"feather icon-more-horizontal\"></i>
            </button>
            <ul class=\"list-unstyled card-option dropdown-menu dropdown-menu-right\">
                <li class=\"dropdown-item full-card\"><a href=\"#!\"><span><i class=\"feather icon-maximize\"></i> Maximize</span><span style=\"display:none\"><i class=\"feather icon-minimize\"></i> Restore</span></a></li>
                <li class=\"dropdown-item minimize-card\"><a href=\"#!\"><span><i class=\"feather icon-minus\"></i> Collapse</span><span style=\"display:none\"><i class=\"feather icon-plus\"></i> Expand</span></a></li>
            </ul>
        </div>
    </div>
</div>

<div class=\"card-block table-border-style\">
    <div class=\"table-responsive\">
         <table class=\"table table-hover dataTable\">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Articulo</th>
                    <th>Tipo Requisito</th>
                    <th>Herramienta</th>     
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td style='white-space:normal !important;'><div style='width:200px;white-space:normal !important;'>{{ item.name }}</td>
                        <td style='white-space:normal !important;'><div style='width:200px;white-space:normal !important;'>{{ item.law_reference }}</td>
                        <td style='white-space:normal !important;'><div style='width:200px;white-space:normal !important;'>{{ item.type_name }}</td>
                         <td> <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{path('backend_statistics_detail_requirement', {'requirement': item.requirement_id , 'iid': inspection })}}\" title=\"Ver detalles\" data-toggle=\"tooltip\">
                                <i class=\"fa fa-search\"></i>
                            </a>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table> 
    </div>
</div>
{% endblock %}", "@App/Backend/Dashboard/statistics_list_by_result.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\Dashboard\\statistics_list_by_result.html.twig");
    }
}
