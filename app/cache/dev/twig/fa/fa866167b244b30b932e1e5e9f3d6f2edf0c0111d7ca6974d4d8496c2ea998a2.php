<?php

/* @App/Backend/login.html.twig */
class __TwigTemplate_2566104698a01d307b868054def54b93e16c14e793e90c3a5c60759c27cd4894 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@App/Backend/base_login.html.twig", "@App/Backend/login.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'extra_scripts' => array($this, 'block_extra_scripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@App/Backend/base_login.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/login.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "<div class=\"auth-wrapper\">
\t<div class=\"auth-content\">
\t\t<div class=\"auth-bg\">
\t\t\t<span class=\"r\"></span>
\t\t\t<span class=\"r s\"></span>
\t\t\t<span class=\"r s\"></span>
\t\t\t<span class=\"r\"></span>
\t\t</div>

\t\t
\t\t<div class=\"card\" style=\"opacity:0.9; border-radius:50px\">
\t\t\t<div class=\"card-body text-center\">
\t\t\t\t<div class=\"\">
\t\t\t\t\t<img class=\"logo-login\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/prlm_logo.png"), "html", null, true);
        echo "\" style='width:150px;'>
\t\t\t\t</div>
\t\t\t\t";
        // line 20
        echo "\t\t\t\t<br><br>
\t\t";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "login_error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 22
            echo "\t\t\t<div class=\"alert alert-danger\" role=\"alert\">";
            echo $context["flashMessage"];
            echo "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "        ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 25
            echo "            <div>";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "messageKey", array()), array(), "security"), "html", null, true);
            echo "</div>
        ";
        }
        // line 27
        echo "
\t\t";
        // line 28
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock(        // line 29
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("id" => "loginForm")));
        // line 35
        echo "

\t\t\t\t<form action=\"";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_login");
        echo "\" method=\"post\" id=\"loginForm\">
\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t<input type=\"email\" class=\"form-control required email\" placeholder=\"Email\" name=\"_username\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"input-group mb-4\">
\t\t\t\t\t\t<input type=\"password\" class=\"form-control required\" placeholder=\"Password\" name=\"_password\">
\t\t\t\t\t</div>
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary shadow-2 mb-4\">Login</button>
\t\t\t\t";
        // line 45
        echo         $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
\t\t\t</div>
\t\t</div>
\t</div>
</div>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 53
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 54
        echo "

<script>
  \$(function () {

    \$('#loginForm').validate({
    \terrorPlacement: function(error, element) {}
    });
    
  });
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 54,  121 => 53,  107 => 45,  96 => 37,  92 => 35,  90 => 29,  89 => 28,  86 => 27,  80 => 25,  77 => 24,  68 => 22,  64 => 21,  61 => 20,  56 => 17,  41 => 4,  35 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '@App/Backend/base_login.html.twig' %}

{% block body %}
<div class=\"auth-wrapper\">
\t<div class=\"auth-content\">
\t\t<div class=\"auth-bg\">
\t\t\t<span class=\"r\"></span>
\t\t\t<span class=\"r s\"></span>
\t\t\t<span class=\"r s\"></span>
\t\t\t<span class=\"r\"></span>
\t\t</div>

\t\t
\t\t<div class=\"card\" style=\"opacity:0.9; border-radius:50px\">
\t\t\t<div class=\"card-body text-center\">
\t\t\t\t<div class=\"\">
\t\t\t\t\t<img class=\"logo-login\" src=\"{{ asset('images/prlm_logo.png') }}\" style='width:150px;'>
\t\t\t\t</div>
\t\t\t\t{#<h3 class=\"mb-4\">Login</h3>#}
\t\t\t\t<br><br>
\t\t{% for flashMessage in app.session.flashbag.get('login_error') %}
\t\t\t<div class=\"alert alert-danger\" role=\"alert\">{{ flashMessage | raw }}</div>
        {% endfor %}
        {% if error %}
            <div>{{ error.messageKey|trans({}, 'security') }}</div>
        {% endif %}

\t\t{{ form_start(
\t\t\tform,
\t\t\t{
\t\t\t\t'attr': {
\t\t\t\t\t'id': 'loginForm'
\t\t\t\t}
\t\t\t}
\t\t) }}

\t\t\t\t<form action=\"{{ path('backend_login') }}\" method=\"post\" id=\"loginForm\">
\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t<input type=\"email\" class=\"form-control required email\" placeholder=\"Email\" name=\"_username\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"input-group mb-4\">
\t\t\t\t\t\t<input type=\"password\" class=\"form-control required\" placeholder=\"Password\" name=\"_password\">
\t\t\t\t\t</div>
\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary shadow-2 mb-4\">Login</button>
\t\t\t\t{{ form_end(form) }}
\t\t\t</div>
\t\t</div>
\t</div>
</div>

{% endblock %}

{% block extra_scripts %}


<script>
  \$(function () {

    \$('#loginForm').validate({
    \terrorPlacement: function(error, element) {}
    });
    
  });
</script>
{% endblock %}", "@App/Backend/login.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\login.html.twig");
    }
}
