<?php

/* @App/Backend/profile.html.twig */
class __TwigTemplate_fcf95d9d5d47c793cc16a29d307155394fe27a11aecc9c7fd532b82aa2a52dc9 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/profile.html.twig"));

        // line 1
        if ($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array(), "any", false, true), "profileImage", array(), "any", true, true)) {
            // line 2
            echo "\t";
            $context["img"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl(("uploads/clients/profile_image/" . $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "profileImage", array())));
        } else {
            // line 4
            echo "\t";
            $context["img"] = $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/prlm_logo.png");
        }
        // line 6
        echo "<div class=\"dropdown drp-user\">
\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t<i class=\"icon feather icon-settings\"></i>
\t</a>
\t<div class=\"dropdown-menu dropdown-menu-right profile-notification\">
\t\t<div class=\"pro-head\">
\t\t\t<img src=\"";
        // line 12
        echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : $this->getContext($context, "img")), "html", null, true);
        echo "\" class=\"img-radius\" alt=\"User-Profile-Image\">
\t\t\t<span>";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "firstName", array()), "html", null, true);
        echo "</span>
\t\t</div>
\t\t<ul class=\"pro-body\">
\t\t\t<li>
\t\t\t\t<a href=\"";
        // line 17
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_logout");
        echo "\" class=\"dropdown-item\"><i class=\"feather icon-log-out\"></i> Log out</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</div>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/profile.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 17,  44 => 13,  40 => 12,  32 => 6,  28 => 4,  24 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% if app.user.profileImage is defined %}
\t{% set img = asset('uploads/clients/profile_image/'~app.user.profileImage) %}
{% else %}
\t{% set img = asset('images/prlm_logo.png') %}
{% endif %}
<div class=\"dropdown drp-user\">
\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t<i class=\"icon feather icon-settings\"></i>
\t</a>
\t<div class=\"dropdown-menu dropdown-menu-right profile-notification\">
\t\t<div class=\"pro-head\">
\t\t\t<img src=\"{{ img }}\" class=\"img-radius\" alt=\"User-Profile-Image\">
\t\t\t<span>{{ app.user.firstName }}</span>
\t\t</div>
\t\t<ul class=\"pro-body\">
\t\t\t<li>
\t\t\t\t<a href=\"{{ path('backend_logout') }}\" class=\"dropdown-item\"><i class=\"feather icon-log-out\"></i> Log out</a>
\t\t\t</li>
\t\t</ul>
\t</div>
</div>", "@App/Backend/profile.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\profile.html.twig");
    }
}
