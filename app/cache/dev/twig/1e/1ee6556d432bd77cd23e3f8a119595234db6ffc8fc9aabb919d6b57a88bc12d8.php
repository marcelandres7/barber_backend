<?php

/* AppBundle:Backend/Modules:list.html.twig */
class __TwigTemplate_e3854939ad309ca49e62d58dcc268d3ed824805be5a4d3f80a5b3bd8559302d3 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/Modules:list.html.twig"));

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
                    <th>Symfony Path</th>
                    <th>Orden</th>
                    <th>Visible</th>
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
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</td>
                        <td class=\"text-wrap\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "description", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "urlAccess", array()), "html", null, true);
            echo "</td>
                        <td>";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "orderModule", array()), "html", null, true);
            echo "</td>
                        <td>
                            ";
            // line 39
            if ($this->getAttribute($context["item"], "visible", array())) {
                // line 40
                echo "                                <a class=\"label bg-c-green f-12 text-white\" href=\"#!\">Si</a>
                            ";
            } else {
                // line 42
                echo "                                <a class=\"label bg-c-red f-12 text-white\" href=\"#!\">No</a>
                            ";
            }
            // line 44
            echo "                        </td>
                        <td>
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
            // line 46
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_modules_edit", array("moduleId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "id", array())))), "html", null, true);
            echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a>
                            <span  title=\"Eliminar\" data-toggle=\"tooltip\">
                                <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                   data-href=\"";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_modules_delete", array("moduleId" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute(            // line 54
$context["item"], "id", array())))), "html", null, true);
            // line 55
            echo "\"
                                   data-name=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "\"
                                   href=\"javascript:;\">
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
        // line 64
        echo "            </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/Modules:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 64,  110 => 56,  107 => 55,  105 => 54,  104 => 51,  96 => 46,  92 => 44,  88 => 42,  84 => 40,  82 => 39,  77 => 37,  73 => 36,  69 => 35,  65 => 34,  61 => 33,  58 => 32,  54 => 31,  22 => 1,);
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
                    <th>Symfony Path</th>
                    <th>Orden</th>
                    <th>Visible</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td class=\"text-wrap\">{{ item.description }}</td>
                        <td>{{ item.urlAccess }}</td>
                        <td>{{ item.orderModule }}</td>
                        <td>
                            {% if item.visible %}
                                <a class=\"label bg-c-green f-12 text-white\" href=\"#!\">Si</a>
                            {% else %}
                                <a class=\"label bg-c-red f-12 text-white\" href=\"#!\">No</a>
                            {% endif %}
                        </td>
                        <td>
                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_modules_edit', {'moduleId': item.id|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a>
                            <span  title=\"Eliminar\" data-toggle=\"tooltip\">
                                <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                   data-href=\"{{
                                                    path(
                                                            'backend_modules_delete',
                                                            {'moduleId': item.id|md5}
                                            )}}\"
                                   data-name=\"{{ item.name }}\"
                                   href=\"javascript:;\">
                                    <i class=\"feather icon-trash-2\"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>



", "AppBundle:Backend/Modules:list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/Modules/list.html.twig");
    }
}
