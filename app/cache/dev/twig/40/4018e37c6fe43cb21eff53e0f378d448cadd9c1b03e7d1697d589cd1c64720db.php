<?php

/* @App/Backend/Service/form.html.twig */
class __TwigTemplate_44e78467be87e6976d65526fb655cc198f3c62b8e9cc4203a727b8a45eeecc95 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/Service/form.html.twig"));

        // line 1
        $context["currentPath"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"));
        // line 2
        echo "<form method=\"post\" action=\"\" id=\"sForm\" class=\"validateForm\" autocomplete=\"false\" enctype=\"multipart/form-data\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 6
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'label', array("label" => "Nombre"));
        echo "
                ";
        // line 7
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "name", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
         <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nameEng", array()), 'label', array("label" => "Nombre en Ingles "));
        echo "
                ";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nameEng", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 18
        if ((isset($context["organization"]) ? $context["organization"] : $this->getContext($context, "organization"))) {
            // line 19
            echo "                    ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "organization", array()), 'label', array("label" => "Organización"));
            echo "
                    <select id=\"appbundle_service_organization\" name=\"appbundle_service[organization]\" class=\"required select form-control\">
                        <option value=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : $this->getContext($context, "organization")), "organizationId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["organization"]) ? $context["organization"] : $this->getContext($context, "organization")), "name", array()), "html", null, true);
            echo "</option>
                    </select>
                ";
        } else {
            // line 24
            echo "                    ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "organization", array()), 'label', array("label" => "Organización"));
            echo "
                    ";
            // line 25
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "organization", array()), 'widget', array("attr" => array("class" => "required select form-control")));
            echo "
                ";
        }
        // line 27
        echo "            </div>
        </div>
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                ";
        // line 31
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'label', array("label" => "Contenido"));
        echo "
                ";
        // line 32
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6 col-6\">
            <button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>

        </div>
        <div class=\"col-md-6 col-6\">
            <button id=\"button-save\" type=\"submit\" class=\"btn btn-rounded btn-success float-right\">Guardar</button>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    ";
        // line 45
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
</form>
<script src=\"https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js\"></script>
<script>
    CKEDITOR.replace('appbundle_service[description]');
</script>
<link href=\"https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css\" rel=\"stylesheet\" />
<script src=\"https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js\"></script>
<script>
    \$(document).ready(function () {
        \$('.select').select2();
    });
</script>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/Service/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  106 => 45,  90 => 32,  86 => 31,  80 => 27,  75 => 25,  70 => 24,  62 => 21,  56 => 19,  54 => 18,  46 => 13,  42 => 12,  34 => 7,  30 => 6,  24 => 2,  22 => 1,);
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
<form method=\"post\" action=\"\" id=\"sForm\" class=\"validateForm\" autocomplete=\"false\" enctype=\"multipart/form-data\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.name, \"Nombre\") }}
                {{form_widget(form.name, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
         <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.nameEng, \"Nombre en Ingles \") }}
                {{form_widget(form.nameEng, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {% if organization %}
                    {{ form_label(form.organization, \"Organización\") }}
                    <select id=\"appbundle_service_organization\" name=\"appbundle_service[organization]\" class=\"required select form-control\">
                        <option value=\"{{ organization.organizationId }}\">{{ organization.name }}</option>
                    </select>
                {% else %}
                    {{ form_label(form.organization, \"Organización\") }}
                    {{form_widget(form.organization, {'attr': {'class': 'required select form-control' }}) }}
                {% endif %}
            </div>
        </div>
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                {{ form_label(form.description, \"Contenido\") }}
                {{form_widget(form.description, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6 col-6\">
            <button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>

        </div>
        <div class=\"col-md-6 col-6\">
            <button id=\"button-save\" type=\"submit\" class=\"btn btn-rounded btn-success float-right\">Guardar</button>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    {{ form_widget(form._token) }}
</form>
<script src=\"https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js\"></script>
<script>
    CKEDITOR.replace('appbundle_service[description]');
</script>
<link href=\"https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css\" rel=\"stylesheet\" />
<script src=\"https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js\"></script>
<script>
    \$(document).ready(function () {
        \$('.select').select2();
    });
</script>", "@App/Backend/Service/form.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\Service\\form.html.twig");
    }
}
