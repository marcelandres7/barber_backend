<?php

/* @App/Backend/_upload.html.twig */
class __TwigTemplate_b58af10e4a84febea7f3290812b923e4600f9a6f6b813e6e03772a795e637c2a extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/_upload.html.twig"));

        // line 1
        echo "<section class=\"content-header\">
    <h1>";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "</h1>
    <ol class=\"breadcrumb\">
        <li>
            <a href=\"";
        // line 5
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_main");
        echo "\">
                <i class=\"fa fa-dashboard\"></i>
                Home
            </a>
        </li>
        <li>
            <a href=\"";
        // line 11
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath((isset($context["titleRoute"]) ? $context["titleRoute"] : $this->getContext($context, "titleRoute")));
        echo "\">
                ";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : $this->getContext($context, "title")), "html", null, true);
        echo "
            </a>
        </li>
        <li class=\"active\">Subir empleados</li>
    </ol>
</section>
<section class=\"content\">
    ";
        // line 19
        echo twig_include($this->env, $context, "@App/Backend/flash_message.html.twig");
        echo "

    ";
        // line 21
        if ((isset($context["example"]) || array_key_exists("example", $context))) {
            // line 22
            echo "        ";
            echo twig_include($this->env, $context, (isset($context["example"]) ? $context["example"] : $this->getContext($context, "example")));
            echo "
    ";
        }
        // line 24
        echo "
    <div class=\"row\">
        <div class=\"col-xs-12\">
            <div class=\"box box-primary\">
                ";
        // line 28
        echo twig_include($this->env, $context,         // line 30
(isset($context["fileFormPath"]) ? $context["fileFormPath"] : $this->getContext($context, "fileFormPath")), array("form" =>         // line 32
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "id" =>         // line 33
(isset($context["id"]) ? $context["id"] : $this->getContext($context, "id"))));
        // line 36
        echo "
            </div>
        </div>
    </div>
</section>
<script
    type=\"text/javascript\"
    src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("js/block_submit_button.js"), "html", null, true);
        echo "\">
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/_upload.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 43,  78 => 36,  76 => 33,  75 => 32,  74 => 30,  73 => 28,  67 => 24,  61 => 22,  59 => 21,  54 => 19,  44 => 12,  40 => 11,  31 => 5,  25 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<section class=\"content-header\">
    <h1>{{ title }}</h1>
    <ol class=\"breadcrumb\">
        <li>
            <a href=\"{{ path('backend_main') }}\">
                <i class=\"fa fa-dashboard\"></i>
                Home
            </a>
        </li>
        <li>
            <a href=\"{{ path(titleRoute) }}\">
                {{ title }}
            </a>
        </li>
        <li class=\"active\">Subir empleados</li>
    </ol>
</section>
<section class=\"content\">
    {{ include('@App/Backend/flash_message.html.twig') }}

    {% if example is defined %}
        {{ include(example) }}
    {% endif %}

    <div class=\"row\">
        <div class=\"col-xs-12\">
            <div class=\"box box-primary\">
                {{
                    include(
                        fileFormPath,
                        {
                            'form': form,
                            'id': id
                        }
                    )
                }}
            </div>
        </div>
    </div>
</section>
<script
    type=\"text/javascript\"
    src=\"{{ asset('js/block_submit_button.js') }}\">
</script>
", "@App/Backend/_upload.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\_upload.html.twig");
    }
}
