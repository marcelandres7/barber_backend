<?php

/* @App/Backend/BranchType/form.html.twig */
class __TwigTemplate_764e8ee3f878fd477c57c331f3eee4411a5e10fcd09ca8c693caa186056d2a42 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/BranchType/form.html.twig"));

        // line 1
        $context["currentPath"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"));
        // line 2
        echo "<form method=\"post\" action=\"\" id=\"sForm\" class=\"validateForm\" autocomplete=\"false\">
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
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nameEng", array()), 'label', array("label" => "Nombre en Inglés "));
        echo "
                ";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "nameEng", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
            <div class=\"col-md-12\">
            <div class=\"form-group\">
                ";
        // line 18
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'label', array("label" => "Contenido"));
        echo "
                ";
        // line 19
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6 col-6\">
            ";
        // line 23
        if (twig_in_filter("edit", (isset($context["currentPath"]) ? $context["currentPath"] : $this->getContext($context, "currentPath")))) {
            // line 24
            echo "                <button type=\"reset\" onclick=\"window.location = '";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_branch_type");
            echo "'\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            ";
        } else {
            // line 26
            echo "                <button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            ";
        }
        // line 28
        echo "        </div>
        <div class=\"col-md-6 col-6\">
            <button id=\"button-save\" type=\"submit\" class=\"btn btn-rounded btn-success float-right\">Guardar</button>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    ";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
</form>

<script src=\"https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js\"></script>
<script>
                    CKEDITOR.replace('appbundle_branchtype[description]');
</script>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/BranchType/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 35,  77 => 28,  73 => 26,  67 => 24,  65 => 23,  58 => 19,  54 => 18,  46 => 13,  42 => 12,  34 => 7,  30 => 6,  24 => 2,  22 => 1,);
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
<form method=\"post\" action=\"\" id=\"sForm\" class=\"validateForm\" autocomplete=\"false\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.name, \"Nombre\") }}
                {{form_widget(form.name, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.nameEng, \"Nombre en Inglés \") }}
                {{form_widget(form.nameEng, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
            <div class=\"col-md-12\">
            <div class=\"form-group\">
                {{ form_label(form.description, \"Contenido\") }}
                {{form_widget(form.description, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6 col-6\">
            {% if 'edit' in currentPath %}
                <button type=\"reset\" onclick=\"window.location = '{{ path('backend_branch_type') }}'\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            {% else %}
                <button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            {% endif %}
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
                    CKEDITOR.replace('appbundle_branchtype[description]');
</script>", "@App/Backend/BranchType/form.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\BranchType\\form.html.twig");
    }
}
