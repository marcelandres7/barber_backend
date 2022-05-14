<?php

/* @App/Backend/RequirementItem/index.html.twig */
class __TwigTemplate_09b5a2f96a80aa0705161e46c73e98d9ec0aa13ef1885dd2ea08aaf8276713d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "@App/Backend/RequirementItem/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/RequirementItem/index.html.twig"));

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
                    <div class=\"col-md-12\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Elemento de requisito</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_requirement");
        echo "\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"";
        // line 14
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_requirement");
        echo "\">Requisito</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Elemento de requisito</a></li>
                    </ul>
                </div>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    <span  title=\"Agregar Elemento de requisito\" data-toggle=\"tooltip\">
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
        // line 33
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

                    <div class=\"card Application-list\">
                        ";
        // line 36
        echo twig_include($this->env, $context, "@App/Backend/create_modal.html.twig", array("title" => "Elemento de requisito", "form" =>         // line 41
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "formPath" => "@App/Backend/RequirementItem/form.html.twig"));
        // line 45
        echo "
                        ";
        // line 46
        echo twig_include($this->env, $context, "@App/Backend/RequirementItem/list.html.twig", array("list" => (isset($context["list"]) ? $context["list"] : $this->getContext($context, "list"))));
        echo "

                    </div>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 54
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 55
        echo "    <script type=\"text/javascript\">
        function activeChange(id)
        {
            var data = {
                id: id
            };

            \$.ajax({
                data: data,
                url: \"";
        // line 64
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_requirement_item_delete");
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
        return "@App/Backend/RequirementItem/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 64,  111 => 55,  105 => 54,  90 => 46,  87 => 45,  85 => 41,  84 => 36,  78 => 33,  56 => 14,  52 => 13,  41 => 4,  35 => 3,  11 => 1,);
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
                    <div class=\"col-md-12\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Elemento de requisito</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"{{ path('backend_requirement') }}\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('backend_requirement') }}\">Requisito</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Elemento de requisito</a></li>
                    </ul>
                </div>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    <span  title=\"Agregar Elemento de requisito\" data-toggle=\"tooltip\">
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
                                                'title': 'Elemento de requisito',
                                                'form': form,
                                                'formPath': '@App/Backend/RequirementItem/form.html.twig'
                                        }
                                )
                        }}
                        {{ include('@App/Backend/RequirementItem/list.html.twig', { 'list': list }) }}

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
                url: \"{{path('backend_requirement_item_delete')}}\",
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
{% endblock %}", "@App/Backend/RequirementItem/index.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\RequirementItem\\index.html.twig");
    }
}
