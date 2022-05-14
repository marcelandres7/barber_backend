<?php

/* AppBundle:Backend/UserRolePermission:list.html.twig */
class __TwigTemplate_6580cf65d94a836ab3a3769da6e92154813c6fc9c7697554ebd42f7ce54302fa extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/UserRolePermission:list.html.twig"));

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
                    <th>Rol</th>
                    <th>Módulo</th>
                    <th>Ver módulo</th>
                    <th>Leer</th>
                    <th>Añadir</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Módulo de inicio</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 36
            echo "                    <tr>
                        <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "userRole", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "module", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 41
            if ($this->getAttribute($context["item"], "viewModule", array())) {
                // line 42
                echo "                                <strong>Yes</strong>
                            ";
            } else {
                // line 44
                echo "                                NO
                            ";
            }
            // line 46
            echo "                        </td>
                        <td>
                            ";
            // line 48
            if ($this->getAttribute($context["item"], "readPermission", array())) {
                // line 49
                echo "                                <strong>Yes</strong>
                            ";
            } else {
                // line 51
                echo "                                NO
                            ";
            }
            // line 53
            echo "                        </td>
                        <td>
                            ";
            // line 55
            if ($this->getAttribute($context["item"], "writePermission", array())) {
                // line 56
                echo "                                <strong>Yes</strong>
                            ";
            } else {
                // line 58
                echo "                                NO
                            ";
            }
            // line 60
            echo "                        </td>
                        <td>
                            ";
            // line 62
            if ($this->getAttribute($context["item"], "editPermission", array())) {
                // line 63
                echo "                                <strong>Yes</strong>
                            ";
            } else {
                // line 65
                echo "                                NO
                            ";
            }
            // line 67
            echo "                        </td>
                        <td>
                            ";
            // line 69
            if ($this->getAttribute($context["item"], "deletePermission", array())) {
                // line 70
                echo "                                <strong>Yes</strong>
                            ";
            } else {
                // line 72
                echo "                                NO
                            ";
            }
            // line 74
            echo "                        </td>
                        <td>
                            ";
            // line 76
            if ($this->getAttribute($context["item"], "mainModule", array())) {
                // line 77
                echo "                                <strong>Yes</strong>
                            ";
            }
            // line 79
            echo "                        </td>
                        <td>
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
            // line 81
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_role_permission_edit", array("rolePmId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "id", array())), "roleId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($this->getAttribute($context["item"], "userRole", array()), "id", array())))), "html", null, true);
            echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a> 
                            <span title=\"Eliminar\" data-toggle=\"tooltip\">
                                <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\" data-href=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_role_permission_delete", array("rolePmId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "id", array())), "roleId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($this->getAttribute($context["item"], "userRole", array()), "id", array())))), "html", null, true);
            echo "\" data-role=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "userRole", array()), "html", null, true);
            echo "\" data-module=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "module", array()), "html", null, true);
            echo "\" href=\"javascript:;\">
                                    <i class=\"feather icon-trash-2\"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/UserRolePermission:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  182 => 92,  165 => 85,  158 => 81,  154 => 79,  150 => 77,  148 => 76,  144 => 74,  140 => 72,  136 => 70,  134 => 69,  130 => 67,  126 => 65,  122 => 63,  120 => 62,  116 => 60,  112 => 58,  108 => 56,  106 => 55,  102 => 53,  98 => 51,  94 => 49,  92 => 48,  88 => 46,  84 => 44,  80 => 42,  78 => 41,  73 => 39,  69 => 38,  65 => 37,  62 => 36,  58 => 35,  22 => 1,);
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
                    <th>Rol</th>
                    <th>Módulo</th>
                    <th>Ver módulo</th>
                    <th>Leer</th>
                    <th>Añadir</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                    <th>Módulo de inicio</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.id }}</td>
                        <td>{{ item.userRole }}</td>
                        <td>{{ item.module }}</td>
                        <td>
                            {% if item.viewModule %}
                                <strong>Yes</strong>
                            {% else %}
                                NO
                            {% endif %}
                        </td>
                        <td>
                            {% if item.readPermission %}
                                <strong>Yes</strong>
                            {% else %}
                                NO
                            {% endif %}
                        </td>
                        <td>
                            {% if item.writePermission %}
                                <strong>Yes</strong>
                            {% else %}
                                NO
                            {% endif %}
                        </td>
                        <td>
                            {% if item.editPermission %}
                                <strong>Yes</strong>
                            {% else %}
                                NO
                            {% endif %}
                        </td>
                        <td>
                            {% if item.deletePermission %}
                                <strong>Yes</strong>
                            {% else %}
                                NO
                            {% endif %}
                        </td>
                        <td>
                            {% if item.mainModule %}
                                <strong>Yes</strong>
                            {% endif %}
                        </td>
                        <td>
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_user_role_permission_edit', {'rolePmId': item.id|md5, 'roleId': item.userRole.id|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a> 
                            <span title=\"Eliminar\" data-toggle=\"tooltip\">
                                <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\" data-href=\"{{ path('backend_user_role_permission_delete', {'rolePmId': item.id|md5, 'roleId': item.userRole.id|md5}) }}\" data-role=\"{{ item.userRole }}\" data-module=\"{{ item.module }}\" href=\"javascript:;\">
                                    <i class=\"feather icon-trash-2\"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>

", "AppBundle:Backend/UserRolePermission:list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/UserRolePermission/list.html.twig");
    }
}
