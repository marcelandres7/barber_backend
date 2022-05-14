<?php

/* AppBundle:Backend/Dashboard:statistics.html.twig */
class __TwigTemplate_45cfe0f5c0e9b016c557e460e4390c0b0e4f2de084caf6a20d53a9a2d7e6e65c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base.html.twig", "AppBundle:Backend/Dashboard:statistics.html.twig", 1);
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/Dashboard:statistics.html.twig"));

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
                        <h5 class=\"m-b-10\">Listado de ejecución</h5>
                    </div>                    
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                </div>
            </div>
        </div>
    </div>
    
\t";
        // line 18
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "
    <div class=\"main-body\">
        <div class=\"page-wrapper\">
\t        
            <div class=\"row\">
                <div class=\"col-sm-12\">
\t                <div class=\"card Application-list\">                   
                        ";
        // line 25
        if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "rp", array(), "array")) {
            // line 26
            echo "                            ";
            echo twig_include($this->env, $context, "@App/Backend/Dashboard/statistics_list.html.twig", array("list" => (isset($context["list"]) ? $context["list"] : $this->getContext($context, "list")), "isComplete" => 0));
            echo "
                        ";
        }
        // line 28
        echo "                    </div>
                </div>
            </div>
            
            <br>
            <div class=\"row\">
                <div class=\"col-sm-12\">
\t                <div class=\"card Application-list\">                   
                        ";
        // line 36
        if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "rp", array(), "array")) {
            // line 37
            echo "                            ";
            echo twig_include($this->env, $context, "@App/Backend/Dashboard/statistics_list.html.twig", array("list" => (isset($context["listDone"]) ? $context["listDone"] : $this->getContext($context, "listDone")), "isComplete" => 1));
            echo "
                        ";
        }
        // line 39
        echo "                    </div>
                </div>
            </div>
\t\t\t<br>
            <div class=\"row\">
                <div class=\"col-sm-12\">
\t                <div class=\"card Application-list\">                   
                        ";
        // line 46
        if ($this->getAttribute((isset($context["permits"]) ? $context["permits"] : $this->getContext($context, "permits")), "rp", array(), "array")) {
            // line 47
            echo "                            ";
            echo twig_include($this->env, $context, "@App/Backend/Dashboard/statistics_list.html.twig", array("list" => (isset($context["listCancel"]) ? $context["listCancel"] : $this->getContext($context, "listCancel")), "isComplete" => 2));
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
        
        
\t\t
        \$('.cancel_button').on('click', function () {
            swal({
                title: '¿Quieres cancelar este registro?',
                icon: \"warning\",
                buttons: [\"Cancelar\", true],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal({
                        text: 'Un momento...',
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
        
        \$('.active_button').on('click', function () {
            swal({
                title: '¿Quieres activar este registro?',
                icon: \"warning\",
                buttons: [\"Cancelar\", true],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal({
                        text: 'Un momento...',
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
     
    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/Dashboard:statistics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 56,  122 => 55,  110 => 49,  104 => 47,  102 => 46,  93 => 39,  87 => 37,  85 => 36,  75 => 28,  69 => 26,  67 => 25,  57 => 18,  41 => 4,  35 => 3,  11 => 1,);
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
                        <h5 class=\"m-b-10\">Listado de ejecución</h5>
                    </div>                    
                </div>
                <div class=\"col-md-6 col-3 text-right\">
                </div>
            </div>
        </div>
    </div>
    
\t{{ include('@App/Backend/flash_message.html.twig') }}
    <div class=\"main-body\">
        <div class=\"page-wrapper\">
\t        
            <div class=\"row\">
                <div class=\"col-sm-12\">
\t                <div class=\"card Application-list\">                   
                        {% if permits[\"rp\"] %}
                            {{ include('@App/Backend/Dashboard/statistics_list.html.twig', { 'list': list, isComplete: 0 }) }}
                        {% endif %}
                    </div>
                </div>
            </div>
            
            <br>
            <div class=\"row\">
                <div class=\"col-sm-12\">
\t                <div class=\"card Application-list\">                   
                        {% if permits[\"rp\"] %}
                            {{ include('@App/Backend/Dashboard/statistics_list.html.twig', { 'list': listDone, isComplete: 1 }) }}
                        {% endif %}
                    </div>
                </div>
            </div>
\t\t\t<br>
            <div class=\"row\">
                <div class=\"col-sm-12\">
\t                <div class=\"card Application-list\">                   
                        {% if permits[\"rp\"] %}
                            {{ include('@App/Backend/Dashboard/statistics_list.html.twig', { 'list': listCancel, isComplete: 2 }) }}
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
        
        
\t\t
        \$('.cancel_button').on('click', function () {
            swal({
                title: '¿Quieres cancelar este registro?',
                icon: \"warning\",
                buttons: [\"Cancelar\", true],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal({
                        text: 'Un momento...',
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
        
        \$('.active_button').on('click', function () {
            swal({
                title: '¿Quieres activar este registro?',
                icon: \"warning\",
                buttons: [\"Cancelar\", true],
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal({
                        text: 'Un momento...',
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
     
    </script>
{% endblock %}", "AppBundle:Backend/Dashboard:statistics.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/Dashboard/statistics.html.twig");
    }
}
