<?php

/* AppBundle:Backend/User:form.html.twig */
class __TwigTemplate_b8f58b56f4237f4b5235623d7b3bf585ec60873dffb867f9e3c953d8d703818d extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend/User:form.html.twig"));

        // line 1
        $context["currentPath"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"));
        // line 2
        echo "
<form method=\"post\" action=\"\" id=\"userForm\" class=\"validateForm\" autocomplete=\"false\"  enctype=\"multipart/form-data\">
    <div class=\"row\">
\t    
\t    ";
        // line 6
        if ((isset($context["edit"]) ? $context["edit"] : $this->getContext($context, "edit"))) {
            // line 7
            echo "\t\t    ";
            if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "avatarPath", array())) > 0)) {
                // line 8
                echo "\t\t\t    <div class='col-md-12'>\t\t    
\t\t\t\t    <img src=\"";
                // line 9
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl(("uploads/" . $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "avatarPath", array()))), "html", null, true);
                echo "\" style='width:150px;'>
\t\t\t\t\t<br><br>\t\t\t\t    \t\t\t\t    
\t\t\t    </div>
\t\t    ";
            }
            // line 13
            echo "\t\t";
        }
        echo "\t\t    
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                ";
        // line 16
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "avatarPath", array()), 'label', array("label" => "Avatar"));
        echo "\t\t\t\t
\t\t\t\t<input type=\"file\" id=\"user_avatarPath\" name=\"user[avatarPath]\" class=\"form-control\">\t\t\t
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">\t       \t                 
                ";
        // line 22
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "firstName", array()), 'label', array("label" => "Nombre"));
        echo "
                ";
        // line 23
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "firstName", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 28
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "lastName", array()), 'label', array("label" => "Apellido"));
        echo "
                ";
        // line 29
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "lastName", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email", array()), 'label', array("label" => "Email"));
        echo "
                ";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "email", array()), 'widget', array("attr" => array("class" => "required email form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 40
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "password", array()), 'label', array("label" => "Contraseña"));
        echo "
                ";
        // line 41
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "password", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
            </div>
        </div>

        ";
        // line 45
        if ((isset($context["edit"]) ? $context["edit"] : $this->getContext($context, "edit"))) {
            // line 46
            echo "\t        <div class=\"col-md-6\">
\t            <div class=\"form-group\">
\t                ";
            // line 48
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "status", array()), 'label', array("label" => "Estado"));
            echo "
\t                ";
            // line 49
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "status", array()), 'widget', array("attr" => array("class" => "required form-control")));
            echo "
\t            </div>
\t        </div>
        ";
        } else {
            // line 52
            echo "        
        \t<input type='hidden' id=\"user_status\" name=\"user[status]\" value=\"ACTIVO\">
        ";
        }
        // line 55
        echo "
\t        <div class=\"col-md-6\">
\t            <div class=\"form-group\">
\t                ";
        // line 58
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "userRole", array()), 'label', array("label" => "Rol"));
        echo "
