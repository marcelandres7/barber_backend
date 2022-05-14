<?php

/* @App/Backend/BranchType/list.html.twig */
class __TwigTemplate_4d70b165dabd36ab1af9200a55e8af55dc5b8ae40e7d4d7c1f857fa04c68fe6f extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/BranchType/list.html.twig"));

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
                    <th>Id</th>
                    <th>Nombre / Name</th>
                    <th>Contenido</th>
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
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "branchTypeId", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "nameEng", array()), "html", null, true);
            echo "</td>
                        <td>
                            <a class=\"btn btn-icon text-white\" style=\"width:150px;background: linear-gradient(-135deg,#23b7e5 0%,#1de9b6 100%);\" href=\"javascript;\" data-toggle=\"modal\" data-target=\"#viewContent";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "branchTypeId", array()), "html", null, true);
            echo "\">
                                Ver Contenido
                            </a>
                        </td>
                        <td>
                            ";
            // line 38
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "ep", array(), "array")) {
                // line 39
                echo "                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_branch_type_edit", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "branchTypeId", array())))), "html", null, true);
                echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                            ";
            }
            // line 43
            echo "
                            ";
            // line 44
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "dp", array(), "array")) {
                // line 45
                echo "                                <span  title=\"Eliminar\" data-toggle=\"tooltip\">
                                    <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                       data-href=\"";
                // line 47
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_branch_type_delete", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute(                // line 50
$context["item"], "branchTypeId", array())))), "html", null, true);
                // line 51
                echo "\"
                                       data-name=\"";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "\"
                                       href=\"javascript:;\">
                                        <i class=\"feather icon-trash-2\"></i>
                                    </a>
                                </span>
                            ";
            }
            // line 58
            echo "                        </td>
                    </tr>
                    <!-- The Modal -->
                <div class=\"modal fade\" id=\"viewContent";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "branchTypeId", array()), "html", null, true);
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
            // line 70
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
        // line 82
        echo "            </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/BranchType/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 82,  128 => 70,  116 => 61,  111 => 58,  102 => 52,  99 => 51,  97 => 50,  96 => 47,  92 => 45,  90 => 44,  87 => 43,  79 => 39,  77 => 38,  69 => 33,  62 => 31,  58 => 30,  55 => 29,  51 => 28,  22 => 1,);
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
                    <th>Id</th>
                    <th>Nombre / Name</th>
                    <th>Contenido</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.branchTypeId }}</td>
                        <td>{{ item.name }} / {{ item.nameEng }}</td>
                        <td>
                            <a class=\"btn btn-icon text-white\" style=\"width:150px;background: linear-gradient(-135deg,#23b7e5 0%,#1de9b6 100%);\" href=\"javascript;\" data-toggle=\"modal\" data-target=\"#viewContent{{ item.branchTypeId }}\">
                                Ver Contenido
                            </a>
                        </td>
                        <td>
                            {% if permits[\"ep\"] %}
                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_branch_type_edit', {'id': item.branchTypeId|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                            {% endif %}

                            {% if permits[\"dp\"] %}
                                <span  title=\"Eliminar\" data-toggle=\"tooltip\">
                                    <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                       data-href=\"{{
                                                            path(
                                                                    'backend_branch_type_delete',
                                                                    {'id': item.branchTypeId|md5}
                                                    )}}\"
                                       data-name=\"{{ item.name }}\"
                                       href=\"javascript:;\">
                                        <i class=\"feather icon-trash-2\"></i>
                                    </a>
                                </span>
                            {% endif %}
                        </td>
                    </tr>
                    <!-- The Modal -->
                <div class=\"modal fade\" id=\"viewContent{{item.branchTypeId}}\">
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



", "@App/Backend/BranchType/list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\BranchType\\list.html.twig");
    }
}
