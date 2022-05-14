<?php

/* AppBundle:Backend/Branch:index.html.twig */
class __TwigTemplate_f4b683d8d50c0d22d3612e3cae2c7f8927f53c381aac9ba84c7bce48ba190b0e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "AppBundle:Backend/Branch:index.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'extra_scripts' => array($this, 'block_extra_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@App/Backend/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/Branch:index.html.twig"));

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
                <div class=\"col-md-6 col-9\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Sucursal</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_organization");
        echo "\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_organization");
        echo "\">Organizaci&oacute;n</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Sucursal</a></li>
                    </ul>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                        <span  title=\"Agregar Sucursal\" data-toggle=\"tooltip\">
                            <a class=\"btn btn-icon btn-rounded theme-bg text-white\" data-toggle=\"modal\" data-target=\"#exampleModalLive\"><span><i class=\"fas fa-plus\"></i></span></a>
                        </span>
                </div>
            </div>
        </div>
    </div>

    <div class=\"main-body\">
        <div class=\"page-wrapper\">
            <div class=\"row\">
                <div class=\"col-sm-12\">

                    ";
        // line 31
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

                    <div class=\"card Application-list\">
                       
                            ";
        // line 35
        echo twig_include($this->env, $context, "@App/Backend/create_modal.html.twig", array("title" => "Sucursal", "form" =>         // line 40
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "formPath" => "@App/Backend/Branch/form.html.twig"));
        // line 44
        echo "
                            ";
        // line 45
        echo twig_include($this->env, $context, "@App/Backend/Branch/list.html.twig", array("list" => (isset($context["list"]) ? $context["list"] : $this->getContext($context, "list"))));
        echo "
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 53
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 54
        echo "    <script type=\"text/javascript\">
        function activeChange(id)
        {
            var data = {
                id: id
            };
            
            \$.ajax({
                data: data,
                url: \"";
        // line 63
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_branch_delete");
        echo "\",
                success: function (result)
                {
                    //Aca podemos rastrear la respuesta que nos manda el controlador.
                    console.log(\"result\", result);
                    location.reload();
                }
            });
        }
        \$(document).ready(function () {
            \$('.dataTable').DataTable({
                \"stateSave\": true
            });
            \$('#sForm').validate({
                submitHandler: function (form) {
                    var saveButton = document.getElementById(\"button-save\");
                    var validateForm = document.getElementById(\"sForm\");
                    saveButton.setAttribute(\"disabled\", true);
                    saveButton.innerHTML = \"<span class='spinner-border spinner-border-sm' role='status'></span> Loading...\";
                    var elements = validateForm.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = true;
                    }
                    document.getElementById(\"sForm\").submit();
                }
            });
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/Branch:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 63,  110 => 54,  104 => 53,  89 => 45,  86 => 44,  84 => 40,  83 => 35,  76 => 31,  55 => 13,  51 => 12,  41 => 4,  35 => 3,  11 => 1,);
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
                <div class=\"col-md-6 col-9\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Sucursal</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"{{ path('backend_organization') }}\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('backend_organization') }}\">Organizaci&oacute;n</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Sucursal</a></li>
                    </ul>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                        <span  title=\"Agregar Sucursal\" data-toggle=\"tooltip\">
                            <a class=\"btn btn-icon btn-rounded theme-bg text-white\" data-toggle=\"modal\" data-target=\"#exampleModalLive\"><span><i class=\"fas fa-plus\"></i></span></a>
                        </span>
                </div>
            </div>
        </div>
    </div>

    <div class=\"main-body\">
        <div class=\"page-wrapper\">
            <div class=\"row\">
                <div class=\"col-sm-12\">

                    {{ include('@App/Backend/flash_message.html.twig') }}

                    <div class=\"card Application-list\">
                       
                            {{
                                include(
                                        '@App/Backend/create_modal.html.twig',
                                        {
                                                'title': 'Sucursal',
                                                'form': form,
                                                'formPath': '@App/Backend/Branch/form.html.twig'
                                        }
                                )
                            }}
                            {{ include('@App/Backend/Branch/list.html.twig', { 'list': list }) }}
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
{% block extra_scripts %}
    <script type=\"text/javascript\">
        function activeChange(id)
        {
            var data = {
                id: id
            };
            
            \$.ajax({
                data: data,
                url: \"{{path('backend_branch_delete')}}\",
                success: function (result)
                {
                    //Aca podemos rastrear la respuesta que nos manda el controlador.
                    console.log(\"result\", result);
                    location.reload();
                }
            });
        }
        \$(document).ready(function () {
            \$('.dataTable').DataTable({
                \"stateSave\": true
            });
            \$('#sForm').validate({
                submitHandler: function (form) {
                    var saveButton = document.getElementById(\"button-save\");
                    var validateForm = document.getElementById(\"sForm\");
                    saveButton.setAttribute(\"disabled\", true);
                    saveButton.innerHTML = \"<span class='spinner-border spinner-border-sm' role='status'></span> Loading...\";
                    var elements = validateForm.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = true;
                    }
                    document.getElementById(\"sForm\").submit();
                }
            });
        });
    </script>
{% endblock %}", "AppBundle:Backend/Branch:index.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/Branch/index.html.twig");
    }
}
