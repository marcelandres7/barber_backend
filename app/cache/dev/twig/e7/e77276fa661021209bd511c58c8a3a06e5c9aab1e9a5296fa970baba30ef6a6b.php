<?php

/* @App/Backend/InspectionResult/form.html.twig */
class __TwigTemplate_f0adeda492be4d68c1a681cbe08dab240b5301e287825962d36be03a9a6102b6 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/InspectionResult/form.html.twig"));

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
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nameEng", array()), 'label', array("label" => "Nombre en ingles"));
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
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "requirementPenalty", array()), 'label', array("label" => "Penalización por requisito"));
        echo "
                ";
        // line 19
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "requirementPenalty", array()), 'widget', array("attr" => array("class" => "required select form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                ";
        // line 24
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'label', array("label" => "Contenido"));
        echo "
                ";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                ";
        // line 30
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descriptionEng", array()), 'label', array("label" => "Contenido en ingles"));
        echo "
                ";
        // line 31
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "descriptionEng", array()), 'widget', array("attr" => array("class" => "required form-control")));
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
        // line 44
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
</form>
<script src=\"https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js\"></script>
<script>
    CKEDITOR.replace('appbundle_inspectionresult[description]');
    CKEDITOR.replace('appbundle_inspectionresult[descriptionEng]');
</script>
<link href=\"https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css\" rel=\"stylesheet\" />
<script src=\"https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js\"></script>
<script>
    \$(document).ready(function () {
        \$('.select').select2();
    });
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/InspectionResult/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 44,  82 => 31,  78 => 30,  70 => 25,  66 => 24,  58 => 19,  54 => 18,  46 => 13,  42 => 12,  34 => 7,  30 => 6,  24 => 2,  22 => 1,);
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
                {{ form_label(form.nameEng, \"Nombre en ingles\") }}
                {{form_widget(form.nameEng, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.requirementPenalty, \"Penalización por requisito\") }}
                {{form_widget(form.requirementPenalty, {'attr': {'class': 'required select form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                {{ form_label(form.description, \"Contenido\") }}
                {{form_widget(form.description, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-12\">
            <div class=\"form-group\">
                {{ form_label(form.descriptionEng, \"Contenido en ingles\") }}
                {{form_widget(form.descriptionEng, {'attr': {'class': 'required form-control' }}) }}
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
    CKEDITOR.replace('appbundle_inspectionresult[description]');
    CKEDITOR.replace('appbundle_inspectionresult[descriptionEng]');
</script>
<link href=\"https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css\" rel=\"stylesheet\" />
<script src=\"https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js\"></script>
<script>
    \$(document).ready(function () {
        \$('.select').select2();
    });
</script>
", "@App/Backend/InspectionResult/form.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\InspectionResult\\form.html.twig");
    }
}
