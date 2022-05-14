<?php

/* AppBundle:Backend/Dashboard:statistics_detail_requirement.html.twig */
class __TwigTemplate_9df47bf471d4fb4d77fb81711a0a0333b062e39e617c523fb5b882ee06abe33b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "AppBundle:Backend/Dashboard:statistics_detail_requirement.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@App/Backend/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/Dashboard:statistics_detail_requirement.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "<div class=\"card-header\">
    <h5>Resumen </h5>
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
         <table >
            <thead>
                <tr>
                    <th> ";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["law"]) ? $context["law"] : $this->getContext($context, "law")), "html", null, true);
        echo " </th>
                </tr>
                <tr>   
                    <th style='white-space:normal !important;'><div style='width:400px;white-space:normal !important;'> ";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["description"]) ? $context["description"] : $this->getContext($context, "description")), "html", null, true);
        echo " </th>
                </tr>
                <tr>   
                    <th> ";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["requirement_name"]) ? $context["requirement_name"] : $this->getContext($context, "requirement_name")), "html", null, true);
        echo " </th>
                </tr>
                <tr>
                    <th>Resultado: ";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["result_name"]) ? $context["result_name"] : $this->getContext($context, "result_name")), "html", null, true);
        echo " </th>
                </tr>
                <tr>
                     <th>Tipo de Requisito: ";
        // line 36
        echo twig_escape_filter($this->env, (isset($context["requiremen_type_name"]) ? $context["requiremen_type_name"] : $this->getContext($context, "requiremen_type_name")), "html", null, true);
        echo " </th>
                </tr>
                <tr> 
                    <th>Item Evaluado: ";
        // line 39
        echo twig_escape_filter($this->env, (isset($context["requirement_name"]) ? $context["requirement_name"] : $this->getContext($context, "requirement_name")), "html", null, true);
        echo " </th>
                 </tr>    
                    ";
        // line 41
        if (((isset($context["result_id"]) ? $context["result_id"] : $this->getContext($context, "result_id")) == 2)) {
            // line 42
            echo "                    <tr>
                        <th>Tipo Multa: ";
            // line 43
            echo twig_escape_filter($this->env, (isset($context["penalty_name"]) ? $context["penalty_name"] : $this->getContext($context, "penalty_name")), "html", null, true);
            echo "  </th>
                        <th>Multa: ";
            // line 44
            echo twig_escape_filter($this->env, (isset($context["penalty_amount"]) ? $context["penalty_amount"] : $this->getContext($context, "penalty_amount")), "html", null, true);
            echo " </th>
                     </tr>
                     ";
        }
        // line 46
        echo " 
                <tr>
                    <th>Comentarios</th>  
                     <th>";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["comment"]) ? $context["comment"] : $this->getContext($context, "comment")), "html", null, true);
        echo "</th>  
                </tr>
            </thead>
            <tbody>
                ";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["photos"]) ? $context["photos"] : $this->getContext($context, "photos")));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 54
            echo "                    <tr>
                         <td>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "photo_path", array()), "html", null, true);
            echo "</td>
                    </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
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
        return "AppBundle:Backend/Dashboard:statistics_detail_requirement.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 58,  131 => 55,  128 => 54,  124 => 53,  117 => 49,  112 => 46,  106 => 44,  102 => 43,  99 => 42,  97 => 41,  92 => 39,  86 => 36,  80 => 33,  74 => 30,  68 => 27,  62 => 24,  40 => 4,  34 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@App/Backend/base.html.twig' %}

{% block body %}
<div class=\"card-header\">
    <h5>Resumen </h5>
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
         <table >
            <thead>
                <tr>
                    <th> {{ law }} </th>
                </tr>
                <tr>   
                    <th style='white-space:normal !important;'><div style='width:400px;white-space:normal !important;'> {{description}} </th>
                </tr>
                <tr>   
                    <th> {{ requirement_name }} </th>
                </tr>
                <tr>
                    <th>Resultado: {{ result_name }} </th>
                </tr>
                <tr>
                     <th>Tipo de Requisito: {{ requiremen_type_name }} </th>
                </tr>
                <tr> 
                    <th>Item Evaluado: {{ requirement_name }} </th>
                 </tr>    
                    {% if result_id == 2 %}
                    <tr>
                        <th>Tipo Multa: {{ penalty_name }}  </th>
                        <th>Multa: {{ penalty_amount }} </th>
                     </tr>
                     {% endif %} 
                <tr>
                    <th>Comentarios</th>  
                     <th>{{comment}}</th>  
                </tr>
            </thead>
            <tbody>
                {% for item in photos %}
                    <tr>
                         <td>{{ item.photo_path }}</td>
                    </tr>
                {% endfor %}
            </tbody>
        </table> 
    </div>
</div>
{% endblock %}", "AppBundle:Backend/Dashboard:statistics_detail_requirement.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/Dashboard/statistics_detail_requirement.html.twig");
    }
}
