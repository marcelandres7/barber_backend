<?php

/* AppBundle:Backend/Dashboard:statistics_detail.html.twig */
class __TwigTemplate_ac097c4fc3358693b64e3cdf8a8eef668589e5ac4a0c799b19c92a5d445c6e7f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "AppBundle:Backend/Dashboard:statistics_detail.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/Dashboard:statistics_detail.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"page-header\">
        <div class=\"page-block\">
            <div class=\"row align-items-center\">
                <div class=\"col-md-6 col-9\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Resultados</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_statistics");
        echo "\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_statistics");
        echo "\">Listado de ejecución</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Resultados</a></li>
                    </ul>                    
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    
                </div>
            </div>
        </div>
    </div>

    ";
        // line 24
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "
                    
    <div class=\"main-body\">
        <div class=\"page-wrapper\">
\t        
\t\t\t<div class=\"row\">
                <div class=\"col-sm-12\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t <div class=\"card-block\">\t                
\t\t\t\t\t\t\t <div class='row'>
\t\t\t\t\t\t\t\t <div class='col-md-6'>
\t\t\t\t\t\t\t\t\t <h4>";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")), "organization", array()), "name", array()), "html", null, true);
        echo " <i class='fa fa-chevron-right'></i> ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")), "branch", array()), "name", array()), "html", null, true);
        echo "</h4>
\t\t\t\t\t\t\t\t\t Fecha de Inicio: <b>";
        // line 36
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")), "createdAt", array()), "Y-m-d H:i:s"), "html", null, true);
        echo "</b><br>
\t\t\t\t\t\t\t\t\t Última actualización: <b>";
        // line 37
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")), "updatedAt", array()), "Y-m-d H:i:s"), "html", null, true);
        echo "</b><br>
\t\t\t\t\t\t\t\t\t Servicio: <b>";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")), "service", array()), "name", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")), "requerimentGroup", array()), "name", array()), "html", null, true);
        echo ")</b>
\t\t\t\t\t\t\t\t </div>\t 
\t\t\t\t\t\t\t\t <div class='col-md-6'>
\t\t\t\t\t\t\t\t\t Realizado por:<br>
\t\t\t\t\t\t\t\t\t <h4>";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")), "assignedUser", array()), "firstName", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["inspection"]) ? $context["inspection"] : $this->getContext($context, "inspection")), "assignedUser", array()), "lastName", array()), "html", null, true);
        echo "</h4>
\t\t\t\t\t\t\t\t </div>\t \t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t </div>
\t\t\t\t\t\t </div>
\t\t\t\t\t</div>\t \t 
                </div>
\t\t\t</div>    
\t        
            <div class=\"row\">
\t            ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["summary"]) ? $context["summary"] : $this->getContext($context, "summary")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 52
            echo "                <div class=\"col-sm-3\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t <div class=\"card-block\">
\t\t\t\t\t\t \t<h5 class=\"mb-4\">";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "result_name", array()), "html", null, true);
            echo "</h5>
\t\t\t\t\t\t \t<h3 class=\"mb-4\">";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "quantity", array()), "html", null, true);
            echo "</h3>
\t\t\t\t\t\t \t<a href=\"";
            // line 57
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_statistics_detail");
            echo "\" class=\"label theme-bg text-white f-12\">Ver detalles</a>
\t\t\t\t\t\t \t<br><br>
\t\t\t\t\t\t \t";
            // line 59
            if (($this->getAttribute($context["item"], "amount_penalty", array()) > 0)) {
                // line 60
                echo "\t\t\t\t\t\t\t \t<p style='color:tomato'>Penalización de <b>\$";
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["item"], "amount_penalty", array())), "html", null, true);
                echo "</b></p>
