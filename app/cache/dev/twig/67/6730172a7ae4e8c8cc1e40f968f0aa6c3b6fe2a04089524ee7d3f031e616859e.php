<?php

/* @App/Backend/base_builder.html.twig */
class __TwigTemplate_e68a133ff8fcb8fd55bbc900a0a85455415c7782eeadae4ca93f7d467176c85f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'extra_scripts' => array($this, 'block_extra_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/base_builder.html.twig"));

        // line 1
        echo "<!doctype html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <title>Builder</title>
    <meta content=\"Best Free Open Source Responsive Websites Builder\" name=\"description\">
    
    
    

\t<!-- Font Awesome -->
\t<!--link rel=\"stylesheet\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/fonts/fontawesome/css/fontawesome-all.min.css"), "html", null, true);
        echo "\"-->

\t<!-- Animate -->
\t<link rel=\"stylesheet\" href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/animation/css/animate.min.css"), "html", null, true);
        echo "\">

\t<!-- PNotify -->
\t<link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/pnotify/css/pnotify.custom.min.css"), "html", null, true);
        echo "\">

\t<link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/css/pages/pnotify.css"), "html", null, true);
        echo "\">

\t<!-- DattaAble -->
\t<link rel=\"stylesheet\" href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/css/style.css"), "html", null, true);
        echo "\">

    
    
    
    <link rel=\"stylesheet\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/css/toastr.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/css/grapes.min.css"), "html", null, true);
        echo "\">
    <link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/css/grapesjs-preset-webpage.min.css"), "html", null, true);
        echo "\">    
    <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/css/tooltip.css"), "html", null, true);
        echo "\">    
    <link rel=\"stylesheet\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/css/grapesjs-plugin-filestack.css"), "html", null, true);
        echo "\">    
    <link rel=\"stylesheet\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/css/demos.css"), "html", null, true);
        echo "\">  
    <link rel=\"stylesheet\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/css/custom.css"), "html", null, true);
        echo "\">        


\t\t<!-- DattaAble -->
\t\t<script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/js/vendor-all.min.js"), "html", null, true);
        echo "\"></script>
    <!-- <script src=\"//static.filestackapi.com/v3/filestack.js\"></script> -->
    <!-- <script src=\"js/aviary.js\"></script> old //feather.aviary.com/imaging/v3/editor.js -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
    
    <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/toastr.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapes.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-preset-webpage.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-lory-slider.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-tabs.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-custom-code.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-touch.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-parser-postcss.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-tooltip.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-tui-image-editor.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/grapesjs-typed.min.js"), "html", null, true);
        echo "\"></script>


  </head>
  <body>
    
    
\t    <div style=\"display: none\">
\t      <div class=\"gjs-logo-cont\">
\t        <a href=\"#\"><img class=\"gjs-logo\" src=\"#\"></a>
\t        <div class=\"gjs-logo-version\"></div>
\t      </div>
\t    </div>
\t    
    
    \t<!-- Left side column. contains the logo and sidebar -->
        ";
        // line 69
        echo "\t
\t\t";
        // line 72
        echo "\t\t\t\t";
        $this->displayBlock('body', $context, $blocks);
        // line 74
        echo "\t\t\t";
        // line 75
        echo "\t\t\t
\t\t\t\t\t\t\t

\t\t<script>
\t\t\tvar global_upload_path  = \"";
        // line 79
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("fileuploadhandler", array("type" => "asset"));
        echo "\";\t\t
\t\t\tvar global_asset_get    = \"";
        // line 80
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("utils_get_asset");
        echo "\";\t\t\t\t\t
\t\t\tvar global_asset_add    = \"";
        // line 81
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("utils_add_asset");
        echo "\";\t
\t\t\tvar global_asset_remove = \"";
        // line 82
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("utils_remove_asset");
        echo "\";\t\t\t\t\t\t\t\t\t\t\t
\t\t\tvar global_storage_load = \"";
        // line 83
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("utils_storage_load");
        echo "\";\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\tvar global_storage_save = \"";
        // line 84
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("utils_storage_save");
        echo "\";\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t</script>

\t\t<script src=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/builder/js/loader.js"), "html", null, true);
        echo "\"></script>