\t                ";
        // line 59
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "userRole", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
\t            </div>
\t        </div>\t

        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 65
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "organization", array()), 'label', array("label" => "Organización"));
        echo "
                ";
        // line 66
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "organization", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
            </div>
        </div>\t
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                ";
        // line 71
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bio", array()), 'label', array("label" => "Bio"));
        echo "
                ";
        // line 72
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "bio", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
            </div>
        </div>\t        
    </div>
    <div class='row'>
        <div class=\"col-md-6 col-6\">
            ";
        // line 78
        if (twig_in_filter("edit", (isset($context["currentPath"]) ? $context["currentPath"] : $this->getContext($context, "currentPath")))) {
            // line 79
            echo "                <button type=\"reset\" onclick=\"window.location = '";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user");
            echo "'\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            ";
        } else {
            // line 81
            echo "                <button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            ";
        }
        // line 83
        echo "        </div>
        <div class=\"col-md-6 col-6\">
            <button id=\"button-save\" type=\"submit\" class=\"btn btn-rounded btn-success float-right\" style=\"margin-right: 0px;\">Guardar</button>
        </div>\t
        <!-- /.col -->
    </div>
    <!-- /.row -->
    ";
        // line 90
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
</form>
<script src=\"https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js\"></script>
<script>
    var cke = CKEDITOR.replace('user[bio]', {
        toolbarGroups: [
            {\"name\": \"basicstyles\", \"groups\": [\"basicstyles\"]},
            {\"name\": \"paragraph\", \"groups\": [\"list\", \"blocks\"]},
            {\"name\": \"document\", \"groups\": [\"mode\"]},
            {\"name\": \"insert\", \"groups\": [\"insert\"]},
            {\"name\": \"styles\", \"groups\": [\"styles\"]}
        ]
    });
    
    
    ";
        // line 105
        if ((isset($context["edit"]) ? $context["edit"] : $this->getContext($context, "edit"))) {
            echo " 
    \t\$(document).ready(function()
    \t{
\t    \tCKEDITOR.instances['user_bio'].setData(\"";
            // line 108
            echo $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "bio", array());
            echo "\")
\t    });  
    ";
        }
        // line 110
        echo "    
    
    
    \$('#userForm').on('submit',function()
    {
\t   \$('#user_bio').val(CKEDITOR.instances['user_bio'].getData());
    });
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend/User:form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 110,  218 => 108,  212 => 105,  194 => 90,  185 => 83,  181 => 81,  175 => 79,  173 => 78,  164 => 72,  160 => 71,  152 => 66,  148 => 65,  139 => 59,  135 => 58,  130 => 55,  125 => 52,  118 => 49,  114 => 48,  110 => 46,  108 => 45,  101 => 41,  97 => 40,  89 => 35,  85 => 34,  77 => 29,  73 => 28,  65 => 23,  61 => 22,  52 => 16,  45 => 13,  38 => 9,  35 => 8,  32 => 7,  30 => 6,  24 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% set currentPath = path(app.request.attributes.get('_route'), app.request.attributes.get('_route_params')) %}

<form method=\"post\" action=\"\" id=\"userForm\" class=\"validateForm\" autocomplete=\"false\"  enctype=\"multipart/form-data\">
    <div class=\"row\">
\t    
\t    {% if edit %}
\t\t    {% if form.vars.value.avatarPath | length > 0 %}
\t\t\t    <div class='col-md-12'>\t\t    
\t\t\t\t    <img src=\"{{ asset('uploads/' ~ form.vars.value.avatarPath) }}\" style='width:150px;'>
\t\t\t\t\t<br><br>\t\t\t\t    \t\t\t\t    
\t\t\t    </div>
\t\t    {% endif %}
\t\t{% endif %}\t\t    
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                {{ form_label(form.avatarPath, \"Avatar\") }}\t\t\t\t
\t\t\t\t<input type=\"file\" id=\"user_avatarPath\" name=\"user[avatarPath]\" class=\"form-control\">\t\t\t
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">\t       \t                 
                {{ form_label(form.firstName, \"Nombre\") }}
                {{ form_widget(form.firstName, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.lastName, \"Apellido\") }}
                {{form_widget(form.lastName, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.email, \"Email\") }}
                {{form_widget(form.email, {'attr': {'class': 'required email form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.password, \"Contraseña\") }}
                {{form_widget(form.password, {'attr': {'class': 'form-control' }}) }}
            </div>
        </div>

        {% if edit %}
\t        <div class=\"col-md-6\">
\t            <div class=\"form-group\">
\t                {{ form_label(form.status, \"Estado\") }}
\t                {{form_widget(form.status, {'attr': {'class': 'required form-control' }}) }}
\t            </div>
\t        </div>
        {% else %}        
        \t<input type='hidden' id=\"user_status\" name=\"user[status]\" value=\"ACTIVO\">
        {% endif %}

\t        <div class=\"col-md-6\">
\t            <div class=\"form-group\">
\t                {{ form_label(form.userRole, \"Rol\") }}
\t                {{form_widget(form.userRole, {'attr': {'class': 'required form-control'}}) }}
\t            </div>
\t        </div>\t

        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.organization, \"Organización\") }}
                {{form_widget(form.organization, {'attr': {'class': 'form-control'}}) }}
            </div>
        </div>\t
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                {{ form_label(form.bio, \"Bio\") }}
                {{form_widget(form.bio, {'attr': {'class': 'form-control'}}) }}
            </div>
        </div>\t        
    </div>
    <div class='row'>
        <div class=\"col-md-6 col-6\">
            {% if 'edit' in currentPath %}
                <button type=\"reset\" onclick=\"window.location = '{{ path('backend_user') }}'\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            {% else %}
                <button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            {% endif %}
        </div>
        <div class=\"col-md-6 col-6\">
            <button id=\"button-save\" type=\"submit\" class=\"btn btn-rounded btn-success float-right\" style=\"margin-right: 0px;\">Guardar</button>
        </div>\t
        <!-- /.col -->
    </div>
    <!-- /.row -->
    {{ form_widget(form._token) }}
</form>
<script src=\"https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js\"></script>
<script>
    var cke = CKEDITOR.replace('user[bio]', {
        toolbarGroups: [
            {\"name\": \"basicstyles\", \"groups\": [\"basicstyles\"]},
            {\"name\": \"paragraph\", \"groups\": [\"list\", \"blocks\"]},
            {\"name\": \"document\", \"groups\": [\"mode\"]},
            {\"name\": \"insert\", \"groups\": [\"insert\"]},
            {\"name\": \"styles\", \"groups\": [\"styles\"]}
        ]
    });
    
    
    {% if edit %} 
    \t\$(document).ready(function()
    \t{
\t    \tCKEDITOR.instances['user_bio'].setData(\"{{form.vars.value.bio | raw}}\")
\t    });  
    {% endif %}    
    
    
    \$('#userForm').on('submit',function()
    {
\t   \$('#user_bio').val(CKEDITOR.instances['user_bio'].getData());
    });
</script>
", "AppBundle:Backend/User:form.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/User/form.html.twig");
    }
}
