<?php

/* AppBundle:Backend/Requirement:list.html.twig */
class __TwigTemplate_b01303636579e5edbc76dc96fdabcebb01ced55e6a7042f0e61d1a0822ee606e extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/Requirement:list.html.twig"));

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
                    <th>Grupo de requisitos</th>
                    <th>Penalización por requisito</th>
                    <th>Tipo de requisito</th>
                    <th>Más detalles</th>
                    <th>Activo</th>
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
                        <td style='white-space:normal !important;'><div style='width:200px;white-space:normal !important;'>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "nameEng", array()), "html", null, true);
            echo "</div></td>
                        <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "requirementGroup", array()), "name", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "requirementPenalty", array()), "name", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "requirementType", array()), "name", array()), "html", null, true);
            echo "</td>
                        <td>
                            <a class=\"btn btn-sm text-white\" style=\"width:150px;background: linear-gradient(-135deg,#23b7e5 0%,#1de9b6 100%);\" href=\"javascript;\" data-toggle=\"modal\" data-target=\"#viewContent";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementId", array()), "html", null, true);
            echo "\">
                                Ver
                            </a>
                        </td>
                        <td>

                            <div class=\"form-group\">
                                <div class=\"switch switch-success d-inline m-r-10\">
                                    <input type=\"checkbox\" id=\"switch-";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementId", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($context["item"], "isActive", array()) == "1")) {
                echo "checked";
            }
            echo " onchange=\"activeChange(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementId", array()), "html", null, true);
            echo ")\" >
                                    <label for=\"switch-";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementId", array()), "html", null, true);
            echo "\" class=\"cr\"></label> 
                                </div>
                            </div>

                        </td>
                        <td>
\t                        ";
            // line 58
            echo "                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_requirement_edit", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "requirementId", array())))), "html", null, true);
            echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a>

                        </td>
                    </tr>
                    <!-- The Modal -->
                <div class=\"modal fade\" id=\"viewContent";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementId", array()), "html", null, true);
            echo "\">
                    <div class=\"modal-dialog\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h5 class=\"modal-title\">Bitacora</h5>
                                <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                            </div>
                            <div class=\"modal-body\">
                                <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <label><b>Peso</b></label>
                                        <p>";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "weight", array()), "html", null, true);
            echo "</p>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <label><b>Ley de referencia / Reference law</b></label>
                                        <p>";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "lawReference", array()), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "lawReferenceEng", array()), "html", null, true);
            echo "</p>
                                    </div>
                                    <div class=\"col-md-12\">
                                        <label><b>Contenido / Content</b></label>
                                        <p>
                                            ";
            // line 85
            echo $this->getAttribute($context["item"], "description", array());
            echo "
                                        </p>
                                        <p>
                                            ";
            // line 88
            echo $this->getAttribute($context["item"], "descriptionEng", array());
            echo "
                                        </p>
                                    </div>
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
        // line 101
        echo "                </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/Requirement:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  177 => 101,  158 => 88,  152 => 85,  142 => 80,  135 => 76,  121 => 65,  110 => 58,  101 => 47,  91 => 46,  80 => 38,  75 => 36,  71 => 35,  67 => 34,  61 => 33,  58 => 32,  54 => 31,  22 => 1,);
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
                    <th>Grupo de requisitos</th>
                    <th>Penalización por requisito</th>
                    <th>Tipo de requisito</th>
                    <th>Más detalles</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td style='white-space:normal !important;'><div style='width:200px;white-space:normal !important;'>{{ item.name }} / {{ item.nameEng }}</div></td>
                        <td>{{ item.requirementGroup.name }}</td>
                        <td>{{ item.requirementPenalty.name }}</td>
                        <td>{{ item.requirementType.name }}</td>
                        <td>
                            <a class=\"btn btn-sm text-white\" style=\"width:150px;background: linear-gradient(-135deg,#23b7e5 0%,#1de9b6 100%);\" href=\"javascript;\" data-toggle=\"modal\" data-target=\"#viewContent{{ item.requirementId }}\">
                                Ver
                            </a>
                        </td>
                        <td>

                            <div class=\"form-group\">
                                <div class=\"switch switch-success d-inline m-r-10\">
                                    <input type=\"checkbox\" id=\"switch-{{ item.requirementId }}\" {% if item.isActive == '1' %}checked{% endif %} onchange=\"activeChange({{ item.requirementId }})\" >
                                    <label for=\"switch-{{ item.requirementId }}\" class=\"cr\"></label> 
                                </div>
                            </div>

                        </td>
                        <td>
\t                        {#
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" style=\"background: linear-gradient(-135deg,#3ebfea 0%,#1de9b6 100%);\" href=\"{{ path('backend_requirement_item',{'id': item.requirementId|md5}) }}\" title=\"Elemento de requisito\" data-toggle=\"tooltip\">
                                <i class=\"fas fa-square\"></i>
                            </a>
                            #}
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_requirement_edit', {'id': item.requirementId|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a>

                        </td>
                    </tr>
                    <!-- The Modal -->
                <div class=\"modal fade\" id=\"viewContent{{item.requirementId}}\">
                    <div class=\"modal-dialog\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h5 class=\"modal-title\">Bitacora</h5>
                                <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                            </div>
                            <div class=\"modal-body\">
                                <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <label><b>Peso</b></label>
                                        <p>{{ item.weight }}</p>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <label><b>Ley de referencia / Reference law</b></label>
                                        <p>{{ item.lawReference }} / {{ item.lawReferenceEng }}</p>
                                    </div>
                                    <div class=\"col-md-12\">
                                        <label><b>Contenido / Content</b></label>
                                        <p>
                                            {{ item.description|raw }}
                                        </p>
                                        <p>
                                            {{ item.descriptionEng|raw }}
                                        </p>
                                    </div>
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



", "AppBundle:Backend/Requirement:list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/Requirement/list.html.twig");
    }
}
