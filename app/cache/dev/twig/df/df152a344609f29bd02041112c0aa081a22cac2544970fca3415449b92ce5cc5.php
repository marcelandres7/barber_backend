<?php

/* @App/Backend/RequirementGroup/list.html.twig */
class __TwigTemplate_9ece0bd22e1b98a7f93390248ea87afa7fbb5e2baf1d8aa6385173687959b703 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/RequirementGroup/list.html.twig"));

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
                    <th>Color</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 28
            echo "                    <tr>
                        <td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo " / ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "nameEng", array()), "html", null, true);
            echo "</td>
                        <td><span class=\"btn rounded\" style=\"background: ";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "color", array()), "html", null, true);
            echo "\"></span></td>
                        <td>
                            ";
            // line 32
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "ep", array(), "array")) {
                // line 33
                echo "                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_requirement_group_edit", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "requirementGroupId", array())))), "html", null, true);
                echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                            ";
            }
            // line 37
            echo "                            ";
            if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "dp", array(), "array")) {
                // line 38
                echo "                                <span  title=\"Eliminar\" data-toggle=\"tooltip\">
                                    <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                       data-id=\"";
                // line 40
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementGroupId", array()), "html", null, true);
                echo "\" data-name=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
                echo "\" 
                                       data-href=\"";
                // line 41
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_requirement_group_delete", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "requirementGroupId", array())))), "html", null, true);
                echo "\">
                                        <i class=\"feather icon-trash-2\"></i>
                                    </a>
                                </span>
                            ";
            }
            // line 46
            echo "                        </td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "            </tbody>
        </table>
    </div>
</div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/RequirementGroup/list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 49,  99 => 46,  91 => 41,  85 => 40,  81 => 38,  78 => 37,  70 => 33,  68 => 32,  63 => 30,  57 => 29,  54 => 28,  50 => 27,  22 => 1,);
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
                    <th>Color</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.name }} / {{ item.nameEng }}</td>
                        <td><span class=\"btn rounded\" style=\"background: {{item.color}}\"></span></td>
                        <td>
                            {% if permits[\"ep\"] %}
                                <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_requirement_group_edit', {'id': item.requirementGroupId|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                    <i class=\"feather icon-edit-1\"></i>
                                </a>
                            {% endif %}
                            {% if permits[\"dp\"] %}
                                <span  title=\"Eliminar\" data-toggle=\"tooltip\">
                                    <a id=\"btn-delete\" class=\"btn btn-icon btn-rounded btn-danger text-white sweet-multiple\"
                                       data-id=\"{{ item.requirementGroupId }}\" data-name=\"{{ item.name }}\" 
                                       data-href=\"{{ path('backend_requirement_group_delete',{'id': item.requirementGroupId|md5}) }}\">
                                        <i class=\"feather icon-trash-2\"></i>
                                    </a>
                                </span>
                            {% endif %}
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>



", "@App/Backend/RequirementGroup/list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\RequirementGroup\\list.html.twig");
    }
}
