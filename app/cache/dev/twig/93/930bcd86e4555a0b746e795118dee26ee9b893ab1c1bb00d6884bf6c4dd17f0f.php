<?php

/* AppBundle:Backend/InspectionStatus:list.html.twig */
class __TwigTemplate_f0560f22a0e45e931ad268df62b6dc2e5af1fe14110ce937bc2f54d1d93f398e extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/InspectionStatus:list.html.twig"));

        // line 1
        echo "<div class=\"card-header\">
    <h5>Listado</h5>
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
        <table class=\"table table-hover\">
            <thead>
                <tr>
                    <th>Nombre / Name</th>
                    ";
        // line 24
        echo "                    <th>Orden</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 31
            echo "                    <tr>
                        <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "nameEng", array()), "html", null, true);
            echo "</td>
                        ";
            // line 35
            echo "                        <td>";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "weight", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 37
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "dp", array(), "array")) {
                // line 38
                echo "                            \t";
                if (($this->getAttribute($context["item"], "inspectionStatusId", array()) > 3)) {
                    // line 39
                    echo "\t                                <div class=\"form-group\">
\t                                    <div class=\"switch switch-success d-inline m-r-10\">
\t                                        <input type=\"checkbox\" id=\"switch-";
                    // line 41
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inspectionStatusId", array()), "html", null, true);
                    echo "\" ";
                    if (($this->getAttribute($context["item"], "isActive", array()) == "1")) {
                        echo "checked";
                    }
                    echo " onchange=\"activeChange(";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inspectionStatusId", array()), "html", null, true);
                    echo ")\" >
\t                                        <label for=\"switch-";
                    // line 42
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inspectionStatusId", array()), "html", null, true);
                    echo "\" class=\"cr\"></label> 
\t                                    </div>
\t                                </div>
                                ";
                }
                // line 46
                echo "                            ";
            }
            // line 47
            echo "                        </td>
                        <td>
                            ";
            // line 49
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "ep", array(), "array")) {
                // line 50
                echo "                            \t";
                if (($this->getAttribute($context["item"], "inspectionStatusId", array()) > 3)) {
                    echo "                            
\t                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
                    // line 51
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_inspection_status_edit", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "inspectionStatusId", array())))), "html", null, true);
                    echo "\" title=\"Editar\" data-toggle=\"tooltip\">
\t                                    <i class=\"feather icon-edit-1\"></i>
\t                                </a>
\t                            ";
                }
                // line 54
                echo "    
                            ";
            }
            // line 56
            echo "                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "            </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/InspectionStatus:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 59,  123 => 56,  119 => 54,  112 => 51,  107 => 50,  105 => 49,  101 => 47,  98 => 46,  91 => 42,  81 => 41,  77 => 39,  74 => 38,  72 => 37,  66 => 35,  60 => 32,  57 => 31,  53 => 30,  45 => 24,  22 => 1,);
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
    <h5>Listado</h5>
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
        <table class=\"table table-hover\">
            <thead>
                <tr>
                    <th>Nombre / Name</th>
                    {#<th>Color personalizado</th>
                    <th>Icono personalizado</th>#}
                    <th>Orden</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.name }} / {{ item.nameEng }}</td>
                        {#<td>{{ item.customColor }}</td>
                        <td>{{ item.customIcon }}</td>#}
                        <td>{{ item.weight }}</td>
                        <td>
                            {% if permits[\"dp\"] %}
                            \t{% if item.inspectionStatusId > 3 %}
\t                                <div class=\"form-group\">
\t                                    <div class=\"switch switch-success d-inline m-r-10\">
\t                                        <input type=\"checkbox\" id=\"switch-{{ item.inspectionStatusId }}\" {% if item.isActive == '1' %}checked{% endif %} onchange=\"activeChange({{ item.inspectionStatusId }})\" >
\t                                        <label for=\"switch-{{ item.inspectionStatusId }}\" class=\"cr\"></label> 
\t                                    </div>
\t                                </div>
                                {% endif %}
                            {% endif %}
                        </td>
                        <td>
                            {% if permits[\"ep\"] %}
                            \t{% if item.inspectionStatusId > 3 %}                            
\t                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_inspection_status_edit', {'id': item.inspectionStatusId|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
\t                                    <i class=\"feather icon-edit-1\"></i>
\t                                </a>
\t                            {% endif %}    
                            {% endif %}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>



", "AppBundle:Backend/InspectionStatus:list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/InspectionStatus/list.html.twig");
    }
}
