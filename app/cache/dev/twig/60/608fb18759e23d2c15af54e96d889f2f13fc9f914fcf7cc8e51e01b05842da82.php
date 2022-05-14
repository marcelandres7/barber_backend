<?php

/* @App/Backend/base_login.html.twig */
class __TwigTemplate_3a521e6f84b8c222c61f9a65b060b37d9fa9738c21fce1f59b1aa0771de4832f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
            'extra_scripts' => array($this, 'block_extra_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/base_login.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t
<meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
";
        // line 9
        echo "<title>";
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 21
        $this->displayBlock('javascripts', $context, $blocks);
        // line 30
        echo "
</head>
<body class=\"hold-transition login-page\">
\t";
        // line 33
        $context["user_agent"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "server", array()), "get", array(0 => "HTTP_USER_AGENT"), "method");
        // line 34
        echo "\t   \t";
        if (((twig_in_filter("Microsoft Internet Explorer", (isset($context["user_agent"]) ? $context["user_agent"] : $this->getContext($context, "user_agent"))) || twig_in_filter("Trident", (isset($context["user_agent"]) ? $context["user_agent"] : $this->getContext($context, "user_agent")))) || twig_in_filter("rv:11", (isset($context["user_agent"]) ? $context["user_agent"] : $this->getContext($context, "user_agent"))))) {
            // line 35
            echo "\t   \t<div style=\"background-color:#FFF3CD;color:#856404;padding:20px;text-align:center;\">
        &#x26a0; &nbsp;
\t\t        Tu navegador no es compatible con este sitio. Por favor utiliza Chrome o Firefox ";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "server", array()), "get", array(0 => "HTTP_USER_AGENT"), "method"), "html", null, true);
            echo "
\t\t</div>
\t";
        }
        // line 40
        echo "\t";
        $this->displayBlock('body', $context, $blocks);
        // line 42
        echo "\t";
        $this->displayBlock('extra_scripts', $context, $blocks);
        // line 44
        echo "
\t</body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "PRLM";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 11
        echo "
<!-- Font Awesome -->
<link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/fonts/fontawesome/css/fontawesome-all.min.css"), "html", null, true);
        echo "\">
<!-- DattaAble -->
<link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/animation/css/animate.min.css"), "html", null, true);
        echo "\">
<link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/css/style.css"), "html", null, true);
        echo "\">

<!-- Custom CSS -->
<link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/backend/styleNew.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 21
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 22
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/jquery/js/jquery.min.js"), "html", null, true);
        echo "\"></script>
<!-- DattaAble -->
<script src=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/js/vendor-all.min.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
";
        // line 27
        echo "<!-- Plugins -->
<script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/jquery-validate/jquery.validate.min.js"), "html", null, true);
        echo "\"></script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 40
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 41
        echo "\t";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 42
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 43
        echo "\t";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/base_login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 43,  172 => 42,  165 => 41,  159 => 40,  150 => 28,  147 => 27,  143 => 25,  139 => 24,  133 => 22,  127 => 21,  118 => 19,  112 => 16,  108 => 15,  103 => 13,  99 => 11,  93 => 10,  81 => 9,  71 => 44,  68 => 42,  65 => 40,  59 => 37,  55 => 35,  52 => 34,  50 => 33,  45 => 30,  43 => 21,  41 => 10,  36 => 9,  27 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
\t
<meta charset=\"utf-8\">
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
{#<link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('images/logo_small.jpg') }}\" />#}
<title>{% block title %}PRLM{% endblock %}</title>
{% block stylesheets %}

<!-- Font Awesome -->
<link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}\">
<!-- DattaAble -->
<link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/animation/css/animate.min.css') }}\">
<link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/css/style.css') }}\">

<!-- Custom CSS -->
<link href=\"{{ asset('css/backend/styleNew.css') }}\" rel=\"stylesheet\">
{% endblock %}
{% block javascripts %}
<script src=\"{{ asset('bundles/dattaAble/assets/plugins/jquery/js/jquery.min.js') }}\"></script>
<!-- DattaAble -->
<script src=\"{{ asset('bundles/dattaAble/assets/js/vendor-all.min.js') }}\"></script>
<script src=\"{{ asset('bundles/dattaAble/assets/plugins/bootstrap/js/bootstrap.min.js') }}\"></script>
{#<script src=\"{{ asset('bundles/dattaAble/assets/js/pcoded.min.js') }}\"></script>#}
<!-- Plugins -->
<script src=\"{{ asset('bundles/jquery-validate/jquery.validate.min.js') }}\"></script>
{% endblock %}

</head>
<body class=\"hold-transition login-page\">
\t{% set user_agent = app.request.server.get('HTTP_USER_AGENT') %}
\t   \t{% if ('Microsoft Internet Explorer' in user_agent) or ('Trident' in user_agent) or ('rv:11' in user_agent)  %}
\t   \t<div style=\"background-color:#FFF3CD;color:#856404;padding:20px;text-align:center;\">
        &#x26a0; &nbsp;
\t\t        Tu navegador no es compatible con este sitio. Por favor utiliza Chrome o Firefox {{ app.request.server.get('HTTP_USER_AGENT') }}
\t\t</div>
\t{% endif %}
\t{% block body %}
\t{% endblock %}
\t{% block extra_scripts %}
\t{% endblock %}

\t</body>
</html>
", "@App/Backend/base_login.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\base_login.html.twig");
    }
}
