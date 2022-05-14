<?php

/* @App/Backend/Modules/index.html.twig */
class __TwigTemplate_6ba3d905e2e4afb50be0dc9d5c38d0b792c683d04247dade86d06b5d465b8446 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "@App/Backend/Modules/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/Modules/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "
    <div class=\"page-header\">
        <div class=\"page-block\">
            <div class=\"row align-items-center\">
                <div class=\"col-md-6 col-9\">
                    <div class=\"page-header-title\">
                        <h5 class=\"m-b-10\">Modulos</h5>
                    </div>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    <span  title=\"Agregar módulo\" data-toggle=\"tooltip\">
                        <a class=\"btn btn-icon btn-rounded theme-bg text-white\" data-toggle=\"modal\" data-target=\"#exampleModalLive\"><span><i class=\"feather icon-plus\"></i></span></a>
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
        // line 26
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

                    ";
        // line 28
        echo twig_include($this->env, $context, "@App/Backend/create_modal.html.twig", array("title" => "Modulo", "form" =>         // line 33
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "formPath" => "@App/Backend/Modules/form.html.twig"));
        // line 37
        echo "

                    <div class=\"card Application-list\">
                        ";
        // line 40
        echo twig_include($this->env, $context, "@App/Backend/Modules/list.html.twig", array("list" => (isset($context["list"]) ? $context["list"] : $this->getContext($context, "list"))));
        echo "
                    </div>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 47
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 48
        echo "    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('.dataTable').DataTable({
                \"stateSave\": true
            });

            \$('table').on('click', '#btn-delete', function () {
                \$('.sweet-multiple').on('click', function () {
                    swal({
                        title: '¿Quieres eliminar el módulo \"' + \$(this).attr('data-name') + '\" ?',
                        icon: \"warning\",
                        buttons: [\"Cancel\", true],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal({
                                text: 'El módulo \"' + \$(this).attr('data-name') + '\" está siendo eliminado',
                                icon: \"info\",
                                buttons: false,
                                content: {
                                    element: \"span\",
                                    attributes: {
                                        className: \"spinner-border spinner-border-sm\"
                                    }
                                }
                            });
                            window.location = \$(this).attr('data-href');
                        }
                    });
                });
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
        return "@App/Backend/Modules/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 48,  92 => 47,  78 => 40,  73 => 37,  71 => 33,  70 => 28,  65 => 26,  41 => 4,  35 => 3,  11 => 1,);
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
                        <h5 class=\"m-b-10\">Modulos</h5>
                    </div>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    <span  title=\"Agregar módulo\" data-toggle=\"tooltip\">
                        <a class=\"btn btn-icon btn-rounded theme-bg text-white\" data-toggle=\"modal\" data-target=\"#exampleModalLive\"><span><i class=\"feather icon-plus\"></i></span></a>
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

                    {{
                        include(
                                '@App/Backend/create_modal.html.twig',
                                {
                                        'title': 'Modulo',
                                        'form': form,
                                        'formPath': '@App/Backend/Modules/form.html.twig'
                                }
                        )
                    }}

                    <div class=\"card Application-list\">
                        {{ include('@App/Backend/Modules/list.html.twig', { 'list': list }) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
{% endblock %}
{% block extra_scripts %}
    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('.dataTable').DataTable({
                \"stateSave\": true
            });

            \$('table').on('click', '#btn-delete', function () {
                \$('.sweet-multiple').on('click', function () {
                    swal({
                        title: '¿Quieres eliminar el módulo \"' + \$(this).attr('data-name') + '\" ?',
                        icon: \"warning\",
                        buttons: [\"Cancel\", true],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal({
                                text: 'El módulo \"' + \$(this).attr('data-name') + '\" está siendo eliminado',
                                icon: \"info\",
                                buttons: false,
                                content: {
                                    element: \"span\",
                                    attributes: {
                                        className: \"spinner-border spinner-border-sm\"
                                    }
                                }
                            });
                            window.location = \$(this).attr('data-href');
                        }
                    });
                });
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
{% endblock %}", "@App/Backend/Modules/index.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\Modules\\index.html.twig");
    }
}