\t\t\t\t\t\t\t";
            } else {
                // line 62
                echo "\t\t\t\t\t\t\t \t<p>&nbsp;</p> \t
\t\t\t\t\t\t \t";
            }
            // line 64
            echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 72
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 73
        echo "    <script type=\"text/javascript\">       
        \$(document).ready(function () {
            \$('.dataTable').DataTable({
                \"stateSave\": true
            });
            \$('#sForm').validate({
                submitHandler: function (form) {
                    var saveButton = document.getElementById(\"button-save\");
                    var validateForm = document.getElementById(\"sForm\");
                    saveButton.setAttribute(\"disabled\", true);
                    saveButton.innerHTML = \"<span class='spinner-border spinner-border-sm' role='status'></span> Loading...\";
                    var elements = validateForm.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = true;
                    }
                    document.getElementById(\"sForm\").submit();
                }
            });
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/Dashboard:statistics_detail.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 73,  173 => 72,  163 => 68,  154 => 64,  150 => 62,  144 => 60,  142 => 59,  137 => 57,  133 => 56,  129 => 55,  124 => 52,  120 => 51,  106 => 42,  97 => 38,  93 => 37,  89 => 36,  83 => 35,  69 => 24,  55 => 13,  51 => 12,  41 => 4,  35 => 3,  11 => 1,);
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
    <div class=\"page-header\">
        <div class=\"page-block\">
            <div class=\"row align-items-center\">
                <div class=\"col-md-6 col-9\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Resultados</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"{{ path('backend_statistics') }}\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('backend_statistics') }}\">Listado de ejecución</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Resultados</a></li>
                    </ul>                    
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    
                </div>
            </div>
        </div>
    </div>

    {{ include('@App/Backend/flash_message.html.twig') }}
                    
    <div class=\"main-body\">
        <div class=\"page-wrapper\">
\t        
\t\t\t<div class=\"row\">
                <div class=\"col-sm-12\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t <div class=\"card-block\">\t                
\t\t\t\t\t\t\t <div class='row'>
\t\t\t\t\t\t\t\t <div class='col-md-6'>
\t\t\t\t\t\t\t\t\t <h4>{{inspection.organization.name}} <i class='fa fa-chevron-right'></i> {{inspection.branch.name}}</h4>
\t\t\t\t\t\t\t\t\t Fecha de Inicio: <b>{{inspection.createdAt | date('Y-m-d H:i:s')}}</b><br>
\t\t\t\t\t\t\t\t\t Última actualización: <b>{{inspection.updatedAt | date('Y-m-d H:i:s')}}</b><br>
\t\t\t\t\t\t\t\t\t Servicio: <b>{{inspection.service.name}} ({{inspection.requerimentGroup.name}})</b>
\t\t\t\t\t\t\t\t </div>\t 
\t\t\t\t\t\t\t\t <div class='col-md-6'>
\t\t\t\t\t\t\t\t\t Realizado por:<br>
\t\t\t\t\t\t\t\t\t <h4>{{inspection.assignedUser.firstName}} {{inspection.assignedUser.lastName}}</h4>
\t\t\t\t\t\t\t\t </div>\t \t\t\t\t\t\t\t\t 
\t\t\t\t\t\t\t </div>
\t\t\t\t\t\t </div>
\t\t\t\t\t</div>\t \t 
                </div>
\t\t\t</div>    
\t        
            <div class=\"row\">
\t            {% for item in summary %}
                <div class=\"col-sm-3\">
\t\t\t\t\t<div class=\"card\">
\t\t\t\t\t\t <div class=\"card-block\">
\t\t\t\t\t\t \t<h5 class=\"mb-4\">{{item.result_name}}</h5>
\t\t\t\t\t\t \t<h3 class=\"mb-4\">{{item.quantity}}</h3>
\t\t\t\t\t\t \t<a href=\"{{path('backend_statistics_detail')}}\" class=\"label theme-bg text-white f-12\">Ver detalles</a>
\t\t\t\t\t\t \t<br><br>
\t\t\t\t\t\t \t{% if item.amount_penalty > 0 %}
\t\t\t\t\t\t\t \t<p style='color:tomato'>Penalización de <b>\${{item.amount_penalty | number_format}}</b></p>
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t \t<p>&nbsp;</p> \t
\t\t\t\t\t\t \t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
                </div>
                {% endfor %}
            </div>
        </div>
    </div>
{% endblock %}
{% block extra_scripts %}
    <script type=\"text/javascript\">       
        \$(document).ready(function () {
            \$('.dataTable').DataTable({
                \"stateSave\": true
            });
            \$('#sForm').validate({
                submitHandler: function (form) {
                    var saveButton = document.getElementById(\"button-save\");
                    var validateForm = document.getElementById(\"sForm\");
                    saveButton.setAttribute(\"disabled\", true);
                    saveButton.innerHTML = \"<span class='spinner-border spinner-border-sm' role='status'></span> Loading...\";
                    var elements = validateForm.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = true;
                    }
                    document.getElementById(\"sForm\").submit();
                }
            });
        });
    </script>
{% endblock %}", "AppBundle:Backend/Dashboard:statistics_detail.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/Dashboard/statistics_detail.html.twig");
    }
}
