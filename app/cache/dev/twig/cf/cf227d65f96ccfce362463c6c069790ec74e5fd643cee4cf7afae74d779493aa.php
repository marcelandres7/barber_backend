<?php

/* @App/Backend/User/index.html.twig */
class __TwigTemplate_0eaf6e256a305a0f3acf69275f31b3f6ccda30f38c0538fbc135bc0167422932 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "@App/Backend/User/index.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/User/index.html.twig"));

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
                        <h5 class=\"m-b-10\">Usuarios</h5>
                    </div>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    ";
        // line 13
        if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "wp", array(), "array")) {
            // line 14
            echo "                        <span  title=\"Add User\" data-toggle=\"tooltip\">
                            <a class=\"btn btn-icon btn-rounded theme-bg text-white\" data-toggle=\"modal\" data-target=\"#exampleModalLive\"><span><i class=\"feather icon-user-plus\"></i></span></a>
                        </span>
                    ";
        }
        // line 18
        echo "                </div>
            </div>
        </div>
    </div>

    <div class=\"main-body\">
        <div class=\"page-wrapper\">
            <div class=\"row\">
                <div class=\"col-sm-12\">

                    ";
        // line 28
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

                    <div class=\"card Application-list\">

                        ";
        // line 32
        if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "wp", array(), "array")) {
            // line 33
            echo "                            ";
            echo twig_include($this->env, $context, "@App/Backend/create_modal.html.twig", array("title" => "Usuario", "form" =>             // line 38
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "edit" => false, "formPath" => "@App/Backend/User/form.html.twig"));
            // line 43
            echo "
                        ";
        }
        // line 45
        echo "
                        ";
        // line 46
        if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "rp", array(), "array")) {
            // line 47
            echo "                            ";
            echo twig_include($this->env, $context, "@App/Backend/User/list.html.twig", array("list" => (isset($context["list"]) ? $context["list"] : $this->getContext($context, "list"))));
            echo "
                        ";
        }
        // line 49
        echo "                    </div>
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 55
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 56
        echo "    <script type=\"text/javascript\">
        \$(document).ready(function () {
            \$('.dataTable').DataTable({
                \"stateSave\": true
            });

            \$('table').on('click', '#btn-delete', function () {
                \$('.sweet-multiple').on('click', function () {
                    swal({
                        title: '¿Quieres desactivar al usuario \"' + \$(this).attr('data-name') + '\" ?',
                        icon: \"warning\",
                        buttons: [\"Cancel\", true],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal({
                                text: 'El usuario \"' + \$(this).attr('data-name') + '\" se está inactivando',
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

            \$(\".selectpicker\").select2();

            var rol = \$('#user_userRole').val();

            if (rol == 5) {
                \$('.select-organization').show();
            } else if (rol == 4) {
                \$('.select-organization').hide();
            } else {
                \$('.select-organization').hide();
            }

            \$('#user_userRole').change(function () {
                var rol = \$('#user_userRole').val();

                if (rol == 5) {
                    \$('.select-organization').show();
                    \$('#user_organization').addClass(\"required\");
                } else if (rol == 4) {
                    \$('.select-organization').hide();
                    \$('#user_organization').removeClass(\"required\");
                }
            });

            \$('#userForm').validate({
                submitHandler: function (form) {
                    var saveButton = document.getElementById(\"button-save\");
                    var validateForm = document.getElementById(\"userForm\");
                    saveButton.setAttribute(\"disabled\", true);
                    saveButton.innerHTML = \"<span class='spinner-border spinner-border-sm' role='status'></span> Loading...\";
                    var elements = validateForm.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = true;
                    }
                    document.getElementById(\"userForm\").submit();
                }
            });

        });
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/User/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 56,  112 => 55,  100 => 49,  94 => 47,  92 => 46,  89 => 45,  85 => 43,  83 => 38,  81 => 33,  79 => 32,  72 => 28,  60 => 18,  54 => 14,  52 => 13,  41 => 4,  35 => 3,  11 => 1,);
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
                        <h5 class=\"m-b-10\">Usuarios</h5>
                    </div>
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                    {% if permits[\"wp\"] %}
                        <span  title=\"Add User\" data-toggle=\"tooltip\">
                            <a class=\"btn btn-icon btn-rounded theme-bg text-white\" data-toggle=\"modal\" data-target=\"#exampleModalLive\"><span><i class=\"feather icon-user-plus\"></i></span></a>
                        </span>
                    {% endif %}
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

                        {% if permits[\"wp\"] %}
                            {{
                                include(
                                        '@App/Backend/create_modal.html.twig',
                                        {
                                                'title': 'Usuario',
                                                'form': form,
                                                'edit': false,
                                                'formPath': '@App/Backend/User/form.html.twig'
                                        }
                                )
                            }}
                        {% endif %}

                        {% if permits[\"rp\"] %}
                            {{ include('@App/Backend/User/list.html.twig', { 'list': list }) }}
                        {% endif %}
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
                        title: '¿Quieres desactivar al usuario \"' + \$(this).attr('data-name') + '\" ?',
                        icon: \"warning\",
                        buttons: [\"Cancel\", true],
                        dangerMode: true,
                    }).then((willDelete) => {
                        if (willDelete) {
                            swal({
                                text: 'El usuario \"' + \$(this).attr('data-name') + '\" se está inactivando',
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

            \$(\".selectpicker\").select2();

            var rol = \$('#user_userRole').val();

            if (rol == 5) {
                \$('.select-organization').show();
            } else if (rol == 4) {
                \$('.select-organization').hide();
            } else {
                \$('.select-organization').hide();
            }

            \$('#user_userRole').change(function () {
                var rol = \$('#user_userRole').val();

                if (rol == 5) {
                    \$('.select-organization').show();
                    \$('#user_organization').addClass(\"required\");
                } else if (rol == 4) {
                    \$('.select-organization').hide();
                    \$('#user_organization').removeClass(\"required\");
                }
            });

            \$('#userForm').validate({
                submitHandler: function (form) {
                    var saveButton = document.getElementById(\"button-save\");
                    var validateForm = document.getElementById(\"userForm\");
                    saveButton.setAttribute(\"disabled\", true);
                    saveButton.innerHTML = \"<span class='spinner-border spinner-border-sm' role='status'></span> Loading...\";
                    var elements = validateForm.elements;
                    for (var i = 0, len = elements.length; i < len; ++i) {
                        elements[i].readOnly = true;
                    }
                    document.getElementById(\"userForm\").submit();
                }
            });

        });
    </script>
{% endblock %}
", "@App/Backend/User/index.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\User\\index.html.twig");
    }
}
