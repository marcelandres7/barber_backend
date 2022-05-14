<?php

/* AppBundle:Backend/RequirementItem:list.html.twig */
class __TwigTemplate_2f685face047cf7e1ca3e660922226bf1b685d1235fb7f23052e10b1a8926371 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/RequirementItem:list.html.twig"));

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
                    <th>Contenido del artículo</th>
                    <th>Activo</th>
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
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "articleContent", array()), "html", null, true);
            echo "</td>
                        <td>

                            <div class=\"form-group\">
                                <div class=\"switch switch-success d-inline m-r-10\">
                                    <input type=\"checkbox\" id=\"switch-";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementItemId", array()), "html", null, true);
            echo "\" ";
            if (($this->getAttribute($context["item"], "isActive", array()) == "1")) {
                echo "checked";
            }
            echo " onchange=\"activeChange(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementItemId", array()), "html", null, true);
            echo ")\" >
                                    <label for=\"switch-";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "requirementItemId", array()), "html", null, true);
            echo "\" class=\"cr\"></label> 
                                </div>
                            </div>

                        </td>
                        <td>

                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_requirement_item_edit", array("id" => $this->env->getExtension('AppBundle\Twig\AppExtension')->md5($this->getAttribute($context["item"], "requirementItemId", array())))), "html", null, true);
            echo "\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a>

                        </td>
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
        return "AppBundle:Backend/RequirementItem:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 49,  85 => 42,  75 => 35,  65 => 34,  57 => 29,  54 => 28,  50 => 27,  22 => 1,);
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
                    <th>Contenido del artículo</th>
                    <th>Activo</th>
                    <th>Herramientas</th>
                </tr>
            </thead>
            <tbody>
                {% for item in list %}
                    <tr>
                        <td>{{ item.articleContent }}</td>
                        <td>

                            <div class=\"form-group\">
                                <div class=\"switch switch-success d-inline m-r-10\">
                                    <input type=\"checkbox\" id=\"switch-{{ item.requirementItemId }}\" {% if item.isActive == '1' %}checked{% endif %} onchange=\"activeChange({{ item.requirementItemId }})\" >
                                    <label for=\"switch-{{ item.requirementItemId }}\" class=\"cr\"></label> 
                                </div>
                            </div>

                        </td>
                        <td>

                            <a class=\"btn btn-icon btn-rounded theme-bg2 text-white\" href=\"{{ path('backend_requirement_item_edit', {'id': item.requirementItemId|md5}) }}\" title=\"Editar\" data-toggle=\"tooltip\">
                                <i class=\"feather icon-edit-1\"></i>
                            </a>

                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>



", "AppBundle:Backend/RequirementItem:list.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/RequirementItem/list.html.twig");
    }
}
