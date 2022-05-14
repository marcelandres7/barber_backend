<?php

/* AppBundle:Backend/UserRole:list.html.twig */
class __TwigTemplate_91052a2795da1dc620cdd94fbea87b761da25e4931d58230513dceedf615a240 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/UserRole:list.html.twig"));

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
                    <th>Descripción</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["userRole"]) {
            // line 30
            echo "                    <tr>
                        <td>";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["userRole"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["userRole"], "name", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["userRole"], "description", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 35
            if ($this->getAttribute($context["userRole"], "active", array())) {
                // line 36
                echo "                                <span class=\"label bg-c-green f-12 text-white\" href=\"#!\">SI</span>
                            ";
            } else {
                // line 38
                echo "                                <span class=\"label bg-c-red f-12 text-white\" href=\"#!\">No</span>
                            ";
            }
            // line 40
            echo "                        </td>
                        <td>\t\t\t\t\t
                            <a class=\"btn btn-icon btn-rounded btn-info text-white\" href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_role_permission", array("roleId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["userRole"], "id", array())))), "html", null, true);
            echo "\" title=\"Permisos\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-list\"></i>
                            </a>

                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_roles_edit", array("roleId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["userRole"], "id", array())))), "html", null, true);
            echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a>

                            <span  title=\"Eliminar\" data-toggle=\"tooltip\">
                                <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\" data-href=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_roles_delete", array("roleId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["userRole"], "id", array())))), "html", null, true);
            echo "\" data-name=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["userRole"], "name", array()), "html", null, true);
            echo "\" href=\"javascript:;\">
                                    <i class=\"feather icon-trash-2\"></i>
                                </a>
                            </span>\t\t\t\t
                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['userRole'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "            </tbody>
        </table>
    </div>
</div>


";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/UserRole:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 58,  101 => 51,  93 => 46,  86 => 42,  82 => 40,  78 => 38,  74 => 36,  72 => 35,  67 => 33,  63 => 32,  59 => 31,  56 => 30,  52 => 29,  22 => 1,);
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
                    <th>Descripción</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for userRole in list %}
                    <tr>
                        <td>{{ userRole.id }}</td>
                        <td>{{ userRole.name }}</td>
                        <td>{{ userRole.description }}</td>
                        <td>
                            {% if userRole.active %}
                                <span class=\"label bg-c-green f-12 text-white\" href=\"#!\">SI</span>
                            {% else %}
                                <span class=\"label bg-c-red f-12 text-white\" href=\"#!\">No</span>
                            {% endif %}
                        </td>
                        <td>\t\t\t\t\t
                            <a class=\"btn btn-icon btn-rounded btn-info text-white\" href=\"{{ path('backend_user_role_permission', {'roleId': userRole.id|md5}) }}\" title=\"Permisos\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-list\"></i>
                            </a>

                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_user_roles_edit', {'roleId': userRole.id|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a>

                            <span  title=\"Eliminar\" data-toggle=\"tooltip\">
                                <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\" data-href=\"{{ path('backend_user_roles_delete', {'roleId': userRole.id|md5} )}}\" data-name=\"{{ userRole.name }}\" href=\"javascript:;\">
                                    <i class=\"feather icon-trash-2\"></i>
                                </a>
                            </span>\t\t\t\t
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>


", "AppBundle:Backend/UserRole:list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/UserRole/list.html.twig");
    }
}
