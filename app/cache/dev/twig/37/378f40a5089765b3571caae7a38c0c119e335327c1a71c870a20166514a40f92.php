<?php

/* @App/Backend/BranchType/edit.html.twig */
class __TwigTemplate_4e7f2523b92ec64e47d31b0d4b504895690fb1675e204dd75e6caa90a6225542 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "@App/Backend/BranchType/edit.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/BranchType/edit.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    <div class=\"page-header\">
        <div class=\"page-block\">
            <div class=\"row align-items-center\">
                <div class=\"col-md-12\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Tipo de sucursal</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_branch_type");
        echo "\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_branch_type");
        echo "\">Tipo de sucursal</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Editar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class=\"main-body\">
        <div class=\"page-wrapper\">
            <div class=\"row\">
                <div class=\"col-sm-12\">

                    ";
        // line 26
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h5>Editar el tipo de sucursal</h5>
                        </div>
                        <div class=\"card-block\">
                            ";
        // line 33
        echo twig_include($this->env, $context, "@App/Backend/BranchType/form.html.twig", array("form" => (isset($context["form"]) ? $context["form"] : $this->getContext($context, "form"))));
        echo "
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/BranchType/edit.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 33,  70 => 26,  54 => 13,  50 => 12,  40 => 4,  34 => 3,  11 => 1,);
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
    <div class=\"page-header\">
        <div class=\"page-block\">
            <div class=\"row align-items-center\">
                <div class=\"col-md-12\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Tipo de sucursal</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"{{ path('backend_branch_type') }}\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('backend_branch_type') }}\">Tipo de sucursal</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Editar</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class=\"main-body\">
        <div class=\"page-wrapper\">
            <div class=\"row\">
                <div class=\"col-sm-12\">

                    {{ include('@App/Backend/flash_message.html.twig') }}

                    <div class=\"card\">
                        <div class=\"card-header\">
                            <h5>Editar el tipo de sucursal</h5>
                        </div>
                        <div class=\"card-block\">
                            {{ include('@App/Backend/BranchType/form.html.twig', { 'form': form }) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}", "@App/Backend/BranchType/edit.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\BranchType\\edit.html.twig");
    }
}
