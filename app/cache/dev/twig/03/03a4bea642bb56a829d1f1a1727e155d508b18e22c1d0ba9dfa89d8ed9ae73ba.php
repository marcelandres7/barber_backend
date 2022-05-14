<?php

/* @App/Backend/User/list.html.twig */
class __TwigTemplate_6734e0e94a27186612d383f1f4a1b183214dec2878c49425bf11898076b1a007 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/User/list.html.twig"));

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
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>Organización</th>
                    <th>Estado</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 34
            echo "                    <tr>
                        <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
            echo "</td>
\t                    <td>
\t\t                    ";
            // line 37
            if ((twig_length_filter($this->env, $this->getAttribute($context["user"], "avatarPath", array())) > 0)) {
                // line 38
                echo "\t\t\t                    <div style='background-image: url(\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl(("uploads/" . $this->getAttribute($context["user"], "avatarPath", array()))), "html", null, true);
                echo "\");' class='avatar_circle'></div>
\t\t                    ";
            } else {
                // line 40
                echo "\t\t\t\t\t\t\t\t<div style='background-image: url(\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/user_icon.png"), "html", null, true);
                echo "\");' class='avatar_circle'></div>\t\t                    
\t\t\t\t\t\t\t";
            }
            // line 41
            echo "\t
\t                    </td>                        
                        <td>";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "firstName", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 45
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "lastName", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["user"], "userRole", array()), "name", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "organization", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 49
            if (($this->getAttribute($context["user"], "status", array()) == "ACTIVO")) {
                // line 50
                echo "                                <span class=\"label bg-c-green f-12 text-white\" href=\"#!\">ACTIVO</span>
                            ";
            } else {
                // line 52
                echo "                                <span class=\"label bg-c-red f-12 text-white\" href=\"#!\">INACTIVO</span>
                            ";
            }
            // line 54
            echo "                        </td>
                        <td>
                            ";
            // line 56
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "ep", array(), "array")) {
                // line 57
                echo "                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_edit", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
                echo "\"  title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                            ";
            }
            // line 61
            echo "                            ";
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "dp", array(), "array")) {
                // line 62
                echo "                                ";
                if (($this->getAttribute($context["user"], "status", array()) == "ACTIVO")) {
                    // line 63
                    echo "                                    <span  title=\"Usuario inactivo\" data-toggle=\"tooltip\">
                                        <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                           data-id=\"";
                    // line 65
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", array()), "html", null, true);
                    echo "\" data-name=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "firstName", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "lastName", array()), "html", null, true);
                    echo "\" 
                                           data-href=\"";
                    // line 66
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_delete", array("id" => $this->getAttribute($context["user"], "id", array()))), "html", null, true);
                    echo "\">
                                            <i class=\"feather icon-trash-2\"></i>
                                        </a>
                                    </span>
                                ";
                }
                // line 71
                echo "                            ";
            }
            // line 72
            echo "                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "            </tbody>
        </table>
    </div>
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/User/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 75,  160 => 72,  157 => 71,  149 => 66,  141 => 65,  137 => 63,  134 => 62,  131 => 61,  123 => 57,  121 => 56,  117 => 54,  113 => 52,  109 => 50,  107 => 49,  102 => 47,  98 => 46,  94 => 45,  90 => 44,  86 => 43,  82 => 41,  76 => 40,  70 => 38,  68 => 37,  63 => 35,  60 => 34,  56 => 33,  22 => 1,);
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
                    <th>ID</th>
                    <th>Avatar</th>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>Organización</th>
                    <th>Estado</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for user in list %}
                    <tr>
                        <td>{{ user.id }}</td>
\t                    <td>
\t\t                    {% if user.avatarPath | length > 0 %}
\t\t\t                    <div style='background-image: url(\"{{ asset(\"uploads/\"~user.avatarPath) }}\");' class='avatar_circle'></div>
\t\t                    {% else %}
\t\t\t\t\t\t\t\t<div style='background-image: url(\"{{ asset(\"images/user_icon.png\") }}\");' class='avatar_circle'></div>\t\t                    
\t\t\t\t\t\t\t{% endif %}\t
\t                    </td>                        
                        <td>{{ user.email }}</td>
                        <td>{{ user.firstName }}</td>
                        <td>{{ user.lastName }}</td>
                        <td>{{ user.userRole.name }}</td>
                        <td>{{ user.organization }}</td>
                        <td>
                            {% if user.status == 'ACTIVO'%}
                                <span class=\"label bg-c-green f-12 text-white\" href=\"#!\">ACTIVO</span>
                            {% else %}
                                <span class=\"label bg-c-red f-12 text-white\" href=\"#!\">INACTIVO</span>
                            {% endif %}
                        </td>
                        <td>
                            {% if permits[\"ep\"] %}
                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_user_edit', {'id': user.id}) }}\"  title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                            {% endif %}
                            {% if permits[\"dp\"] %}
                                {% if user.status == 'ACTIVO'%}
                                    <span  title=\"Usuario inactivo\" data-toggle=\"tooltip\">
                                        <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                           data-id=\"{{ user.id }}\" data-name=\"{{ user.firstName }} {{ user.lastName }}\" 
                                           data-href=\"{{ path('backend_user_delete',{'id': user.id}) }}\">
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

", "@App/Backend/User/list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\User\\list.html.twig");
    }
}
