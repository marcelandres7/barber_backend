<?php

/* @App/Backend/UserRolePermission/form.html.twig */
class __TwigTemplate_0ae9d34babac39257b07d1d533a36bacf192d455a8fa9e25352391342c79bc39 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/UserRolePermission/form.html.twig"));

        // line 1
        $context["currentPath"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route"), "method"), $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "attributes", array()), "get", array(0 => "_route_params"), "method"));
        // line 2
        echo "<form method=\"post\" action=\"\" id=\"userRoleForm\" class=\"validateForm\"
      autocomplete=\"false\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 7
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "userRole", array()), 'label', array("label" => "Rol"));
        echo "
                ";
        // line 8
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "userRole", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                ";
        // line 13
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "module", array()), 'label', array("label" => "Módulo"));
        echo "
                ";
        // line 14
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "module", array()), 'widget', array("attr" => array("class" => "required form-control")));
        echo "
            </div>\t\t\t\t
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[viewModule]\" id=\"user_role_module_permission_viewModule\" ";
        // line 20
        echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "viewModule", array())) ? ("checked") : (""));
        echo ">
                    <label for=\"user_role_module_permission_viewModule\" class=\"cr\">Ver módulo</label>
                </div>
            </div>\t
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[readPermission]\" id=\"user_role_module_permission_readPermission\" ";
        // line 28
        echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "readPermission", array())) ? ("checked") : (""));
        echo ">
                    <label for=\"user_role_module_permission_readPermission\" class=\"cr\">Leer</label>
                </div>
            </div>\t
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[writePermission]\" id=\"user_role_module_permission_writePermission\" ";
        // line 36
        echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "writePermission", array())) ? ("checked") : (""));
        echo ">
                    <label for=\"user_role_module_permission_writePermission\" class=\"cr\">Añadir</label>
                </div>
            </div>\t
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[editPermission]\" id=\"user_role_module_permission_editPermission\" ";
        // line 44
        echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "editPermission", array())) ? ("checked") : (""));
        echo ">
                    <label for=\"user_role_module_permission_editPermission\" class=\"cr\">Editar</label>
                </div>
            </div>
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[deletePermission]\" id=\"user_role_module_permission_deletePermission\" ";
        // line 52
        echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "deletePermission", array())) ? ("checked") : (""));
        echo ">
                    <label for=\"user_role_module_permission_deletePermission\" class=\"cr\">Eliminar</label>
                </div>
            </div>
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[mainModule]\" id=\"user_role_module_permission_mainModule\" ";
        // line 60
        echo (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "vars", array()), "value", array()), "mainModule", array())) ? ("checked") : (""));
        echo ">
                    <label for=\"user_role_module_permission_mainModule\" class=\"cr\">Módulo de inicio</label>
                </div>
            </div>
        </div>
        <div class=\"col-md-6 col-6\">
            ";
        // line 66
        if (twig_in_filter("edit", (isset($context["currentPath"]) ? $context["currentPath"] : $this->getContext($context, "currentPath")))) {
            // line 67
            echo "                <button type=\"reset\" onclick=\"window.location = '";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_user_role_permission", array("roleId" => (isset($context["roleId"]) ? $context["roleId"] : $this->getContext($context, "roleId")))), "html", null, true);
            echo "'\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            ";
        } else {
            // line 69
            echo "                <button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
            ";
        }
        // line 71
        echo "        </div>
        <div class=\"col-md-6 col-6\">
            <button id=\"button-save\" type=\"submit\" class=\"btn btn-rounded btn-success float-right\">Guardar</button>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    ";
        // line 78
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "_token", array()), 'widget');
        echo "
</form>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/UserRolePermission/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 78,  132 => 71,  128 => 69,  122 => 67,  120 => 66,  111 => 60,  100 => 52,  89 => 44,  78 => 36,  67 => 28,  56 => 20,  47 => 14,  43 => 13,  35 => 8,  31 => 7,  24 => 2,  22 => 1,);
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
<form method=\"post\" action=\"\" id=\"userRoleForm\" class=\"validateForm\"
      autocomplete=\"false\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.userRole, \"Rol\") }}
                {{form_widget(form.userRole, {'attr': {'class': 'required form-control' }}) }}
            </div>
        </div>
        <div class=\"col-md-6\">
            <div class=\"form-group\">
                {{ form_label(form.module, \"Módulo\") }}
                {{form_widget(form.module, {'attr': {'class': 'required form-control' }}) }}
            </div>\t\t\t\t
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[viewModule]\" id=\"user_role_module_permission_viewModule\" {{ (form.vars.value.viewModule) ? 'checked' : '' }}>
                    <label for=\"user_role_module_permission_viewModule\" class=\"cr\">Ver módulo</label>
                </div>
            </div>\t
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[readPermission]\" id=\"user_role_module_permission_readPermission\" {{ (form.vars.value.readPermission) ? 'checked' : '' }}>
                    <label for=\"user_role_module_permission_readPermission\" class=\"cr\">Leer</label>
                </div>
            </div>\t
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[writePermission]\" id=\"user_role_module_permission_writePermission\" {{ (form.vars.value.writePermission) ? 'checked' : '' }}>
                    <label for=\"user_role_module_permission_writePermission\" class=\"cr\">Añadir</label>
                </div>
            </div>\t
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[editPermission]\" id=\"user_role_module_permission_editPermission\" {{ (form.vars.value.editPermission) ? 'checked' : '' }}>
                    <label for=\"user_role_module_permission_editPermission\" class=\"cr\">Editar</label>
                </div>
            </div>
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[deletePermission]\" id=\"user_role_module_permission_deletePermission\" {{ (form.vars.value.deletePermission) ? 'checked' : '' }}>
                    <label for=\"user_role_module_permission_deletePermission\" class=\"cr\">Eliminar</label>
                </div>
            </div>
        </div>
        <div class=\"col-md-4 col-6\">
            <div class=\"form-group\">
                <div class=\"checkbox checkbox-fill d-inline\">
                    <input type=\"checkbox\" name=\"user_role_module_permission[mainModule]\" id=\"user_role_module_permission_mainModule\" {{ (form.vars.value.mainModule) ? 'checked' : '' }}>
                    <label for=\"user_role_module_permission_mainModule\" class=\"cr\">Módulo de inicio</label>
                </div>
            </div>
        </div>
        <div class=\"col-md-6 col-6\">
            {% if 'edit' in currentPath %}
                <button type=\"reset\" onclick=\"window.location = '{{ path('backend_user_role_permission', {'roleId': roleId}) }}'\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
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
</form>", "@App/Backend/UserRolePermission/form.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\UserRolePermission\\form.html.twig");
    }
}
