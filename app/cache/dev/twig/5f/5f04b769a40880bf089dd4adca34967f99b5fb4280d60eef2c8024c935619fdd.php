<?php

/* @App/Backend/Modules/form.html.twig */
class __TwigTemplate_54e3b4906ed751a985422bae4c5e1767f52a60012766894a030f3aa922b7dfce extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/Modules/form.html.twig"));

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
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "urlAccess", array()), 'label', array("label" => "Symfony Path"));
        echo "
                ";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "urlAccess", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 18
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "moduleIcon", array()), 'label', array("label" => "Incono"));
        echo "
                ";
        // line 19
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "moduleIcon", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 24
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "orderModule", array()), 'label', array("label" => "Orden"));
        echo "
                ";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "orderModule", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6\">
            ";
        // line 33
        echo "            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"module_catalog[visible]\" id=\"module_catalog_visible\" ";
        // line 35
        echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "visible", array())) ? ("checked") : (""));
        echo ">
                    <label for=\"module_catalog_visible\" class=\"cr\">Visible</label>
                </div>
            </div>\t\t
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 42
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'label', array("label" => "Descripción"));
        echo "
                ";
        // line 43
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "description", array()), 'widget', array("attr" => array("class" => "form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6 col-6\">
            ";
        // line 47
        if (twig_in_filter("modules/", (isset($context["currentPath"]) ? $context["currentPath"] : $this->getContext($context, "currentPath")))) {
            // line 48
            echo "                <button type=\"reset\" onclick=\"window.location = '";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_modules");
            echo "'\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            ";
        } else {
            // line 50
            echo "                <button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            ";
        }
        // line 52
        echo "        </div>
        <div class=\"col-md-6 col-6\">
            <button id=\"button-save\" type=\"submit\" class=\"btn btn-rounded btn-success float-right\">Guardar</button>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    ";
        // line 59
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
</form>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/Modules/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 59,  114 => 52,  110 => 50,  104 => 48,  102 => 47,  95 => 43,  91 => 42,  81 => 35,  77 => 33,  70 => 25,  66 => 24,  58 => 19,  54 => 18,  46 => 13,  42 => 12,  34 => 7,  30 => 6,  24 => 2,  22 => 1,);
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
                {{ form_label(form.urlAccess, \"Symfony Path\") }}
                {{form_widget(form.urlAccess, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.moduleIcon, \"Incono\") }}
                {{form_widget(form.moduleIcon, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.orderModule, \"Orden\") }}
                {{form_widget(form.orderModule, {'attr': {'class': 'form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            {#<div class=\"form-group\">
                    {{ form_label(form.visible, \"Visible\") }}
                    {{form_widget(form.visible, {'attr': {'class': 'visibility' }}) }}
            </div>#}
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"module_catalog[visible]\" id=\"module_catalog_visible\" {{ (form.vars.value.visible) ? 'checked' : '' }}>
                    <label for=\"module_catalog_visible\" class=\"cr\">Visible</label>
                </div>
            </div>\t\t
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.description, \"Descripción\") }}
                {{form_widget(form.description, {'attr': {'class': 'form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6 col-6\">
            {% if 'modules/' in currentPath %}
                <button type=\"reset\" onclick=\"window.location = '{{ path('backend_modules') }}'\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
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
</form>", "@App/Backend/Modules/form.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\Modules\\form.html.twig");
    }
}