\t\t";
        // line 88
        $this->displayBlock('extra_scripts', $context, $blocks);
        // line 90
        echo "  </body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 72
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 73
        echo "\t\t\t\t";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 88
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 89
        echo "\t\t";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/base_builder.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  240 => 89,  234 => 88,  227 => 73,  221 => 72,  212 => 90,  210 => 88,  206 => 87,  200 => 84,  196 => 83,  192 => 82,  188 => 81,  184 => 80,  180 => 79,  174 => 75,  172 => 74,  169 => 72,  166 => 69,  147 => 53,  143 => 52,  139 => 51,  135 => 50,  131 => 49,  127 => 48,  123 => 47,  119 => 46,  115 => 45,  111 => 44,  107 => 43,  99 => 38,  92 => 34,  88 => 33,  84 => 32,  80 => 31,  76 => 30,  72 => 29,  68 => 28,  60 => 23,  54 => 20,  49 => 18,  43 => 15,  37 => 12,  24 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>
<html lang=\"en\">
  <head>
    <meta charset=\"utf-8\">
    <title>Builder</title>
    <meta content=\"Best Free Open Source Responsive Websites Builder\" name=\"description\">
    
    
    

\t<!-- Font Awesome -->
\t<!--link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}\"-->

\t<!-- Animate -->
\t<link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/animation/css/animate.min.css') }}\">

\t<!-- PNotify -->
\t<link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/pnotify/css/pnotify.custom.min.css') }}\">

\t<link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/css/pages/pnotify.css') }}\">

\t<!-- DattaAble -->
\t<link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/css/style.css') }}\">

    
    
    
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/builder/css/toastr.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/builder/css/grapes.min.css') }}\">
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/builder/css/grapesjs-preset-webpage.min.css') }}\">    
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/builder/css/tooltip.css') }}\">    
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/builder/css/grapesjs-plugin-filestack.css') }}\">    
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/builder/css/demos.css') }}\">  
    <link rel=\"stylesheet\" href=\"{{ asset('bundles/builder/css/custom.css') }}\">        


\t\t<!-- DattaAble -->
\t\t<script src=\"{{ asset('bundles/dattaAble/assets/js/vendor-all.min.js') }}\"></script>
    <!-- <script src=\"//static.filestackapi.com/v3/filestack.js\"></script> -->
    <!-- <script src=\"js/aviary.js\"></script> old //feather.aviary.com/imaging/v3/editor.js -->
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
    
    <script src=\"{{ asset('bundles/builder/js/toastr.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapes.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-preset-webpage.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-lory-slider.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-tabs.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-custom-code.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-touch.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-parser-postcss.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-tooltip.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-tui-image-editor.min.js') }}\"></script>
    <script src=\"{{ asset('bundles/builder/js/grapesjs-typed.min.js') }}\"></script>


  </head>
  <body>
    
    
\t    <div style=\"display: none\">
\t      <div class=\"gjs-logo-cont\">
\t        <a href=\"#\"><img class=\"gjs-logo\" src=\"#\"></a>
\t        <div class=\"gjs-logo-version\"></div>
\t      </div>
\t    </div>
\t    
    
    \t<!-- Left side column. contains the logo and sidebar -->
        {# render(controller(\"AppBundle:Backend/Main:mainMenu\")) #}\t
\t\t{#<div class=\"pcoded-main-container\">
\t\t\t<div class=\"pcoded-wrapper\">#}
\t\t\t\t{% block body %}
\t\t\t\t{% endblock %}
\t\t\t{#</div>\t\t\t\t
\t\t</div>#}\t\t\t
\t\t\t\t\t\t\t

\t\t<script>
\t\t\tvar global_upload_path  = \"{{path('fileuploadhandler',{type:'asset'})}}\";\t\t
\t\t\tvar global_asset_get    = \"{{path('utils_get_asset')}}\";\t\t\t\t\t
\t\t\tvar global_asset_add    = \"{{path('utils_add_asset')}}\";\t
\t\t\tvar global_asset_remove = \"{{path('utils_remove_asset')}}\";\t\t\t\t\t\t\t\t\t\t\t
\t\t\tvar global_storage_load = \"{{path('utils_storage_load')}}\";\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\tvar global_storage_save = \"{{path('utils_storage_save')}}\";\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t</script>

\t\t<script src=\"{{ asset('bundles/builder/js/loader.js') }}\"></script>
\t\t{% block extra_scripts %}
\t\t{% endblock %}
  </body>
</html>
", "@App/Backend/base_builder.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\base_builder.html.twig");
    }
}
