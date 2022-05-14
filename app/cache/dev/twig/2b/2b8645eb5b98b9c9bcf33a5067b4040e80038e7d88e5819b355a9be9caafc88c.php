<?php

/* @App/Backend/_file_form.html.twig */
class __TwigTemplate_e90ebcf7f10ca72b77a16a0ce368e9860c6e7395b5be1a8aaff5ff756baefd86 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/_file_form.html.twig"));

        // line 1
        echo "<div class=\"card\">
    <div class=\"card-header\">
        <h5>Subir Archivo de Excel</h5>
    </div>
    <div class=\"card-block\">
        ";
        // line 6
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock(        // line 7
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("action" =>         // line 9
(isset($context["path"]) ? $context["path"] : $this->getContext($context, "path")), "attr" => array("id" =>         // line 11
(isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")))));
        // line 14
        echo "
        <div class=\"card\">
            <div class=\"card-header\">
                <p>Seleccione el archivo que desea subir. El sistema notificar&aacute; si existen errores.</p>
            </div>
            <div class=\"card-body\">
                <table class=\"\">
                    <tbody>
                        <tr>
                            <td colspan=\"2\">
                                <div class=\"form-group\">
                                    ";
        // line 25
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "file", array()), 'row');
        echo "
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    
                <div class=\"formButtons\">
                    ";
        // line 33
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "save", array()), 'row');
        echo "
                </div>
            </div>
        </div>
        ";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        
        ";
        // line 39
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    </div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/_file_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  70 => 39,  65 => 37,  58 => 33,  47 => 25,  34 => 14,  32 => 11,  31 => 9,  30 => 7,  29 => 6,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"card\">
    <div class=\"card-header\">
        <h5>Subir Archivo de Excel</h5>
    </div>
    <div class=\"card-block\">
        {{ form_start(
            form,
            {
                'action': path,
                'attr': {
                    'id': id
                }
            }
        ) }}
        <div class=\"card\">
            <div class=\"card-header\">
                <p>Seleccione el archivo que desea subir. El sistema notificar&aacute; si existen errores.</p>
            </div>
            <div class=\"card-body\">
                <table class=\"\">
                    <tbody>
                        <tr>
                            <td colspan=\"2\">
                                <div class=\"form-group\">
                                    {{ form_row(form.file) }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                    
                <div class=\"formButtons\">
                    {{ form_row(form.save) }}
                </div>
            </div>
        </div>
        {{ form_errors(form) }}
        
        {{ form_end(form) }}
    </div>
</div>", "@App/Backend/_file_form.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\_file_form.html.twig");
    }
}
