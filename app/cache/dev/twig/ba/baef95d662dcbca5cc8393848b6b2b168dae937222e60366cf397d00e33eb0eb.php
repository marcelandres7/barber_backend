<?php

/* AppBundle:Backend/InspectionResult:list.html.twig */
class __TwigTemplate_e06322f5695f208212101e7e3cf257fc8ba298a00b8c3398139573065f940cad extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/InspectionResult:list.html.twig"));

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
        <table class=\"table table-hover dataTable\">
            <thead>
                <tr>
                    <th>Nombre / Name</th>
                    <th>Descripción</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 29
            echo "                    <tr>
                        <td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "nameEng", array()), "html", null, true);
            echo "</td>
                        <td>

                            ";
            // line 33
            if (($this->getAttribute($context["item"], "inspectionResultId", array()) > 2)) {
                // line 34
                echo "                                <a class=\"btn btn-icon text-white\" style=\"width:150px;background: linear-gradient(-135deg,#23b7e5 0%,#1de9b6 100%);\" href=\"javascript;\" data-toggle=\"modal\" data-target=\"#viewContent";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inspectionResultId", array()), "html", null, true);
                echo "\">
                                    Ver Contenido
                                </a>
                            ";
            } else {
                // line 38
                echo "                                Estatus Obligatorio / No modificable\t                            
                            ";
            }
            // line 40
            echo "                        </td>
                        <td>
                            ";
            // line 42
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "dp", array(), "array")) {
                // line 43
                echo "                                ";
                if (($this->getAttribute($context["item"], "inspectionResultId", array()) > 2)) {
                    // line 44
                    echo "                                    <div class=\"form-group\">
                                        <div class=\"switch switch-success d-inline m-r-10\">
                                            <input type=\"checkbox\" id=\"switch-";
                    // line 46
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inspectionResultId", array()), "html", null, true);
                    echo "\" ";
                    if (($this->getAttribute($context["item"], "isActive", array()) == "1")) {
                        echo "checked";
                    }
                    echo " onchange=\"activeChange(";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inspectionResultId", array()), "html", null, true);
                    echo ")\" >
                                            <label for=\"switch-";
                    // line 47
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inspectionResultId", array()), "html", null, true);
                    echo "\" class=\"cr\"></label> 
                                        </div>
                                    </div>
                                ";
                }
                // line 51
                echo "                            ";
            }
            // line 52
            echo "                        </td>
                        <td>
                            ";
            // line 54
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "ep", array(), "array")) {
                // line 55
                echo "                                ";
                if (($this->getAttribute($context["item"], "inspectionResultId", array()) > 2)) {
                    echo "                            
                                    <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
                    // line 56
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_inspection_result_edit", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "inspectionResultId", array())))), "html", null, true);
                    echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                        <i class=\"feather icon-edit-1\"></i>
                                    </a>
                                ";
                }
                // line 59
                echo "   
                            ";
            }
            // line 61
            echo "                        </td>
                    </tr>
                    <!-- The Modal -->
                <div class=\"modal fade\" id=\"viewContent";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "inspectionResultId", array()), "html", null, true);
            echo "\">
                    <div class=\"modal-dialog\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h5 class=\"modal-title\">Contenido / Content</h5>
                                <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                            </div>
                            <div class=\"modal-body\">
                                <p>
                                    ";
            // line 73
            echo $this->getAttribute($context["item"], "description", array());
            echo "
                                </p>
                                <p>
                                    ";
            // line 76
            echo $this->getAttribute($context["item"], "descriptionEng", array());
            echo "
                                </p>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-rounded btn-outline-danger\" data-dismiss=\"modal\">Cerrar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 88
        echo "            </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/InspectionResult:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 88,  158 => 76,  152 => 73,  140 => 64,  135 => 61,  131 => 59,  124 => 56,  119 => 55,  117 => 54,  113 => 52,  110 => 51,  103 => 47,  93 => 46,  89 => 44,  86 => 43,  84 => 42,  80 => 40,  76 => 38,  68 => 34,  66 => 33,  58 => 30,  55 => 29,  51 => 28,  22 => 1,);
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
        <table class=\"table table-hover dataTable\">
            <thead>
                <tr>
                    <th>Nombre / Name</th>
                    <th>Descripción</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.name }} / {{ item.nameEng }}</td>
                        <td>

                            {% if item.inspectionResultId > 2 %}
                                <a class=\"btn btn-icon text-white\" style=\"width:150px;background: linear-gradient(-135deg,#23b7e5 0%,#1de9b6 100%);\" href=\"javascript;\" data-toggle=\"modal\" data-target=\"#viewContent{{ item.inspectionResultId }}\">
                                    Ver Contenido
                                </a>
                            {% else %}
                                Estatus Obligatorio / No modificable\t                            
                            {% endif %}
                        </td>
                        <td>
                            {% if permits[\"dp\"] %}
                                {% if item.inspectionResultId > 2 %}
                                    <div class=\"form-group\">
                                        <div class=\"switch switch-success d-inline m-r-10\">
                                            <input type=\"checkbox\" id=\"switch-{{ item.inspectionResultId }}\" {% if item.isActive == '1' %}checked{% endif %} onchange=\"activeChange({{ item.inspectionResultId }})\" >
                                            <label for=\"switch-{{ item.inspectionResultId }}\" class=\"cr\"></label> 
                                        </div>
                                    </div>
                                {% endif %}
                            {% endif %}
                        </td>
                        <td>
                            {% if permits[\"ep\"] %}
                                {% if item.inspectionResultId > 2 %}                            
                                    <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_inspection_result_edit', {'id': item.inspectionResultId|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                        <i class=\"feather icon-edit-1\"></i>
                                    </a>
                                {% endif %}   
                            {% endif %}
                        </td>
                    </tr>
                    <!-- The Modal -->
                <div class=\"modal fade\" id=\"viewContent{{item.inspectionResultId}}\">
                    <div class=\"modal-dialog\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h5 class=\"modal-title\">Contenido / Content</h5>
                                <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                            </div>
                            <div class=\"modal-body\">
                                <p>
                                    {{ item.description|raw }}
                                </p>
                                <p>
                                    {{ item.descriptionEng|raw }}
                                </p>
                            </div>
                            <div class=\"modal-footer\">
                                <button type=\"button\" class=\"btn btn-rounded btn-outline-danger\" data-dismiss=\"modal\">Cerrar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>



", "AppBundle:Backend/InspectionResult:list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/InspectionResult/list.html.twig");
    }
}
