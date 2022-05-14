<?php

/* @App/Backend/Dashboard/statistics_list.html.twig */
class __TwigTemplate_29883da1d027158adc30a9544ee451103b34e29fc106d5c19c6e34680e98e7b7 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/Dashboard/statistics_list.html.twig"));

        // line 1
        echo "<div class=\"card-header\">
    <h5>";
        // line 2
        if (((isset($context["isComplete"]) ? $context["isComplete"] : $this->getContext($context, "isComplete")) == 1)) {
            echo "Completados";
        }
        if (((isset($context["isComplete"]) ? $context["isComplete"] : $this->getContext($context, "isComplete")) == 0)) {
            echo "Pendientes";
        }
        if (((isset($context["isComplete"]) ? $context["isComplete"] : $this->getContext($context, "isComplete")) == 2)) {
            echo "Cancelados";
        }
        echo "</h5>
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
                    <th>Fecha</th>
                    <th>Avance</th>
                    <th>Estatus</th>                    
                    <th>Organizaci&oacute;n</th>                    
                    <th>Servicio</th>
                    <th>Asignado a</th>
                    <th>Herramientas</th>
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
                        <td>";
            // line 33
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "createdAt", array()), "d/m/Y"), "html", null, true);
            echo "</td>
                        <td>
\t                        <div class=\"progress\">
\t\t\t\t\t\t\t  <div class=\"progress-bar\" role=\"progressbar\" style=\"width: ";
            // line 36
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($context["item"], "progress", array()), "percent", array()) * 100), "html", null, true);
            echo "%\" aria-valuenow=\"";
            echo twig_escape_filter($this->env, ($this->getAttribute($this->getAttribute($context["item"], "progress", array()), "percent", array()) * 100), "html", null, true);
            echo "\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<small>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "progress", array()), "total_done", array()), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "progress", array()), "total_requirements", array()), "html", null, true);
            echo "</small>
                        </td>
                        <td>";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "currentInspectionStatus", array()), "name", array()), "html", null, true);
            echo "</td>                                                   
                        <td>";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "organization", array()), "name", array()), "html", null, true);
            echo "&nbsp;&nbsp;<i class='fa fa-chevron-right'></i>&nbsp;&nbsp;";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "branch", array()), "name", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "service", array()), "name", array()), "html", null, true);
            echo " (";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "requerimentGroup", array()), "name", array()), "html", null, true);
            echo ")</td>                           
                        <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "assignedUser", array()), "firstName", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "assignedUser", array()), "lastName", array()), "html", null, true);
            echo "</td>                                                
                        <td>
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_statistics_view", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "inspectionId", array())))), "html", null, true);
            echo "\" title=\"Ver detalles\" data-toggle=\"tooltip\">
                                <i class=\"fa fa-search\"></i>
                            </a>
                            
                            ";
            // line 49
            if (((isset($context["isComplete"]) ? $context["isComplete"] : $this->getContext($context, "isComplete")) == 0)) {
                // line 50
                echo "\t\t                             <span  title=\"Cancelar\" data-toggle=\"tooltip\">
                                        <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white cancel_button sweet-multiple\"
                                           data-id=\"";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "inspectionId", array()), "html", null, true);
                echo "\" data-name=\"registro\" 
                                           data-href=\"";
                // line 53
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_statistics", array("cid" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "inspectionId", array())), "cancel" => true)), "html", null, true);
                echo "\">
                                            <i class=\"fa fa-times\"></i>
                                        </a>
                                    </span>
                            
                            ";
            }
            // line 59
            echo "\t\t\t\t\t\t\t";
            if (((isset($context["isComplete"]) ? $context["isComplete"] : $this->getContext($context, "isComplete")) == 2)) {
                // line 60
                echo "\t\t                             <span  title=\"Activar\" data-toggle=\"tooltip\">
                                        <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-info text-white active_button sweet-multiple\"
                                           data-id=\"";
                // line 62
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "inspectionId", array()), "html", null, true);
                echo "\" data-name=\"registro\" 
                                           data-href=\"";
                // line 63
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_statistics", array("cid" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($this->getAttribute($context["item"], "inspection", array()), "inspectionId", array())), "cancel" => true)), "html", null, true);
                echo "\">
                                            <i class=\"fa fa-check\"></i>
                                        </a>
                                    </span>
                            
                            ";
            }
            // line 69
            echo "
                        </td>
                    </tr>
               
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "            </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/Dashboard/statistics_list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 74,  161 => 69,  152 => 63,  148 => 62,  144 => 60,  141 => 59,  132 => 53,  128 => 52,  124 => 50,  122 => 49,  115 => 45,  108 => 43,  102 => 42,  96 => 41,  92 => 40,  85 => 38,  78 => 36,  72 => 33,  69 => 32,  65 => 31,  25 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"card-header\">
    <h5>{% if isComplete == 1 %}Completados{% endif %}{% if isComplete == 0 %}Pendientes{% endif %}{% if isComplete == 2 %}Cancelados{% endif %}</h5>
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
                    <th>Fecha</th>
                    <th>Avance</th>
                    <th>Estatus</th>                    
                    <th>Organizaci&oacute;n</th>                    
                    <th>Servicio</th>
                    <th>Asignado a</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.inspection.createdAt | date(\"d/m/Y\") }}</td>
                        <td>
\t                        <div class=\"progress\">
\t\t\t\t\t\t\t  <div class=\"progress-bar\" role=\"progressbar\" style=\"width: {{item.progress.percent * 100}}%\" aria-valuenow=\"{{item.progress.percent * 100}}\" aria-valuemin=\"0\" aria-valuemax=\"100\"></div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<small>{{item.progress.total_done}} / {{item.progress.total_requirements}}</small>
                        </td>
                        <td>{{ item.inspection.currentInspectionStatus.name }}</td>                                                   
                        <td>{{ item.inspection.organization.name }}&nbsp;&nbsp;<i class='fa fa-chevron-right'></i>&nbsp;&nbsp;{{ item.inspection.branch.name }}</td>
                        <td>{{ item.inspection.service.name }} ({{ item.inspection.requerimentGroup.name }})</td>                           
                        <td>{{ item.inspection.assignedUser.firstName }} {{ item.inspection.assignedUser.lastName }}</td>                                                
                        <td>
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_statistics_view', {'id': item.inspection.inspectionId | md5}) }}\" title=\"Ver detalles\" data-toggle=\"tooltip\">
                                <i class=\"fa fa-search\"></i>
                            </a>
                            
                            {% if isComplete == 0 %}
\t\t                             <span  title=\"Cancelar\" data-toggle=\"tooltip\">
                                        <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white cancel_button sweet-multiple\"
                                           data-id=\"{{ item.inspection.inspectionId }}\" data-name=\"registro\" 
                                           data-href=\"{{ path('backend_statistics', {'cid': item.inspection.inspectionId | md5, 'cancel':true}) }}\">
                                            <i class=\"fa fa-times\"></i>
                                        </a>
                                    </span>
                            
                            {% endif %}
\t\t\t\t\t\t\t{% if isComplete == 2 %}
\t\t                             <span  title=\"Activar\" data-toggle=\"tooltip\">
                                        <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-info text-white active_button sweet-multiple\"
                                           data-id=\"{{ item.inspection.inspectionId }}\" data-name=\"registro\" 
                                           data-href=\"{{ path('backend_statistics', {'cid': item.inspection.inspectionId | md5, 'cancel':true}) }}\">
                                            <i class=\"fa fa-check\"></i>
                                        </a>
                                    </span>
                            
                            {% endif %}

                        </td>
                    </tr>
               
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>



", "@App/Backend/Dashboard/statistics_list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\Dashboard\\statistics_list.html.twig");
    }
}
