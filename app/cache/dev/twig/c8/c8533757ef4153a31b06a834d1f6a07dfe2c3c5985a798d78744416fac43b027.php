<?php

/* AppBundle:Backend:flash_message.html.twig */
class __TwigTemplate_2492551e86c803665479472e35105897b5581b476ef7ab5856fe06ba05db74da extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend:flash_message.html.twig"));

        // line 1
        echo "\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "success_message"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 2
            echo "\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(function(){
\t\t\t\t\tnew PNotify( {
\t\t\t\t\t\ttitle: '¡Success!', text: '";
            // line 5
            echo $context["flash_message"];
            echo "', type: 'success'
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "
\t\t";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "error_message"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 12
            echo "\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(function(){
\t\t\t\t\tnew PNotify( {
\t\t\t\t\t\ttitle: '¡Error!', text: '";
            // line 15
            echo $context["flash_message"];
            echo "', type: 'error'
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "
\t\t";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "alert_message"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flash_message"]) {
            // line 22
            echo "\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(function(){
\t\t\t\t\tnew PNotify( {
\t\t\t\t\t\ttitle: '¡Atención!', text: '";
            // line 25
            echo $context["flash_message"];
            echo "', type: 'primary'
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flash_message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend:flash_message.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 25,  73 => 22,  69 => 21,  66 => 20,  55 => 15,  50 => 12,  46 => 11,  43 => 10,  32 => 5,  27 => 2,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("\t\t{% for flash_message in app.session.flashbag.get('success_message') %}
\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(function(){
\t\t\t\t\tnew PNotify( {
\t\t\t\t\t\ttitle: '¡Success!', text: '{{ flash_message|raw }}', type: 'success'
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t{% endfor %}

\t\t{% for flash_message in app.session.flashbag.get('error_message') %}
\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(function(){
\t\t\t\t\tnew PNotify( {
\t\t\t\t\t\ttitle: '¡Error!', text: '{{ flash_message|raw }}', type: 'error'
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t{% endfor %}

\t\t{% for flash_message in app.session.flashbag.get('alert_message') %}
\t\t\t<script type=\"text/javascript\">
\t\t\t\t\$(function(){
\t\t\t\t\tnew PNotify( {
\t\t\t\t\t\ttitle: '¡Atención!', text: '{{ flash_message|raw }}', type: 'primary'
\t\t\t\t\t});
\t\t\t\t});
\t\t\t</script>
\t\t{% endfor %}", "AppBundle:Backend:flash_message.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/flash_message.html.twig");
    }
}
