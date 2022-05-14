<?php

/* AppBundle:Backend/Branch:list.html.twig */
class __TwigTemplate_f58bbeaefbdf5f7795c90dfd25550bb582b5676fec69ac24578f15bed9bc8902 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/Branch:list.html.twig"));

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
                    <th>Nombre</th>
                    <th>Tipo de sucursal</th>
                    <th>Contenido</th>
                    <th>Fecha de creación</th>
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
            echo "</td>
                        <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["item"], "branchType", array()), "name", array()), "html", null, true);
            echo "</td>
                        <td>
                            <a class=\"btn btn-icon text-white\" style=\"width:150px;background: linear-gradient(-135deg,#23b7e5 0%,#1de9b6 100%);\" href=\"javascript;\" data-toggle=\"modal\" data-target=\"#viewContent";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "branchId", array()), "html", null, true);
            echo "\">
                                Ver Contenido
                            </a>
                        </td>
                        <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["item"], "createdAt", array()), "d/M/Y H:m a"), "html", null, true);
            echo "</td>
                        <td>
                            
                                <div class=\"form-group\">
                                    <div class=\"switch switch-success d-inline m-r-10\">
                                        <input type=\"checkbox\" id=\"switch-";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "branchId", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($context["item"], "isActive", array()) == "1")) {
                echo "checked";
            }
            echo " onchange=\"activeChange(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "branchId", array()), "html", null, true);
            echo ")\" >
                                        <label for=\"switch-";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "branchId", array()), "html", null, true);
            echo "\" class=\"cr\"></label> 
                                    </div>
                                </div>
                            
                        </td>
                        <td>
                           
                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
            // line 52
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_branch_edit", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "branchId", array())), "organizationId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute((isset($context["organization"]) ? $context["organization"] : $this->getContext($context, "organization")), "organizationId", array())))), "html", null, true);
            echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                          
                        </td>
                    </tr>
                    <!-- The Modal -->
                <div class=\"modal fade\" id=\"viewContent";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "branchId", array()), "html", null, true);
            echo "\">
                    <div class=\"modal-dialog\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h5 class=\"modal-title\">Contenido</h5>
                                <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                            </div>
                            <div class=\"modal-body\">
                                <p>
                                    ";
            // line 68
            echo $this->getAttribute($context["item"], "description", array());
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
        // line 80
        echo "            </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/Branch:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 80,  126 => 68,  114 => 59,  104 => 52,  94 => 45,  84 => 44,  76 => 39,  69 => 35,  64 => 33,  60 => 32,  57 => 31,  53 => 30,  22 => 1,);
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
                    <th>Nombre</th>
                    <th>Tipo de sucursal</th>
                    <th>Contenido</th>
                    <th>Fecha de creación</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.name }}</td>
                        <td>{{ item.branchType.name }}</td>
                        <td>
                            <a class=\"btn btn-icon text-white\" style=\"width:150px;background: linear-gradient(-135deg,#23b7e5 0%,#1de9b6 100%);\" href=\"javascript;\" data-toggle=\"modal\" data-target=\"#viewContent{{ item.branchId }}\">
                                Ver Contenido
                            </a>
                        </td>
                        <td>{{ item.createdAt |date('d/M/Y H:m a') }}</td>
                        <td>
                            
                                <div class=\"form-group\">
                                    <div class=\"switch switch-success d-inline m-r-10\">
                                        <input type=\"checkbox\" id=\"switch-{{ item.branchId }}\" {% if item.isActive == '1' %}checked{% endif %} onchange=\"activeChange({{ item.branchId }})\" >
                                        <label for=\"switch-{{ item.branchId }}\" class=\"cr\"></label> 
                                    </div>
                                </div>
                            
                        </td>
                        <td>
                           
                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_branch_edit', {'id': item.branchId|md5, 'organizationId': organization.organizationId|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                          
                        </td>
                    </tr>
                    <!-- The Modal -->
                <div class=\"modal fade\" id=\"viewContent{{item.branchId}}\">
                    <div class=\"modal-dialog\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header\">
                                <h5 class=\"modal-title\">Contenido</h5>
                                <button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">×</span></button>
                            </div>
                            <div class=\"modal-body\">
                                <p>
                                    {{ item.description|raw }}
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



", "AppBundle:Backend/Branch:list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/Branch/list.html.twig");
    }
}
