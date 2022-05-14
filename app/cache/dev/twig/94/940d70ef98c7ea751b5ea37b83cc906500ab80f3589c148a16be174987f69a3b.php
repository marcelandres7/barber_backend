<?php

/* @App/Backend/Organization/list.html.twig */
class __TwigTemplate_338f39b89dfa2befeda6d08793d7eea4cad43d3a28de582af317541c860317eb extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/Organization/list.html.twig"));

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
                    <th>Nombre</th>
                    <th>Estado</th>
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
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "organizationId", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 33
            if (($this->getAttribute($context["item"], "status", array()) == "ACTIVO")) {
                // line 34
                echo "                                <span class=\"label bg-c-green f-12 text-white\" href=\"#!\">ACTIVO</span>
                            ";
            } else {
                // line 36
                echo "                                <span class=\"label bg-c-red f-12 text-white\" href=\"#!\">INACTIVO</span>
                            ";
            }
            // line 38
            echo "                        </td>
                        <td>
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" style=\"background: linear-gradient(-135deg,#3ebfea 0%,#1de9b6 100%);\" href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_branch", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "organizationId", array())))), "html", null, true);
            echo "\" title=\"Sucursal\" data-toggle=\"tooltip\">
                                <i class=\"fas fa-square\"></i>
                            </a>
                            ";
            // line 43
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "ep", array(), "array")) {
                // line 44
                echo "                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_organization_edit", array("organizationId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "organizationId", array())))), "html", null, true);
                echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                            ";
            }
            // line 48
            echo "
                            ";
            // line 49
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "dp", array(), "array")) {
                // line 50
                echo "                                ";
                if (($this->getAttribute($context["item"], "status", array()) == "ACTIVO")) {
                    // line 51
                    echo "                                    <span  title=\"Inactivar organización\" data-toggle=\"tooltip\">
                                        <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                           data-href=\"";
                    // line 53
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_organization_delete", array("organizationId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute(                    // line 56
$context["item"], "organizationId", array())))), "html", null, true);
                    // line 57
                    echo "\"
                                           data-name=\"";
                    // line 58
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                    echo "\"
                                           href=\"javascript:;\">
                                            <i class=\"feather icon-trash-2\"></i>
                                        </a>
                                    </span>
                                ";
                }
                // line 64
                echo "                            ";
            }
            // line 65
            echo "                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "            </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/Organization/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 68,  127 => 65,  124 => 64,  115 => 58,  112 => 57,  110 => 56,  109 => 53,  105 => 51,  102 => 50,  100 => 49,  97 => 48,  89 => 44,  87 => 43,  81 => 40,  77 => 38,  73 => 36,  69 => 34,  67 => 33,  62 => 31,  58 => 30,  55 => 29,  51 => 28,  22 => 1,);
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
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.organizationId }}</td>
                        <td>{{ item.name }}</td>
                        <td>
                            {% if item.status == 'ACTIVO'%}
                                <span class=\"label bg-c-green f-12 text-white\" href=\"#!\">ACTIVO</span>
                            {% else %}
                                <span class=\"label bg-c-red f-12 text-white\" href=\"#!\">INACTIVO</span>
                            {% endif %}
                        </td>
                        <td>
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" style=\"background: linear-gradient(-135deg,#3ebfea 0%,#1de9b6 100%);\" href=\"{{ path('backend_branch', {'id': item.organizationId|md5}) }}\" title=\"Sucursal\" data-toggle=\"tooltip\">
                                <i class=\"fas fa-square\"></i>
                            </a>
                            {% if permits[\"ep\"] %}
                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_organization_edit', {'organizationId': item.organizationId|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                            {% endif %}

                            {% if permits[\"dp\"] %}
                                {% if item.status == 'ACTIVO'%}
                                    <span  title=\"Inactivar organización\" data-toggle=\"tooltip\">
                                        <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                           data-href=\"{{
                                                            path(
                                                                    'backend_organization_delete',
                                                                    {'organizationId': item.organizationId|md5}
                                                    )}}\"
                                           data-name=\"{{ item.name }}\"
                                           href=\"javascript:;\">
                                            <i class=\"feather icon-trash-2\"></i>
                                        </a>
                                    </span>
                                {% endif %}
                            {% endif %}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>



", "@App/Backend/Organization/list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\Organization\\list.html.twig");
    }
}
