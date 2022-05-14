<?php

/* @App/Backend/UserRolePermission/index.html.twig */
class __TwigTemplate_dba10794173acb6cbf055fa24cdfe015bcffa2d2990f3f51bf2fccd6cbf4fc44 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "@App/Backend/UserRolePermission/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/UserRolePermission/index.html.twig"));

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
                        <h5 class=\"m-b-10\">Permisos</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_roles");
        echo "\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_roles");
        echo "\">Rol</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Permisos</a></li>
                    </ul>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    <span  title=\"Agregar permiso\" data-toggle=\"tooltip\">
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
        // line 31
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

                    <div class=\"card Application-list\">

                        ";
        // line 35
        echo twig_include($this->env, $context, "@App/Backend/create_modal.html.twig", array("title" => "Permisos", "form" =>         // line 40
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "formPath" => "@App/Backend/UserRolePermission/form.html.twig"));
        // line 44
        echo "

                        ";
        // line 46
        echo twig_include($this->env, $context, "@App/Backend/UserRolePermission/list.html.twig", array("list" => (isset($context["list"]) ? $context["list"] : $this->getContext($context, "list"))));
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
        \$(document).ready(function () {
            \$('.dataTable').DataTable({
                \"stateSave\": true
            });

            \$('table').on('click', '#btn-delete', function () {
                \$('.sweet-multiple').on('click', function () {
                    swal({
                        title: '¿Quieres eliminar el permiso \"' + \$(this).attr('data-role') + ' - ' + \$(this).attr('data-module') + '\" ?',
                        icon: \"warning\",
                        buttons: [\"Cancel\", true],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal({
                                text: 'El permiso \"' + \$(this).attr('data-role') + ' - ' + \$(this).attr('data-module') + '\" está siendo eliminado',
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
            \$('#userRoleForm').validate({
                submitHandler: function (form) {
                    var saveButton = document.getElementById(\"button-save\");
                    var validateForm = document.getElementById(\"userRoleForm\");
                    saveButton.setAttribute(\"disabled\", true);
                    saveButton.innerHTML = \"<span class='spinner-border spinner-border-sm' role='status'></span> Loading...\";
                    var elements = validateForm.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = true;
                    }
                    document.getElementById(\"userRoleForm\").submit();
                }
            });
        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/UserRolePermission/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  111 => 55,  105 => 54,  90 => 46,  86 => 44,  84 => 40,  83 => 35,  76 => 31,  55 => 13,  51 => 12,  41 => 4,  35 => 3,  11 => 1,);
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
                        <h5 class=\"m-b-10\">Permisos</h5>
                    </div>
                    <ul class=\"breadcrumb\">
                        <a href=\"{{ path('backend_user_roles') }}\" class=\"m-r-10\"><h5><i class=\"feather icon-chevron-left\"></i></h5></a>
                        <li class=\"breadcrumb-item\"><a href=\"{{ path('backend_user_roles') }}\">Rol</a></li>
                        <li class=\"breadcrumb-item\"><a href=\"#!\">Permisos</a></li>
                    </ul>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    <span  title=\"Agregar permiso\" data-toggle=\"tooltip\">
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

                    <div class=\"card Application-list\">

                        {{
                            include(
                                    '@App/Backend/create_modal.html.twig',
                                    {
                                            'title': 'Permisos',
                                            'form': form,
                                            'formPath': '@App/Backend/UserRolePermission/form.html.twig'
                                    }
                            )
                        }}

                        {{ include('@App/Backend/UserRolePermission/list.html.twig', { 'list': list }) }}

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
                        title: '¿Quieres eliminar el permiso \"' + \$(this).attr('data-role') + ' - ' + \$(this).attr('data-module') + '\" ?',
                        icon: \"warning\",
                        buttons: [\"Cancel\", true],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal({
                                text: 'El permiso \"' + \$(this).attr('data-role') + ' - ' + \$(this).attr('data-module') + '\" está siendo eliminado',
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
            \$('#userRoleForm').validate({
                submitHandler: function (form) {
                    var saveButton = document.getElementById(\"button-save\");
                    var validateForm = document.getElementById(\"userRoleForm\");
                    saveButton.setAttribute(\"disabled\", true);
                    saveButton.innerHTML = \"<span class='spinner-border spinner-border-sm' role='status'></span> Loading...\";
                    var elements = validateForm.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = true;
                    }
                    document.getElementById(\"userRoleForm\").submit();
                }
            });
        });
    </script>
{% endblock %}
", "@App/Backend/UserRolePermission/index.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\UserRolePermission\\index.html.twig");
    }
}
